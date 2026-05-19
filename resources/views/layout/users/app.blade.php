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



    <title>{{ config('app.name') }} || Users || @yield('title') </title>

     @include('components.utilities',[
    'vite_js' => true
  ])
  
    <script>
   
    function StyleUp(){
        
      try{
       
        document.querySelector('main').style.paddingTop=document.querySelector('header').getBoundingClientRect().height + 20 + 'px';
         document.querySelector('nav > .child .body').style.height=Math.abs(window.innerHeight - (document.querySelector('nav > .child .header').getBoundingClientRect().height)) + 'px';
      document.querySelector('.header-links').style.top=document.querySelector('header').getBoundingClientRect().bottom + 'px';
      if(window.innerWidth >= 800){
            document.querySelector('nav > .child .header').style.minHeight=document.querySelector('header').getBoundingClientRect().height + 'px';
        }
           document.querySelector('nav > .child .body').style.marginTop=(document.querySelector('nav > .child .header').getBoundingClientRect().height) + 'px';
            document.querySelector('nav > .child .body').style.height=Math.abs(window.innerHeight - (document.querySelector('nav > .child .header').getBoundingClientRect().height)) + 'px';
    
   
       
      }catch(error){
        alert(error)
      }
    }
    window.addEventListener('load',()=>{
        StyleUp();
    });
    // document.addEventListener('vitecss:navigating',()=>{
    //     alert('navigating')
    // });
   document.addEventListener('vitecss:navigated',()=>{
       
     StyleUp();
    });
    function ToggleNav(element){
       
        let nav=document.querySelector('nav');
            if(nav.classList.contains('active')){
                 nav.classList.remove('active');
         
            }else{
                 nav.classList.add('active');
         
            }
               document.querySelector('nav > .child .body').style.marginTop=(document.querySelector('nav > .child .header').getBoundingClientRect().height) + 'px';
            document.querySelector('nav > .child .body').style.height=Math.abs(window.innerHeight - (document.querySelector('nav > .child .header').getBoundingClientRect().height + document.querySelector('nav > .child .footer').getBoundingClientRect().height)) + 'px';
    
    }
    function ToggleHeaderLinks(element){
        let header_links=document.querySelector('.header-links');
        if(header_links.classList.contains('active')){
            header_links.classList.remove('active');
        }else{
            header_links.classList.add('active');
        }

    }
    function Redirect(url){
        // window.location.href=url;
        // Vitecss.navigate(url)
        Vitecss.navigate(url)
    }
   
  </script>
    <style>
      body{
        overflow-x: hidden;
      }
        header{
            position:fixed !important;
            top:0;
            left:0;
            right:0;
            z-index:1000;
            background:transparent;
             background:var(--bg-light);
            border-bottom:1px solid var(--rgt-005);
            display:flex;
            flex-direction:row;
            align-items:center;
            justify-content:space-between;
            padding:20px;
            position: relative;
            user-select:none;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(50px);
            box-shadow:0 0 10px var(--primary-01)

        }
        /* menu icon */
        .menu-icon{
            height:40px;
            width:40px;
            border-radius:50%;
            background:var(--primary);
            color:var(--primary-text);
            display:flex;
            flex-direction: column;
            align-items:center;
            justify-content:center;
           
           
        }
        nav{
            position:fixed;
            top:0;
            left:0;
            right:0;
            bottom:0;
            z-index:1000;
            background:rgb(0,0,0,0.4);
            display:flex;
            flex-direction:row;
            gap:10px;
            user-select: none;
            /* backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px); */
        }
        nav > .child{
            background:var(--bg-light);
            width:70%;
            height:100%;
            border-right:1px solid var(--primary);
            position:relative;
            /* font-weight:600; */

        }
        nav > .child .header{
            background:inherit;
            border-bottom:1px solid var(--primary);
            display:flex;
            flex-direction:row;
            align-items:center;
            gap:10px;
            padding:20px;
            position:absolute;
            top:0;
            z-index:500;
            width:100%;
            background:var(--primary);
            color:var(--primary-text);
           
        }
         nav > .child .footer{
            background:inherit;
            display:flex;
            flex-direction:row;
            align-items:center;
            gap:10px;
            padding:20px;
            position:absolute;
            bottom:0;
            left:0;
            right:0;
            z-index:500;
            margin-top:auto;
           
        }
        nav > .child .body{
            padding:10px;
            display:flex;
            flex-direction:column;
            gap:5px;
            width:100%;
            overflow: auto;
        }
        nav > .child .body .link{
            padding:10px;
            cursor:pointer;
            user-select:none;
            border-radius:0;
            transition: all 0.2s ease;
            font-weight:400;
        }
        nav > .child .body .link:not(.expandible-nav .link):hover,nav > .child .body .link.active{
           
            background:var(--rgt-005);
            border:1px solid var(--rgt-01);
         

        }
        .header-links{
            position:absolute;
            right:10px;
            background:var(--bg-light);
            
            z-index:2000;
            border-radius:10px;
            display:flex;
            flex-direction: column;
          
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            max-width:50%;
            visibility: hidden;
            opacity:0;
            transform: scale(0);
            transition: all 0.5s ease;
            transform-origin:top right;
            backdrop-filter: inherit;
            -webkit-backdrop-filter: inherit;
            user-select: none;
            -webkit-user-select: none;
          
        }
        .header-links.active{
            visibility:visible;
            transform:scale(1);
            opacity:1;
        }
        .header-links > div{
            border-bottom:1px solid var(--rgt-01);
            padding:10px 20px !important;
        }
        .header-links > div:last-of-type{
            border-bottom:none;
            color:orangered;
        }
        main{
            padding-bottom:40px;
        }
       
      
        main{
            overflow-x: hidden;
        }
         .populate{
            position:fixed;
            inset: 0;
            background:rgba(0,0,0,0.5);
            z-index:4000;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter:blur(10px);
            display:flex;
            flex-direction:column;
            gap:10px;
            padding:20px;
            align-items:center;
            justify-content:center;
            visibility: hidden;
        
        }
        .populate .child{
            background:black;
            border:1px solid var(--primary);
            padding:20px;
            width:80%;
            color:white;
            border-radius:5px;
            display:flex;
            flex-direction:column;
            gap:10px;
            text-align:center;
            color:var(--primary-light);
            transform:translateY(30px);
            opacity:0;
            transition:all 1s ease;
            max-width:500px;

            

        }
        .populate.active{
            visibility: visible;
        }
        .populate.active .child{
            opacity:1;
            transform:translateY(0);
        }
        body:has(.populate.active){
            overflow:hidden;
        }
        .expandible-nav{
            display:flex;
            flex-direction: column;
         
        }
        .expandible-links{
            display:flex;
            flex-direction:column;
            margin-left:20px;
            border:1px solid var(--rgt-01);
            background:var(--rgt-005);
           display:none;
            overflow:hidden;
            /* border:none; */
        }
        .expandible-nav.active .expandible-links{
            display:flex;

        }
        .expandible-link{
            padding:15px 10px;
         

        }
        .expandible-link:first-of-type{
            padding-top:20px;
           

        }
         .expandible-link:last-of-type{
            padding-bottom:20px;
           

        }
        .expandible-link:not(.expandible-link:last-of-type):hover{
            /* background:var(--rgt-005); */
            border-bottom:1px solid var(--rgt-01)
        }
        .expandible-link:last-of-type:hover{
             border-top:1px solid var(--rgt-01)
        }
        .expandible-nav .caret-right{
            transition:all 0.5s ease;
        }
        .expandible-nav.active .caret-right{
            transform: rotate(90deg);
        }
        .page-title,.title{
            font-size:2rem;
            font-family:var(--design-font);
            color:var(--primary-dark);
          
        }
        form{
            display:flex;
            flex-direction: column;
            align-items:center;
        }
        form .page-title,.title{
            text-align:center;
        }
      .form-icon{
        height:70px;
        width:70px;
        border-radius:50%;
        background:var(--primary-01);
        color:var(--primary);
        display:flex;
        flex-direction: column;
        align-items:center;
        justify-content:center;
      }
      .form-icon svg{
        height:40px;
        width:40px;
      }
        /* media query for mobile devices */
        @media(max-width:800px){
           nav{
        transform:translateX(-100%);
          transition:all 0.5s ease;
          
           }
           nav.active{
          transform:translateX(0)
           }
           nav .child{
          
           
           }
           nav.active .child{
           transform: translateX(0)
           
           }
          
           
            body:has(nav.active){
                overflow:hidden;
            }
        }
        
        /* media query for pc */
        @media(min-width:800px){
            nav{
                width:30%;
            }
            nav > .child{
                width:100% !important;
                
            }
            main{
                width:70%;
                margin-left:30%;
            }
           
        }
    </style>

