<ul>
    <li class="order-list-item text-right" data-label="جمع(BTC)">
        {{ $big->amount }}
    </li>

    <li class="@if($big->is_bid) green @else red @endif order-list-item text-left"
        data-label=" قیمت(USTD)">
        {{ $big->price }}
    </li>
</ul>