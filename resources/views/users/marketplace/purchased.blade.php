@extends('layout.users.app')
@section('title')
    Shopping History
@endsection
@section('css')
    <style class="css">
        .card > div:last-of-type{
            border-bottom:none !important;
        }
    </style>
@endsection
@section('main')
    <section class="w-full column g-10">
        <strong class="page-title">Shopping History</strong>
        <span class="opacity-07">Track and manage your orders and purchases.</span>
        @if ($purchased->isEmpty())
            @include('components.utilities',[
                'empty' => true,
                'text' => 'You haven\'t shopped an item yet'
            ])
        @else
        <section class="grid pc-grid-2 place-center w-full g-10">
  @foreach ($purchased as $data)
                <div style="border:1px solid var(--rgt-01)" class="w-full card column g-10 bg-light br-primary">
                    {{-- new row --}}
                    <div style="border-bottom:1px solid var(--rgt-01)" class="row align-center space-between p-20 w-full">
                                <div style="background:var(--primary-01);color:var(--primary)" class="no-select font-weight-900 p-5 p-x-10 br-1000">
                                    {{ $data->uniqid }}
                                </div>
                                <div class="row g-2 opacity-05 align-center">
                                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM13 12V7H11V14H17V12H13Z"></path></svg>

                                    <span>{{ $data->frame }}</span>
                                </div>
                    </div>
                    {{-- new column --}}
                    <div style="border-bottom:1px solid var(--rgt-01)" class="column p-20 g-5 w-full">
                        <div style="background:var(--primary-02)" class="h-70 w-70 br-primary align-center justify-center p-10">
                            <img src="{{ asset('photos/marketplace/'.$data->product->photo.'') }}" alt="" class="w-full h-full br-inherit">
                        </div>
                        {{-- new row --}}
                        <strong class="font-1">{{ $data->product->name }}</strong>
                       {{-- new row --}}
                        <div class="row align-center g-10">
                            <div class="row align-center g-2">
                                Quantity: 1
                            </div>
                            &bull;
                            <div class="row align-center g-2">
                                Total: <strong class="c-primary">{{ $currency.number_format($data->product->price,2) }}</strong>
                            </div>
                        </div>

                    </div>
                      {{-- new column --}}
                    <div style="border-bottom:1px solid var(--rgt-01)" class="column p-20 g-5 w-full">
                      <span class="c-primary">
                       <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M18.364 17.364L12 23.7279L5.63604 17.364C2.12132 13.8492 2.12132 8.15076 5.63604 4.63604C9.15076 1.12132 14.8492 1.12132 18.364 4.63604C21.8787 8.15076 21.8787 13.8492 18.364 17.364ZM12 15C14.2091 15 16 13.2091 16 11C16 8.79086 14.2091 7 12 7C9.79086 7 8 8.79086 8 11C8 13.2091 9.79086 15 12 15ZM12 13C10.8954 13 10 12.1046 10 11C10 9.89543 10.8954 9 12 9C13.1046 9 14 9.89543 14 11C14 12.1046 13.1046 13 12 13Z"></path></svg>

                      </span>
                        <span class="c-primary font-weight-600">DELIVERY ADDRESS</span>
                        <span>{{ $data->delivery_address }}</span>
                    </div>
                     {{-- new column --}}
                    <div style="border-bottom:1px solid var(--rgt-01)" class="row space-between p-20 g-5 w-full">
                        <div class="status {{ $data->status->seller == 'delivered' ? 'green' : 'gold' }} br-0">Seller: {{ $data->status->seller }}</div>

                        <div class="status {{ $data->status->buyer == 'received' ? 'green' : 'gold' }} br-0">Buyer: {{ $data->status->buyer }}</div>
                     
                    </div>
                    @if ($data->status->seller == 'delivered' && $data->status->buyer != 'received')
                         {{-- new column --}}
                    <div class="row space-between p-20 g-5 w-full">
                       <button onclick="PopulateModal('{{ $data->id }}')" class="btn-primary-3d">Mark as Received</button>
                    </div>
                    @endif

                </div>
            @endforeach
        </section>
          @if ($purchased->lastPage() > 1)
             @include('components.utilities',[
                'paginate' => true,
                'data' => $purchased
             ]) 
          @endif
        @endif
    </section>
    {{-- confirm modal --}}
    <section onclick="this.classList.remove('active')" class="modal">
        <div onclick="event.stopPropagation()" class="child align-center text-center">
            <div class="h-50 w-50 circle no-shrink bg-primary primary-text column align-center justify-center">
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22ZM17.4571 9.45711L11 15.9142L6.79289 11.7071L8.20711 10.2929L11 13.0858L16.0429 8.04289L17.4571 9.45711Z"></path></svg>

            </div>
            <strong class="desc font-weight-900">Confirm Delivery</strong>
            <span>Are you sure you have received this item, only take this action if you have received the item successfully</span>
           <form action="{{ url('users/post/confirm/delivery/process') }}" method="POST" onsubmit="PostRequest(event,this,Received)" class="w-full column g-10">
            {{-- csrf token --}}
            <input type="hidden" class="inp input" name="_token" value="{{ @csrf_token() }}">
            {{-- id --}}
            <input type="hidden" class="inp input" value="" name="id">
            <button class="post">Yes! i confirm</button>
           </form>
        </div>
    </section>
@endsection
@section('js')
    <script class="js">
      function Received(response){
        let data=JSON.parse(response);
        if(data.status === 'success'){
            Redirect('{{ url()->current()."?".http_build_query(request()->query()) }}')
        }
      }
      function PopulateModal(id){
        document.querySelector('.modal .child form input[name=id]').value=id;
        document.querySelector('.modal').classList.add('active');
      }  
    </script>
@endsection