@extends('layouts.app')

@section('page_styles')

@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @yield('menu')
            </div>
            <div class="col-md-9">
                @yield('private_content')
            </div>
        </div>
    </div>
@endsection

@section('page_scripts')

@endsection
