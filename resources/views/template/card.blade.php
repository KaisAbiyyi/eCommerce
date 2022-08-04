<style>
    .card{
        transition: 0.1s;
    }
    .card:hover {
        transform: scale(1.01);
    }
</style>

<div class="container bg-success p-4 rounded-5 mt-5">
    <h1 class="text-white text-center">Product List</h1>
    <div class="row mt-4">
        @foreach ($data as $d)
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="card border-0 rounded-5 h-100 p-3">
                <img src="{{ asset($d->image) }}" class="card-img rounded-4" style="object-fit: contain" height="200"
                    alt=" ">
                <div class="card-body">
                    <h5 class="card-title text-center">{{ $d->name }}</h5>
                    <p class="card-text p-1 rounded-4 bg-warning text-center fw-semibold">Harga Rp.{{ number_format($d->price,0,',','.') }}</p>
                </div>
                <a href="{{ route('produk.show', $d->id) }}" class="stretched-link"></a>
            </div>
        </div>
        @endforeach
    </div>
</div>
