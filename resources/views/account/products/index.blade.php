@extends('account.layout')

@section('page_styles')
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@stop

@section('menu')
    @include('account.menu', ['a' => 2])
@stop

@section('private_content')
    <div class="card">
        <div class="card-header">Liste des produits</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="data" style="width: 100%">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Nom</th>
                        <th>Prix</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <a class="btn btn-primary" href="{{route('account.products.create')}}"><i class="fa fa-plus" aria-hidden="true"></i> Ajouter</a>
        </div>
    </div>
@endsection

@section('page_scripts')
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script type="text/javascript">
        if (jQuery().DataTable) {
            $.extend(true, $.fn.dataTable.defaults, {
                dom: '<"datatable-wrapper"<"filters"<"clearfix"<"float-right"f><"float-left"l>>>t<"footer"<"clearfix"<"float-right"i><"float-left"p>>>r>',
                buttons: [
                    {extend: "csv"},
                    {extend: "excel"},
                    {extend: "pdf"},
                    {
                        action: function (e, t, a, n) {
                            t.ajax.reload()
                        }
                    }
                ],
                language: {
                    aria: {
                        sortAscending: ": activer pour trier la colonne en croissant",
                        sortDescending: ": activer pour trier la colonne en descendant"
                    },
                    emptyTable: "Aucune donnée disponible",
                    info: "Affiche _START_ à _END_ sur _TOTAL_ entrées",
                    infoEmpty: "Aucune entrée trouvée",
                    infoFiltered: "(filtré à partir de _MAX_ entrées totales)",
                    lengthMenu: "_MENU_ enregistrements",
                    search: "Rechercher:",
                    processing: "<div class='loader-overlay'><div id='loader'><img src='{{asset('images/spinner.gif')}}'/><span>Chargement...</span></div></div>",
                    zeroRecords: "Aucun enregistrement correspondant trouvé"
                },
                processing: true,
                responsive: true,
                search: {
                    regex: true,
                },
                stateSave: true,
                lengthMenu: [[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"]],
                pageLength: 5
            });
        }
        $(function () {
            $('#data').DataTable({
                "serverSide": true,
                "ajax": "{!!route('account.products') !!}",
                "columns": [
                    {data: 'image', name: 'image'},
                    {data: 'name', name: 'name'},
                    {data: 'price', name: 'price'},
                    {data: 'published', name: 'published'},
                    {data: 'actions', name: 'actions'}
                ]
            });
        });
    </script>
@stop
