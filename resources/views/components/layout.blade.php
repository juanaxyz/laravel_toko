<!DOCTYPE html>
<html>

<head>
    <title>{{ $title ?? 'Toko App' }}</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>

</head>

<body>

    <x-nav-bar />

    <main class="p-6">
        {{ $slot }}
    </main>

    <x-footer />
</body>

</html>
