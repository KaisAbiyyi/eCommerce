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
    <div class="container mt-5">
        <form action="{{ route('admin.addproduk') }}" class="bg-success text-white col-lg-6 m-auto p-3 rounded-5" method="POST" enctype="multipart/form-data">
            @csrf
            <h3 class="text-center">Silahkan Isi Data Produk</h3>
            <hr>
            <div class="mb-3">
                <label for="" class="form-label">Product Name</label>
                <input type="text" class="form-control rounded-4" required name="name">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Price</label>
                <input type="number" class="form-control rounded-4" required name="price">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Image</label>
                <input type="file" accept="image/*" class="form-control rounded-4" required name="image">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Category</label>
                <select name="kategori_id" id="" class="form-control rounded-4">
                    @foreach ($kategori as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                <span>Your Category not on the list?</span>
                <a href="{{ route('admin.viewaddcategory') }}" class="text-white">Add New Category</a>
            </div>
            <button type="submit" class="btn btn-light w-100 rounded-4">Kirim</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>
