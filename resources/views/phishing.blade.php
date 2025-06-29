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
    </style>
</head>
<body>
    <div class="container">
        <h1>Phishing URL Checker</h1>

        <form id="singleForm">
            <label for="url">Check a single URL:</label>
            <input type="text" name="url" id="url" placeholder="e.g. google.com or https://example.com" required>
            <small style="color: #666; display: block; margin-top: 5px;">You can enter URLs with or without http/https - we'll automatically add https:// if needed.</small>
            <button type="submit">Check</button>
        </form>
        <div id="singleResult" class="result"></div>

        <hr>

        <!-- <form id="batchForm">
            <label for="urls">Check multiple URLs (one per line):</label>
            <textarea name="urls" id="urls" placeholder="http://example.com&#10;http://another.com"></textarea>
            <button type="submit">Check Batch</button>
        </form>
        <div id="batchResult" class="result"></div>
    </div> -->

    <script>
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

                if (!response.ok) throw new Error('Server error');

                let data = await response.json();

                resDiv.innerHTML = `
                    <div class="alert ${data.prediction === 'phishing' ? 'alert-danger' : 'alert-success'}">
                        <strong>Prediction:</strong> ${data.prediction}<br>
                        <strong>Confidence:</strong> ${(data.confidence * 100).toFixed(2)}%
                    </div>
                `;
            } catch (err) {
                resDiv.innerHTML = `<div class="alert alert-warning">Error: ${err.message}</div>`;
            }
        };


        // document.getElementById('batchForm').onsubmit = async function (e) {
        //     e.preventDefault();
        //     let urls = document.getElementById('urls').value.split('\n').map(u => u.trim()).filter(u => u);
        //     let resDiv = document.getElementById('batchResult');
        //     resDiv.textContent = 'Checking...';
        //     let response = await fetch('/phishing/batch', {
        //         method: 'POST',
        //         headers: {
        //             'Content-Type': 'application/json',
        //             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        //         },
        //         body: JSON.stringify({ urls })
        //     });
        //     let data = await response.json();
        //     // resDiv.textContent = JSON.stringify(data, null, 2);
        //     resDiv.innerHTML = `
        //         <div class="alert ${data.prediction === 'phishing' ? 'alert-danger' : 'alert-success'}">
        //             <strong>Prediction:</strong> ${data.prediction}<br>
        //             <strong>Confidence:</strong> ${(data.confidence * 100).toFixed(2)}%
        //         </div>
        //     `;
        // };
    </script>
</body>
</html>