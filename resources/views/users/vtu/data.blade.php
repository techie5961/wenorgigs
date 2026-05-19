@extends('layout.users.app')
@section('title')
    VTU Hub
@endsection
@section('css')
    <style class="css">
        .network{
            border:1px solid var(--rgt-01);
            border-radius:10px;
            user-select:none;
            width:100%;
            box-shadow: 0 0 10px var(--rgt-01);
            transition:all 0.5s ease;
        }
        .network img{
            pointer-events: none;

        }
        .network.active{
            border:1px solid var(--primary);
            background:var(--primary-01)
        }
    </style>
@endsection
@section('main')
    <section class="w-full column g-10">
        <strong class="page-title">Data VTU HUB</strong>
        <span>Purchase cheap data easily</span>
        <form onsubmit="PostRequest(event,this,Completed)" method="POST" action="{{ url('users/post/data/topup/process') }}" style="border:1px solid var(--rgt-005)" class="w-full column bg-light br-primary p-20 g-10">
          {{-- csrf token --}}
          <input type="hidden" class="inp input" name="_token" value="{{ @csrf_token() }}">
            <span class="font-weight-600 c-primary">Data for all Networks</span>
           <strong class="font-1 font-weight-900">Buy Data</strong>
           {{-- network --}}
           <div class="w-full grid grid-2 g-10 place-center pc-grid-4">
            {{-- new network --}}
            <div onclick="ChooseNetwork(this)" data-id="01" data-name="MTN" class="column network p-20 text-center align-center g-10">
                <img src="{{ asset('photos/networks/mtn-logo-png_seeklogo-95716.png') }}" alt="" class="w-50">
                <strong class="font-1 font-weight-900">MTN</strong>
            </div>
             {{-- new network --}}
            <div onclick="ChooseNetwork(this)" data-id="02" data-name="GLO" class="column network p-20 text-center align-center g-10">
                <img src="{{ asset('photos/networks/glo-limited-logo-png_seeklogo-491131.png') }}" alt="" class="w-50">
                <strong class="font-1 font-weight-900">GLO</strong>
            </div>
            {{-- new network --}}
            <div onclick="ChooseNetwork(this)" data-id="04" data-name="AIRTEL" class="column network p-20 text-center align-center g-10">
                <img src="{{ asset('photos/networks/airtel-logo-png_seeklogo-168290.png') }}" alt="" class="w-50">
                <strong class="font-1 font-weight-900">Airtel</strong>
            </div>
             {{-- new network --}}
            <div onclick="ChooseNetwork(this)" data-id="03" data-name="M_9MOBILE" class="column network p-20 text-center align-center g-10">
                <img src="{{ asset('photos/networks/9mobile-logo-png_seeklogo-481168.png') }}" alt="" class="w-50">
                <strong class="font-1 font-weight-900">9Mobile</strong>
            </div>
            <input name="network" type="hidden" class="inp input">

           </div>
           {{-- new input --}}
            <div class="column plans display-none g-5 w-full">
                <label>Data Plan</label>
                <div class="cont">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12.0005 3C16.2849 3 20.2196 4.49683 23.3104 6.99607L12.0005 21L0.689941 6.99671C3.78078 4.49709 7.71583 3 12.0005 3ZM12.0005 10C10.1028 10 8.31726 10.4806 6.75905 11.3267L12.0005 17.8169L17.2419 11.3266C15.6837 10.4805 13.8982 10 12.0005 10ZM12.0005 5C8.97296 5 6.07788 5.84185 3.57997 7.39179L5.48439 9.74853C7.40016 8.63663 9.626 8 12.0005 8C14.3751 8 16.6011 8.63667 18.5169 9.74863L20.4204 7.39132C17.9226 5.84167 15.0278 5 12.0005 5Z"></path></svg>

                  <select onchange="ChangePlan(this)" name="plan" class="inp input required"></select> 
                </div>
            </div>
           {{-- new input --}}
           
            <div class="column g-5 w-full">
                <label>Phone Number</label>
                <div class="cont">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M9.36556 10.6821C10.302 12.3288 11.6712 13.698 13.3179 14.6344L14.2024 13.3961C14.4965 12.9845 15.0516 12.8573 15.4956 13.0998C16.9024 13.8683 18.4571 14.3353 20.0789 14.4637C20.599 14.5049 21 14.9389 21 15.4606V19.9234C21 20.4361 20.6122 20.8657 20.1022 20.9181C19.5723 20.9726 19.0377 21 18.5 21C9.93959 21 3 14.0604 3 5.5C3 4.96227 3.02742 4.42771 3.08189 3.89776C3.1343 3.38775 3.56394 3 4.07665 3H8.53942C9.0611 3 9.49513 3.40104 9.5363 3.92109C9.66467 5.54288 10.1317 7.09764 10.9002 8.50444C11.1427 8.9484 11.0155 9.50354 10.6039 9.79757L9.36556 10.6821ZM6.84425 10.0252L8.7442 8.66809C8.20547 7.50514 7.83628 6.27183 7.64727 5H5.00907C5.00303 5.16632 5 5.333 5 5.5C5 12.9558 11.0442 19 18.5 19C18.667 19 18.8337 18.997 19 18.9909V16.3527C17.7282 16.1637 16.4949 15.7945 15.3319 15.2558L13.9748 17.1558C13.4258 16.9425 12.8956 16.6915 12.3874 16.4061L12.3293 16.373C10.3697 15.2587 8.74134 13.6303 7.627 11.6707L7.59394 11.6126C7.30849 11.1044 7.05754 10.5742 6.84425 10.0252Z"></path></svg>

                    <input type="number" placeholder="Enter phone number" class="inp input required" name="number">
                </div>
                <small class="c-gold">Ensure the mobile number is correctly entered</small>
            </div>
            
            {{-- new input --}}
            <div class="column g-5 w-full">
                <label>Amount</label>
                <div class="cont">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12.0005 3C16.2849 3 20.2196 4.49683 23.3104 6.99607L12.0005 21L0.689941 6.99671C3.78078 4.49709 7.71583 3 12.0005 3Z"></path></svg>

                    <input type="text" readonly placeholder="{{ $currency }}0.0" class="inp input required" name="amount-text">
                </div>
            </div>
            <input type="hidden" class="inp input" name="amount">
            <input type="hidden" class="inp input" name="plan_name">
            <div style="border-left:4px solid goldenrod;background:rgba(218, 165, 32,0.1);" class="p-20 column g-10">
                <strong class="font-1">Important</strong>
               <div class="column g-5 w-full">
                 <div class="row g-5">
                    <span>&bull;</span>
                    <span>You are paying from your deposit wallet</span>
                </div>
                 <div class="row g-5">
                    <span>&bull;</span>
                    <span>Ensure the mobile number entered and network selected are correct to avoid loss of funds</span>
                </div>
               </div>
            </div>
            {{-- submit btn --}}
            <button onclick="ValidateForm(this)" class="post">
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M0.689453 6.99659C3.78027 4.49704 7.71526 3 11.9999 3C16.2845 3 20.2195 4.49704 23.3104 6.99659L22.0536 8.55252C19.3062 6.3307 15.8085 5 11.9999 5C8.19133 5 4.69356 6.3307 1.94617 8.55252L0.689453 6.99659ZM3.83124 10.8864C6.0635 9.08119 8.90544 8 11.9999 8C15.0944 8 17.9363 9.08119 20.1686 10.8864L18.9118 12.4424C17.023 10.9149 14.6183 10 11.9999 10C9.38151 10 6.97679 10.9149 5.08796 12.4424L3.83124 10.8864ZM6.97304 14.7763C8.34673 13.6653 10.0956 13 11.9999 13C13.9042 13 15.6531 13.6653 17.0268 14.7763L15.7701 16.3322C14.7398 15.499 13.4281 15 11.9999 15C10.5717 15 9.26002 15.499 8.22975 16.3322L6.97304 14.7763ZM10.1148 18.6661C10.63 18.2495 11.2858 18 11.9999 18C12.714 18 13.3698 18.2495 13.885 18.6661L11.9999 21L10.1148 18.6661Z"></path></svg>
                Buy Data</button>
        </form>
    </section>

    {{-- mtn plans --}}
    <template class="mtn-plans">
        <option value="" selected disabled>Click to choose...</option>
 @foreach ($plans['MOBILE_NETWORK']['MTN'][0]['PRODUCT'] as $data)
        <option value="{{ $data['PRODUCT_ID'] }}" data-id="{{ $data['PRODUCT_ID'] }}" data-amount_text="{{ $currency.number_format(round($data['PRODUCT_AMOUNT']),2) }}" data-amount="{{ round($data['PRODUCT_AMOUNT']) }}">{{ $data['PRODUCT_NAME'] }}</option>
    @endforeach
    </template>
    {{-- airtel plans --}}
    <template class="airtel-plans">
      
        <option value="" selected disabled>Click to choose...</option>
 @foreach ($plans['MOBILE_NETWORK']['Airtel'][0]['PRODUCT'] as $data)
        <option value="{{ $data['PRODUCT_ID'] }}" data-id="{{ $data['PRODUCT_ID'] }}" data-amount_text="{{ $currency.number_format(round($data['PRODUCT_AMOUNT']),2) }}" data-amount="{{ round($data['PRODUCT_AMOUNT']) }}">{{ $data['PRODUCT_NAME'] }}</option>
    @endforeach
    </template>
      {{-- glo plans --}}
    <template class="glo-plans">
        <option value="" selected disabled>Click to choose...</option>
 @foreach ($plans['MOBILE_NETWORK']['Glo'][0]['PRODUCT'] as $data)
        <option value="{{ $data['PRODUCT_ID'] }}" data-id="{{ $data['PRODUCT_ID'] }}" data-amount_text="{{ $currency.number_format(round($data['PRODUCT_AMOUNT']),2) }}" data-amount="{{ round($data['PRODUCT_AMOUNT']) }}">{{ $data['PRODUCT_NAME'] }}</option>
    @endforeach
    </template>
      {{-- 9mobile plans --}}
    <template class="m_9mobile-plans">
        <option value="" selected disabled>Click to choose...</option>
 @foreach ($plans['MOBILE_NETWORK']['m_9mobile'][0]['PRODUCT'] as $data)
        <option value="{{ $data['PRODUCT_ID'] }}" data-id="{{ $data['PRODUCT_ID'] }}" data-amount_text="{{ $currency.number_format(round($data['PRODUCT_AMOUNT']),2) }}" data-amount="{{ round($data['PRODUCT_AMOUNT']) }}">{{ $data['PRODUCT_NAME'] }}</option>
    @endforeach
    </template>
   
