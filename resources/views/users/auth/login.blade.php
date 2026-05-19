@extends('layout.users.auth')
@section('title')
    Login
@endsection
@section('main')
    
        <form action="{{ url('users/post/login/process') }}" method="POST" onsubmit="PostRequest(event,this,Completed)">
            {{-- logo --}}
            <div class="w-full column g-10 align-center text-center p-20">
                  <img onclick="window.location.href='{{ url('/') }}'" style="width:30%;" src="{{ asset(config('settings.logo')) }}" alt="Site Logo">
            <span class="font-weight-100">Daily tasks &bull; Spin &bull; VTU &bull; Marketplace</span>
     
            </div>
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
      

        {{-- new input --}}
        <div class="column g-5 w-full">
            <label>Username</label>
            <div class="cont w-full">
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20C13.6418 20 15.1681 19.5054 16.4381 18.6571L17.5476 20.3214C15.9602 21.3818 14.0523 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12V13.5C22 15.433 20.433 17 18.5 17C17.2958 17 16.2336 16.3918 15.6038 15.4659C14.6942 16.4115 13.4158 17 12 17C9.23858 17 7 14.7614 7 12C7 9.23858 9.23858 7 12 7C13.1258 7 14.1647 7.37209 15.0005 8H17V13.5C17 14.3284 17.6716 15 18.5 15C19.3284 15 20 14.3284 20 13.5V12ZM12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9Z"></path></svg>
                <input name="id" readonly autocomplete="off" onfocus="this.removeAttribute('readonly')" placeholder="Enter your username" type="text" class="inp input required">
            </div>
        </div>
        
         {{-- new input --}}
        <div class="column g-5 w-full">
            <label>Password</label>
            <div class="cont w-full">
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M19 10H20C20.5523 10 21 10.4477 21 11V21C21 21.5523 20.5523 22 20 22H4C3.44772 22 3 21.5523 3 21V11C3 10.4477 3.44772 10 4 10H5V9C5 5.13401 8.13401 2 12 2C15.866 2 19 5.13401 19 9V10ZM5 12V20H19V12H5ZM11 14H13V18H11V14ZM17 10V9C17 6.23858 14.7614 4 12 4C9.23858 4 7 6.23858 7 9V10H17Z"></path></svg>
                
                <input name="password" readonly autocomplete="new-password" onfocus="this.removeAttribute('readonly')" placeholder="Enter account password" type="password" class="inp input required">
            </div>
            <span onclick="Vitecss.navigate('{{ url('users/forgot/password') }}')" class="block m-left-auto c-primary no-select pointer">Forgot Password?</span>
        </div>
       
        
        {{-- submit btn --}}
        <button class="post">
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M10 11V8L15 12L10 16V13H1V11H10ZM2.4578 15H4.58152C5.76829 17.9318 8.64262 20 12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C8.64262 4 5.76829 6.06817 4.58152 9H2.4578C3.73207 4.94289 7.52236 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C7.52236 22 3.73207 19.0571 2.4578 15Z"></path></svg>

            Login
        </button>
          </div> 
         </form>
    
@endsection
@section('js')
    <script class="js">
      
           function  Completed(response){
                let data=JSON.parse(response);
                if(data.status == 'success'){
                    window.location.href='{{ url('users/dashboard') }}'
                    // Vitecss.navigate('{{ url('users/dashboard') }}')
                }
            }
        
    </script>
@endsection