@extends('account.layout')

@section('menu')
    @include('account.menu', ['a' => 2])
@stop

@section('private_content')
    <div class="card">
        <div class="card-header">Détails du produit: <strong>{{$product->name}}</strong></div>
        <div class="card-body">
            <img style="max-height: 200px;max-width: 100%" src="{{asset_app($product->getImage())}}" alt="{{$product->name}}">
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
                    <th>Date d'ajout :</th>
                    <td>{{ $product->created_at }}</td>
                </tr>
                <tr>
                    <th>Date de publication :</th>
                    <td>{{ $product->published_at }}</td>
                </tr>
                <tr>
                    <th>Dernière modification :</th>
                    <td>{{ $product->updated_at }}</td>
                </tr>
            </table>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a class="btn btn-primary" href="{{route('account.products')}}"><i class="fa fa-arrow-left"
                                                                               aria-hidden="true"></i> Revenir à la
                liste</a>
            <div>
                <a class="btn btn-success" href="{{route('account.products.edit', $product->id)}}"><i class="fa fa-edit"
                                                                                                      aria-hidden="true"></i>
                    Modifier</a>
            </div>
        </div>
    </div>
@endsection