{{-- yield css --}}
     @yield('css')
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
    <header>

     {{-- logo and menu icon --}}
     <div class="row align-center g-10">
        {{-- menu icon --}}
           <div onclick="ToggleNav(this)" class="menu-icon">
 <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M3 4H21V6H3V4ZM3 11H15V13H3V11ZM3 18H21V20H3V18Z"></path></svg>
           </div>
        {{-- logo --}}
        <img onclick="window.location.href='{{ url('/') }}'" src="{{ asset(config('settings.logo')) }}" alt="Site Logo" class="h-40">
   
     </div>

     {{-- user icon --}}
   <div class="pc-pointer" onclick="ToggleHeaderLinks(this)">
     @isset(Auth::guard('users')->user()->photo)
           <img src="{{ asset('photos/users/'.Auth::guard('users')->user()->photo.'') }}" alt="" style="border:1px solid var(--primary)" class="w-40 h-40 circle">
               @else
                <div class="w-40 h-40 min-h-40 min-w-40 perfect-square no-shrink circle bg-primary column align-center justify-center primary-text">
    {{ $initials }}
            </div>
     @endisset
               
   </div>

    {{-- header links --}}
     <div class="header-links">
       
        {{-- head --}}
        <div  class="w-full p-10 row g-5">
             @isset(Auth::guard('users')->user()->photo)
           <img src="{{ asset('photos/users/'.Auth::guard('users')->user()->photo.'') }}" alt="" style="border:1px solid var(--primary)" class="w-40 no-shrink h-40 circle">
               @else
                <div class="w-40 h-40 min-h-40 min-w-40 perfect-square no-shrink circle bg-primary column align-center justify-center primary-text">
    {{ $initials }}
            </div>
     @endisset
            <div class="column g-5">
                <strong style="max-width:25vw;" class="ws-nowrap text-overflow-ellipsis">{{ Auth::guard('users')->user()->name }}</strong>
                <div>{{ Auth::guard('users')->user()->username }}</div>
            </div>
        </div>
        {{-- new header link --}}
        <div onclick="Redirect('{{ url('users/profile/settings') }}')" class="row p-10 w-full g-10 align-center">
            <span>

                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M4 22C4 17.5817 7.58172 14 12 14C16.4183 14 20 17.5817 20 22H4ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13Z"></path></svg>

            </span>
            <span>View Profile</span>
        </div>
        {{-- new header link --}}
        <div onclick="Redirect('{{ url('users/payout/settings') }}')" class="row p-10 w-full g-10 align-center">
            <span>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M2 20H22V22H2V20ZM4 12H6V19H4V12ZM9 12H11V19H9V12ZM13 12H15V19H13V12ZM18 12H20V19H18V12ZM2 7L12 2L22 7V11H2V7ZM12 8C12.5523 8 13 7.55228 13 7C13 6.44772 12.5523 6 12 6C11.4477 6 11 6.44772 11 7C11 7.55228 11.4477 8 12 8Z"></path></svg>

            </span>
            <span>Payout Settings</span>
        </div>
        {{-- new header link --}}
        <div onclick="Redirect('{{ url('users/social/settings') }}')" class="row p-10 w-full g-10 align-center">
            <span>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M18.5753 13.7114C19.0742 13.7114 19.4733 13.2873 19.4733 12.8134C19.4733 12.3145 19.0742 11.9155 18.5753 11.9155C18.0765 11.9155 17.6774 12.3145 17.6774 12.8134C17.6774 13.3123 18.0765 13.7114 18.5753 13.7114ZM14.1497 13.7114C14.6485 13.7114 15.0476 13.2873 15.0476 12.8134C15.0476 12.3145 14.6485 11.9155 14.1497 11.9155C13.6508 11.9155 13.2517 12.3145 13.2517 12.8134C13.2517 13.3123 13.6508 13.7114 14.1497 13.7114ZM20.717 18.7516C20.5942 18.8253 20.5205 18.9482 20.5451 19.1202C20.5451 19.1693 20.5451 19.2185 20.5696 19.2676C20.6679 19.6854 20.8643 20.349 20.8643 20.3736C20.8643 20.4473 20.8889 20.4964 20.8889 20.5456C20.8889 20.6685 20.7907 20.7668 20.6679 20.7668C20.6187 20.7668 20.5942 20.7422 20.5451 20.7176L19.0961 19.882C18.9978 19.8329 18.875 19.7837 18.7522 19.7837C18.6786 19.7837 18.6049 19.7837 18.5558 19.8083C17.8681 20.0049 17.1559 20.1032 16.3946 20.1032C12.7352 20.1032 9.78815 17.6456 9.78815 14.5983C9.78815 11.5509 12.7352 9.09329 16.3946 9.09329C20.0539 9.09329 23.001 11.5509 23.001 14.5983C23.001 16.2448 22.1168 17.7439 20.717 18.7516ZM16.6737 8.09757C16.581 8.09473 16.488 8.09329 16.3946 8.09329C12.2199 8.09329 8.78815 10.9536 8.78815 14.5983C8.78815 15.1519 8.86733 15.6874 9.01626 16.1975H8.92711C8.04096 16.1975 7.15481 16.0503 6.3425 15.8296C6.26866 15.805 6.19481 15.805 6.12097 15.805C5.97327 15.805 5.82558 15.8541 5.7025 15.9277L3.95482 16.9334C3.90559 16.958 3.85635 16.9825 3.80712 16.9825C3.65943 16.9825 3.53636 16.8599 3.53636 16.7127C3.53636 16.6391 3.56097 16.59 3.58559 16.5164C3.6102 16.4919 3.83174 15.6824 3.95482 15.1918C3.95482 15.1427 3.97943 15.0691 3.97943 15.0201C3.97943 14.8238 3.88097 14.6766 3.75789 14.5785C2.05944 13.3765 1.00098 11.5858 1.00098 9.59876C1.00098 5.94369 4.5702 3 8.95173 3C12.7157 3 15.8802 5.16856 16.6737 8.09757ZM11.5199 8.51604C12.0927 8.51604 12.5462 8.03871 12.5462 7.4898C12.5462 6.91701 12.0927 6.46356 11.5199 6.46356C10.9471 6.46356 10.4937 6.91701 10.4937 7.4898C10.4937 8.06258 10.9471 8.51604 11.5199 8.51604ZM6.26045 8.51604C6.83324 8.51604 7.28669 8.03871 7.28669 7.4898C7.28669 6.91701 6.83324 6.46356 6.26045 6.46356C5.68767 6.46356 5.23421 6.91701 5.23421 7.4898C5.23421 8.06258 5.68767 8.51604 6.26045 8.51604Z"></path></svg>

            </span>
            <span>Social Settings</span>
        </div>
        
         {{-- new header link --}}
          @if (Auth::guard('users')->user('upgrade') == 'no')
        <div onclick="Redirect('{{ url('users/upgrade/account') }}')" class="row p-10 w-full g-10 align-center">
            <span>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 2C17.52 2 22 6.48 22 12C22 17.52 17.52 22 12 22C6.48 22 2 17.52 2 12C2 6.48 6.48 2 12 2ZM13 12H16L12 8L8 12H11V16H13V12Z"></path></svg>

            </span>
            <span>Upgrade Account</span>
        </div>
        @endif
         {{-- new header link --}}
        <div onclick="Redirect('{{ url('users/security/settings') }}')" class="row p-10 w-full g-10 align-center">
            <span>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M19 10H20C20.5523 10 21 10.4477 21 11V21C21 21.5523 20.5523 22 20 22H4C3.44772 22 3 21.5523 3 21V11C3 10.4477 3.44772 10 4 10H5V9C5 5.13401 8.13401 2 12 2C15.866 2 19 5.13401 19 9V10ZM17 10V9C17 6.23858 14.7614 4 12 4C9.23858 4 7 6.23858 7 9V10H17ZM11 14V18H13V14H11Z"></path></svg>
           </span>
            <span>Security Settings</span>
        </div>
         {{-- new header link --}}
        <div class="row p-10 w-full g-10 align-center">
            <span>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M21 8C22.1046 8 23 8.89543 23 10V14C23 15.1046 22.1046 16 21 16H19.9381C19.446 19.9463 16.0796 23 12 23V21C15.3137 21 18 18.3137 18 15V9C18 5.68629 15.3137 3 12 3C8.68629 3 6 5.68629 6 9V16H3C1.89543 16 1 15.1046 1 14V10C1 8.89543 1.89543 8 3 8H4.06189C4.55399 4.05369 7.92038 1 12 1C16.0796 1 19.446 4.05369 19.9381 8H21ZM7.75944 15.7849L8.81958 14.0887C9.74161 14.6662 10.8318 15 12 15C13.1682 15 14.2584 14.6662 15.1804 14.0887L16.2406 15.7849C15.0112 16.5549 13.5576 17 12 17C10.4424 17 8.98882 16.5549 7.75944 15.7849Z"></path></svg>

            </span>
            <span>Customer Support</span>
        </div>
         {{-- new header link --}}
        <div onclick="window.location.href='{{ url('users/logout') }}'" class="row p-10 w-full g-10 align-center">
            <span>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M124,216a12,12,0,0,1-12,12H48a12,12,0,0,1-12-12V40A12,12,0,0,1,48,28h64a12,12,0,0,1,0,24H60V204h52A12,12,0,0,1,124,216Zm108.49-96.49-40-40a12,12,0,0,0-17,17L195,116H112a12,12,0,0,0,0,24h83l-19.52,19.51a12,12,0,0,0,17,17l40-40A12,12,0,0,0,232.49,119.51Z"></path></svg>

            </span>
            <span>Logout</span>
        </div>
     </div>
    </header>
    {{-- nav --}}
    <nav onclick="ToggleNav(this)">
        {{-- nav child --}}
