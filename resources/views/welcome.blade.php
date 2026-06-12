<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>LojaFacil - Carregando</title>

        @fonts

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/welcome.css', 'resources/js/app.js'])
        @else
            <style>

            </style>
        @endif
    </head>
    <body>
        <div class="splash-container">
            <div class="logo">
                <h1>LojaFacil</h1>
            </div>
            
            <div class="loading-bar-container">
                <div class="loading-bar"></div>
            </div>
            
            <div class="loading-text">
                Carregando sistema
                <div class="dots">
                    <span>.</span>
                    <span>.</span>
                    <span>.</span>
                </div>
            </div>
            
            <div class="loading-percentage">
                <span id="percentage">0</span>%
            </div>
        </div>

        <script>
            // Simula o progresso de carregamento
            let percentage = 0;
            const percentageElement = document.getElementById('percentage');
            
            const interval = setInterval(() => {
                if (percentage < 100) {
                    percentage += Math.floor(Math.random() * 5) + 1;
                    if (percentage > 100) percentage = 100;
                    percentageElement.textContent = percentage;
                } else {
                    clearInterval(interval);
                    // Redirecionar para o dashboard após o carregamento (opcional)
                    setTimeout(() => {
                        window.location.href = '/dashboard';
                        //console.log('Sistema carregado com sucesso!');
                    }, 500);
                }
            }, 80);
        </script>
    </body>
</html>