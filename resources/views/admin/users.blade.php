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
    @if(Session::has('status'))
    <div class="alert alert-secondary"><span>{{ Session::get('status') }}</span></div>
    @endif
    <div class="container mt-5">
        <a href="{{ route('admin.viewaddproduk') }}" class="btn btn-primary">Add New</a>
        <h3 class="bg-success p-2 ps-3 mt-4 rounded-4 text-white">Users List</h3>
        @foreach ($users as $user)
        <p class="bg-light p-2 ps-3 mt-3 rounded-4">{{ $user->name }}</p>
        @endforeach
        {{ $users->render() }}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>
