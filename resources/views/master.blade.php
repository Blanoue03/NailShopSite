<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Nails On Chic</title>
</head>
<body>
    <header>
        <h1>Nails On Chic</h1>
    </header>

    <main>
        @yield('body')
    </main>

    <footer>
        <h1>Nails On Chic</h1>
        <section>
            <p></p>
            <p></p>
        </section>
        <hr>
        <section>
            <h1>Stay in the loop</h1>

        </section>
    </footer>
</body>
</html>
