@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card-columns">
            @forelse ($products as $product)
                <div class="card product-item">
                    <a href="{{route('home.show', $product->id)}}">
                        <div class="product-item-image card-img-top"
                             style="background-image: url('{{asset_app($product->getImage())}}')">
                            <img src="{{asset_app($product->getImage())}}" alt="{{$product->name}}">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title product-item-name">{{$product->name}}</h5>
                            <h5 class="card-title product-item-price">{{format_price($product->price)}} FCFA</h5>
                            <p class="card-text product-item-desc">
                                {{$product->description}}
                            </p>
                        </div>
                    </a>
                </div>
            @empty
                <h1>Aucun produit pour le moment</h1>
            @endforelse
        </div>
        <div class="my-3">
            {!! $products->links('vendor.pagination.bootstrap-4') !!}
        </div>
    </div>
@endsection
