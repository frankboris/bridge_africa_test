<div class="list-group mb-4">
    <a href="{{route('account.profile')}}" class="list-group-item list-group-item-action @if(isset($a) && $a == 1) active @endif">
        Mon profile
    </a>
    <a href="{{route('account.products')}}" class="list-group-item list-group-item-action @if(isset($a) && $a == 2) active @endif">
        Mes produits
    </a>
</div>

