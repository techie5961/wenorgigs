@extends('layout.users.app')
@section('title')
    Withdraw
@endsection

@section('main')
    <section class="w-full column g-10">
        
        <div style="border:1px solid var(--rgt-005)" class="w-full br-primary p-20 column bg-light g-10">
             <form action="{{ url('users/post/withdrawal/process') }}" method="POST" onsubmit="PostRequest(event,this,Withdrawn)" class="w-full column g-10">
                <div class="form-icon">
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M3.00488 2.99979H21.0049C21.5572 2.99979 22.0049 3.4475 22.0049 3.99979V19.9998C22.0049 20.5521 21.5572 20.9998 21.0049 20.9998H3.00488C2.4526 20.9998 2.00488 20.5521 2.00488 19.9998V3.99979C2.00488 3.4475 2.4526 2.99979 3.00488 2.99979ZM20.0049 10.9998H4.00488V18.9998H20.0049V10.9998ZM20.0049 8.99979V4.99979H4.00488V8.99979H20.0049ZM14.0049 14.9998H18.0049V16.9998H14.0049V14.9998Z"></path></svg>

        </div>

                <strong class="page-title">Withdraw Funds</strong>
            <span class="opacity-07 text-center">Withdraw your earnings directly into your bank account</span>
          
                {{-- csrf token --}}
              <input type="hidden" class="inp input" name="_token" value="{{ @csrf_token() }}">
                {{-- new input --}}
                <div class="column g-5 w-full">
                    <label>Select Wallet</label>
                    <div class="cont">
                        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M20.0049 6.99979V4.99979H4.00488V18.9998H20.0049V16.9998H12.0049C11.4526 16.9998 11.0049 16.5521 11.0049 15.9998V7.99979C11.0049 7.4475 11.4526 6.99979 12.0049 6.99979H20.0049ZM3.00488 2.99979H21.0049C21.5572 2.99979 22.0049 3.4475 22.0049 3.99979V19.9998C22.0049 20.5521 21.5572 20.9998 21.0049 20.9998H3.00488C2.4526 20.9998 2.00488 20.5521 2.00488 19.9998V3.99979C2.00488 3.4475 2.4526 2.99979 3.00488 2.99979ZM13.0049 8.99979V14.9998H20.0049V8.99979H13.0049ZM15.0049 10.9998H18.0049V12.9998H15.0049V10.9998Z"></path></svg>

                        <select onchange="PromptUser(this)" name="wallet" class="inp input required">
                            <option value="" selected disabled>Click to choose...</option>
                            @foreach ($wallets as $data)
                                  <option data-minimum="{{ $currency.number_format($finance_settings->withdrawal->{$data->key}->minimum) }}" data-maximum="{{ $currency.number_format($finance_settings->withdrawal->{$data->key}->maximum) }}" value="{{ $data->key }}">{{ $data->name }} - {{ $currency.number_format(Auth::guard('users')->user()->{$data->key},2) }}</option>
                            @endforeach
                            </select>                
                        </div>
                </div>

                 {{-- new input --}}
                <div class="column g-5 w-full">
                    <label>Withdrawal Amount</label>
                    <div class="cont">
                        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12.0004 16C14.2095 16 16.0004 14.2091 16.0004 12 16.0004 9.79086 14.2095 8 12.0004 8 9.79123 8 8.00037 9.79086 8.00037 12 8.00037 14.2091 9.79123 16 12.0004 16ZM21.0049 4.00293H3.00488C2.4526 4.00293 2.00488 4.45064 2.00488 5.00293V19.0029C2.00488 19.5552 2.4526 20.0029 3.00488 20.0029H21.0049C21.5572 20.0029 22.0049 19.5552 22.0049 19.0029V5.00293C22.0049 4.45064 21.5572 4.00293 21.0049 4.00293ZM4.00488 15.6463V8.35371C5.13065 8.017 6.01836 7.12892 6.35455 6.00293H17.6462C17.9833 7.13193 18.8748 8.02175 20.0049 8.3564V15.6436C18.8729 15.9788 17.9802 16.8711 17.6444 18.0029H6.3563C6.02144 16.8742 5.13261 15.9836 4.00488 15.6463Z"></path></svg>
                        
                        <input type="number" name="amount" placeholder="Enter withdrawal amount" class="inp input required">                
                        </div>
                </div>
         
                    <div style="background: var(--primary-02);" class="br-15 w-full column g-5 p-15">
                         <strong class="title">Withdrawal Info</strong>
                        <span class="minimum-prompt"></span> 
                         <span class="maximum-prompt"></span> 
                       <span> &bull; Withdrawal fee - {{ $finance_settings->withdrawal->fee }}%</span>
                       <span>&bull; You can only withdraw up to {{ number_format($finance_settings->withdrawal->count) }} times Daily</span>
                </div>
               
                {{-- bank details --}}
               <div style="background:var(--rgt-005);color:var(--rgt-10);border:1px solid var(--rgt-02)" class="w-full br-5 p-20 column g-10">
                 
                {{-- new row --}}
                <div class="row g-2">
                        <span>Account Number :</span><strong>{{ $bank->account_number }}</strong>
                    </div>
                    {{-- new row --}}
                      <div class="row g-2">
                        <span>Bank :</span><strong>{{ $bank->bank_name }}</strong>
                    </div>
                    {{-- new row --}}
                    <div class="row g-2">
                        <span>Account Name :</span><strong>{{ $bank->account_name }}</strong>
                    </div>
                    <div onclick="Redirect('{{ url('users/payout/settings') }}')" class="row p-5 align-center no-select c-primary justify-end g-5">
                        <span>
                            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M16.7574 2.99678L9.29145 10.4627L9.29886 14.7099L13.537 14.7024L21 7.23943V19.9968C21 20.5491 20.5523 20.9968 20 20.9968H4C3.44772 20.9968 3 20.5491 3 19.9968V3.99678C3 3.4445 3.44772 2.99678 4 2.99678H16.7574ZM20.4853 2.09729L21.8995 3.5115L12.7071 12.7039L11.2954 12.7064L11.2929 11.2897L20.4853 2.09729Z"></path></svg>

                        </span>
                        <span>Edit</span>
                    </div>
               </div>
             
                   <button class="post">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M3.00488 2.99979H21.0049C21.5572 2.99979 22.0049 3.4475 22.0049 3.99979V19.9998C22.0049 20.5521 21.5572 20.9998 21.0049 20.9998H3.00488C2.4526 20.9998 2.00488 20.5521 2.00488 19.9998V3.99979C2.00488 3.4475 2.4526 2.99979 3.00488 2.99979ZM20.0049 10.9998H4.00488V18.9998H20.0049V10.9998ZM20.0049 8.99979V4.99979H4.00488V8.99979H20.0049ZM14.0049 14.9998H18.0049V16.9998H14.0049V14.9998Z"></path></svg>
                    Place Withdrawal</button>
              
            </form>
        </div>
    </section>
@endsection

@section('js')
    <script class="js">
       
            function Withdrawn(response){
                    let data=JSON.parse(response);
                    if(data.status == 'success'){
                        Redirect(data.url);
                    }
            }
            function PromptUser(element){
                try{
                    let min=element.options[element.selectedIndex].dataset.minimum;
                    let max=element.options[element.selectedIndex].dataset.maximum;
                document.querySelector('.minimum-prompt').innerHTML=`&bull; Minimum withdrawal - ${min}`;
                 document.querySelector('.maximum-prompt').innerHTML=`&bull; Maximum withdrawal - ${max}`;
                }catch(error){
                    alert(error)
                }
            }
        
    </script>
@endsection