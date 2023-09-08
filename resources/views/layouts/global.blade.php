<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @livewireStyles
    {{-- Page Title --}}
    <title>Semeton BUMDes</title>

    @yield('script_head')

    {{-- Flowbite --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />

    {{-- Tailwind CSS --}}
    <script src="https://cdn.tailwindcss.com"></script>


</head>

<body>

    @yield('global_content')

    @yield('script')

    {{-- Flowbite --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
    @livewireScripts
</body>

</html>