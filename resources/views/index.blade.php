@extends('layout.master')

@section('content')
<div class="rev-slider">
    <div class="fullwidthbanner-container">
        <div class="fullwidthbanner">
            <div class="bannercontainer">
                <div class="banner">
                    <ul>
                        <li data-transition="fade" data-slotamount="7" class="active-revslide">
                            <img src="{{ asset('source/image/product/logo1.jpg') }}" alt="logo1" style="width: 100%; height: auto;" />
                        </li>
                        <li data-transition="fade" data-slotamount="7">
                            <img src="{{ asset('source/image/product/logo2.jpg') }}" alt="logo2" style="width: 100%; height: auto;" />
                        </li>
                        <li data-transition="fade" data-slotamount="7">
                            <img src="{{ asset('source/image/product/logo3.jpg') }}" alt="logo3" style="width: 100%; height: auto;" />
                        </li>
                        <li data-transition="fade" data-slotamount="7">
                            <img src="{{ asset('source/image/product/logo4.jpg') }}" alt="logo4" style="width: 100%; height: auto;" />
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tp-bannertimer"></div>
        </div>
    </div>
</div>

<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="beta-products-list">
                        <h4>New Products</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">{{ isset($new_products) ? count($new_products) : 0 }} styles found</p>
                            <div class="clearfix"></div>
                        </div>

                        <div class="row">
                            @if(isset($new_products))
                                @foreach ($new_products as $product)
                                <div class="col-sm-3">
                                    <div class="single-item">
                                        @if($product->promotion_price > 0)
                                            <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                        @endif
                                        <div class="single-item-header">
                                            <a href="#"><img src="{{ asset($product->image) }}" alt=""></a>
                                        </div>
                                        <div class="single-item-body">
                                            <p class="single-item-title">{{ $product->name }}</p>
                                            <p class="single-item-price">
                                                @if($product->promotion_price > 0)
                                                    <span class="flash-del">{{ number_format($product->unit_price, 0, ',', '.') }}₫</span>
                                                    <span class="flash-sale">{{ number_format($product->promotion_price, 0, ',', '.') }}₫</span>
                                                @else
                                                    <span>{{ number_format($product->unit_price, 0, ',', '.') }}₫</span>
                                                @endif
                                            </p>
                                        </div>
                                        <div class="single-item-caption">
                                            <a class="add-to-cart pull-left" href="#"><i class="fa fa-shopping-cart"></i></a>
                                            <a class="beta-btn primary" href="#">Details <i class="fa fa-chevron-right"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                        </div>
                    </div> <!-- .beta-products-list -->

                    <div class="space50">&nbsp;</div>

                    <div class="beta-products-list">
                        <h4>Top Products</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">438 styles found</p>
                            <div class="clearfix"></div>
                        </div>

                        <div class="row">
                            @for ($i = 5; $i <= 8; $i++)
                            <div class="col-sm-3">
                                <div class="single-item">
                                    <div class="single-item-header">
                                        <a href="product.html"><img src="{{ asset('source/image/product/' . $i . '.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">Sample Woman Top</p>
                                        <p class="single-item-price"><span>$34.55</span></p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endfor
                        </div>

                        <div class="space40">&nbsp;</div>

                        <div class="row">
                            @for ($i = 9; $i <= 12; $i++)
                            <div class="col-sm-3">
                                <div class="single-item">
                                    <div class="single-item-header">
                                        <a href="product.html"><img src="{{ asset('source/image/product/' . ($i <= 10 ? $i : ($i - 8)) . '.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">Sample Woman Top</p>
                                        <p class="single-item-price"><span>$34.55</span></p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endfor
                        </div>
                    </div> <!-- .beta-products-list -->
                </div>
            </div>
        </div> <!-- .main-content -->
    </div> <!-- #content -->
</div> <!-- .container -->
<style>
    .single-item {
        border: 1px solid #ddd;
        padding: 10px;
        margin-bottom: 20px;
        background: #fff;
        transition: box-shadow 0.3s ease;
        border-radius: 8px;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .single-item:hover {
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
    }

    .single-item-header img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 5px;
    }

    .single-item-title {
        font-weight: bold;
        font-size: 16px;
        margin-top: 10px;
    }

    .single-item-price span {
        color: #d0021b;
        font-size: 18px;
        font-weight: 500;
    }

    .single-item-caption {
        margin-top: 10px;
    }

    .add-to-cart {
        margin-right: 10px;
    }

    .beta-btn.primary {
        background: #ffa500;
        color: white;
        padding: 5px 10px;
        border-radius: 5px;
        text-decoration: none;
        transition: background 0.3s ease;
    }

    .beta-btn.primary:hover {
        background: #e69500;
        color: white;
    }
</style>

<h4>Sản phẩm mới</h4>
<div class="row">
    @foreach ($new_products as $product)
    <div class="col-sm-3">
        <div class="single-item">
            <div class="single-item-header">
                <a href="#"><img src="{{ asset($product->image) }}" alt="{{ $product->name }}"></a>
            </div>
            <div class="single-item-body">
                <p class="single-item-title">{{ $product->name }}</p>
                <p class="single-item-price">
                    <span>{{ number_format($product->price, 0, ',', '.') }}₫</span>
                </p>
            </div>
            <div class="single-item-caption">
            <a class="add-to-cart pull-left" href="{{ route('product.show', $product->id) }}">

    Chi tiết <i class="fa fa-shopping-cart"></i>
</a>
<a href="{{ route('giohang') }}">Giỏ hàng</a>




                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection
