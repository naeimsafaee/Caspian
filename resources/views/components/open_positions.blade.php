<tr data-id="{{ $position->id }}">
    <td class="blue-text" data-column="لغو">
        لغو
    </td>
    <td class="" data-column="میزان">
        {{ round($position->amount , 6) }}
    </td>
    <td class="ltr-direct"
        data-column="قیمت">
        {{ round($position->price, 4) }}
        <span>{{ ($position->pair->vs_coin->symbol) }}</span>
    </td>
    <td class="" data-column="خرید/فروش ">
        @if($position instanceof \App\Models\Bid)
            خرید
        @else
            فروش
        @endif
    </td>
    <td class="" data-column="نوع ارز ">
        {{ ($position->pair->coin->symbol) . "/" . ($position->pair->vs_coin->symbol) }}
    </td>
    <td class="" >
        {{ ($position->profit_price ?? '-') . "/" . ($position->loss_price ?? '-') }}
    </td>
    <td class="" data-column="زمان  ">
        {{ $position->persian_date }}
    </td>
</tr>
