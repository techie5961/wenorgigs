@extends('layout.users.app')
@section('title')
    Recharge
@endsection
@section('main')
    <section class="w-full column g-10">
         <div style="border:none;border-top:5px solid var(--primary);box-shadow:0 0 10px rgba(0,0,0,0.1)" class="w-full p-20 br-0 bg-light column g-10">
            <div class="row w-full align-center space-between">
              {{-- new item --}}
                <div class="column g-5">
                    <span>Available Balance</span>
            <div class="w-full row align-center g-10 space-between">
                <strong class="desc c-primary">{{ $currency.number_format(Auth::guard('users')->user()->deposit_balance,2) }}</strong>
               </div>
                </div>
                {{-- icon --}}
                <span class="c-primary">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="30" width="30"><path d="M2.00488 8.99979H21.0049C21.5572 8.99979 22.0049 9.4475 22.0049 9.99979V19.9998C22.0049 20.5521 21.5572 20.9998 21.0049 20.9998H3.00488C2.4526 20.9998 2.00488 20.5521 2.00488 19.9998V8.99979ZM3.00488 2.99979H18.0049V6.99979H2.00488V3.99979C2.00488 3.4475 2.4526 2.99979 3.00488 2.99979ZM15.0049 13.9998V15.9998H18.0049V13.9998H15.0049Z"></path></svg>

                </span>
            </div>
        </div>
       {{-- bank details --}}
        <div style="border:1px solid var(--rgt-005);" class="w-full column g-10 p-20 br-primary bg-light">
            <strong class="page-title">Bank Details</strong>
           {{-- note --}}
            <div style="background: rgba(0,255, 0,0.1);color:#06965a" class="p-20 column br-10">
              
                <span>Send money into the account details below and fill the deposit form below to topup your account.Your balance would be updated under 1 to 5 Minutes.</span>
            </div>
            {{-- new --}}
            <div style="background:var(--rgt-005)" class="w-full space-between row  p-10 font-1 align-center g-10 br-5">
                <span class="ws-nowrap no-select">Account Number </span>
               <div class="row g-5 align-center">
                 <strong>{{ $bank->account_number }}</strong>
                <span onclick="copy({{ $bank->account_number }})">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M192,72V216a8,8,0,0,1-8,8H40a8,8,0,0,1-8-8V72a8,8,0,0,1,8-8H184A8,8,0,0,1,192,72Zm24-40H72a8,8,0,0,0,0,16H208V184a8,8,0,0,0,16,0V40A8,8,0,0,0,216,32Z"></path></svg>
                    
                </span>
               </div>
            </div>
            {{-- new --}}
            <div style="background:var(--rgt-005)" class="w-full space-between row  p-10 font-1 align-center g-10 br-5">
                <span class="ws-nowrap no-select">Bank Name </span>
               <div class="row g-5 align-center">
                 <strong>{{ $bank->bank_name }}</strong>
               </div>
            </div>
             {{-- new --}}
            <div style="background:var(--rgt-005)" class="w-full space-between row  p-10 font-1 align-center g-10 br-5">
                <span class="ws-nowrap no-select">Account Name </span>
               <div class="row g-5 align-center">
                 <strong>{{ $bank->account_name }}</strong>
               </div>
            </div>
           
        </div>
        {{-- form --}}
         <form action="{{ url('users/post/recharge/process') }}" onsubmit="PostRequest(event,this,Completed)" style="border:1px solid var(--rgt-005);" class="w-full column g-10 p-20 br-primary bg-light">
       <strong class="page-title">Deposit Form</strong>
           {{-- csrf token --}}
           <input type="hidden" name="_token" value="{{ @csrf_token() }}" class="inp input">
       {{-- new input --}}
        <div class="column g-5">
            <label class="column g-2">
                <label>Amount sent</label>
                <small class="opacity-05">Enter the exact amount sent</small>
            </label>
             <div class="cont">
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M3.00488 4.00293H21.0049C21.5572 4.00293 22.0049 4.45064 22.0049 5.00293V19.0029C22.0049 19.5552 21.5572 20.0029 21.0049 20.0029H3.00488C2.4526 20.0029 2.00488 19.5552 2.00488 19.0029V5.00293C2.00488 4.45064 2.4526 4.00293 3.00488 4.00293ZM6.50037 6H4.00037V8.5C5.38108 8.5 6.50037 7.38071 6.50037 6ZM17.5004 6C17.5004 7.38071 18.6197 8.5 20.0004 8.5V6H17.5004ZM4.00037 15.5V18H6.50037C6.50037 16.6193 5.38108 15.5 4.00037 15.5ZM17.5004 18H20.0004V15.5C18.6197 15.5 17.5004 16.6193 17.5004 18ZM12.0004 16C14.2095 16 16.0004 14.2091 16.0004 12C16.0004 9.79086 14.2095 8 12.0004 8C9.79123 8 8.00037 9.79086 8.00037 12C8.00037 14.2091 9.79123 16 12.0004 16Z"></path></svg>

            <input type="number" name="amount" placeholder="Enter amount" class="inp required input">
         </div>
        </div>
        {{-- new input --}}
         <div class="column g-5">
            <label class="column g-2">
                <label>Transfer Receipt</label>
                <small class="opacity-05">Screenshot of transfer made</small>
            </label>
             <div class="cont">
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M9 4L6 2L3 4V19C3 20.6569 4.34315 22 6 22H20C21.6569 22 23 20.6569 23 19V16H21V4L18 2L15 4L12 2L9 4ZM19 16H7V19C7 19.5523 6.55228 20 6 20C5.44772 20 5 19.5523 5 19V5.07037L6 4.4037L9 6.4037L12 4.4037L15 6.4037L18 4.4037L19 5.07037V16ZM20 20H8.82929C8.93985 19.6872 9 19.3506 9 19V18H21V19C21 19.5523 20.5523 20 20 20Z"></path></svg>

            <input type="file" accept="image/*" name="receipt" class="inp required input">
         </div>
        </div>
        <button class="post">
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M21.7267 2.95694L16.2734 22.0432C16.1225 22.5716 15.7979 22.5956 15.5563 22.1126L11 13L1.9229 9.36919C1.41322 9.16532 1.41953 8.86022 1.95695 8.68108L21.0432 2.31901C21.5716 2.14285 21.8747 2.43866 21.7267 2.95694ZM19.0353 5.09647L6.81221 9.17085L12.4488 11.4255L15.4895 17.5068L19.0353 5.09647Z"></path></svg>
            
            Submit Deposit</button>
        </form>
    </section>
@endsection
@section('js')
  <script class="js">
   
        function Completed(response){
            let data=JSON.parse(response);
            if(data.status == 'success'){
                Redirect(data.url)
            }
        }
    
    </script>  
@endsection