<div onclick="event.stopPropagation()" class="child">
    {{-- nav child header --}}
<div class="header">
<div class="w-full row g-10">
    {{-- user photo --}}
   @isset(Auth::guard('users')->user()->photo)
        <img src="{{ asset('photos/users/'.Auth::guard('users')->user()->photo.'') }}" alt="" class=" no-pointer circle h-50 w-50 no-shrink perfect-square">

   @else 
<div style="background: var(--primary-text);color:var(--primary)" class="h-50 w-50 column align-center justify-center circle no-shrink perfect-square">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="30" width="30"><path d="M20 22H4V20C4 17.2386 6.23858 15 9 15H15C17.7614 15 20 17.2386 20 20V22ZM12 13C8.68629 13 6 10.3137 6 7C6 3.68629 8.68629 1 12 1C15.3137 1 18 3.68629 18 7C18 10.3137 15.3137 13 12 13Z"></path></svg>

</div>
   @endisset
   {{-- username --}}
   <div class="column g-5">
    <strong class="font-1 capitalize">{{ Auth::guard('users')->user()->username }}</strong>
    <span class="opacity-07">{{ Auth::guard('users')->user()->package }}</span>
   </div>
   {{-- go --}}
   <div onclick="Redirect('{{ url('users/profile/settings') }}')" class="row m-left-auto">
    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z"></path></svg>

   </div>
