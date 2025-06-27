
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
// document.getElementById('singleForm').onsubmit = async function (e) {
//     e.preventDefault();


//     dispatchEvent;
//     let url = document.getElementById('url').value;
//     let resDiv = document.getElementById('singleResult');
//     console.log('Sudaah masuk : ' + url);
//     resDiv.textContent = 'Checking...';


//     try {
//         let response = await fetch('/phishing/check', {
//             method: 'POST',
//             headers: {
//                 'Content-Type': 'application/json',
//                 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
//             },
//             body: JSON.stringify({ url })
//         });

//         if (!response.ok) throw new Error('Server error');
//         console.log('${err.message}');

//         let data = await response.json();

//         resDiv.innerHTML = `
//                     <div class="alert ${data.prediction === 'phishing' ? 'alert-danger' : 'alert-success'}">
//                         <strong>Prediction:</strong> ${data.prediction}<br>
//                         <strong>Confidence:</strong> ${(data.confidence * 100).toFixed(2)}%<br>
//                         <strong>LLM Insight:</strong><br><pre>${data.llm_analysis}</pre>
//                     </div>
//                 `;
//     } catch (err) {
//         resDiv.innerHTML = `<div class="alert alert-warning">Error: ${err.message}</div>`;
//     }
// };


