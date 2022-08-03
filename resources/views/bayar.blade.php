<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Buy | simpleTransaction</title>
</head>

<body>
    @include('template.nav')
    <form action="{{ route('pelanggan.prosesbayar', $detailtransaksi->id) }}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="container mt-5">
            <h2>Upload Bukti Pembayaran</h2>
            <hr>
            <div class="row">
                <div class="col-12 mb-4 col-sm-12 col-md-6 col-lg-4">
                    <div class="card rounded-5 border-0">
                        <img src="{{ asset($produk->image) }}" alt="" class="card-img rounded-5">
                    </div>
                </div>
                <div class="col">
                    <div class="card rounded-5 p-3 bg-success border-0 text-white">
                        <div class="card-body">
                            <h3 class="card-title">{{ $produk->name }}</h3>
                            <hr>
                            <p class="card-text">Harga: Rp. {{ number_format($produk->price,0,',','.') }}</p>
                            <p class="card-text">Total Harga: Rp. {{ number_format($detailtransaksi->totalprice,0,',','.') }}</p>
                            <p class="card-text">Amount: {{ $detailtransaksi->qty }}</p>
                            <hr>
                            <div class="form-group">
                                <label for=""><b>Bukti Pembayaran</b></label>
                                <input type="file" name="bukti_transaksi" class="form-control rounded-4" accept="image/*" required id="">
                            </div>
                            <hr>
                            <h5>Keterangan :</h5>
                            <p>Silahkan Upload Bukti Pembayaran Dan Tunggu Konfirmasi Dari Kami</p>
                            <button class="btn btn-light w-100 rounded-4">Upload</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>
