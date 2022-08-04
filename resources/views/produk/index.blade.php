<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Admin | Produk | simpleTransaction</title>
</head>

<body>
    @include('template.nav')
    @if (auth()->user()->role == 'admin')
    <div class="container mt-5">
        @if(Session::has('status'))
        <div class="alert alert-secondary"><span>{{ Session::get('status') }}</span></div>
        @endif
        <a href="{{ route('admin.viewaddproduk') }}" class="btn btn-primary rounded-4">Add New</a>
        <table class="table table-responsive-sm mt-3">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produk as $item)
                <tr>
                    <td>
                        <a href="{{ route('produk.show', $item->id) }}"><embed src="{{ asset($item->image) }}"
                                width="150" height="150" type="" class="rounded-4"></a>
                    </td>
                    <td>{{ $item->name }}</td>
                    <td>Rp. {{ number_format($item->price,0,',','.') }}</td>
                    <td>
                        <a href="{{ route('admin.editproduk', $item->id) }}" class="btn btn-warning rounded-4">Edit</a>
                        <a href="{{ route('admin.deleteproduk', $item->id) }}"
                            onclick="return confirm('Apakah Yakin Mau di Hapus?')"
                            class="btn btn-danger rounded-4">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $produk->render() }}
    </div>
    @else
    <div class="container">
        <h1 class="text-center alert alert-danger mt-5">YOURE NOT AN ADMIN</h1>
    </div>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>
