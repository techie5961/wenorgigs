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
        <strong class="page-title">Airtime VTU HUB</strong>
        <span>Purchase airtime easily</span>
        <form onsubmit="PostRequest(event,this,Completed)" method="POST" action="{{ url('users/post/airtime/topup/process') }}" style="border:1px solid var(--rgt-005)" class="w-full column bg-light br-primary p-20 g-10">
          {{-- csrf token --}}
          <input type="hidden" class="inp input" name="_token" value="{{ @csrf_token() }}">
            <span class="font-weight-600 c-primary">Airtime for all Networks</span>
           <strong class="font-1 font-weight-900">Buy Airtime</strong>
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
            <div onclick="ChooseNetwork(this)" data-id="03" data-name="9MOBILE" class="column network p-20 text-center align-center g-10">
                <img src="{{ asset('photos/networks/9mobile-logo-png_seeklogo-481168.png') }}" alt="" class="w-50">
                <strong class="font-1 font-weight-900">9Mobile</strong>
            </div>
            <input name="network" type="hidden" class="inp input">

           </div>
           {{-- new input --}}
            <div class="column g-5 w-full">
                <label>Phone Number</label>
                <div class="cont">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M7 4V20H17V4H7ZM6 2H18C18.5523 2 19 2.44772 19 3V21C19 21.5523 18.5523 22 18 22H6C5.44772 22 5 21.5523 5 21V3C5 2.44772 5.44772 2 6 2ZM12 17C12.5523 17 13 17.4477 13 18C13 18.5523 12.5523 19 12 19C11.4477 19 11 18.5523 11 18C11 17.4477 11.4477 17 12 17Z"></path></svg>

                    <input type="number" placeholder="Enter phone number" class="inp input required" name="number">
                </div>
                <small class="c-gold">Ensure the mobile number is correctly entered</small>
            </div>
            {{-- new input --}}
            <div class="column g-5 w-full">
                <label>Amount</label>
                <div class="cont">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M9.36556 10.6821C10.302 12.3288 11.6712 13.698 13.3179 14.6344L14.2024 13.3961C14.4965 12.9845 15.0516 12.8573 15.4956 13.0998C16.9024 13.8683 18.4571 14.3353 20.0789 14.4637C20.599 14.5049 21 14.9389 21 15.4606V19.9234C21 20.4361 20.6122 20.8657 20.1022 20.9181C19.5723 20.9726 19.0377 21 18.5 21C9.93959 21 3 14.0604 3 5.5C3 4.96227 3.02742 4.42771 3.08189 3.89776C3.1343 3.38775 3.56394 3 4.07665 3H8.53942C9.0611 3 9.49513 3.40104 9.5363 3.92109C9.66467 5.54288 10.1317 7.09764 10.9002 8.50444C11.1427 8.9484 11.0155 9.50354 10.6039 9.79757L9.36556 10.6821ZM6.84425 10.0252L8.7442 8.66809C8.20547 7.50514 7.83628 6.27183 7.64727 5H5.00907C5.00303 5.16632 5 5.333 5 5.5C5 12.9558 11.0442 19 18.5 19C18.667 19 18.8337 18.997 19 18.9909V16.3527C17.7282 16.1637 16.4949 15.7945 15.3319 15.2558L13.9748 17.1558C13.4258 16.9425 12.8956 16.6915 12.3874 16.4061L12.3293 16.373C10.3697 15.2587 8.74134 13.6303 7.627 11.6707L7.59394 11.6126C7.30849 11.1044 7.05754 10.5742 6.84425 10.0252Z"></path></svg>

                    <input type="number" placeholder="Enter airtime amount(min: {{ $currency }}50)" class="inp input required" name="amount">
                </div>
            </div>
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
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M9.36556 10.6821C10.302 12.3288 11.6712 13.698 13.3179 14.6344L14.2024 13.3961C14.4965 12.9845 15.0516 12.8573 15.4956 13.0998C16.9024 13.8683 18.4571 14.3353 20.0789 14.4637C20.599 14.5049 21 14.9389 21 15.4606V19.9234C21 20.4361 20.6122 20.8657 20.1022 20.9181C19.5723 20.9726 19.0377 21 18.5 21C9.93959 21 3 14.0604 3 5.5C3 4.96227 3.02742 4.42771 3.08189 3.89776C3.1343 3.38775 3.56394 3 4.07665 3H8.53942C9.0611 3 9.49513 3.40104 9.5363 3.92109C9.66467 5.54288 10.1317 7.09764 10.9002 8.50444C11.1427 8.9484 11.0155 9.50354 10.6039 9.79757L9.36556 10.6821ZM6.84425 10.0252L8.7442 8.66809C8.20547 7.50514 7.83628 6.27183 7.64727 5H5.00907C5.00303 5.16632 5 5.333 5 5.5C5 12.9558 11.0442 19 18.5 19C18.667 19 18.8337 18.997 19 18.9909V16.3527C17.7282 16.1637 16.4949 15.7945 15.3319 15.2558L13.9748 17.1558C13.4258 16.9425 12.8956 16.6915 12.3874 16.4061L12.3293 16.373C10.3697 15.2587 8.74134 13.6303 7.627 11.6707L7.59394 11.6126C7.30849 11.1044 7.05754 10.5742 6.84425 10.0252Z"></path></svg>
                
                Buy Airtime</button>
        </form>
    </section>
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
    </script>
@endsection