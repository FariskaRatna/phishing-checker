
document.querySelectorAll('.accordion-button').forEach(button => {
    button.addEventListener('click', function () {
        const target = document.querySelector(this.dataset.bsTarget);
        const isShown = target.classList.contains('show');
        if (isShown) {
            target.classList.remove('show');
            this.classList.add('collapsed');
            this.setAttribute('aria-expanded', 'false');
        }
    });
});


const totalAman = 90;
const totalPhishing = 30;
const total = totalAman + totalPhishing;

const ctx = document.getElementById('overallChart').getContext('2d');
new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Terverifikasi Aman', 'Terdeteksi Phishing'],
        datasets: [{
            data: [totalAman, totalPhishing],
            backgroundColor: [' #FFC300 ', '#DAF7A6 '],
            borderWidth: 0
        }]
    },
    options: {
        cutout: '75%', // lubang tengah
        plugins: {
            legend: {
                display: false // hilangkan legend di bawah chart
            },
            tooltip: {
                enabled: true // hilangkan tooltip jika tidak dibutuhkan
            }
        }
    }
});

// Set center text secara dinamis jika diperlukan
document.getElementById('chartCenterText').innerText = `${total} URL`;


// Modal: saat list URL diklik
const urlModal = document.getElementById('urlModal');
urlModal.addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget;
    const url = button.getAttribute('data-url');
    const confidence = button.getAttribute('data-confidence');
    const status = button.getAttribute('data-status');

    // Tampilkan URL dan status
    document.getElementById('urlText').textContent = url;
    document.getElementById('urlStatus').textContent = `Status: ${status}`;

    // Hancurkan chart sebelumnya jika ada
    if (window.confChart) window.confChart.destroy();

    // Render chart baru
    const ctxModal = document.getElementById('confidenceChart').getContext('2d');
    window.confChart = new Chart(ctxModal, {
        type: 'doughnut',
        data: {
            labels: ['Tingkat Kepercayaan', 'Sisa'],
            datasets: [{
                data: [confidence, 100 - confidence],
                backgroundColor: ['#0d6efd', '#e9ecef']
            }]
        }
    });
});


function animateCountUp(id, target, duration) {
    let current = 0;
    const step = Math.ceil(target / (duration / 20));
    const el = document.getElementById(id);
    const timer = setInterval(() => {
        current += step;
        if (current >= target) {
            current = target;
            clearInterval(timer);
        }
        el.innerText = current.toLocaleString();
    }, 20);
}

document.addEventListener("DOMContentLoaded", () => {
    animateCountUp("countUp", 1400, 5000); // dari 0 ke 1400 dalam 2 detik
});


//Bagian Result Respons
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

    let quota = document.getElementById('quota').value;
    let url = document.getElementById('url').value;

    if (quota <= 0) {
        // Tampilkan modal popup quota habis
        const quotaModal = new bootstrap.Modal(document.getElementById('quotaModal'));
        quotaModal.show();
        return false; // ❌ Hentikan proses
    }


    console.log('Form submitted with URL:', url);

    // 👉 Tampilkan modal dengan pesan "Checking..." sebelum request
    document.getElementById('modalResultContent').innerHTML = `
        <div class="text-center">
            <div class="spinner-border text-primary" role="status"></div>
            <p class="mt-2">Checking...</p>
        </div>
    `;
    const resultModal = new bootstrap.Modal(document.getElementById('resultModal'));
    resultModal.show();

    try {
        let response = await fetch('/phishing/check', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ url })
        });

        console.log('Response status:', response.status, response.statusText);

        if (!response.ok) {
            let errorText = `Server error: ${response.status} ${response.statusText}`;
            try {
                const errorData = await response.json();
                console.log('Error response JSON:', errorData);
                if (errorData.error) {
                    errorText = errorData.error;
                }
            } catch (e) {
                console.warn('Error parsing JSON from error response:', e);
            }
            throw new Error(errorText);
        }

        let data = await response.json();
        console.log('Response JSON data:', data);

        let llmHtml = formatLlmAnalysis(data.llm_analysis);
        console.log('Formatted LLM Analysis HTML:', llmHtml);

        // 👉 Update isi modal dengan hasil
        let modalContent = `
            <div class="alert ${data.prediction === 'phishing' ? 'alert-danger' : 'alert-success'}">
                <strong>Prediction:</strong> ${data.prediction}<br>
                <strong>Confidence:</strong> ${(data.confidence * 100).toFixed(2)}%<br>
                <hr class="alert-hr">
                ${llmHtml}
            </div>
        `;

        document.getElementById('modalResultContent').innerHTML = modalContent;

    } catch (err) {
        console.error('Request failed:', err);
        document.getElementById('modalResultContent').innerHTML = `
            <div class="alert alert-danger"><strong>Error:</strong> ${err.message}</div>
        `;
    }
};


