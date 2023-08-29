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
    <form action="{{route('logout')}}" method="post">
        @csrf
        <button>logout</button>
    </form>
    <section>
        @foreach($pengelola as $p)
        <p>nama:{{$p->nama}}</p>
        <p>username:{{$p->username}}</p>
        <p>kontak:{{$p->kontak}}</p>
        <p>status:{{$p->status}}</p>
        <button>edit</button>
        <form action="{{route('pengelola.destroy', ['pengelola' => $p->id_person])}}" method="post" data-confirm-delete="true">
            @method('delete')
            @csrf
            <button data-confirm-delete="true">delete</button>
        </form>
        @endforeach
    </section>
    <script src="{{ asset('vendor/sweetalert2/sweetalert2.all.min.js') }}"></script>
</body>

</html>