</div>
</div>
{{-- nav child body --}}
<div class="body overflow-auto">
{{-- new link --}}
<div onclick="Redirect('{{ url('users/dashboard') }}')" class="row link w-full align-center g-10">
    <span>
      <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M19 21H5C4.44772 21 4 20.5523 4 20V11L1 11L11.3273 1.6115C11.7087 1.26475 12.2913 1.26475 12.6727 1.6115L23 11L20 11V20C20 20.5523 19.5523 21 19 21ZM6 19H18V9.15745L12 3.7029L6 9.15745V19ZM8 15H16V17H8V15Z"></path></svg>

    </span>
    <span>Dashboard</span>
</div>
{{-- new link --}}
<div onclick="Redirect('{{ url('users/transactions') }}')" class="row link w-full align-center g-10">
    <span>
        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M11 4H21V6H11V4ZM11 8H17V10H11V8ZM11 14H21V16H11V14ZM11 18H17V20H11V18ZM3 4H9V10H3V4ZM5 6V8H7V6H5ZM3 14H9V20H3V14ZM5 16V18H7V16H5Z"></path></svg>

    </span>
    <span>Transaction History</span>
</div>

{{-- new link --}}
<div onclick="Redirect('{{ url('users/tasks') }}')" class="row link w-full align-center g-10">
    <span>
   <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M8.00008 6V9H5.00008V6H8.00008ZM3.00008 4V11H10.0001V4H3.00008ZM13.0001 4H21.0001V6H13.0001V4ZM13.0001 11H21.0001V13H13.0001V11ZM13.0001 18H21.0001V20H13.0001V18ZM10.7072 16.2071L9.29297 14.7929L6.00008 18.0858L4.20718 16.2929L2.79297 17.7071L6.00008 20.9142L10.7072 16.2071Z"></path></svg>
    </span>
    <span>Daily Tasks</span>
