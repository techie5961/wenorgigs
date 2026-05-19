<!DOCTYPE html>
<html lang="en">
<head>
    {{-- include meta tags --}}
   @include('components.utilities',[
    'meta_tags' => true
   ])
{{-- include favicon --}}
@include('components.utilities',[
    'favicon' => true
])
{{-- include vite css --}}
@include('components.utilities',[
    'vite_css' => true
])
{{-- vite js --}}
 @include('components.utilities',[
    'vite_js' => true
  ])
  <script>
   window.addEventListener('load',()=>{
   document.querySelector('body').style.paddingTop=document.querySelector('header').getBoundingClientRect().height + 'px';
    })
  </script>
{{-- yield css --}}
     @yield('css')
    <title>{{ config('app.name') }} || @yield('title') </title>
    <style>
      main{
        overflow-x: hidden;
        padding:20px;
        padding-left:0;
        padding-right:0;
       background:radial-gradient(circle at 0% 0%,var(--primary-02),var(--bg));
       
      }
     header{
        position:fixed;
        top:0;
        left:50%;
        width:100%;
        background:var(--bg-light);
        border:1px solid var(--rgt-005);
        padding:10px;
        transform:translateX(-50%);
        border-radius:0;
        display:flex;
        flex-direction:row;
        align-items:center;
        justify-content: space-between;
        gap:10px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
           user-select:none;
       -webkit-user-select:none;
       z-index:2000;
     }
     header img{
        pointer-events: none;
     }
    header .app-name{
        font-family:'bebas neue';
        font-size:30px;
        color:var(--primary);
        margin-right:auto;
        user-select: none;
        -webkit-user-select: none;
     }
     
     footer{
        width:100%;
        background:var(--primary-dark);
        color:var(--primary-text);
        padding:20px;
        border-top:5px solid var(--primary);
        display:flex;
        flex-direction:column;
        gap:10px;
        user-select: none;
        -webkit-user-select: none;
     }
     footer img{
        pointer-events: none;
     }
     /* mobile devices */
     @media(max-width:800px){
        .menu-icon{
        height:40px;
        width:40px;
        flex-shrink:0;
        display:flex;
        align-items:center;
        justify-content:center;
        background:var(--primary);
        color:var(--primary-text);
        border-radius:50%;
        background:var(--primary-03);
        border:1px solid var(--primary-06);
        color:var(--primary);
        border-radius:10px;

     }
     nav{
        position:absolute;
        top:100%;
        left:0;
        right:0;
        width:100%;
        border-radius:0;
        background:inherit;
        border:1px solid var(--rgt-005);
       font-size:1rem;
       user-select:none;
       -webkit-user-select:none;
       z-index: inherit;
     }
     nav > div{
        padding:10px 20px;
        cursor: pointer;
     }
     nav > div:last-of-type{
        padding-bottom:20px;
     }
     nav > div:first-of-type{
        padding-top:20px;
     }
     nav{
        visibility: hidden;
        transform:scale(0);
        transform-origin: top center;
        opacity:0;
        transition:all 0.5s ease;

     }
     nav.active{
        visibility: visible;
        transform:scale(1);
        opacity:1;
        
     }
     }
     /* pc */
     @media(min-width:800px){
        header{
            width:100%;
            padding:10px 20px;
        }
        .menu-icon{
            display:none;
        }
        nav{
            visibility: visible;
            opacity:1;
            transform:scale(1);
            position:relative;
            display:flex;
            flex-direction:row;
            align-items:center;
            
            gap:10px;
            font-size:0.9rem;
            font-weight:900;
            gap:20px;

            
        }
        nav > div{
            height:fit-content;
            cursor:pointer;
        }
        nav button.post{
            padding: 10px 20px;
            height:fit-content;
            border-radius: 10px !important;
        }
        footer .quick-link{
            cursor:pointer;
        }
        footer .socials{
            pointer-events: none;
        }
     }
     @media(min-width:800px){
     
     }
    </style>