@endsection
@section('js')
    <script class="js">
        const network={};
        function ChooseNetwork(element){
            network.id=element.dataset.id;
            network.name=element.dataset.name;
            document.querySelector('input[name=network]').value=JSON.stringify(network);
            document.querySelectorAll('.network').forEach((data)=>{
                data.classList.remove('active');
            })
            element.classList.add('active');
            InsertPlans(element.dataset.name);
        }

        function ValidateForm(element){
          
             if(element.closest('form').querySelector('input[name=network]').value == ''){
                CreateNotify('error','Please select network');
                event.preventDefault();
                return;
            }

              if(parseFloat(element.closest('form').querySelector('input[name=amount]').value) < 50){
                CreateNotify('info','Minimum amount is {{ $currency }}50');
                event.preventDefault();
            }
        
           
        }

        function Completed(response){
                let data=JSON.parse(response);
                if(data.status == 'success'){
                    Redirect(data.receipt);
                }
        }
        function InsertPlans(network){
          
                 document.querySelector('.plans select').innerHTML=document.querySelector(`template.${network.toLowerCase()}-plans`).innerHTML;
            document.querySelector('.plans').classList.remove('display-none')
            
           
        }

        function ChangePlan(element){
            document.querySelector('input[name=amount-text]').value=element.options[element.selectedIndex].dataset.amount_text;
            document.querySelector('input[name=amount]').value=element.options[element.selectedIndex].dataset.amount;
            document.querySelector('input[name=plan_name]').value=element.options[element.selectedIndex].innerText;
        }
    </script>
@endsection