</div>

{{-- new link --}}
<div onclick="Redirect('{{ url('users/gift/code') }}')" class="row link w-full align-center g-10">
    <span>
  <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M2.00488 3.99979C2.00488 3.4475 2.4526 2.99979 3.00488 2.99979H21.0049C21.5572 2.99979 22.0049 3.4475 22.0049 3.99979V9.49979C20.6242 9.49979 19.5049 10.6191 19.5049 11.9998C19.5049 13.3805 20.6242 14.4998 22.0049 14.4998V19.9998C22.0049 20.5521 21.5572 20.9998 21.0049 20.9998H3.00488C2.4526 20.9998 2.00488 20.5521 2.00488 19.9998V3.99979ZM8.09024 18.9998C8.29615 18.4172 8.85177 17.9998 9.50488 17.9998C10.158 17.9998 10.7136 18.4172 10.9195 18.9998H20.0049V16.032C18.5232 15.2957 17.5049 13.7666 17.5049 11.9998C17.5049 10.2329 18.5232 8.7039 20.0049 7.96755V4.99979H10.9195C10.7136 5.58238 10.158 5.99979 9.50488 5.99979C8.85177 5.99979 8.29615 5.58238 8.09024 4.99979H4.00488V18.9998H8.09024ZM9.50488 10.9998C8.67646 10.9998 8.00488 10.3282 8.00488 9.49979C8.00488 8.67136 8.67646 7.99979 9.50488 7.99979C10.3333 7.99979 11.0049 8.67136 11.0049 9.49979C11.0049 10.3282 10.3333 10.9998 9.50488 10.9998ZM9.50488 15.9998C8.67646 15.9998 8.00488 15.3282 8.00488 14.4998C8.00488 13.6714 8.67646 12.9998 9.50488 12.9998C10.3333 12.9998 11.0049 13.6714 11.0049 14.4998C11.0049 15.3282 10.3333 15.9998 9.50488 15.9998Z"></path></svg>

    </span>
    <span>Gift Code</span>
</div>
{{-- expandible nav --}}
<div onclick="this.classList.toggle('active')" class="expandible-nav">
    <div class="row space-between link w-full align-center g-10">
    <span>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M7 2H18C18.5523 2 19 2.44772 19 3V21C19 21.5523 18.5523 22 18 22H6C5.44772 22 5 21.5523 5 21V0H7V2ZM7 9H17V4H7V9ZM7 11V20H17V11H7Z"></path></svg>

    </span>
    <span class="row m-right-auto">VTU Hub</span>
    {{-- caret right --}}
    <svg class="caret-right" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z"></path></svg>

</div>
{{-- expandible links --}}
<div onclick="event.stopPropagation()" class="expandible-links">
    {{-- new link --}}
    <div onclick="Redirect('{{ url('users/airtime/topup') }}')" class="expandible-link">
        &bull; Airtime Topup
    </div>
    {{-- new link --}}
     <div onclick="Redirect('{{ url('users/data/topup') }}')" class="expandible-link">
        &bull; Data Topup
    </div>
</div>
</div>
{{-- new link --}}
<div onclick="Redirect('{{ url('users/daily/spin') }}')" class="row link w-full align-center g-10">
    <span>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20ZM12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12C15 13.6569 13.6569 15 12 15Z"></path></svg>
   </span>
    <span>Daily Spin</span>
</div>

{{-- expandible nav --}}
<div onclick="this.classList.toggle('active')" class="expandible-nav">
    <div class="row space-between link w-full align-center g-10">
    <span>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M4.00436 6.41686L0.761719 3.17422L2.17593 1.76001L5.41857 5.00265H20.6603C21.2126 5.00265 21.6603 5.45037 21.6603 6.00265C21.6603 6.09997 21.6461 6.19678 21.6182 6.29L19.2182 14.29C19.0913 14.713 18.7019 15.0027 18.2603 15.0027H6.00436V17.0027H17.0044V19.0027H5.00436C4.45207 19.0027 4.00436 18.5549 4.00436 18.0027V6.41686ZM6.00436 7.00265V13.0027H17.5163L19.3163 7.00265H6.00436ZM5.50436 23.0027C4.67593 23.0027 4.00436 22.3311 4.00436 21.5027C4.00436 20.6742 4.67593 20.0027 5.50436 20.0027C6.33279 20.0027 7.00436 20.6742 7.00436 21.5027C7.00436 22.3311 6.33279 23.0027 5.50436 23.0027ZM17.5044 23.0027C16.6759 23.0027 16.0044 22.3311 16.0044 21.5027C16.0044 20.6742 16.6759 20.0027 17.5044 20.0027C18.3328 20.0027 19.0044 20.6742 19.0044 21.5027C19.0044 22.3311 18.3328 23.0027 17.5044 23.0027Z"></path></svg>
  
</span>
    <span class="row m-right-auto">Marketplace</span>
    {{-- caret right --}}
    <svg class="caret-right" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z"></path></svg>

</div>
{{-- expandible links --}}
<div onclick="event.stopPropagation()" class="expandible-links">
    {{-- new link --}}
    <div onclick="Redirect('{{ url('users/marketplace') }}')" class="expandible-link">
        &bull; All Products
    </div>
    {{-- new link --}}
     <div onclick="Redirect('{{ url('users/marketplace/shopping/history') }}')" class="expandible-link">
        &bull; My Shopping History
    </div>
</div>
</div>

