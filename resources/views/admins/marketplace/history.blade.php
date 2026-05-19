@extends('layout.admins.app')
@section('title')
    Shopping History
@endsection
@section('css')
    <style class="css">
        .card > div:last-of-type{
            border-bottom:none !important;
        }
        .filter{
            border:1px solid var(--rgt-07);
            padding:10px 20px;
            width:fit-content;
            display:flex;
            flex-direction:row;
            align-items:center;
            gap:5px;
            position:relative;
            background:var(--bg-light);
        }
        .filter .child{
            position:absolute;
            top:calc(100% + 5px);
            background:inherit;
            z-index:200;
            left:0;
            border:1px solid var(--rgt-07);
            display:none;
            flex-direction: column;


        }
        .filter .child > div{
            padding:10px 20px;
            white-space: nowrap;
            user-select:none;
            -webkit-user-select:none;
            border-bottom: 1px solid var(--rgt-07);
            cursor: pointer;
        }
        .filter .child > div:last-of-type{
            border-bottom: none;
        }
        .filter.active .child{
            display:flex;
        }
    </style>
@endsection
@section('main')
    <section class="w-full column g-10">
          {{-- analytic --}}
        <div style="border:1px solid var(--rgt-01)" class="analytic br-primary bg-light w-full p-20 row g-10">
            <div style="border:1px solid #4caf50;color:#4caf50;background:rgba(0,255,0,0.1)" class="h-50 br-5 no-shrink perfect-square column align-center justify-center g-10">
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M2.5 7C2.5 9.48528 4.51472 11.5 7 11.5C9.48528 11.5 11.5 9.48528 11.5 7C11.5 4.51472 9.48528 2.5 7 2.5C4.51472 2.5 2.5 4.51472 2.5 7ZM2.5 17C2.5 19.4853 4.51472 21.5 7 21.5C9.48528 21.5 11.5 19.4853 11.5 17C11.5 14.5147 9.48528 12.5 7 12.5C4.51472 12.5 2.5 14.5147 2.5 17ZM12.5 17C12.5 19.4853 14.5147 21.5 17 21.5C19.4853 21.5 21.5 19.4853 21.5 17C21.5 14.5147 19.4853 12.5 17 12.5C14.5147 12.5 12.5 14.5147 12.5 17ZM17.5252 11.155L17.8026 10.5186C18.297 9.38398 19.1876 8.48059 20.2988 7.98638L21.1534 7.60631C21.6155 7.4008 21.6155 6.7284 21.1534 6.52289L20.3467 6.16406C19.2068 5.65713 18.3002 4.72031 17.8143 3.54712L17.5295 2.85945C17.3309 2.38018 16.669 2.38018 16.4705 2.85945L16.1856 3.54712C15.6997 4.72031 14.7932 5.65713 13.6534 6.16406L12.8466 6.52289C12.3845 6.7284 12.3845 7.4008 12.8466 7.60631L13.7011 7.98638C14.8124 8.48059 15.7029 9.38398 16.1974 10.5186L16.4748 11.155C16.6778 11.6209 17.3222 11.6209 17.5252 11.155Z"></path></svg>

            </div>
            <div class="column g-5">
                <span>Total Orders</span>
                <strong class="desc">{{ number_format($total) }}</strong>
            </div>
        </div>
         {{-- analytic --}}
        <div style="border:1px solid var(--rgt-01)" class="analytic br-primary bg-light w-full p-20 row g-10">
            <div style="border:1px solid #4caf50;color:#4caf50;background:rgba(0,255,0,0.1)" class="h-50 br-5 no-shrink perfect-square column align-center justify-center g-10">
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M7 11.5C4.51472 11.5 2.5 9.48528 2.5 7C2.5 4.51472 4.51472 2.5 7 2.5C9.48528 2.5 11.5 4.51472 11.5 7C11.5 9.48528 9.48528 11.5 7 11.5ZM7 21.5C4.51472 21.5 2.5 19.4853 2.5 17C2.5 14.5147 4.51472 12.5 7 12.5C9.48528 12.5 11.5 14.5147 11.5 17C11.5 19.4853 9.48528 21.5 7 21.5ZM17 11.5C14.5147 11.5 12.5 9.48528 12.5 7C12.5 4.51472 14.5147 2.5 17 2.5C19.4853 2.5 21.5 4.51472 21.5 7C21.5 9.48528 19.4853 11.5 17 11.5ZM17 21.5C14.5147 21.5 12.5 19.4853 12.5 17C12.5 14.5147 14.5147 12.5 17 12.5C19.4853 12.5 21.5 14.5147 21.5 17C21.5 19.4853 19.4853 21.5 17 21.5ZM7 9.5C8.38071 9.5 9.5 8.38071 9.5 7C9.5 5.61929 8.38071 4.5 7 4.5C5.61929 4.5 4.5 5.61929 4.5 7C4.5 8.38071 5.61929 9.5 7 9.5ZM7 19.5C8.38071 19.5 9.5 18.3807 9.5 17C9.5 15.6193 8.38071 14.5 7 14.5C5.61929 14.5 4.5 15.6193 4.5 17C4.5 18.3807 5.61929 19.5 7 19.5ZM17 9.5C18.3807 9.5 19.5 8.38071 19.5 7C19.5 5.61929 18.3807 4.5 17 4.5C15.6193 4.5 14.5 5.61929 14.5 7C14.5 8.38071 15.6193 9.5 17 9.5ZM17 19.5C18.3807 19.5 19.5 18.3807 19.5 17C19.5 15.6193 18.3807 14.5 17 14.5C15.6193 14.5 14.5 15.6193 14.5 17C14.5 18.3807 15.6193 19.5 17 19.5Z"></path></svg>

            </div>
            <div class="column g-5">
                <span>Total Pending Delivery</span>
                <strong class="desc">{{ number_format($pending_delivery) }}</strong>
            </div>
        </div>
          {{-- analytic --}}
        <div style="border:1px solid var(--rgt-01)" class="analytic br-primary bg-light w-full p-20 row g-10">
            <div style="border:1px solid #4caf50;color:#4caf50;background:rgba(0,255,0,0.1)" class="h-50 br-5 no-shrink perfect-square column align-center justify-center g-10">
           <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M7 11.5C4.51472 11.5 2.5 9.48528 2.5 7C2.5 4.51472 4.51472 2.5 7 2.5C9.48528 2.5 11.5 4.51472 11.5 7C11.5 9.48528 9.48528 11.5 7 11.5ZM7 21.5C4.51472 21.5 2.5 19.4853 2.5 17C2.5 14.5147 4.51472 12.5 7 12.5C9.48528 12.5 11.5 14.5147 11.5 17C11.5 19.4853 9.48528 21.5 7 21.5ZM17 11.5C14.5147 11.5 12.5 9.48528 12.5 7C12.5 4.51472 14.5147 2.5 17 2.5C19.4853 2.5 21.5 4.51472 21.5 7C21.5 9.48528 19.4853 11.5 17 11.5ZM17 21.5C14.5147 21.5 12.5 19.4853 12.5 17C12.5 14.5147 14.5147 12.5 17 12.5C19.4853 12.5 21.5 14.5147 21.5 17C21.5 19.4853 19.4853 21.5 17 21.5Z"></path></svg>

            </div>
            <div class="column g-5">
                <span>Total Delivered</span>
                <strong class="desc">{{ number_format($delivered) }}</strong>
            </div>
        </div>
        {{-- filter --}}
        <div onclick="this.classList.toggle('active')" class="filter">
            <span>Filter</span>
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M10 18H14V16H10V18ZM3 6V8H21V6H3ZM6 13H18V11H6V13Z"></path></svg>
            <div onclick="event.stopPropagation()" class="child">
                <div onclick="window.location.href='{{ url('admins/marketplace/shopping/history') }}'" class="row g-5">All Orders</div>
                <div onclick="window.location.href='{{ url('admins/marketplace/shopping/history?seller_status=not_delivered') }}'" class="row g-5">Pending Delivery</div>
                <div onclick="window.location.href='{{ url('admins/marketplace/shopping/history?seller_status=delivered') }}'" class="row g-5">Delivered</div>
                <div onclick="window.location.href='{{ url('admins/marketplace/shopping/history?buyer_status=received') }}'" class="row g-5">Received</div>
                 <div onclick="window.location.href='{{ url('admins/marketplace/shopping/history?buyer_status=not_received') }}'" class="row g-5">Not Received</div>

            </div>
        </div>
        <strong class="desc font-weight-900">Shopping History</strong>
        <span class="opacity-07">Track and manage your orders and purchases.</span>
        @if ($history->isEmpty())
            @include('components.utilities',[
                'empty' => true,
                'text' => 'You haven\'t shopped an item yet'
            ])
        @else
        <section class="grid pc-grid-2 place-center w-full g-10">
  @foreach ($history as $data)
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
                    @if ($data->status->seller != 'delivered')
                         {{-- new column --}}
                    <div class="row space-between p-20 g-5 w-full">
                       <button onclick="PopulateModal('{{ $data->id }}')" class="btn-primary-3d">Mark as Delivered</button>
                    </div>
                    @endif

                </div>
            @endforeach
        </section>
          @if ($history->lastPage() > 1)
             @include('components.utilities',[
                'paginate' => true,
                'data' => $history
             ]) 
          @endif
        @endif
    </section>
    {{-- confirm modal --}}
    <section onclick="this.classList.remove('active')" class="modal">
        <div onclick="event.stopPropagation()" class="child align-center text-center">
            <div class="h-50 w-50 circle no-shrink bg-primary primary-text column align-center justify-center">
             <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M16 1C16.5523 1 17 1.44772 17 2V3H22V9H19.981L22.7271 16.5448C22.9033 16.9958 23 17.4866 23 18C23 20.2091 21.2091 22 19 22C17.1362 22 15.5701 20.7252 15.126 19H10.874C10.4299 20.7252 8.86384 22 7 22C5.05551 22 3.43508 20.6125 3.07474 18.7736C2.43596 18.4396 2 17.7707 2 17V7C2 6.44772 2.44772 6 3 6H10C10.5523 6 11 6.44772 11 7V12C11 12.5523 11.4477 13 12 13H14C14.5523 13 15 12.5523 15 12V3H12V1H16ZM19 16C17.8954 16 17 16.8954 17 18C17 19.1046 17.8954 20 19 20C20.1046 20 21 19.1046 21 18C21 17.7597 20.9576 17.5292 20.8799 17.3158L20.8635 17.2724C20.5725 16.5276 19.8479 16 19 16ZM7 16C5.89543 16 5 16.8954 5 18C5 19.1046 5.89543 20 7 20C8.10457 20 9 19.1046 9 18C9 16.8954 8.10457 16 7 16ZM9 8H4V10H9V8ZM20 5H17V7H20V5Z"></path></svg>

            </div>
            <strong class="desc font-weight-900">Confirm Delivery</strong>
            <span>Are you sure you have delivered this item, only take this action if you have delivered the item successfully</span>
           <form action="{{ url('admins/post/confirm/delivery/process') }}" method="POST" onsubmit="PostRequest(event,this,Delivered)" class="w-full column g-10">
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
      function Delivered(response){
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