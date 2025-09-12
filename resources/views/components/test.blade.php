<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
    <meta {{ $meta }}>
</head>
<body>
<div class="wrapper">
    <x-header class="rolo"/>
    <x-footer.info />
    <x-left-sidebar />
    <x-alert />
    <main>
        {{ $slot }}
    </main>
    <x-right-sidebar />
    <x-alert />
    <x-footer>Просо<x-slot:type>
            error
        </x-slot></x-footer>
</div>
</body>
</html>
