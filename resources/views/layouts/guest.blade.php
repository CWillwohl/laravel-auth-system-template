<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Caio Willwohl">
    <title>{{ $title ?? __('layout.title') }}</title>
</head>
<body {{ $attributes }}>
    <main>
        {{ $slot }}
    </main>
</body>
</html>