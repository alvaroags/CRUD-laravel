<!DOCTYPE html>
<html lang="pt-br"data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" id="token">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Inclua o CSS do Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Inclua o jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- Inclua o Popper.js -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

        <!-- Inclua o JavaScript do Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('assets/js/javascript.js') }}"></script>
</head>
<body>
    <div class="container">
    <button id="theme-toggle" class="btn m-auto">Light Mode</button>
        @yield('content')
    </div>

    <script>
        const themeToggle = document.getElementById('theme-toggle');
        const htmlElement = document.querySelector('html');
        let currentTheme = htmlElement.getAttribute('data-bs-theme') || 'light';

        themeToggle.addEventListener('click', () => {
            currentTheme = currentTheme === 'light' ? 'dark' : 'light';
            htmlElement.setAttribute('data-bs-theme', currentTheme);
            if(currentTheme === 'dark') {
                themeToggle.textContent = 'Light Mode';
                // mudar a classe do botão
                themeToggle.classList.add('btn-dark');
                themeToggle.classList.remove('btn-light');
            } else {
                themeToggle.textContent = 'Dark Mode';
                // mudar a classe do botão
                themeToggle.classList.add('btn-light');
                themeToggle.classList.remove('btn-dark');
            }
        });
    </script>
</body>