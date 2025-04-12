@extends('layout.master')

@section('content')
<div class="container">
    <h4>Kết quả tìm kiếm cho: <strong>{{ $keyword }}</strong></h4>
    
    @if($products->isEmpty())
        <p>Không tìm thấy sản phẩm nào.</p>
    @else
        <div class="row">
            @foreach($products as $product)
                <div class="col-sm-3">
                    <div class="card" style="margin-bottom: 20px;">
                        <img src="{{ asset('source/image/product/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ number_format($product->unit_price) }} VNĐ</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
