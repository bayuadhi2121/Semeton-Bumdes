<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semeton BUMDes</title>

    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.5.1/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="flex justify-center items-center h-screen">
        @component('components.Card', ['image' => 'https://img.freepik.com/free-photo/business-concept-with-calculator-close-up_23-2149151160.jpg?w=1800&t=st=1692978782~exp=1692979382~hmac=ad3117bf543b78d4258e1b4a66e546401b118fe968fff1013c772bc6fb921b06', 'alt' => 'Shoes'])
            @slot('slot')
                @include('molecules.LoginForm', ['title' => 'Selamat Datang!', 'buttonText' => 'Masuk'])
            @endslot
        @endcomponent
    </div>
</body>
</html>

