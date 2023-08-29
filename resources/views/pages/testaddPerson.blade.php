<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{ asset('vendor/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">


</head>

<body>
    @include('sweetalert::alert')
    <form action="{{route('pengelola.store')}}" method="POST">
        @csrf
        <input type="text" name="nama">
        <input type="text" name="kontak">
        <input type="text" name="username">
        <select name="status" id="">
            <option value="ketua">ketua</option>
            <option value="sekertaris">sekertaris</option>
        </select>
        <button type="submit">submit</button>
    </form>

    <section>
        <p>nama:</p>
        <p>nama:</p>
        <p>nama:</p>
        <p>nama:</p>
        <button>edit</button>
        <button>delete</button>
    </section>
    <script src="{{ asset('vendor/sweetalert2/sweetalert2.all.min.js') }}"></script>
</body>

</html>