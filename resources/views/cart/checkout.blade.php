@extends('layouts.index')

@section('title')
CHECKOUT
@endsection

@section('content')
<!-- HERO SECTION-->
<section class="py-5 bg-light">
  <div class="container">
    <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
      <div class="col-lg-6">
        <h1 class="h2 text-uppercase mb-0">Checkout</h1>
      </div>
      <div class="col-lg-6 text-lg-right">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="cart.html">Cart</a></li>
            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</section>
<section class="py-5">
  <!-- BILLING ADDRESS-->
  <h2 class="h5 text-uppercase mb-4">Detail Pembayaran</h2>
  <div class="row">
    <div class="col-lg-8">
      <form action="{{ route('cart.order') }}" method="POST">
        <div class="row">
          {{ csrf_field() }}
          <div class="col-lg-12 form-group">
            <label class="text-small text-uppercase" for="firstName">Nama Lengkap</label>
            <input class="form-control form-control-lg" name="name" id="firstName" type="text">
          </div>
          <div class="col-lg-6 form-group">
            <label class="text-small text-uppercase" for="email">Email</label>
            <input class="form-control form-control-lg" name="email" id="email" type="email">
          </div>
          <div class="col-lg-6 form-group">
            <label class="text-small text-uppercase" for="phone">Nomor Telp</label>
            <input class="form-control form-control-lg" name="telp" id="phone" type="tel">
          </div>
          <div class="col-lg-6 form-group">
            <label class="text-small text-uppercase" for="state">Provinsi</label>
            <input class="form-control form-control-lg"  name="province" id="state" type="text">
          </div>
          <div class="col-lg-6 form-group">
            <label class="text-small text-uppercase" for="city">Kota</label>
            <input class="form-control form-control-lg" name="city" id="city" type="text">
          </div>
          <div class="col-lg-6 form-group">
            <label class="text-small text-uppercase" for="address">Alamat</label>
            <input class="form-control form-control-lg" name="address" id="address" type="text">
          </div>
          <div class="col-lg-6 form-group">
            <label class="text-small text-uppercase" for="kodepos">Kodepos</label>
            <input class="form-control form-control-lg" name="kodepos" id="kodepos" type="text">
          </div>
          <div class="col-lg-12 form-group">
            <button class="btn btn-dark btn-lg btn-block" type="submit">Buat Pesanan</button>
          </div>
        </div>
      </form>
    </div>
    <!-- ORDER SUMMARY-->
    <div class="col-lg-4">
      <div class="card border-0 rounded-0 p-lg-4 bg-light">
        <div class="card-body">
          <h5 class="text-uppercase mb-4">Your order</h5>
          <ul class="list-unstyled mb-0">
            @foreach($carts as $cart)
            <li class="d-flex align-items-center justify-content-between">
              <strong class="small font-weight-bold">{{ $cart->name }}</strong>
              <span class="text-muted small">{{ CurrencyHelper::toRupiah($cart->price) }}</span></li>
            <li class="border-bottom my-2"></li>
            @endforeach
            <li class="d-flex align-items-center justify-content-between"><strong class="text-uppercase small font-weight-bold">Total</strong><span>{{ CurrencyHelper::toRupiah($subtotal) }}</span></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection