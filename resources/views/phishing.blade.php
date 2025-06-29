<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Phishing URL Checker</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f8f9fa;
            margin: 0;
            padding: 2em;
            display: flex;
            justify-content: center;
        }

        .container {
            background: #ffffff;
            padding: 2em;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
        }

        h1 {
            text-align: center;
            color: #343a40;
        }

        label {
            font-weight: 600;
            margin-top: 1em;
            display: block;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 1em;
            border: 1px solid #ced4da;
            border-radius: 5px;
            font-size: 14px;
        }

        button {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        .result {
            margin-top: 1em;
            background: #f1f3f5;
            padding: 1em;
            border-radius: 5px;
            font-family: monospace;
            white-space: pre-wrap;
        }

        hr {
            margin: 2em 0;
            border: none;
            border-top: 1px solid #dee2e6;
        }

        /* Styles for result cards */
        .alert {
            padding: 1em;
            margin-top: 1em;
            border-radius: 5px;
            border: 1px solid transparent;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            font-size: 14px;
            text-align: left;
        }

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }

        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }

        .alert-hr {
            margin: 0.75em 0;
            border-top: 1px solid rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <div class="container">
        <pre>{{ var_dump(request()->all()) }}</pre>
        {{ $ip }}
        {{ $platform }}
        <h1>Phishing URL Checker</h1>

        <form id="singleForm">
            <label for="url">Check a single URL:</label>
            <input type="text" name="url" id="url" placeholder="e.g. http://example.com" required>
            <button type="submit">Check</button>
        </form>
        <div id="singleResult"></div>

        <hr>

        <!-- <form id="batchForm">
            <label for="urls">Check multiple URLs (one per line):</label>
            <textarea name="urls" id="urls" placeholder="http://example.com&#10;http://another.com"></textarea>
            <button type="submit">Check Batch</button>
        </form>
        <div id="batchResult" class="result"></div>
    </div> -->

        <script>
            // Helper function to format the LLM analysis text into HTML
            function formatLlmAnalysis(text) {
                if (!text) {
                    return 'Analisis tidak tersedia.';
                }
                // 1. Replace markdown-style bold (**text**) with <strong> tags
                let formattedText = text.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');
                // 2. Replace newlines with <br> tags for proper HTML line breaks
                formattedText = formattedText.replace(/\n/g, '<br>');
                return formattedText;
            }

            document.getElementById('singleForm').onsubmit = async function (e) {
                e.preventDefault();
                let url = document.getElementById('url').value;
                let resDiv = document.getElementById('singleResult');
                resDiv.textContent = 'Checking...';

                try {
                    let response = await fetch('/phishing/check', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({ url })
                    });

                    if (!response.ok) {
                        let errorText = `Server error: ${response.status} ${response.statusText}`;
                        try {
                            // Try to parse a JSON error message from the body
                            const errorData = await response.json();
                            if (errorData.error) {
                                errorText = errorData.error;
                            }
                        } catch (e) {
                            // Body was not JSON, stick with the status text
                        }
                        throw new Error(errorText);
                    }

                    let data = await response.json();
                    let llmHtml = formatLlmAnalysis(data.llm_analysis);

                    resDiv.innerHTML = `
                        <div class="alert ${data.prediction === 'phishing' ? 'alert-danger' : 'alert-success'}">
                            <strong>Prediction:</strong> ${data.prediction}<br>
                            <strong>Confidence:</strong> ${(data.confidence * 100).toFixed(2)}%<br>
                            <hr class="alert-hr">
                            ${llmHtml}
                        </div>
                    `;
                } catch (err) {
                    resDiv.innerHTML = `<div class="alert alert-danger"><strong>Error:</strong> ${err.message}</div>`;
                }
            };
        </script>
</body>

</html>