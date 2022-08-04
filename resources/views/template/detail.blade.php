<div class="container mt-5">
    <form action="{{ route('pelanggan.postkeranjang', $produk->id) }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-12 col-sm-12 mb-4 col-md-6 col-lg-4">
                <div class="card rounded-5 border-0">
                    <h3 class="card-title ps-3 p-2 rounded-4 bg-warning mb-4 text-black">{{ $produk->name }}</h3>
                    <img src="{{ asset($produk->image) }}" alt="" class="card-img rounded-5 ">
                </div>
            </div>
            @if (auth()->user()==false)
            <div class="col col-md-6 mb-4 col-lg-4">
                <div class="card border-0 bg-success text-white rounded-5 p-3">
                    <div class="card-body">
                        {{-- @if(auth()->user()-0>role == 'admin') --}}
                        <h5 class="ps-2">Kategori : {{ $produk->Kategori->name }}</h5>
                        {{-- @endif --}}
                        <p class="card-text p-1 ps-2 rounded-4 bg-warning text-black fw-semibold">Rp.{{
                            number_format($produk->price,0,',','.') }}</p>
                        {{-- @if(auth()->user()->role == 'customer') --}}
                        <input type="number" name="amount" class="form-control mb-3 rounded-4" placeholder="amount"
                            required id="" class="input-form">
                        {{-- @endif --}}
                        <div class="p-1 bg-light pt-3 rounded-4 text-black">
                            <h5 class="ps-1">Keterangan : </h5>
                            <p class="ps-1">Ini merupakan ditel dari produk {{ $produk->name }} silahkan bila anda
                                tertarik untuk membeli
                                produk ini.</p>
                        </div>

                    </div>
                </div>
            </div>
            @endif

            @if(auth()->user() == true)
            <div class="col col-md-6 mb-4 col-lg-4">
                <div class="card border-0 bg-success text-white rounded-5 p-3">
                    <div class="card-body">
                        @if(auth()->user()->role == 'admin')
                        <h5 class="ps-2">Kategori : {{ $produk->Kategori->name }}</h5>
                        @endif
                        <p class="card-text p-1 ps-2 rounded-4 bg-warning text-black fw-semibold">Rp.{{
                            number_format($produk->price,0,',','.') }}</p>
                        @if(auth()->user()->role == 'customer')
                        <input type="number" name="amount" class="form-control mb-3 rounded-4" placeholder="amount"
                            required id="" class="input-form">
                        @endif
                        <div class="p-1 bg-light pt-3 rounded-4 text-black">
                            <h5 class="ps-1">Keterangan : </h5>
                            <p class="ps-1">Ini merupakan ditel dari produk {{ $produk->name }} silahkan bila anda
                                tertarik untuk membeli
                                produk ini.</p>
                        </div>

                    </div>
                </div>
            </div>
            @endif

            {{-- @if(auth()->user()->role == 'customer') --}}
            @if(auth()->user() ==true)
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
            @else
            <div class="col">
                <div class="card bg-light border-0 rounded-5 p-1">
                    <div class="card-body">
                        <h5>Kategori : {{ $produk->Kategori->name }}</h5>
                        <button class="btn btn-success w-100 rounded-4 mt-3" disabled="disabled">You Must Login First To
                            Buy This</button>
                    </div>
                </div>
            </div>
            @endif

            {{-- @endif --}}
        </div>
    </form>
</div>