{{-- new link --}}
<div onclick="Redirect('{{ url('users/referrals') }}')" class="row link w-full align-center g-10">
    <span>
   <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M2 22C2 17.5817 5.58172 14 10 14C14.4183 14 18 17.5817 18 22H16C16 18.6863 13.3137 16 10 16C6.68629 16 4 18.6863 4 22H2ZM10 13C6.685 13 4 10.315 4 7C4 3.685 6.685 1 10 1C13.315 1 16 3.685 16 7C16 10.315 13.315 13 10 13ZM10 11C12.21 11 14 9.21 14 7C14 4.79 12.21 3 10 3C7.79 3 6 4.79 6 7C6 9.21 7.79 11 10 11ZM18.2837 14.7028C21.0644 15.9561 23 18.752 23 22H21C21 19.564 19.5483 17.4671 17.4628 16.5271L18.2837 14.7028ZM17.5962 3.41321C19.5944 4.23703 21 6.20361 21 8.5C21 11.3702 18.8042 13.7252 16 13.9776V11.9646C17.6967 11.7222 19 10.264 19 8.5C19 7.11935 18.2016 5.92603 17.041 5.35635L17.5962 3.41321Z"></path></svg>

    </span>
    <span>My Referrals</span>
</div>

{{-- new link --}}
<div onclick="Redirect('{{ url('users/withdraw') }}')" class="row link w-full align-center g-10">
    <span>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M3.00488 2.99979H21.0049C21.5572 2.99979 22.0049 3.4475 22.0049 3.99979V19.9998C22.0049 20.5521 21.5572 20.9998 21.0049 20.9998H3.00488C2.4526 20.9998 2.00488 20.5521 2.00488 19.9998V3.99979C2.00488 3.4475 2.4526 2.99979 3.00488 2.99979ZM20.0049 11.9998H4.00488V18.9998H20.0049V11.9998ZM20.0049 7.99979V4.99979H4.00488V7.99979H20.0049Z"></path></svg>

    </span>
    <span>Withdraw</span>
</div>
{{-- new link --}}
<div onclick="Redirect('{{ url('users/recharge') }}')" class="row link w-full align-center g-10">
    <span>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M3.00488 3.00275H21.0049C21.5572 3.00275 22.0049 3.45046 22.0049 4.00275V20.0027C22.0049 20.555 21.5572 21.0027 21.0049 21.0027H3.00488C2.4526 21.0027 2.00488 20.555 2.00488 20.0027V4.00275C2.00488 3.45046 2.4526 3.00275 3.00488 3.00275ZM4.00488 5.00275V19.0027H20.0049V5.00275H4.00488ZM8.50488 14.0027H14.0049C14.281 14.0027 14.5049 13.7789 14.5049 13.5027C14.5049 13.2266 14.281 13.0027 14.0049 13.0027H10.0049C8.62417 13.0027 7.50488 11.8835 7.50488 10.5027C7.50488 9.12203 8.62417 8.00275 10.0049 8.00275H11.0049V6.00275H13.0049V8.00275H15.5049V10.0027H10.0049C9.72874 10.0027 9.50488 10.2266 9.50488 10.5027C9.50488 10.7789 9.72874 11.0027 10.0049 11.0027H14.0049C15.3856 11.0027 16.5049 12.122 16.5049 13.5027C16.5049 14.8835 15.3856 16.0027 14.0049 16.0027H13.0049V18.0027H11.0049V16.0027H8.50488V14.0027Z"></path></svg>
   </span>
    <span>Recharge</span>
</div>



