<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel exmaple code</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

    @vite(['resources/js/app.js', 'resources/css/app.css'])
    <!-- Styles -->
</head>
<body class="bg-slate-100">

    <x-general.navbar />

    <x-filter.filter-section :$action :$filter_type />

    <section class="w-[50rem] mx-auto space-y-5 mb-20" id="filter_content">

    </section>
</body>
</html>
