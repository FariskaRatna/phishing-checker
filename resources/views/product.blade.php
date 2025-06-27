<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Produk Deteksi Phishing</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 text-gray-900">
    <section class="max-w-6xl mx-auto py-16 px-4">
        <h1 class="text-4xl font-bold text-center mb-6">Produk Kami</h1>
        <p class="text-center mb-12 text-gray-600">Deteksi phishing, analisis konten, dan dashboard keamanan real-time.</p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition">
                <h2 class="text-xl font-semibold mb-3">🔍 Phishing Scanner</h2>
                <ul class="list-disc list-inside text-gray-700 space-y-1">
                    <li>Analisis URL phishing otomatis</li>
                    <li>Skor risiko dan blacklist check</li>
                    <li>Laporan singkat instan</li>
                </ul>
            </div>

            <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition">
                <h2 class="text-xl font-semibold mb-3">📧 Email Analyzer</h2>
                <ul class="list-disc list-inside text-gray-700 space-y-1">
                    <li>Analisis konten & header email</li>
                    <li>Model machine learning heuristic</li>
                    <li>Indikasi phishing berbasis AI</li>
                </ul>
            </div>

            <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition">
                <h2 class="text-xl font-semibold mb-3">📊 Threat Dashboard</h2>
                <ul class="list-disc list-inside text-gray-700 space-y-1">
                    <li>Statistik ancaman real-time</li>
                    <li>Integrasi blacklist & API</li>
                    <li>Notifikasi ancaman otomatis</li>
                </ul>
            </div>
        </div>
    </section>
</body>
</html>
