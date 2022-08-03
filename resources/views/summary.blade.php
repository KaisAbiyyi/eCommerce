<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Summary | simpleTransaction</title>
</head>

<body>
    @include('template.nav')
    <div class="container mt-5">
        <h2>Summary</h2>
        <hr>
        @foreach ($detailtransaksi as $item)
        <div class="card border-4 border border-light bg-light rounded-5">
            <div class="row">
                <div class="col-4 col-md-4 col-sm-4 col-lg-2">
                    <img src="{{ asset($item->produk->image) }}" alt="" class="card-img rounded-5 h-100" style="object-fit: cover">
                </div>
                <div class="col">
                    <div class="card-body">
                        <h3 class="card-title">{{ $item->produk->name }}</h3>
                        <h5 class="card-title">Invoice: {{ $item->transaksi->code }}</h5>
                        <hr>
                        <p class="card-text">Harga Rp. {{ number_format($item->produk->price,0,',','.') }}</p>
                        <p class="card-text">Amount : {{ $item->qty }}</p>
                        <hr>
                        <p class="card-text"><b>Totap Rp. {{ number_format($item->totalprice,0,',','.') }}</b></p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>
