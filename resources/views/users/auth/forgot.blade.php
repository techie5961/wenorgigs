@extends('layout.users.auth')
@section('title')
    Forgot Password
@endsection
@section('css')
    <style class="css">
        .steps{
            display:flex;
            flex-direction:row;
            width:100%;
            align-items:center;
            justify-content:center;
            gap:10px;
        }
        .step{
            height:50px;
            width:50px;
            border-radius:50%;
            display:flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background:var(--rgt-005);
            color:var(--rgt-07);
            border:1px solid var(--rgt-01);
            user-select:none;
            -webkit-user-select:none;
            font-weight:900;
            font-size:1rem;

        }
        .step svg{
            height:20px;
            width:20px;
            display:none;
            
        }
        .step.active svg{
            display: flex;

        }
        .step.active span{
            display: none;
        }
        .step.current{
            background: var(--primary);
            color:var(--primary-text);
            border:none;
        }
        .step.active{
            background: #4caf50;
            border:none;
            color:white;
        }
        .line{
            width:40px;
            height:1px;
            background:var(--rgt-02)
        }
        form.container{
            display:none;
        }
        form.container.active{
            display:flex;
        }
    </style>
@endsection
@section('main')
    <div class="form">
        
            {{-- logo --}}
            <div class="w-full column g-10 align-center text-center p-20">
            <div style="background:var(--primary-01);color:var(--primary)" class="w-70 h-70 circle column align-center justify-center g-10">
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="40" width="40"><path d="M18 8H20C20.5523 8 21 8.44772 21 9V21C21 21.5523 20.5523 22 20 22H4C3.44772 22 3 21.5523 3 21V9C3 8.44772 3.44772 8 4 8H6V7C6 3.68629 8.68629 1 12 1C15.3137 1 18 3.68629 18 7V8ZM5 10V20H19V10H5ZM11 14H13V16H11V14ZM7 14H9V16H7V14ZM15 14H17V16H15V14ZM16 8V7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7V8H16Z"></path></svg>

            </div>
            {{-- desc --}}
            <strong style="font-family: 'bebas neue';font-size:3rem;color:var(--primary-dark)">Forgot <br> Password?</strong>
         {{-- text --}}
            <span class="opacity-07">No worries &mdash; we will help you get back to earning</span>
            {{-- steps --}}
            <div class="steps">
                {{-- new step --}}
                <div class="step current send-step">
                        <span>1</span>
                        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="50" width="50"><path d="M9.9997 15.1709L19.1921 5.97852L20.6063 7.39273L9.9997 17.9993L3.63574 11.6354L5.04996 10.2212L9.9997 15.1709Z"></path></svg>

                </div>
                {{-- new line --}}
                <div class="line"></div>
                {{-- new step --}}
                <div class="step verify-step">
                        <span>2</span>
                        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="50" width="50"><path d="M9.9997 15.1709L19.1921 5.97852L20.6063 7.39273L9.9997 17.9993L3.63574 11.6354L5.04996 10.2212L9.9997 15.1709Z"></path></svg>

                </div>
                {{-- new line --}}
                <div class="line"></div>
                {{-- new step --}}
                <div class="step reset-step">
                        <span>3</span>
                        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="50" width="50"><path d="M9.9997 15.1709L19.1921 5.97852L20.6063 7.39273L9.9997 17.9993L3.63574 11.6354L5.04996 10.2212L9.9997 15.1709Z"></path></svg>

                </div>
            </div>
        </div>
           
        {{-- send code form --}}
            <form method="POST" onsubmit="PostRequest(event,this,OTPSent)" action="{{ url('users/post/forgot/password/send/code/process') }}" class="container active send-code">
                {{-- csrf token --}}
       <input type="hidden" name="_token" value="{{ @csrf_token() }}" class="inp input">
      

        {{-- new input --}}
        <div class="column g-5 w-full">
            <label>Email Address</label>
            <div class="cont w-full">
               <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M3 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3ZM20 7.23792L12.0718 14.338L4 7.21594V19H20V7.23792ZM4.51146 5L12.0619 11.662L19.501 5H4.51146Z"></path></svg>
                 <input name="email" readonly autocomplete="off" onfocus="this.removeAttribute('readonly')" placeholder="Enter your registered email" type="email" class="inp input required">
            </div>
            <span class="opacity-07">We will send a verification code to reset your password</span>
        </div>
        
       
       
        
        {{-- submit btn --}}
        <button class="post">
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M21.7267 2.95694L16.2734 22.0432C16.1225 22.5716 15.7979 22.5956 15.5563 22.1126L11 13L1.9229 9.36919C1.41322 9.16532 1.41953 8.86022 1.95695 8.68108L21.0432 2.31901C21.5716 2.14285 21.8747 2.43866 21.7267 2.95694ZM19.0353 5.09647L6.81221 9.17085L12.4488 11.4255L15.4895 17.5068L19.0353 5.09647Z"></path></svg>

            Send Reset Code
        </button>
        <span onclick="Vitecss.navigate('{{ url('users/login') }}')" class="c-primary row align-center g-5 no-select pointer">
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M7.82843 10.9999H20V12.9999H7.82843L13.1924 18.3638L11.7782 19.778L4 11.9999L11.7782 4.22168L13.1924 5.63589L7.82843 10.9999Z"></path></svg>

            Back to Login
        </span>
          </form> 
          {{-- verify code form --}}
            <form method="POST" onsubmit="PostRequest(event,this,Verified)" action="{{ url('users/post/forgot/password/verify/code/process') }}" class="container verify-code">
                {{-- csrf token --}}
       <input type="hidden" name="_token" value="{{ @csrf_token() }}" class="inp input">
       {{-- email --}}
       <input type="hidden" class="inp input" name="email">
      
                {{-- prompt --}}
                <div style="border:1px solid #4caf50;padding:15px;background:rgba(0,255,0,0.1);max-width:250px;" class="w-fit column align-center justify-center g-10">
                  <svg viewBox="0 0 24 24" fill="#4caf50" xmlns="http://www.w3.org/2000/svg" height="30" width="30"><path d="M22 14H20V7.23792L12.0718 14.338L4 7.21594V19H14V21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H21C21.5523 3 22 3.44772 22 4V14ZM4.51146 5L12.0619 11.662L19.501 5H4.51146ZM19 22L15.4645 18.4645L16.8787 17.0503L19 19.1716L22.5355 15.636L23.9497 17.0503L19 22Z"></path></svg>

                    <div style="max-width:100%;" class="text-center">
                     verification code sent successfully, kindly check your spam folder if you cant find it
                   </div>
                </div>
        {{-- new input --}}
        <div class="column g-5 w-full">
            <label>Verification Code</label>
            <div class="cont w-full">
             <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12.917 13C12.441 15.8377 9.973 18 7 18C3.68629 18 1 15.3137 1 12C1 8.68629 3.68629 6 7 6C9.973 6 12.441 8.16229 12.917 11H23V13H21V17H19V13H17V17H15V13H12.917ZM7 16C9.20914 16 11 14.2091 11 12C11 9.79086 9.20914 8 7 8C4.79086 8 3 9.79086 3 12C3 14.2091 4.79086 16 7 16Z"></path></svg>
                 <input name="code" readonly autocomplete="off" onfocus="this.removeAttribute('readonly')" placeholder="Enter 6-digit code" type="number" class="inp input required">
            </div>
            
        </div>
        
       
       
        
        {{-- submit btn --}}
        <button class="post">
          <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M10.0072 2.10365C8.60556 1.64993 7.08193 2.28104 6.41168 3.59294L5.6059 5.17011C5.51016 5.35751 5.35775 5.50992 5.17036 5.60566L3.59318 6.41144C2.28128 7.08169 1.65018 8.60532 2.10389 10.0069L2.64935 11.6919C2.71416 11.8921 2.71416 12.1077 2.64935 12.3079L2.10389 13.9929C1.65018 15.3945 2.28129 16.9181 3.59318 17.5883L5.17036 18.3941C5.35775 18.4899 5.51016 18.6423 5.6059 18.8297L6.41169 20.4068C7.08194 21.7187 8.60556 22.3498 10.0072 21.8961L11.6922 21.3507C11.8924 21.2859 12.1079 21.2859 12.3081 21.3507L13.9931 21.8961C15.3947 22.3498 16.9183 21.7187 17.5886 20.4068L18.3944 18.8297C18.4901 18.6423 18.6425 18.4899 18.8299 18.3941L20.4071 17.5883C21.719 16.9181 22.3501 15.3945 21.8964 13.9929L21.3509 12.3079C21.2861 12.1077 21.2861 11.8921 21.3509 11.6919L21.8964 10.0069C22.3501 8.60531 21.719 7.08169 20.4071 6.41144L18.8299 5.60566C18.6425 5.50992 18.4901 5.3575 18.3944 5.17011L17.5886 3.59294C16.9183 2.28104 15.3947 1.64993 13.9931 2.10365L12.3081 2.6491C12.1079 2.71391 11.8924 2.71391 11.6922 2.6491L10.0072 2.10365ZM8.19271 4.50286C8.41612 4.06556 8.924 3.8552 9.39119 4.00643L11.0762 4.55189C11.6768 4.74632 12.3235 4.74632 12.9241 4.55189L14.6091 4.00643C15.0763 3.8552 15.5841 4.06556 15.8076 4.50286L16.6133 6.08004C16.9006 6.64222 17.3578 7.09946 17.92 7.38668L19.4972 8.19246C19.9345 8.41588 20.1448 8.92375 19.9936 9.39095L19.4481 11.076C19.2537 11.6766 19.2537 12.3232 19.4481 12.9238L19.9936 14.6088C20.1448 15.076 19.9345 15.5839 19.4972 15.8073L17.92 16.6131C17.3578 16.9003 16.9006 17.3576 16.6133 17.9197L15.8076 19.4969C15.5841 19.9342 15.0763 20.1446 14.6091 19.9933L12.9241 19.4479C12.3235 19.2535 11.6768 19.2535 11.0762 19.4479L9.3912 19.9933C8.924 20.1446 8.41612 19.9342 8.19271 19.4969L7.38692 17.9197C7.09971 17.3576 6.64246 16.9003 6.08028 16.6131L4.50311 15.8073C4.06581 15.5839 3.85544 15.076 4.00668 14.6088L4.55213 12.9238C4.74656 12.3232 4.74656 11.6766 4.55213 11.076L4.00668 9.39095C3.85544 8.92375 4.06581 8.41588 4.50311 8.19246L6.08028 7.38668C6.64246 7.09946 7.09971 6.64222 7.38692 6.08004L8.19271 4.50286ZM6.75972 11.7573L11.0023 15.9999L18.0734 8.92885L16.6592 7.51464L11.0023 13.1715L8.17394 10.343L6.75972 11.7573Z"></path></svg>

            Verify Code
        </button>
        <span onclick="SwitchForm('.send-code','.verify-step','.verify-step','.send-step')" class="c-primary row align-center g-5 no-select pointer">
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M7.82843 10.9999H20V12.9999H7.82843L13.1924 18.3638L11.7782 19.778L4 11.9999L11.7782 4.22168L13.1924 5.63589L7.82843 10.9999Z"></path></svg>

            Back
        </span>
          </form>
          
          {{-- reset password form --}}
            <form method="POST" onsubmit="PostRequest(event,this,PasswordUpdated)" action="{{ url('users/post/forgot/password/set/new/password/process') }}" class="container reset-password">
                {{-- csrf token --}}
       <input type="hidden" name="_token" value="{{ @csrf_token() }}" class="inp input">
        {{-- email --}}
       <input type="hidden" class="inp input" name="email">
        {{-- otp code --}}
       <input type="hidden" class="inp input" name="otp">

        {{-- new input --}}
        <div class="column g-5 w-full">
            <label>New Password</label>
            <div class="cont w-full">
              <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M6 8V7C6 3.68629 8.68629 1 12 1C15.3137 1 18 3.68629 18 7V8H20C20.5523 8 21 8.44772 21 9V21C21 21.5523 20.5523 22 20 22H4C3.44772 22 3 21.5523 3 21V9C3 8.44772 3.44772 8 4 8H6ZM19 10H5V20H19V10ZM11 15.7324C10.4022 15.3866 10 14.7403 10 14C10 12.8954 10.8954 12 12 12C13.1046 12 14 12.8954 14 14C14 14.7403 13.5978 15.3866 13 15.7324V18H11V15.7324ZM8 8H16V7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7V8Z"></path></svg>
                 <input name="password" readonly autocomplete="new-password" onfocus="this.removeAttribute('readonly')" placeholder="Enter new password" type="password" class="inp input required">
            </div>
            
        </div>
        {{-- new input --}}
        <div class="column g-5 w-full">
            <label>Confirm Password</label>
            <div class="cont w-full">
              <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M6 8V7C6 3.68629 8.68629 1 12 1C15.3137 1 18 3.68629 18 7V8H20C20.5523 8 21 8.44772 21 9V21C21 21.5523 20.5523 22 20 22H4C3.44772 22 3 21.5523 3 21V9C3 8.44772 3.44772 8 4 8H6ZM19 10H5V20H19V10ZM11 15.7324C10.4022 15.3866 10 14.7403 10 14C10 12.8954 10.8954 12 12 12C13.1046 12 14 12.8954 14 14C14 14.7403 13.5978 15.3866 13 15.7324V18H11V15.7324ZM8 8H16V7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7V8Z"></path></svg>
                 <input name="confirm" readonly autocomplete="new-password" onfocus="this.removeAttribute('readonly')" placeholder="Confirm your new password" type="password" class="inp input required">
            </div>
            
        </div>
        
       
       
        
        {{-- submit btn --}}
        <button class="post">
           <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M5.46257 4.43262C7.21556 2.91688 9.5007 2 12 2C17.5228 2 22 6.47715 22 12C22 14.1361 21.3302 16.1158 20.1892 17.7406L17 12H20C20 7.58172 16.4183 4 12 4C9.84982 4 7.89777 4.84827 6.46023 6.22842L5.46257 4.43262ZM18.5374 19.5674C16.7844 21.0831 14.4993 22 12 22C6.47715 22 2 17.5228 2 12C2 9.86386 2.66979 7.88416 3.8108 6.25944L7 12H4C4 16.4183 7.58172 20 12 20C14.1502 20 16.1022 19.1517 17.5398 17.7716L18.5374 19.5674Z"></path></svg>

           Reset Password
        </button>
        <span onclick="SwitchForm('.verify-code','null','.reset-step','.verify-step')" class="c-primary row align-center g-5 no-select pointer">
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M7.82843 10.9999H20V12.9999H7.82843L13.1924 18.3638L11.7782 19.778L4 11.9999L11.7782 4.22168L13.1924 5.63589L7.82843 10.9999Z"></path></svg>

            Back
        </span>
          </form> 
         </div>
    
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

            function SwitchForm(form,current_step='null',previous_step='null',next_step='null'){
               try{
               
                 document.querySelector('form.container.active').classList.remove('active');
                document.querySelector(form).classList.add('active');
                if(current_step !== 'null'){
                    document.querySelector(current_step).classList.remove('current');
                    document.querySelector(current_step).classList.add('active')
                }
                
                if(previous_step !== 'null'){
                     document.querySelector(previous_step).classList.remove('active');
                     document.querySelector(previous_step).classList.remove('current');
                }
                if(next_step !== 'null'){
                    document.querySelectorAll('.step').forEach((data)=>{
                        data.classList.remove('current');
                    });
                     document.querySelector(next_step).classList.remove('active')
                    document.querySelector(next_step).classList.add('current')
                }
               
               }catch(error){
                alert(error)
               }

            }


            function OTPSent(response){
              
                    let data=JSON.parse(response);
                    if(data.status == 'success'){
                        document.querySelector('.verify-code input[name=email]').value=data.email;
                        SwitchForm('.verify-code','.send-step','null','.verify-step');

                    }
            }

            function Verified(response){
                let data=JSON.parse(response);
                if(data.status == 'success'){
                     document.querySelector('.reset-password input[name=email]').value=data.email;
                     document.querySelector('.reset-password input[name=otp]').value=data.otp;
                    SwitchForm('.reset-password','.verify-step','null','.reset-step')
                }
            }

            function PasswordUpdated(response){
                let data=JSON.parse(response);
                if(data.status == 'success'){
                    Vitecss.navigate('{{ url('users/login') }}');
                }
            }
        
    </script>
@endsection