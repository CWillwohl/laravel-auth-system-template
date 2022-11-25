<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Caio Willwohl">
    <title>{{ $title ?? __('layout.title') }}</title>
    @vite('resources/css/app.css')
</head>
<body class="w-full min-h-full bg-gradient-to-b text-gray-600 from-green-200 to-green-400"{{ $attributes }}>
    <main>
        {{ $slot }}
    </main>
</body>
</html>
