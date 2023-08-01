<ul class="z-index-1 card-table">
    <li class="card-table-items child-5 seba-number">{{ $account->account_number }}</li>

    @if($account->status === 'requested')
        <li class="card-table-items yellow-item child-3">در انتظار تایید</li>
    @elseif($account->status === 'accepted')
        <li class="card-table-items light-green-item child-3">تایید شده</li>
    @else
        <li class="card-table-items dark-red-item child-3"> رد شده</li>
    @endif

    <li class="card-table-items child-4">
        <a href="{{ route('delete_account' , $account->id) }}">
            <img src="{{asset('assets/icon/bin.svg')}}">
        </a>
    </li>
</ul>