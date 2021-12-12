@extends('layouts.index')

@section('title')
LIST PRODUK
@endsection

@section('content')
    <!-- HERO SECTION-->
    <section class="py-5 bg-light">
        <div class="container">
          <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
            <div class="col-lg-6">
              <h1 class="h2 text-uppercase mb-0">Shop</h1>
            </div>
            <div class="col-lg-6 text-lg-right">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Shop</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>
      <section class="py-5">
        <div class="container p-0">
          <div class="row">
            <!-- SHOP SIDEBAR-->
            <div class="col-lg-3 order-2 order-lg-1">
              <h5 class="text-uppercase mb-4">Categories</h5>
              @foreach($categories as $cat)
              <div class="py-2 px-4 bg-dark text-white mb-3">
                <strong class="small text-uppercase font-weight-bold">{{ $cat->name }}</strong>
              </div>
              <ul class="list-unstyled small text-muted pl-lg-4 font-weight-normal">
                @foreach($cat->childs as $sub)
                <li class="mb-2"><a class="reset-anchor" href="#">{{ $sub->name }}</a></li>
                @endforeach
              </ul>
              @endforeach
            </div>
            <!-- SHOP LISTING-->
            <div class="col-lg-9 order-1 order-lg-2 mb-5 mb-lg-0">
              <div class="row mb-3 align-items-center">
                <div class="col-lg-6 mb-2 mb-lg-0">
                  <p class="text-small text-muted mb-0">Showing {{ $items->firstItem() }} - {{ $items->lastItem() }} of {{ $items->total() }} results</p>
                </div>
                <div class="col-lg-6">
                  <ul class="list-inline d-flex align-items-center justify-content-lg-end mb-0">
                    <li class="list-inline-item">
                      <select class="selectpicker ml-auto" name="sorting" data-width="200" data-style="bs-select-form-control" data-title="By Name A-Z" onchange="refreshUrl(this)">
                        <option value="name_az">By Name A-Z</option>
                        <option value="name_za">By Name Z-A</option>
                        <option value="price_low">By Price Low-High</option>
                        <option value="price_hight">By Price High-Low</option>
                      </select>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="row">
                @foreach($items as $item)
                <!-- PRODUCT-->
                <div class="col-lg-4 col-sm-6">
                  <div class="product text-center">
                    <div class="mb-3 position-relative">
                      <div class="badge text-white badge-"></div>
                        <a class="d-block" href="detail.html">
                          <img class="img-fluid w-100" style="height:300px;object-fit:cover" 
                          src="{{ $item->cover_url }}" alt="{{ $item->name }}">
                        </a>
                      <div class="product-overlay">
                        <ul class="mb-0 list-inline">
                           
                          <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="{{ route('cart.add', [$item->id, 1]) }}">Add to cart</a></li>
                           
                        </ul>
                      </div>
                    </div>
                    <h6> <a class="reset-anchor" href="detail.html">{{ $item->name }}</a></h6>
                    <p class="small text-muted">{{ CurrencyHelper::toRupiah($item->price) }}</p>
                  </div>
                </div>
                @endforeach
              </div>
              <!-- PAGINATION-->
              <nav aria-label="Page navigation example">
                {{ $items->links('pagination.default') }}
              </nav>


            </div>
          </div>
        </div>
      </section>
@endsection

@push('js')
<script>
    function refreshUrl(el) {
      var url = window.location.href;
      var url_parts = url.split('?');
      var base_url = url_parts[0];
      var query_string = url_parts[1];

      if (query_string == undefined) {
        window.location.href = base_url + '?sorting=' + el.value;
      } else {
        window.location.href = base_url +  '?' + query_string + '&sorting=' + el.value;
      }
    }
</script>
@endpush