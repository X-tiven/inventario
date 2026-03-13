<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:wght@300;500&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        .font-display { font-family: 'Fraunces', serif; }
        .font-body    { font-family: 'DM Sans', sans-serif; }
    </style>
</head>
<body class="font-body bg-stone-50 text-stone-900 min-h-screen">
    @yield('content')
</body>
</html>