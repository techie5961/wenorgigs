@extends('layout.users.app')
@section('title')
    Transactions
@endsection
@section('css')
    <style class="css">
        
        .trx-icon{
            height:50px;
            width:50px;
            border-radius: 50%;
            background:var(--primary-01);
            display: flex;
            align-items:center;
            justify-content: center;
            color:var(--primary);

        }
        .trx-icon svg{
            height:20px;
            width:20px;
        }
    </style>
@endsection
@section('main')
    <section class="w-full column g-10">
      
        @if ($trx->isEmpty())
            @include('components.utilities',[
                'empty' => true,
                'text' => 'No Transactions found'
            ])
        @else
              <strong class="page-title">Transaction History</strong>
              <span class="opacity-07">View all your transactions on the platform</span>
             <div class="grid w-full g-10 pc-grid-2">
                 @foreach ($trx as $data)
                  <div onclick="Redirect('{{ url('users/transaction/receipt?id='.$data->id.'') }}')" style="border:1px solid var(--rgt-01)" class="w-full bg-light pc-pointer br-15 p-15 column g-10">
                 {{-- new row --}}
                 <div class="row w-full g-10">
                     <div class="trx-icon">
                    {!! $data->icon !!}
                  </div>
                  {{-- new column --}}
                  <div class="column g-5">
                    <span class="font-weight-600 font-1 opacity-07">{{ $data->title }}</span>
                    <span class="font-weight-100 row align-center g-5 opacity-07">
                        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="15" width="15"><path d="M17 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H7V1H9V3H15V1H17V3ZM4 9V19H20V9H4ZM6 13H11V17H6V13Z"></path></svg>

                        {{ $data->date_format }} at {{ $data->time_format }}
                    </span>
                    <div class="status {{ $data->status == 'success' ? 'green' : ($data->status == 'rejected' ? 'red' : 'gold') }}">{{ $data->status }}</div>
                  </div>
                 </div>
                 {{-- amount --}}
                 <strong class="font-1 {{ $data->class == 'credit' ? 'c-green' : 'c-red' }}">{{ $data->class == 'credit' ? '+' : '-' }}{{ $currency.number_format($data->amount,2) }}</strong>
                  </div>
              @endforeach
             </div>
              @if ($trx->lastPage() > 1)
                  @include('components.utilities',[
                    'paginate' => true,
                    'data' => $trx
                  ])
              @endif
        @endif
    </section>
@endsection