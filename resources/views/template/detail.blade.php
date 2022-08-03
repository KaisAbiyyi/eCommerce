<div class="container mt-5">
    <form action="{{ route('pelanggan.postkeranjang', $produk->id) }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-12 col-sm-12 mb-4 col-md-6 col-lg-4">
                <div class="card rounded-5 border-0">
                    <img src="{{ asset($produk->image) }}" alt="" class="card-img rounded-5">
                </div>
            </div>
            <div class="col col-md-6 mb-4 col-lg-4">
                <div class="card border-0 bg-success text-white rounded-5 p-3">
                    <div class="card-body">
                        <h3 class="card-title text-center">{{ $produk->name }}</h3>
                        @if(auth()->user()->role == 'admin')
                        <h5>Kategori : {{ $produk->Kategori->name }}</h5>
                        @endif
                        <p class="card-text">Rp.{{ number_format($produk->price,0,',','.') }}</p>
                        @if(auth()->user()->role == 'customer')
                        <input type="number" name="amount" class="form-control rounded-4" placeholder="amount" required
                            id="" class="input-form">
                        @endif
                        <hr>
                        <h5>Keterangan : </h5>

                        <p>Ini merupakan ditel dari produk {{ $produk->name }} silahkan bila anda tertarik untuk membeli
                            produk ini.</p>
                    </div>
                </div>
            </div>
            @if(auth()->user()->role == 'customer')
            <div class="col">
                <div class="card bg-light border-0 rounded-5 p-1">
                    <div class="card-body">
                        <h5>Kategori : {{ $produk->Kategori->name }}</h5>
                        <button class="mt-3 w-100 btn btn-success rounded-4">Buy</button>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </form>
</div>
