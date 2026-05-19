@extends('layout.users.app')
@section('title')
    Purchase Product
@endsection
@section('css')
    <style class="css">
        header{
            display:none;
        }
        
    </style>
@endsection
@section('main')
    <section class="w-full column g-10">
       <div class="pos-relative">
        <div onclick="Redirect('{{ url()->previous() }}')" style="background:var(--rgt-07);color:var(--rgb-10);top:10px;left:10px;backdrop-filter:blur(10px);-webkit-backdrop-filter:blur(10px);" class="h-40 pos-absolute w-40 circle column align-center justify-center">
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M10.8284 12.0007L15.7782 16.9504L14.364 18.3646L8 12.0007L14.364 5.63672L15.7782 7.05093L10.8284 12.0007Z"></path></svg>

        </div>
 <img src="{{ asset('photos/marketplace/'.$data->photo.'') }}" alt="" class="w-full">
       </div>
       
        <strong class="desc">{{ $data->name }}</strong>
        <div class="bg-green w-fit c-white p-x-10 no-select p-5 br-2">{{ $data->category }}</div>
        <span class="font-weight-600 c-green">Delivery arrives within 7 business days</span>
        <span class="row align-center g-2">
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M18.364 17.364L12 23.7279L5.63604 17.364C2.12132 13.8492 2.12132 8.15076 5.63604 4.63604C9.15076 1.12132 14.8492 1.12132 18.364 4.63604C21.8787 8.15076 21.8787 13.8492 18.364 17.364ZM12 13C13.1046 13 14 12.1046 14 11C14 9.89543 13.1046 9 12 9C10.8954 9 10 9.89543 10 11C10 12.1046 10.8954 13 12 13Z"></path></svg>

            {{ $data->address }}, {{ $data->location }} State
        </span>
        <strong class="desc">{{ $currency }}{{ number_format($data->price,2) }}</strong>
         <div style="background: rgb(218, 165, 32,0.2);border-left:4px solid goldenrod" class="w-full p-20 column g-5">
            <strong class="font-1">Important</strong>
            <span class="row g-5"><span>&bull;</span>Please ensure you are entering the rigt delivery address as the item would be delivered to the exact address entered</span>
            <span class="row g-5"><span>&bull;</span>Delivery fees are subject to the delivery address</span>
            <span class="row g-5"><span>&bull;</span>Kindly return back to the platform and mark the order as received upon receiving your delivery</span>
           <span class="row g-5"><span>&bull;</span>If you encounter any issues, kindly recah out to our support team.</span>
         </div>
        <form method="POST" action="{{ url('users/post/purchase/marketplace/product/process') }}" onsubmit="PostRequest(event,this,Purchased,'Purchasing...')" class="column w-full g-10">
           
            <input type="hidden" class="inp input" name="_token" value="{{ @csrf_token() }}">
           <input type="hidden" class="inp input" name="id" value="{{ $data->id }}">
            {{--new input  --}}
            <div class="column w-full g-5">
                <label>Select Delivery State</label>
               <div class="cont">
                 <select name="delivery_state" class="inp input required">
                    <option value="" selected disabled>Click to choose...</option>
                    @foreach (NigeriaStates() as $state)
                        <option value="{{ $state }}">{{ $state }}</option>
                    @endforeach
                </select>
               </div>
            </div>
           {{--new input  --}}
            <div class="column w-full g-5">
                <label>Enter Delivery Addres</label>
                <small class="opacity-07">This is the address in which the product would be delivered to</small>
                <div class="cont">
                    <textarea placeholder="Type your delivery address..." name="delivery_address" class="inp no-resize input required"></textarea>
                </div>
            </div>
           <button class="btn-primary br-0 clip-0 w-full">
                 <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M22.0049 10.9998V19.9998C22.0049 20.5521 21.5572 20.9998 21.0049 20.9998H3.00488C2.4526 20.9998 2.00488 20.5521 2.00488 19.9998V10.9998H22.0049ZM22.0049 6.99979H2.00488V3.99979C2.00488 3.4475 2.4526 2.99979 3.00488 2.99979H21.0049C21.5572 2.99979 22.0049 3.4475 22.0049 3.99979V6.99979Z"></path></svg>

            Click to make Payment
            </button>
        </form>
      
    </section>
@endsection
@section('js')
    <script class="js">
        function Purchased(response){
            let data=JSON.parse(response);
            if(data.status === 'success'){
                Redirect(data.receipt);
            }
        }
    </script>
@endsection