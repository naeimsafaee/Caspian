<ul class="z-index-1 card-table">
    <li class="card-table-items child-1">{{ $card->bank->name }}</li>
    <li class="card-table-items grey-text child-2"
        style="direction: ltr;">{{ fa_number(wordwrap($card->card_number , 4 , '-' , true)) }}</li>

    @if($card->status === 'requested')
        <li class="card-table-items yellow-item child-3">در انتظار تایید</li>
    @elseif($card->status === 'accepted')
        <li class="card-table-items light-green-item child-3">تایید شده</li>
    @else
        <li class="card-table-items dark-red-item child-3"> رد شده</li>
    @endif

    <li class="card-table-items child-4">
        <a href="{{ route('delete_card' , $card->id) }}">
            <img src="{{asset('assets/icon/bin.svg')}}">
        </a>
    </li>
</ul>
