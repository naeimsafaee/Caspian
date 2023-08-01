<tr>
    <td class="blue-text" data-column="لغو">
        @if($position->status === 'filled')
            تکمیل شده
        @else
            لغو شده
        @endif
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
    <td class="" data-column="زمان  ">
        {{ $position->persian_date }}
    </td>
</tr>
