@if ($message = session()->get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <span>{!! $message !!}</span>
    </div>
@endif


@if ($message = session()->get('error'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <span>{!! $message !!}</span>
    </div>
@endif


@if ($message = session()->get('warning'))
    <div class="alert alert-warning alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <span>{!! $message !!}</span>
    </div>
@endif


@if ($message = session()->get('info'))
    <div class="alert alert-info alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <span>{!! $message !!}</span>
    </div>
@endif


{{--
@if ($errors->any())
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <span>Merci de vérifier les erreurs du formulaire ci-dessous</span>
    </div>
@endif--}}
