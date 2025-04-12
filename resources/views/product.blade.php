@extends('layout.master')

@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">{{ $product->name }}</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{ route('index') }}">Home</a> / <span>{{ $product->name }}</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
        <div class="row">
            <div class="col-sm-9">

                <div class="row">
                    <div class="col-sm-4">
                        <img src="{{ asset($product->image) }}"alt="{{ $product->name }}">
                    </div>
                    <div class="col-sm-8">
                        <div class="single-item-body">
                            <p class="single-item-title">{{ $product->name }}</p>
                            <p class="single-item-price">
                                @if($product->promotion_price > 0)
                                    <span class="flash-del">${{ number_format($product->unit_price, 2) }}</span>
                                    <span class="flash-sale">${{ number_format($product->promotion_price, 2) }}</span>
                                @else
                                    <span>${{ number_format($product->unit_price, 2) }}</span>
                                @endif
                            </p>
                        </div>

                        <div class="clearfix"></div>
                        <div class="space20">&nbsp;</div>

                        <div class="single-item-desc">
                            <p>{{ $product->description }}</p>
                        </div>
                        <div class="space20">&nbsp;</div>

                        <p>Options:</p>
                        <div class="single-item-options">
                            <select class="wc-select" name="size">
                                <option>Size</option>
                                <option value="XS">XS</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                            </select>
                            <select class="wc-select" name="color">
                                <option>Color</option>
                                <option value="Red">Red</option>
                                <option value="Green">Green</option>
                                <option value="Yellow">Yellow</option>
                                <option value="Black">Black</option>
                                <option value="White">White</option>
                            </select>
                            <select class="wc-select" name="qty">
                                <option>Qty</option>
                                @for($i = 1; $i <= 5; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                <div class="space40">&nbsp;</div>
                <div class="woocommerce-tabs">
                    <ul class="tabs">
                        <li><a href="#tab-description">Description</a></li>
                        <li><a href="#tab-reviews">Reviews (0)</a></li>
                    </ul>

                    <div class="panel" id="tab-description">
                        <p>{{ $product->description }}</p>
                    </div>
                    <div class="panel" id="tab-reviews">
                        <p>No Reviews</p>
                    </div>
                </div>

                <div class="space50">&nbsp;</div>
                <div class="beta-products-list">
                    <h4>Related Products</h4>
                    <div class="row">
                        @foreach($related_products as $item)
                        <div class="col-sm-4">
                            <div class="single-item">
                                @if($item->promotion_price > 0)
                                <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                @endif
                                <div class="single-item-header">
                                    <a href="{{ route('product.show', $item->id) }}">
                                        <img src="{{ asset($product->image) }}"alt="{{ $product->name }}">
                                    </a>
                                </div>
                                <div class="single-item-body">
                                    <p class="single-item-title">{{ $item->name }}</p>
                                    <p class="single-item-price">
                                        @if($item->promotion_price > 0)
                                            <span class="flash-del">${{ number_format($item->unit_price, 2) }}</span>
                                            <span class="flash-sale">${{ number_format($item->promotion_price, 2) }}</span>
                                        @else
                                            <span>${{ number_format($item->unit_price, 2) }}</span>
                                        @endif
                                    </p>
                                </div>
                                <div class="single-item-caption">
                                    <a class="beta-btn primary" href="{{ route('product.show', $item->id) }}">
                                        Details <i class="fa fa-chevron-right"></i>
                                    </a>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div> <!-- .beta-products-list -->
            </div>

            <div class="col-sm-3 aside">
                <!-- Sidebar widgets here -->
            </div>
        </div>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection
