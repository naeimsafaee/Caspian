<tr>
    <td class="" data-column="میزان">
        {{ $history->amount }}
    </td>
    <td class="ltr-direct"
        data-column="قیمت">
        {{ $history->network->persian_name }}
    </td>
    <td class="" data-column="خرید/فروش ">
        واریز
    </td>
    <td class="" data-column="نوع ارز ">
        {{ $history->coin->persian_name }}
    </td>
    <td class="" data-column="زمان  ">
        {{ $history->persian_date }}
    </td>
</tr>
