@extends('layouts.index')

@section('title')
DETAIL PRODUK
@endsection

@section('content')
<section class="py-5">
    <div class="row mb-5">
        <div class="col-lg-6">
            <!-- PRODUCT SLIDER-->
            <div class="row m-sm-0">
                <div class="col-sm-2 p-sm-0 order-2 order-sm-1 mt-2 mt-sm-0">
                    <div class="owl-thumbs d-flex flex-row flex-sm-column" data-slider-id="1">
                    <div class="owl-thumb-item flex-fill mb-2 mr-2 mr-sm-0"><img class="w-100" src="{{url('')}}/img/product-detail-1.jpg" alt="..."></div>
                    <div class="owl-thumb-item flex-fill mb-2 mr-2 mr-sm-0"><img class="w-100" src="{{url('')}}/img/product-detail-2.jpg" alt="..."></div>
                    <div class="owl-thumb-item flex-fill mb-2 mr-2 mr-sm-0"><img class="w-100" src="{{url('')}}/img/product-detail-3.jpg" alt="..."></div>
                    <div class="owl-thumb-item flex-fill mb-2"><img class="w-100" src="{{url('')}}/img/product-detail-4.jpg" alt="..."></div>
                    </div>
                </div>
                <div class="col-sm-10 order-1 order-sm-2">
                    <div class="owl-carousel product-slider" data-slider-id="1"><a class="d-block" href="{{url('')}}/img/product-detail-1.jpg" data-lightbox="product" title="Product item 1"><img class="img-fluid" src="{{url('')}}/img/product-detail-1.jpg" alt="..."></a><a class="d-block" href="{{url('')}}/img/product-detail-2.jpg" data-lightbox="product" title="Product item 2"><img class="img-fluid" src="{{url('')}}/img/product-detail-2.jpg" alt="..."></a><a class="d-block" href="{{url('')}}/img/product-detail-3.jpg" data-lightbox="product" title="Product item 3"><img class="img-fluid" src="{{url('')}}/img/product-detail-3.jpg" alt="..."></a><a class="d-block" href="{{url('')}}/img/product-detail-4.jpg" data-lightbox="product" title="Product item 4"><img class="img-fluid" src="{{url('')}}/img/product-detail-4.jpg" alt="..."></a></div>
                </div>
            </div>
        </div>
        <!-- PRODUCT DETAILS-->
        <div class="col-lg-6">
            <h1>{{ $product['name'] }}</h1>
            <p class="text-muted lead">
                {{ CurrencyHelper::format($product['price'], 'USD') }}
            </p>
            <ul class="list-inline mb-2">
                <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
            </ul>
            <div class="row align-items-stretch mb-4">
            <div class="col-sm-5 pr-sm-0">
                <div class="border d-flex align-items-center justify-content-between py-1 px-3 bg-white border-white"><span class="small text-uppercase text-gray mr-4 no-select">Quantity</span>
                <div class="quantity">
                    <button class="dec-btn p-0"><i class="fas fa-caret-left"></i></button>
                    <input class="form-control border-0 shadow-0 p-0" type="text" value="1">
                    <button class="inc-btn p-0"><i class="fas fa-caret-right"></i></button>
                </div>
                </div>
            </div>
            <div class="col-sm-3 pl-sm-0"><a class="btn btn-dark btn-sm btn-block h-100 d-flex align-items-center justify-content-center px-0" href="cart.html">Add to cart</a></div>
            </div>
            <ul class="list-unstyled small d-inline-block">
            <li class="px-3 py-2 mb-1 bg-white"><strong class="text-uppercase">SKU:</strong><span class="ml-2 text-muted">039</span></li>
            <li class="px-3 py-2 mb-1 bg-white text-muted"><strong class="text-uppercase text-dark">Category:</strong><a class="reset-anchor ml-2" href="#">Demo Products</a></li>
            <li class="px-3 py-2 mb-1 bg-white text-muted"><strong class="text-uppercase text-dark">Tags:</strong><a class="reset-anchor ml-2" href="#">Innovation</a></li>
            </ul>
        </div>
    </div>
        <!-- DETAILS TABS-->
        <ul class="nav nav-tabs border-0" id="myTab" role="tablist">
        <li class="nav-item"><a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a></li>
        </ul>
        <div class="tab-content mb-5" id="myTabContent">
        <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
            <div class="p-4 p-lg-5 bg-white">
            <h6 class="text-uppercase">Product description </h6>
            <p class="text-muted text-small mb-0">{{ $product['desc'] }}</p>
            </div>
        </div>
    </div>
</section>
@endsection