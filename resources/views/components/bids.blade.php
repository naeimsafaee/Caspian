@if($bid->count() == 0)
    @php return; @endphp
@endif
<ul>
    <li class="order-list-item text-right" data-label="جمع(BTC)">{{ $bid->sum('amount') }}</li>
    <li class="order-list-item text-center" data-label="اندازه(BTC)">{{ $bid->first()->amount }}</li>

    <li class="green order-list-item text-left" data-label=" قیمت(USTD)">
        {{ $bid->first()->price }}
    </li>
    <li class="bg-line green-item" data-progress="{{ $bid->first()->amount / $bid->sum('amount') * 100 }}"
        style="width: {{ $bid->first()->amount / $bid->sum('amount') * 100 }}%;"></li>
</ul>
