@extends('account.layout')

@section('page_styles')
    <link rel="stylesheet" href="{{ asset('plugins/dropify/dist/css/dropify.min.css') }}">
@stop

@section('menu')
    @include('account.menu', ['a' => 2])
@stop

@section('private_content')
    <div class="card">
        <div class="card-header">Ajout d'un produit</div>
        {!! form_start($form) !!}
        <div class="card-body">
            {!! form_until($form, 'image') !!}
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a class="btn btn-primary" href="{{route('account.products')}}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Revenir à la liste</a>
            <button class="btn btn-success" type="submit"><i class="fa fa-save" aria-hidden="true"></i> Enregistrer</button>
        </div>
        {!! form_end($form) !!}
    </div>
@endsection


@section('page_scripts')
    <script src="{{asset('plugins/dropify/dist/js/dropify.min.js')}}"></script>
    <script type="text/javascript">
        $(function () {
            $('.dropify').dropify();
        });
    </script>
@endsection
