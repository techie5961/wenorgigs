@extends('layout.users.auth')
@section('title')
    Register
@endsection
@section('main')
    
        <form action="{{ url('users/post/register/process') }}" method="POST" onsubmit="PostRequest(event,this,Completed)">
             {{-- logo --}}
            <div class="w-full column g-10 align-center text-center p-20">
                  <img onclick="window.location.href='{{ url('/') }}'" style="width:30%;" src="{{ asset(config('settings.logo')) }}" alt="Site Logo">
            <span class="font-weight-100">Daily tasks &bull; Spin &bull; VTU &bull; Marketplace</span>
     
            </div>
            {{-- tab bar --}}
            {{-- tab bar --}}
         <div class="tab-bar">
            {{-- login tab --}}
            <div onclick="Vitecss.navigate('{{ url('users/login') }}')" class="tab {{ str_contains(url()->current(),'login') ? 'active' : '' }}">
                <span>LOGIN</span>
            </div>
            {{-- signup tab --}}
             <div onclick="Vitecss.navigate('{{ url('users/register') }}')" class="tab {{ str_contains(url()->current(),'register') ? 'active' : '' }}">
                <span>SIGN Up</span>
            </div>
        </div>
        {{-- container --}}
            <div class="container">
           
       {{-- csrf token --}}
       <input type="hidden" name="_token" value="{{ @csrf_token() }}" class="inp input">
       <div class="row align-center g-10 w-full">

        {{-- new input --}}
        <div class="column g-5 w-full">
            <label>First Name</label>
            <div class="cont w-full">
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M4 22C4 17.5817 7.58172 14 12 14C16.4183 14 20 17.5817 20 22H18C18 18.6863 15.3137 16 12 16C8.68629 16 6 18.6863 6 22H4ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13ZM12 11C14.21 11 16 9.21 16 7C16 4.79 14.21 3 12 3C9.79 3 8 4.79 8 7C8 9.21 9.79 11 12 11Z"></path></svg>

                <input name="first_name" placeholder="E.g David" type="text" class="inp input required">
            </div>
        </div>
         {{-- new input --}}
        <div class="column g-5 w-full">
            <label>Last Name</label>
            <div class="cont w-full">
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M4 22C4 17.5817 7.58172 14 12 14C16.4183 14 20 17.5817 20 22H18C18 18.6863 15.3137 16 12 16C8.68629 16 6 18.6863 6 22H4ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13ZM12 11C14.21 11 16 9.21 16 7C16 4.79 14.21 3 12 3C9.79 3 8 4.79 8 7C8 9.21 9.79 11 12 11Z"></path></svg>
                <input name="last_name" readonly autocomplete="off" onfocus="this.removeAttribute('readonly')" placeholder="E.g James" type="text" class="inp input required">
            </div>
        </div>
       </div>

          {{-- new input --}}
        <div class="column g-5 w-full">
            <label>Username</label>
            <div class="cont w-full">
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20C13.6418 20 15.1681 19.5054 16.4381 18.6571L17.5476 20.3214C15.9602 21.3818 14.0523 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12V13.5C22 15.433 20.433 17 18.5 17C17.2958 17 16.2336 16.3918 15.6038 15.4659C14.6942 16.4115 13.4158 17 12 17C9.23858 17 7 14.7614 7 12C7 9.23858 9.23858 7 12 7C13.1258 7 14.1647 7.37209 15.0005 8H17V13.5C17 14.3284 17.6716 15 18.5 15C19.3284 15 20 14.3284 20 13.5V12ZM12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9Z"></path></svg>

                <input name="username" readonly autocomplete="off" onfocus="this.removeAttribute('readonly')" placeholder="Enter your username" type="text" class="inp input required">
            </div>
        </div>

        {{-- new input --}}
        <div class="column g-5 w-full">
            <label>Email Address</label>
            <div class="cont w-full">
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M3 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3ZM20 7.23792L12.0718 14.338L4 7.21594V19H20V7.23792ZM4.51146 5L12.0619 11.662L19.501 5H4.51146Z"></path></svg>

                <input name="email" readonly autocomplete="off" onfocus="this.removeAttribute('readonly')" placeholder="E.g you@gmail.com" type="email" class="inp input required">
            </div>
        </div>
         {{-- new input --}}
        <div class="column g-5 w-full">
            <label>Phone Number</label>
            <div class="cont w-full">
               <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M9.36556 10.6821C10.302 12.3288 11.6712 13.698 13.3179 14.6344L14.2024 13.3961C14.4965 12.9845 15.0516 12.8573 15.4956 13.0998C16.9024 13.8683 18.4571 14.3353 20.0789 14.4637C20.599 14.5049 21 14.9389 21 15.4606V19.9234C21 20.4361 20.6122 20.8657 20.1022 20.9181C19.5723 20.9726 19.0377 21 18.5 21C9.93959 21 3 14.0604 3 5.5C3 4.96227 3.02742 4.42771 3.08189 3.89776C3.1343 3.38775 3.56394 3 4.07665 3H8.53942C9.0611 3 9.49513 3.40104 9.5363 3.92109C9.66467 5.54288 10.1317 7.09764 10.9002 8.50444C11.1427 8.9484 11.0155 9.50354 10.6039 9.79757L9.36556 10.6821ZM6.84425 10.0252L8.7442 8.66809C8.20547 7.50514 7.83628 6.27183 7.64727 5H5.00907C5.00303 5.16632 5 5.333 5 5.5C5 12.9558 11.0442 19 18.5 19C18.667 19 18.8337 18.997 19 18.9909V16.3527C17.7282 16.1637 16.4949 15.7945 15.3319 15.2558L13.9748 17.1558C13.4258 16.9425 12.8956 16.6915 12.3874 16.4061L12.3293 16.373C10.3697 15.2587 8.74134 13.6303 7.627 11.6707L7.59394 11.6126C7.30849 11.1044 7.05754 10.5742 6.84425 10.0252Z"></path></svg>

                <input name="phone" readonly autocomplete="off" onfocus="this.removeAttribute('readonly')" placeholder="E.g 09012345678" type="number" class="inp input required">
            </div>
        </div>
         {{-- new input --}}
        <div class="column g-5 w-full">
            <label>Referral(optional)</label>
            <div class="cont w-full">
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M14 14.252V16.3414C13.3744 16.1203 12.7013 16 12 16C8.68629 16 6 18.6863 6 22H4C4 17.5817 7.58172 14 12 14C12.6906 14 13.3608 14.0875 14 14.252ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13ZM12 11C14.21 11 16 9.21 16 7C16 4.79 14.21 3 12 3C9.79 3 8 4.79 8 7C8 9.21 9.79 11 12 11ZM18 17V14H20V17H23V19H20V22H18V19H15V17H18Z"></path></svg>

                <input value="{{ $ref }}" name="ref" readonly autocomplete="off" onfocus="this.removeAttribute('readonly')" placeholder="Enter referral code" type="text" class="inp input">
            </div>
        </div>
         {{-- new input --}}
        <div class="column g-5 w-full">
            <label>Password</label>
            <div class="cont w-full">
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M19 10H20C20.5523 10 21 10.4477 21 11V21C21 21.5523 20.5523 22 20 22H4C3.44772 22 3 21.5523 3 21V11C3 10.4477 3.44772 10 4 10H5V9C5 5.13401 8.13401 2 12 2C15.866 2 19 5.13401 19 9V10ZM5 12V20H19V12H5ZM11 14H13V18H11V14ZM17 10V9C17 6.23858 14.7614 4 12 4C9.23858 4 7 6.23858 7 9V10H17Z"></path></svg>

                <input name="password" readonly autocomplete="new-password" onfocus="this.removeAttribute('readonly')" placeholder="Enter password" type="password" class="inp input required">
            </div>
        </div>
         {{-- new input --}}
        <div class="column g-5 w-full">
            <label>Confirm Password</label>
            <div class="cont w-full">
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M19 10H20C20.5523 10 21 10.4477 21 11V21C21 21.5523 20.5523 22 20 22H4C3.44772 22 3 21.5523 3 21V11C3 10.4477 3.44772 10 4 10H5V9C5 5.13401 8.13401 2 12 2C15.866 2 19 5.13401 19 9V10ZM5 12V20H19V12H5ZM11 14H13V18H11V14ZM17 10V9C17 6.23858 14.7614 4 12 4C9.23858 4 7 6.23858 7 9V10H17Z"></path></svg>

                <input name="confirm_password" readonly autocomplete="new-password" onfocus="this.removeAttribute('readonly')" placeholder="Retype password" type="password" class="inp input required">
            </div>
        </div>
        {{-- agree prompt --}}
        <label class="w-full row no-select align-center g-5">
            <input type="checkbox" required>
            <span>I agree to {{ config('app.name') }} <a class="no-u c-primary bold" href="{{ url('terms') }}">Terms</a> and <a class="no-u c-primary bold" href="{{ url('privacy') }}">Privacy Policy</a></span>
        </label>
        {{-- submit btn --}}
        <button class="post">
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 23C16.1421 23 19.5 19.6421 19.5 15.5C19.5 14.6345 19.2697 13.8032 19 13.0296C17.3333 14.6765 16.0667 15.5 15.2 15.5C19.1954 8.5 17 5.5 11 1.5C11.5 6.49951 8.20403 8.77375 6.86179 10.0366C5.40786 11.4045 4.5 13.3462 4.5 15.5C4.5 19.6421 7.85786 23 12 23ZM12.7094 5.23498C15.9511 7.98528 15.9666 10.1223 13.463 14.5086C12.702 15.8419 13.6648 17.5 15.2 17.5C15.8884 17.5 16.5841 17.2992 17.3189 16.9051C16.6979 19.262 14.5519 21 12 21C8.96243 21 6.5 18.5376 6.5 15.5C6.5 13.9608 7.13279 12.5276 8.23225 11.4932C8.35826 11.3747 8.99749 10.8081 9.02477 10.7836C9.44862 10.4021 9.7978 10.0663 10.1429 9.69677C11.3733 8.37932 12.2571 6.91631 12.7094 5.23498Z"></path></svg>
            
            Create Account
        </button>
           
        </div> 
        </form>
    
@endsection
@section('js')
    <script class="js">
      
            function Completed(response){
                let data=JSON.parse(response);
                if(data.status == 'success'){
                    window.location.href='{{ url('users/login') }}'
                }
            }
        
    </script>
@endsection