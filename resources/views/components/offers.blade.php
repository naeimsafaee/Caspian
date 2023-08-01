@if($offer->count() == 0)
    @php return; @endphp
@endif
<ul>
    <li class="order-list-item text-right" data-label="جمع(BTC)">{{ $offer->sum('amount') }}</li>
    <li class="order-list-item text-center" data-label="اندازه(BTC)">{{ $offer->first()->amount }}</li>

    <li class="red order-list-item text-left" data-label=" قیمت(USTD)">
        {{ $offer->first()->price }}
    </li>
    <li class="bg-line pink-item" data-progress="{{ $offer->first()->amount / $offer->sum('amount') * 100 }}" style="width: {{ $offer->first()->amount / $offer->sum('amount') * 100 }}%;"></li>
</ul>