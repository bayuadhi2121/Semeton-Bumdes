<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{ asset('vendor/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">
    <script src="{{ asset('vendor/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    @include('sweetalert::alert')
    <form action="{{route('pengelola.store')}}" method="POST">
        @csrf
        <input type="text" name="nama" placeholder="nama" required>
        <input type="text" name="kontak" placeholder="kontak" required>
        <input type="text" name="username" placeholder="username" required>
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
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal" onclick="edit_data('{{ route('pengelola.update', $p->id_person) }}', '{{ $p->nama }}', '{{ $p->status }}','{{ $p->kontak }}', '{{ $p->id }}','{{$p->username}}')">Edit</button>

        <button><a href="{{route('pengelola.destroy', $p->id_person)}}" class="btn btn-danger" data-confirm-delete="true">Delete</a></button>

        @endforeach
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Item</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Edit form goes here -->
                        <form action="" method="post" id="formedit" class="form-horizontal" role="form">
                            @method('PUT')
                            @csrf
                            <input type="text" name="nama" id="edit_nama" placeholder="nama" required>
                            <input type="hidden" name="id" id="edit_id" required>
                            <input type="text" name="kontak" id="edit_kontak" placeholder="kontak" required>
                            <input type="text" name="username" id="edit_username" placeholder="kontak"  required>
                            <select name="status" id="edit_status">
                                <option value="ketua">ketua</option>
                                <option value="sekertaris">sekertaris</option>
                            </select>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save changes</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        function edit_data(url, nama, status, kontak, id, username) {
            console.log(url);
            document.getElementById("formedit").action = url;
            document.getElementById("edit_id").value = id;
            document.getElementById("edit_nama").value = nama;
            document.getElementById("edit_kontak").value = kontak;
            document.getElementById("edit_username").value = username;
            document.getElementById("edit_status").value = status;
        }
    </script>
</body>

</html>