{{-- expandible nav --}}
<div onclick="this.classList.toggle('active')" class="expandible-nav">
    <div class="row space-between link w-full align-center g-10">
    <span>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M2.21232 14.0601C1.91928 12.6755 1.93115 11.2743 2.21316 9.94038C3.32308 10.0711 4.29187 9.7035 4.60865 8.93871C4.92544 8.17392 4.50032 7.22896 3.62307 6.53655C4.3669 5.3939 5.34931 4.39471 6.53554 3.62289C7.228 4.50059 8.17324 4.92601 8.93822 4.60914C9.7032 4.29227 10.0708 3.32308 9.93979 2.21281C11.3243 1.91977 12.7255 1.93164 14.0595 2.21364C13.9288 3.32356 14.2964 4.29235 15.0612 4.60914C15.8259 4.92593 16.7709 4.5008 17.4633 3.62356C18.606 4.36739 19.6052 5.3498 20.377 6.53602C19.4993 7.22849 19.0739 8.17373 19.3907 8.93871C19.7076 9.70369 20.6768 10.0713 21.7871 9.94028C22.0801 11.3248 22.0682 12.726 21.7862 14.06C20.6763 13.9293 19.7075 14.2969 19.3907 15.0616C19.0739 15.8264 19.4991 16.7714 20.3763 17.4638C19.6325 18.6064 18.6501 19.6056 17.4638 20.3775C16.7714 19.4998 15.8261 19.0743 15.0612 19.3912C14.2962 19.7081 13.9286 20.6773 14.0596 21.7875C12.675 22.0806 11.2738 22.0687 9.93989 21.7867C10.0706 20.6768 9.70301 19.708 8.93822 19.3912C8.17343 19.0744 7.22848 19.4995 6.53606 20.3768C5.39341 19.633 4.39422 18.6506 3.62241 17.4643C4.5001 16.7719 4.92552 15.8266 4.60865 15.0616C4.29179 14.2967 3.32259 13.9291 2.21232 14.0601ZM3.99975 12.2104C5.09956 12.5148 6.00718 13.2117 6.45641 14.2963C6.90564 15.3808 6.75667 16.5154 6.19421 17.5083C6.29077 17.61 6.38998 17.7092 6.49173 17.8056C7.4846 17.2432 8.61912 17.0943 9.70359 17.5435C10.7881 17.9927 11.485 18.9002 11.7894 19.9999C11.9295 20.0037 12.0697 20.0038 12.2099 20.0001C12.5143 18.9003 13.2112 17.9927 14.2958 17.5435C15.3803 17.0942 16.5149 17.2432 17.5078 17.8057C17.6096 17.7091 17.7087 17.6099 17.8051 17.5081C17.2427 16.5153 17.0938 15.3807 17.543 14.2963C17.9922 13.2118 18.8997 12.5149 19.9994 12.2105C20.0032 12.0704 20.0033 11.9301 19.9996 11.7899C18.8998 11.4856 17.9922 10.7886 17.543 9.70407C17.0937 8.61953 17.2427 7.48494 17.8052 6.49204C17.7086 6.39031 17.6094 6.2912 17.5076 6.19479C16.5148 6.75717 15.3803 6.9061 14.2958 6.4569C13.2113 6.0077 12.5144 5.10016 12.21 4.00044C12.0699 3.99666 11.9297 3.99659 11.7894 4.00024C11.4851 5.10005 10.7881 6.00767 9.70359 6.4569C8.61904 6.90613 7.48446 6.75715 6.49155 6.1947C6.38982 6.29126 6.29071 6.39047 6.19431 6.49222C6.75668 7.48509 6.90561 8.61961 6.45641 9.70407C6.00721 10.7885 5.09967 11.4855 3.99995 11.7899C3.99617 11.93 3.9961 12.0702 3.99975 12.2104ZM11.9997 15.0002C10.3428 15.0002 8.99969 13.657 8.99969 12.0002C8.99969 10.3433 10.3428 9.00018 11.9997 9.00018C13.6565 9.00018 14.9997 10.3433 14.9997 12.0002C14.9997 13.657 13.6565 15.0002 11.9997 15.0002ZM11.9997 13.0002C12.552 13.0002 12.9997 12.5525 12.9997 12.0002C12.9997 11.4479 12.552 11.0002 11.9997 11.0002C11.4474 11.0002 10.9997 11.4479 10.9997 12.0002C10.9997 12.5525 11.4474 13.0002 11.9997 13.0002Z"></path></svg>

</span>
    <span class="row m-right-auto">Settings</span>
    {{-- caret right --}}
    <svg class="caret-right" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z"></path></svg>

</div>
{{-- expandible links --}}
<div onclick="event.stopPropagation()" class="expandible-links">
    {{-- new link --}}
    <div onclick="Redirect('{{ url('users/payout/settings') }}')" class="expandible-link">
        &bull; Payout Settings
    </div>
    {{-- new link --}}
     <div onclick="Redirect('{{ url('users/profile/settings') }}')" class="expandible-link">
        &bull; Profile Settings
    </div>
    {{-- new link --}}
     <div onclick="Redirect('{{ url('users/security/settings') }}')" class="expandible-link">
        &bull; Security Settings
    </div>
     {{-- new link --}}
     <div onclick="Redirect('{{ url('users/social/settings') }}')" class="expandible-link">
        &bull; Social Settings
    </div>
</div>
</div>


{{-- new link --}}
<div onclick="window.location.href='{{ url('users/logout') }}'" style="color:red;" class="row m-top-auto link w-full align-center g-10">
    <span>
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C15.2713 2 18.1757 3.57078 20.0002 5.99923L17.2909 5.99931C15.8807 4.75499 14.0285 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20C14.029 20 15.8816 19.2446 17.2919 17.9998L20.0009 17.9998C18.1765 20.4288 15.2717 22 12 22ZM19 16V13H11V11H19V8L24 12L19 16Z"></path></svg>
  </span>
    <span>Logout</span>
</div>




</div>

</div>
    </nav>
    <main>
        {{-- yield main --}}
        @yield('main')
    </main>
   
 
  {{-- yield js --}}
    @yield('js')
</body>
</html>