</head>
<body>
    {{-- include general codes --}}
    @include('components.utilities',[
        'general_codes' => true
    ])
     {{-- include users only codes --}}
    @include('components.utilities',[
        'users_codes' => true
    ])
     {{-- include action loader for post requests,get requests and spa loading --}}
    @include('components.utilities',[
        'action_loader' => true
    ])
    {{-- header --}}
    <header>
        {{-- site logo --}}
    <img src="{{ asset(config('settings.logo')) }}" alt="" class="h-30">
    {{-- app name --}}
   <strong class="desc app-name">{{ config('app.name') }}.</strong>
    {{-- menu icon --}}
    <div onclick="this.classList.toggle('active');document.querySelector('nav').classList.toggle('active')" class="menu-icon">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M18 18V20H6V18H18ZM21 11V13H3V11H21ZM18 4V6H6V4H18Z"></path></svg>

    </div>

    {{-- nav --}}
    <nav>
        <div onclick="window.location.href='{{ url('/') }}'">
            <span>Home</span>
        </div>
         <div onclick="window.location.href='{{ url()->current() == url('/') ? '#features' : url('/') }}'">
            <span>Features</span>
        </div>
         <div onclick="window.location.href='{{ url()->current() == url('/') ? '#faqs' : url('/') }}'">
            <span>FAQs</span>
        </div>
         <div onclick="window.location.href='{{ url('privacy') }}'">
            <span>Privacy Policy</span>
        </div>
          <div onclick="window.location.href='{{ url('terms') }}'">
            <span>Terms of Service</span>
        </div>
        <div onclick="window.location.href='{{ url('login') }}'">
            <span>Sign In</span>
        </div>
        <div>
            <button  onclick="window.location.href='{{ url('register') }}'" style="margin-top:0 !important" class="post br-1000">Sign Up Now</button>
        </div>
    </nav>
    </header>
   
    <main>
        
        {{-- yield main --}}
        @yield('main')
    </main>
    <footer>
        {{-- logo --}}
    <img style="filter: brightness(100)" src="{{ asset(config('settings.logo')) }}" width="50" alt="">
    {{-- new --}}
    <span>{{ config('app.name') }} &mdash; Earn, Spin & Win. All in one</span>
    {{-- new row --}}
    <div class="row w-fit g-10 align-center">
       {{-- new --}}
        <div style="background:var(--primary-text);color:var(--primary-dark)" class="w-30 socials h-30 no-shrink circle column align-center justify-center">
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12.001 2C6.47598 2 2.00098 6.475 2.00098 12C2.00098 16.425 4.86348 20.1625 8.83848 21.4875C9.33848 21.575 9.52598 21.275 9.52598 21.0125C9.52598 20.775 9.51348 19.9875 9.51348 19.15C7.00098 19.6125 6.35098 18.5375 6.15098 17.975C6.03848 17.6875 5.55098 16.8 5.12598 16.5625C4.77598 16.375 4.27598 15.9125 5.11348 15.9C5.90098 15.8875 6.46348 16.625 6.65098 16.925C7.55098 18.4375 8.98848 18.0125 9.56348 17.75C9.65098 17.1 9.91348 16.6625 10.201 16.4125C7.97598 16.1625 5.65098 15.3 5.65098 11.475C5.65098 10.3875 6.03848 9.4875 6.67598 8.7875C6.57598 8.5375 6.22598 7.5125 6.77598 6.1375C6.77598 6.1375 7.61348 5.875 9.52598 7.1625C10.326 6.9375 11.176 6.825 12.026 6.825C12.876 6.825 13.726 6.9375 14.526 7.1625C16.4385 5.8625 17.276 6.1375 17.276 6.1375C17.826 7.5125 17.476 8.5375 17.376 8.7875C18.0135 9.4875 18.401 10.375 18.401 11.475C18.401 15.3125 16.0635 16.1625 13.8385 16.4125C14.201 16.725 14.5135 17.325 14.5135 18.2625C14.5135 19.6 14.501 20.675 14.501 21.0125C14.501 21.275 14.6885 21.5875 15.1885 21.4875C19.259 20.1133 21.9999 16.2963 22.001 12C22.001 6.475 17.526 2 12.001 2Z"></path></svg>

        </div>
        {{-- new --}}
        <div style="background:var(--primary-text);color:var(--primary-dark)" class="w-30 socials h-30 no-shrink circle column align-center justify-center">
          <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M17.2539 0.899902C18.5668 0.899902 19.6316 1.96405 19.6318 3.27687C19.6317 4.58978 18.5668 5.65482 17.2539 5.65482C16.1306 5.65482 15.1909 4.87499 14.9424 3.82766C13.5597 4.01397 12.4902 5.19938 12.4902 6.63237C12.4901 6.63491 12.4884 6.63766 12.4883 6.64018C14.6161 6.71893 16.5617 7.31815 18.1025 8.27203C18.6682 7.83745 19.3761 7.57873 20.1445 7.57867C21.9976 7.57867 23.5 9.08109 23.5 10.9342C23.4999 12.2727 22.7158 13.4281 21.582 13.9664C21.4749 17.8644 17.2317 20.9995 12.0088 20.9997C6.78922 20.9997 2.54712 17.8687 2.43457 13.9742C1.29198 13.4392 0.500107 12.2792 0.5 10.9342C0.500017 9.08111 2.00243 7.5787 3.85547 7.57867C4.62712 7.57867 5.33746 7.84005 5.9043 8.27789C7.43009 7.33076 9.35438 6.73323 11.46 6.64409C11.4598 6.64061 11.459 6.63687 11.459 6.63335C11.459 4.63684 12.9818 2.98832 14.9268 2.78957C15.1518 1.71052 16.1081 0.89991 17.2539 0.899902ZM12.0078 15.7164C10.8425 15.7164 9.72472 15.7734 8.69238 15.8785C8.51571 15.896 8.40381 16.0793 8.47266 16.2428C9.05146 17.6248 10.4169 18.5963 12.0078 18.5963C13.5988 18.5963 14.9655 17.6249 15.543 16.2428C15.612 16.0792 15.4987 15.8959 15.3232 15.8785C14.2896 15.7734 13.1732 15.7164 12.0078 15.7164ZM7.5752 10.9137C6.6347 10.9137 5.82654 11.7039 5.77051 12.9117C5.71483 14.1194 6.43257 14.776 7.37305 14.776C8.25466 14.7759 9.01895 14.3896 9.15723 13.3463L9.17676 13.1305C9.23263 11.9225 8.51568 10.9138 7.5752 10.9137ZM16.4424 10.9137C15.5018 10.9137 14.7849 11.9225 14.8408 13.1305L14.8594 13.3463C14.9977 14.3896 15.7629 14.7759 16.6445 14.776C17.585 14.776 18.3018 14.1194 18.2461 12.9117C18.1901 11.7039 17.3829 10.9137 16.4424 10.9137Z"></path></svg>

        </div>
         {{-- new --}}
        <div style="background:var(--primary-text);color:var(--primary-dark)" class="w-30 socials h-30 no-shrink circle column align-center justify-center">
          <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M13.3717 2.09442C8.42512 1.41268 3.73383 4.48505 2.38064 9.29256C1.02745 14.1001 3.42711 19.1692 8.00271 21.1689C7.94264 20.4008 7.99735 19.628 8.16502 18.8761C8.34964 18.0374 9.46121 13.4132 9.46121 13.4132C9.23971 12.9173 9.12893 12.379 9.13659 11.8359C9.13659 10.3509 9.99353 9.24295 11.0597 9.24295C11.4472 9.23718 11.8181 9.40028 12.0758 9.68981C12.3335 9.97934 12.4526 10.3667 12.402 10.751C12.402 11.6512 11.8236 13.0131 11.5228 14.2903C11.4014 14.7656 11.5131 15.2703 11.8237 15.65C12.1343 16.0296 12.6069 16.2389 13.0967 16.2139C14.9944 16.2139 16.2675 13.7825 16.2675 10.9126C16.2675 8.71205 14.8098 7.0655 12.1243 7.0655C10.826 7.01531 9.56388 7.4996 8.63223 8.40543C7.70057 9.31126 7.18084 10.5595 7.19423 11.859C7.16563 12.5722 7.39566 13.2717 7.84194 13.8287C8.01361 13.9564 8.07985 14.1825 8.00425 14.3827C7.9581 14.5673 7.84194 15.0059 7.79578 15.1675C7.77632 15.278 7.70559 15.3728 7.60516 15.4228C7.50473 15.4729 7.38651 15.4724 7.28654 15.4214C5.9019 14.8674 5.24957 13.3439 5.24957 11.6051C5.24957 8.75822 7.63424 5.3497 12.4036 5.3497C16.1998 5.3497 18.723 8.1273 18.723 11.0972C18.723 15.0059 16.5468 17.9451 13.3298 17.9451C12.3526 17.9761 11.4273 17.5061 10.8759 16.6986C10.8759 16.6986 10.2974 19.0146 10.1835 19.4531C9.95101 20.2099 9.60779 20.9281 9.16505 21.5844C10.0877 21.8643 11.0471 22.0044 12.0113 22C14.6636 22.0017 17.2078 20.9484 19.0829 19.072C20.958 17.1957 22.0099 14.6504 22.0069 11.9975C22.004 7.00306 18.3183 2.77616 13.3717 2.09442Z"></path></svg>


        </div>
        
         {{-- new --}}
        <div style="background:var(--primary-text);color:var(--primary-dark)" class="w-30 socials h-30 no-shrink circle column align-center justify-center">
          <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M19.3034 5.33716C17.9344 4.71103 16.4805 4.2547 14.9629 4C14.7719 4.32899 14.5596 4.77471 14.411 5.12492C12.7969 4.89144 11.1944 4.89144 9.60255 5.12492C9.45397 4.77471 9.2311 4.32899 9.05068 4C7.52251 4.2547 6.06861 4.71103 4.70915 5.33716C1.96053 9.39111 1.21766 13.3495 1.5891 17.2549C3.41443 18.5815 5.17612 19.388 6.90701 19.9187C7.33151 19.3456 7.71356 18.73 8.04255 18.0827C7.41641 17.8492 6.82211 17.5627 6.24904 17.2231C6.39762 17.117 6.5462 17.0003 6.68416 16.8835C10.1438 18.4648 13.8911 18.4648 17.3082 16.8835C17.4568 17.0003 17.5948 17.117 17.7434 17.2231C17.1703 17.5627 16.576 17.8492 15.9499 18.0827C16.2789 18.73 16.6609 19.3456 17.0854 19.9187C18.8152 19.388 20.5875 18.5815 22.4033 17.2549C22.8596 12.7341 21.6806 8.80747 19.3034 5.33716ZM8.5201 14.8459C7.48007 14.8459 6.63107 13.9014 6.63107 12.7447C6.63107 11.5879 7.45884 10.6434 8.5201 10.6434C9.57071 10.6434 10.4303 11.5879 10.4091 12.7447C10.4091 13.9014 9.57071 14.8459 8.5201 14.8459ZM15.4936 14.8459C14.4535 14.8459 13.6034 13.9014 13.6034 12.7447C13.6034 11.5879 14.4323 10.6434 15.4936 10.6434C16.5442 10.6434 17.4038 11.5879 17.3825 12.7447C17.3825 13.9014 16.5548 14.8459 15.4936 14.8459Z"></path></svg>
        </div>
        
    </div>
    {{-- new --}}
    <strong class="m-top-10">Quick Links</strong>
    <div class="quick-link" onclick="window.location.href='{{ url('privacy') }}'">Privacy Policy</div>
    <div class="quick-link" onclick="window.location.href='{{ url('terms') }}'">Terms of Service</div>
    <div class="quick-link" onclick="window.location.href='{{ url('register') }}'">Get Started</div>
    <div class="quick-link" onclick="window.location.href='{{ url('login') }}'">Log In</div>
    <span class="row m-x-auto opacity-07">&copy;{{ date('Y') }} {{ config('app.name') }}. All rights reserved</span>
    </footer>
 
  {{-- yield js --}}
    @yield('js')
</body>
</html>