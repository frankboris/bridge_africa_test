@if (isset($show))
    <a href="{{$show}}" class="btn btn-primary" title="Detail">
        <i class="fa fa-eye"></i>
    </a>
@endif
@if (isset($edit))
    <a href="{{$edit}}" class="btn btn-success" title="Edit">
        <i class="fa fa-edit"></i>
    </a>
@endif
@if (isset($delete))
    <a href="{{$delete}}" class="btn btn-danger" title="Supprimer" onclick="return confirm('Etes vous sur de vouloir supprimer cet élément ?')">
        <i class="fa fa-trash"></i>
    </a>
@endif
@if (isset($destroy))
    <a href="{{$destroy}}" class="btn btn-danger" title="Supprimer" onclick="return confirm('Etes vous sur de vouloir supprimer cet élément ?')">
        <i class="fa fa-trash"></i>
    </a>
@endif
@if (isset($recovery))
    <a href="{{$recovery}}" class="btn btn-success" title="Recovery" onclick="return confirm('Etes vous sur de vouloir restaurer cet élément ?')">
        <i class="fa fa-arrow-up"></i>
    </a>
@endif
@if (isset($recoveryForm))
    {!! form($recoveryForm) !!}
@endif
@if (isset($deactivateForm))
    {!! form($deactivateForm) !!}
@endif
@if (isset($activateForm))
    {!! form($activateForm) !!}
@endif
@if (isset($deleteForm))
    {!! form($deleteForm) !!}
@endif
