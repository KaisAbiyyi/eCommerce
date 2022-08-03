<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Keranjang | simpleTransaction</title>
</head>

<body>
    @include('template.nav')
    <div class="container mt-5">
        <h2 class="text-white bg-success rounded-4 p-2 ps-4 mb-4">Keranjang</h2>
        @if(Session::has('status'))
        <div class="alert alert-secondary"><span>{{ Session::get('status') }}</span></div>
        @endif
        @foreach ($detailtransaksi as $item)
        <div class="card rounded-5 border-light border border-3 mb-4 bg-light">
            <div class="row">
                <div class="col-12 col-sm-4 col-md-4 col-lg-3">
                    <img src="{{ asset($item->produk->image) }}" alt="" class="card-img rounded-5 h-100" style="object-fit: cover">
                </div>
                <div class="col">
                    <div class="card-body">
                        <h3 class="card-title">{{ $item->produk->name }}</h3>
                        <hr>
                        <p class="card-text">Harga Rp. {{ number_format($item->produk->price, 0,',','.') }}</p>
                        <input type="number" name="" id="" value="{{ $item->qty }}" class="form-control rounded-4">
                        <hr>
                        <p class="card-text">Total Harga Rp. {{ number_format($item->totalprice,0,',','.') }}</p>
                        <a href="{{ route('pelanggan.bayar', $item->id) }}" class="btn btn-success w-100 rounded-4">Buy</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>
