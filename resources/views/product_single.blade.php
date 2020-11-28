@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5">
                        <img class="w-100" src="{{asset_app($product->getImage())}}" alt="{{$product->name}}">
                    </div>
                    <div class="col-md-7">
                        <table class="table table-borderless">
                            <tr>
                                <th>Nom :</th>
                                <td>{{ $product->name }}</td>
                            </tr>
                            <tr>
                                <th>Prix :</th>
                                <td>{{ format_price($product->price) }} FCFA</td>
                            </tr>
                            <tr>
                                <th>Description :</th>
                                <td><p>{{ $product->description }}</p></td>
                            </tr>
                            <tr>
                                <th>Disponible depuis le :</th>
                                <td>{{ $product->published_at }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
