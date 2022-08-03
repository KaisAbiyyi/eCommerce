<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Admin | Category | simpleTransaction</title>
</head>

<body>
    @include('template.nav')

    <div class="container mt-5">
        @if(Session::has('status'))
        <div class="alert alert-secondary"><span>{{ Session::get('status') }}</span></div>
        @endif
        <a href="{{ route('admin.viewaddcategory') }}" class="btn btn-primary rounded-4 mb-4">Add New</a>
        @foreach ($kategori as $k)
        <div class="row justify-content-between align-items-center w-100 bg-light mb-3 p-2 rounded-4">
            <div class="col">
                <h5>{{ $k->name }}
            </div>
            </h5>
            <div class="col col-lg-2">
                <a href="{{ route('admin.editcategory', $k->id) }}" class="btn btn-warning rounded-4">EDIT</a>
                <a href="{{ route('admin.deletecategory', $k->id )}}" class="btn btn-danger rounded-4 ms-3">DELETE</a>
            </div>
        </div> @endforeach
        {{ $kategori->render() }}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>
