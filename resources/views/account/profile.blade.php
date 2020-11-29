@extends('account.layout')

@section('menu')
    @include('account.menu', ['a' => 1])
@stop

@section('private_content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        <table class="table table-borderless">
                            <tr>
                                <th>Nom :</th>
                                <td>{{ auth()->user()->name }}</td>
                            </tr>
                            <tr>
                                <th>Email :</th>
                                <td>{{ auth()->user()->email }}</td>
                            </tr>
                            <tr>
                                <th>Date d'ajout :</th>
                                <td>{{ auth()->user()->created_at }}</td>
                            </tr>
                            <tr>
                                <th>Dernière modification :</th>
                                <td>{{ auth()->user()->updated_at }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
