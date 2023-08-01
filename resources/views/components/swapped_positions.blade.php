<tr>
    <td class="" data-column="میزان">
        {{ $swap->vs_coin_amount }}
            {{ $swap->vs_coin }}
    </td>
    <td class="ltr-direct"
        data-column="قیمت">
        {{ fa_number(number_format($swap->coin_amount)) }}
            {{ $swap->coin }}
    </td>
    <td class="" data-column="نوع ارز ">
        {{ $swap->coin }}/{{ $swap->vs_coin }}
    </td>
    <td class="" data-column="زمان  ">
        {{ $swap->persian_date }}
    </td>

</tr>
