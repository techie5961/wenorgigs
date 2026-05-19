@extends('layout.users.index')
@section('title')
    Homepage
@endsection
@section('css')
    <style class="css">
      
        .hero{
            width:100%;
            display:flex;
            flex-direction:column;
            gap:10px;
            padding-top:30px;
            align-items:center;
            justify-content: center;
            gap:10px;
            position:relative;
            text-align:center;
            font-size:0.9rem;
           
        }
        .pill{
            padding:10px 20px;
            width:fit-content;
            border-radius: 1000px;
            background:var(--primary-01);
            color:var(--primary);
            border:1px solid var(--primary);
            display:flex;
            align-items:center;
            gap:5px;
        }
        
       
        .hero-title{
            font-family: 'bebas neue';
            font-size:2.5rem;
            max-width:fit-content;
           margin:20px 0;
            text-align: center;
        }
        .action-btn{
            width:fit-content;
            padding:10px 38px;
            background:linear-gradient(to right,var(--primary),var(--primary-dark));
            color:var(--primary-text);
            display:flex;
            align-items:center;
            justify-content:center;
            gap:10px;
            border-radius:1000px;
            font-family: 'bebas neue';
            font-size:20px;
            box-shadow: 0 0 10px var(--primary-05)

        }
        .banner{
            overflow:hidden;
            border-radius:10px;

        }
        .banner img{
            width:100%;
            max-width:100%;
            transition:all 0.5s ease;
            pointer-events: none;
            border-radius:inherit;
        }
        .banner.active img{
            transform:scale(1.5);
        }
        .ticker-wrap{
          
           
            width:100%;
            padding:10px;
            white-space: nowrap;
            background:var(--primary-005);
            border-top:1px solid var(--primary-01);
            border-bottom: 1px solid var(--primary-01);
            font-family:'bebas neue';
            font-size: 1.2rem;
        }
        .ticker{
            display:flex;
            flex-direction:row;
            gap:20px;
        }
        .ticker svg{
            height:15px;
            width:15px;
            color:var(--primary);
        }
        .ticker-item{
            display:flex;
            flex-direction:row;
            gap:10px;
            align-items:center;
            opacity:0.9;
        }
        .ticker-item .name{
            color:var(--primary);
            opacity:10;
        }
        .ticker{
            animation: ticker-scroll 20s linear infinite;
        }
       @keyframes ticker-scroll {
      0% { transform: translateX(0); }
      100% { transform: translateX(-50%); }
    }
    .faq{
        width:100%;
        padding:20px;
        background: var(--bg-light);
        border:1px solid var(--rgt-005);
        box-shadow: 0 0 10px var(--rgt-001);
        border-radius:10px;
        display:flex;
        flex-direction: column;

    }
    .faq .question{
     width:100%;
     display:flex;
     flex-direction:row;
     align-items: center;
     gap:10px;
     justify-content: space-between;
     font-weight: 900;
     font-size:1.1rem;
    }
    .faq .answer{
        max-height: 0;
        overflow: hidden;
        transition: all 0.5s ease;
    }
    .faq .answer span{
       margin-top:10px;
       display: flex;
    }
    .faq.active .answer{
        max-height: 100vh;
    }
    .faq.active svg{
        transform:rotate(180deg);
    }
    .faq svg{
        transition: all 0.5s ease;
    }

    @media(min-width:800px){
        .hero{
            display:grid;
            grid-template-columns: repeat(2,1fr)
        }
        .grid{
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)) !important;
        }
        img[alt=Marketplace]{
            max-height: 200px !important;
        }
        .marketplace{
            width:calc(100% - 20vw);
            margin-right:auto;
        }
    }
        
    </style>
@endsection
@section('main')
    <section class="w-full column g-10">
        {{-- new section --}}
        <section class="hero p-20">
          <div class="column g-10 w-full align-center text-center">
              {{-- pill --}}
            <div class="pill">
           <svg fill="currentColor" height="10" width="10" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><circle cx="12" cy="12" r="0"><animate id="spinner_0Nme" begin="0;spinner_ITag.begin+0.4s" attributeName="r" calcMode="spline" dur="1.2s" values="0;11" keySplines=".52,.6,.25,.99" fill="freeze"/><animate begin="0;spinner_ITag.begin+0.4s" attributeName="opacity" calcMode="spline" dur="1.2s" values="1;0" keySplines=".52,.6,.25,.99" fill="freeze"/></circle><circle cx="12" cy="12" r="0"><animate id="spinner_f83A" begin="spinner_0Nme.begin+0.4s" attributeName="r" calcMode="spline" dur="1.2s" values="0;11" keySplines=".52,.6,.25,.99" fill="freeze"/><animate begin="spinner_0Nme.begin+0.4s" attributeName="opacity" calcMode="spline" dur="1.2s" values="1;0" keySplines=".52,.6,.25,.99" fill="freeze"/></circle><circle cx="12" cy="12" r="0"><animate id="spinner_ITag" begin="spinner_0Nme.begin+0.8s" attributeName="r" calcMode="spline" dur="1.2s" values="0;11" keySplines=".52,.6,.25,.99" fill="freeze"/><animate begin="spinner_0Nme.begin+0.8s" attributeName="opacity" calcMode="spline" dur="1.2s" values="1;0" keySplines=".52,.6,.25,.99" fill="freeze"/></circle></svg>

                 Daily Rewards · VTU Hub
            </div>
            {{-- hero title --}}
             <strong class="hero-title">
        EARN DAILY,<br>
        <span class="c-primary">SPIN & WIN.</span>
        <span class="opacity-07 font-size-2">GIFT CODES · MARKETPLACE</span>
             </strong>
             {{-- hero text --}}
              <span class="hero-sub">
        Complete daily tasks, claim gift codes, spin the wheel, trade in the marketplace, and buy cheap data & electricity. All in one super-app.
              </span>
              {{-- join btn --}}
              <div onclick="window.location.href='{{ url('register') }}'" class="action-btn">
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M4 3C3.44772 3 3 3.44772 3 4V20C3 20.5523 3.44772 21 4 21H20C20.5523 21 21 20.5523 21 20V4C21 3.44772 20.5523 3 20 3H4ZM16.0001 8V16.4142L12.5001 12.9142L8.70718 16.7071L7.29297 15.2929L11.0859 11.5L7.58586 8H16.0001Z"></path></svg>

                JOIN {{ config('app.name') }}
            </div>
            {{-- entice --}}
             <span class="cta-note">Join now and get up to <span class="c-primary font-weight-600">₦2,000 bonus + daily free spin</span></span>
        {{-- banner --}}
          </div>
        <div class="banner">
            <img style="max-width: 500px;" src="{{ asset('banners/IMG_7103.png') }}" alt="Banner">
        </div>

      
            </section>

                {{-- ticker section --}}
            <div class="ticker-wrap">
  <div class="ticker">
    <span class="ticker-item">
        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z"></path></svg>

         <span class="name">ADEKUNLE FROM LAGOS</span> won ₦5,000 via Daily Spin</span>
    <span class="ticker-item">
        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M20.0049 13.0028V20.0028C20.0049 20.5551 19.5572 21.0028 19.0049 21.0028H5.00488C4.4526 21.0028 4.00488 20.5551 4.00488 20.0028V13.0028H20.0049ZM14.5049 2.00281C16.4379 2.00281 18.0049 3.56981 18.0049 5.50281C18.0049 6.04001 17.8839 6.54895 17.6676 7.00385L21.0049 7.00281C21.5572 7.00281 22.0049 7.45052 22.0049 8.00281V11.0028C22.0049 11.5551 21.5572 12.0028 21.0049 12.0028H3.00488C2.4526 12.0028 2.00488 11.5551 2.00488 11.0028V8.00281C2.00488 7.45052 2.4526 7.00281 3.00488 7.00281L6.34219 7.00385C6.12591 6.54895 6.00488 6.04001 6.00488 5.50281C6.00488 3.56981 7.57189 2.00281 9.50488 2.00281C10.4849 2.00281 11.3708 2.40557 12.0061 3.05459C12.639 2.40557 13.5249 2.00281 14.5049 2.00281ZM9.50488 4.00281C8.67646 4.00281 8.00488 4.67438 8.00488 5.50281C8.00488 6.2825 8.59977 6.92326 9.36042 6.99594L9.50488 7.00281H11.0049V5.50281C11.0049 4.72311 10.41 4.08236 9.64934 4.00967L9.50488 4.00281ZM14.5049 4.00281L14.3604 4.00967C13.6473 4.07782 13.0799 4.64524 13.0117 5.35835L13.0049 5.50281V7.00281H14.5049L14.6493 6.99594C15.41 6.92326 16.0049 6.2825 16.0049 5.50281C16.0049 4.72311 15.41 4.08236 14.6493 4.00967L14.5049 4.00281Z"></path></svg>
        
        <span class="name">GIFT_CODE</span> “{{ GenerateID() }}” claimed by 230 users</span>
    <span class="ticker-item">
        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M21 13V20C21 20.5523 20.5523 21 20 21H4C3.44772 21 3 20.5523 3 20V13H2V11L3 6H21L22 11V13H21ZM5 13V19H19V13H5ZM6 14H14V17H6V14ZM3 3H21V5H3V3Z"></path></svg>

        <span class="name">Marketplace</span> 45 trades today</span>
    <span class="ticker-item">
        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M13 10H20L11 23V14H4L13 1V10Z"></path></svg>

        <span class="name">VTU BONUS</span> 10GB data sold 2 mins ago</span>
    <span class="ticker-item">
        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z"></path></svg>
        
        <span class="name">DAVID FROM ENUGU</span> earned ₦12,500 from tasks</span>
    <span class="ticker-item">
        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M20.0049 13.0028V20.0028C20.0049 20.5551 19.5572 21.0028 19.0049 21.0028H5.00488C4.4526 21.0028 4.00488 20.5551 4.00488 20.0028V13.0028H20.0049ZM14.5049 2.00281C16.4379 2.00281 18.0049 3.56981 18.0049 5.50281C18.0049 6.04001 17.8839 6.54895 17.6676 7.00385L21.0049 7.00281C21.5572 7.00281 22.0049 7.45052 22.0049 8.00281V11.0028C22.0049 11.5551 21.5572 12.0028 21.0049 12.0028H3.00488C2.4526 12.0028 2.00488 11.5551 2.00488 11.0028V8.00281C2.00488 7.45052 2.4526 7.00281 3.00488 7.00281L6.34219 7.00385C6.12591 6.54895 6.00488 6.04001 6.00488 5.50281C6.00488 3.56981 7.57189 2.00281 9.50488 2.00281C10.4849 2.00281 11.3708 2.40557 12.0061 3.05459C12.639 2.40557 13.5249 2.00281 14.5049 2.00281ZM9.50488 4.00281C8.67646 4.00281 8.00488 4.67438 8.00488 5.50281C8.00488 6.2825 8.59977 6.92326 9.36042 6.99594L9.50488 7.00281H11.0049V5.50281C11.0049 4.72311 10.41 4.08236 9.64934 4.00967L9.50488 4.00281ZM14.5049 4.00281L14.3604 4.00967C13.6473 4.07782 13.0799 4.64524 13.0117 5.35835L13.0049 5.50281V7.00281H14.5049L14.6493 6.99594C15.41 6.92326 16.0049 6.2825 16.0049 5.50281C16.0049 4.72311 15.41 4.08236 14.6493 4.00967L14.5049 4.00281Z"></path></svg>
        <span class="name">GIFT_CODE</span> “SPIN24” active now</span>
  </div>
</div>
          {{-- core features --}}
          <section id="features" class="w-full grid pc-grid-3 p-20 place-center g-10">
            {{-- title --}}
            <div class="column grid-full w-full g-5">
                <div class="row c-primary align-center g-10">
                    <div style="width:24px;background:var(--primary);height:2px">

                    </div>
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="15" width="15"><path d="M13 10H20L11 23V14H4L13 1V10Z"></path></svg>

                    <span>CORE FEARTURES</span>
                </div>
                <strong style="font-family: bebas neue" class="font-3">
                    Your Daily Earning Engine
                </strong>
            </div>
            {{-- card --}}
            <div style="border:1px solid var(--rgt-005);box-shadow:0 0 10px rgba(0,0,0,0.01)" class="p-20 column w-full bg-light br-20 g-10">
                {{-- new row --}}
                <span class="c-primary">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="50" width="50"><path d="M4 12C4 7.58172 7.58172 4 12 4C16.4183 4 20 7.58172 20 12C20 16.4183 16.4183 20 12 20C7.58172 20 4 16.4183 4 12ZM12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2ZM17.4571 9.45711L16.0429 8.04289L11 13.0858L8.20711 10.2929L6.79289 11.7071L11 15.9142L17.4571 9.45711Z"></path></svg>

                </span>
                {{-- new row --}}
                <strong style="font-family: bebas neue;" class="font-1-5 c-primary">DAILY TASKS</strong>
                {{-- new row --}}
                <span>
                    Complete simple tasks, earn coins & withdrawable rewards. Refreshed every 24h.
                </span>
            </div>
             {{-- card --}}
            <div style="border:1px solid var(--rgt-005);box-shadow:0 0 10px rgba(0,0,0,0.01)" class="p-20 column w-full bg-light br-20 g-10">
                {{-- new row --}}
                <span class="c-primary">
                   <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="50" width="50"><path d="M2.00488 3.99979C2.00488 3.4475 2.4526 2.99979 3.00488 2.99979H21.0049C21.5572 2.99979 22.0049 3.4475 22.0049 3.99979V9.49979C20.6242 9.49979 19.5049 10.6191 19.5049 11.9998C19.5049 13.3805 20.6242 14.4998 22.0049 14.4998V19.9998C22.0049 20.5521 21.5572 20.9998 21.0049 20.9998H3.00488C2.4526 20.9998 2.00488 20.5521 2.00488 19.9998V3.99979ZM8.09024 18.9998C8.29615 18.4172 8.85177 17.9998 9.50488 17.9998C10.158 17.9998 10.7136 18.4172 10.9195 18.9998H20.0049V16.032C18.5232 15.2957 17.5049 13.7666 17.5049 11.9998C17.5049 10.2329 18.5232 8.7039 20.0049 7.96755V4.99979H10.9195C10.7136 5.58238 10.158 5.99979 9.50488 5.99979C8.85177 5.99979 8.29615 5.58238 8.09024 4.99979H4.00488V18.9998H8.09024ZM9.50488 10.9998C8.67646 10.9998 8.00488 10.3282 8.00488 9.49979C8.00488 8.67136 8.67646 7.99979 9.50488 7.99979C10.3333 7.99979 11.0049 8.67136 11.0049 9.49979C11.0049 10.3282 10.3333 10.9998 9.50488 10.9998ZM9.50488 15.9998C8.67646 15.9998 8.00488 15.3282 8.00488 14.4998C8.00488 13.6714 8.67646 12.9998 9.50488 12.9998C10.3333 12.9998 11.0049 13.6714 11.0049 14.4998C11.0049 15.3282 10.3333 15.9998 9.50488 15.9998Z"></path></svg>

                </span>
                {{-- new row --}}
                <strong style="font-family: bebas neue;" class="font-1-5 c-primary">Gift Code</strong>
                {{-- new row --}}
                <span>
                   Redeem exclusive codes from events & social media to get instant credits.
                </span>
            </div>
             {{-- card --}}
            <div style="border:1px solid var(--rgt-005);box-shadow:0 0 10px rgba(0,0,0,0.01)" class="p-20 column w-full bg-light br-20 g-10">
                {{-- new row --}}
                <span class="c-primary">
                  <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="50" width="50"><path d="M7.99837 10.3413L7.99793 12.5352C6.80239 13.2268 5.99805 14.5195 5.99805 16C5.99805 18.2091 7.78891 20 9.99805 20C11.4786 20 12.7712 19.1957 13.4628 18.0001L15.6565 18.0004C14.8327 20.3306 12.6103 22 9.99805 22C6.68434 22 3.99805 19.3137 3.99805 16C3.99805 13.3874 5.66782 11.1649 7.99837 10.3413ZM11.998 17C10.3412 17 8.99805 15.6569 8.99805 14V10C8.99805 8.95561 9.53172 8.03587 10.3412 7.49861C9.53172 6.96413 8.99805 6.04439 8.99805 5C8.99805 3.34315 10.3412 2 11.998 2C13.6549 2 14.998 3.34315 14.998 5C14.998 6.04439 14.4644 6.96413 13.6548 7.50139C14.4644 8.03587 14.998 8.95561 14.998 10V14.999L16.4319 15C17.0803 15 17.6849 15.3141 18.0584 15.8362L18.1468 15.971L20.8555 20.4855L19.1406 21.5145L16.4319 17L14.998 16.999L11.998 17ZM11.998 9C11.4458 9 10.998 9.44772 10.998 10V14C10.998 14.5523 11.4458 15 11.998 15H12.997L12.998 10C12.998 9.44772 12.5503 9 11.998 9ZM11.998 4C11.4458 4 10.998 4.44772 10.998 5C10.998 5.55228 11.4458 6 11.998 6C12.5503 6 12.998 5.55228 12.998 5C12.998 4.44772 12.5503 4 11.998 4Z"></path></svg>

                </span>
                {{-- new row --}}
                <strong style="font-family: bebas neue;" class="font-1-5 c-primary">Daily Spin</strong>
                {{-- new row --}}
                <span>
                   Spin the wheel once a day — win cash, bonuses, or premium gift codes.
                </span>
            </div>
            {{-- card --}}
             <div style="border:1px solid var(--rgt-005);box-shadow:0 0 10px rgba(0,0,0,0.01)" class="p-20 column w-full bg-light br-20 g-10">
                {{-- new row --}}
                <span class="c-primary">
                 <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="50" width="50"><path d="M21 13V20C21 20.5523 20.5523 21 20 21H4C3.44772 21 3 20.5523 3 20V13H2V11L3 6H21L22 11V13H21ZM5 13V19H19V13H5ZM4.03961 11H19.9604L19.3604 8H4.63961L4.03961 11ZM6 14H14V17H6V14ZM3 3H21V5H3V3Z"></path></svg>

                </span>
                {{-- new row --}}
                <strong style="font-family: bebas neue;" class="font-1-5 c-primary">Marketplace</strong>
                {{-- new row --}}
                <span>
                  Buy & sell digital goods, gaming items, and gift cards with other users.
                </span>
            </div>
            {{-- card --}}
             <div style="border:1px solid var(--rgt-005);box-shadow:0 0 10px rgba(0,0,0,0.01)" class="p-20 column w-full bg-light br-20 g-10">
                {{-- new row --}}
                <span class="c-primary">
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="50" width="50"><path d="M7 4V20H17V4H7ZM6 2H18C18.5523 2 19 2.44772 19 3V21C19 21.5523 18.5523 22 18 22H6C5.44772 22 5 21.5523 5 21V3C5 2.44772 5.44772 2 6 2ZM12 17C12.5523 17 13 17.4477 13 18C13 18.5523 12.5523 19 12 19C11.4477 19 11 18.5523 11 18C11 17.4477 11.4477 17 12 17Z"></path></svg>

                </span>
                {{-- new row --}}
                <strong style="font-family: bebas neue;" class="font-1-5 c-primary">VTU Services</strong>
                {{-- new row --}}
                <span>
                  Buy airtime, data bundles, and electricity tokens instantly at best rates.
                </span>
            </div>
             {{-- card --}}
             <div style="border:1px solid var(--rgt-005);box-shadow:0 0 10px rgba(0,0,0,0.01)" class="p-20 column w-full bg-light br-20 g-10">
                {{-- new row --}}
                <span class="c-primary">
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="50" width="50"><path d="M3.00488 2.99979H21.0049C21.5572 2.99979 22.0049 3.4475 22.0049 3.99979V19.9998C22.0049 20.5521 21.5572 20.9998 21.0049 20.9998H3.00488C2.4526 20.9998 2.00488 20.5521 2.00488 19.9998V3.99979C2.00488 3.4475 2.4526 2.99979 3.00488 2.99979ZM20.0049 10.9998H4.00488V18.9998H20.0049V10.9998ZM20.0049 8.99979V4.99979H4.00488V8.99979H20.0049ZM14.0049 14.9998H18.0049V16.9998H14.0049V14.9998Z"></path></svg>

                </span>
                {{-- new row --}}
                <strong style="font-family: bebas neue;" class="font-1-5 c-primary">Instant Withdrawals</strong>
                {{-- new row --}}
                <span>
                 Withdraw your earnings directly to bank or mobile money, no delays.

                </span>
            </div>
          </section>
          {{-- analytics --}}
          <section style="border-top:1px solid var(--primary-01);border-bottom:1px solid var(--primary-01);background:var(--primary-005)" class="w-full p-20 row align-center flex-wrap justify-center g-20">
           {{-- new --}}
            <div class="column align-center">
                <strong style="font-family: bebas neue;" class="font-3 font-weight-400 c-primary">&#8358;12M+</strong>
                <span class="opacity-07">Total rewards paid</span>
            </div>
             <div class="column align-center">
                <strong style="font-family: bebas neue;" class="font-3 font-weight-400 c-primary">25k+</strong>
                <span class="opacity-07">Active Users</span>
            </div>
             <div class="column align-center">
                <strong style="font-family: bebas neue;" class="font-3 font-weight-400 c-primary">1,200+</strong>
                <span class="opacity-07">Daily spins</span>
            </div>
          </section>
          {{-- steps --}}
           <section class="w-full grid p-20 place-center g-20">
            {{-- title --}}
            <div class="column grid-full w-full g-5">
                <div class="row c-primary align-center g-10">
                    <div style="width:24px;background:var(--primary);height:2px">

                    </div>
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="15" width="15"><path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20ZM11 7H13V9H11V7ZM11 11H13V17H11V11Z"></path></svg>

                    <span>HOW WENORGIGS WORKS</span>
                </div>
                <strong style="font-family: bebas neue" class="font-3">
                  Start Earning in 3 Simple Steps
                </strong>
            </div>

           {{-- steps --}}
           <div class="column g-10">
             {{-- new row --}}
            <div class="w-full row g-10">
                <div class="p-10 h-fit br-5" style="border:1px solid var(--primary-02);background:var(--primary-005);font-family:bebas neue;font-size:1.5rem;color:var(--primary);">
                    1
                </div>
                <div class="column g-5">
                    <strong class="font-1-5" style="font-family:bebas neue">Sign up & get bonus</strong>
                    <span>Create free account & receive welcome credits + first Gift Code.</span>
                </div>
            </div>
            {{-- new row --}}
            <div class="w-full row g-10">
                <div class="p-10 h-fit br-5" style="border:1px solid var(--primary-02);background:var(--primary-005);font-family:bebas neue;font-size:1.5rem;color:var(--primary);">
                    2
                </div>
                <div class="column g-5">
                    <strong class="font-1-5" style="font-family:bebas neue">Complete daily tasks / Spin</strong>
                    <span>Earn by doing tasks, use daily spin, or redeem gift codes.</span>
                </div>
            </div>
             {{-- new row --}}
            <div class="w-full row g-10">
                <div class="p-10 h-fit br-5" style="border:1px solid var(--primary-02);background:var(--primary-005);font-family:bebas neue;font-size:1.5rem;color:var(--primary);">
                    3
                </div>
                <div class="column g-5">
                    <strong class="font-1-5" style="font-family:bebas neue">Withdraw or shop VTU / Marketplace</strong>
                    <span>Cash out earnings or spend on data, electricity, and marketplace deals.</span>
                </div>
            </div>
           </div>
           {{-- banner --}}
             <div class="banner">
                <img src="{{ asset('banners/IMG_7102.png') }}" alt="">
            </div>
           </section>
          <section class="w-full grid p-20 place-center g-10">
           
            <div style="box-shadow: 0 0 10px rgba(0,0,0,0.1)" class="bg-light marketplace br-20 w-full column">
                <div style="border-radius: 10px 10px 0 0" class="banner">
                    <img src="{{ asset('banners/IMG_7099.jpeg') }}" alt="Marketplace">
                </div>
                <div class="column p-20 g-10">
                      {{-- title --}}
            <div class="column w-full g-2">
                <div class="row c-primary align-center g-10">
                    <div style="width:24px;background:var(--primary);height:2px">

                    </div>
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="15" width="15"><path d="M19.3788 15.1057C20.9258 11.4421 19.5373 7.11431 16.0042 5.0745C13.4511 3.60046 10.4232 3.69365 8.03452 5.0556L7.04216 3.31879C10.028 1.61639 13.8128 1.4999 17.0042 3.34245C21.4949 5.93513 23.2139 11.4848 21.1217 16.112L22.4635 16.8867L18.2984 19.1008L18.1334 14.3867L19.3788 15.1057ZM4.62961 8.89968C3.08263 12.5633 4.47116 16.8911 8.00421 18.9309C10.5573 20.4049 13.5851 20.3118 15.9737 18.9499L16.9661 20.6867C13.9803 22.389 10.1956 22.5055 7.00421 20.663C2.51357 18.0703 0.794565 12.5206 2.88672 7.89342L1.54492 7.11873L5.70999 4.90463L5.87505 9.61873L4.62961 8.89968ZM8.50421 14.0027H14.0042C14.2804 14.0027 14.5042 13.7788 14.5042 13.5027C14.5042 13.2266 14.2804 13.0027 14.0042 13.0027H10.0042C8.6235 13.0027 7.50421 11.8834 7.50421 10.5027C7.50421 9.122 8.6235 8.00271 10.0042 8.00271H11.0042V7.00271H13.0042V8.00271H15.5042V10.0027H10.0042C9.72807 10.0027 9.50421 10.2266 9.50421 10.5027C9.50421 10.7788 9.72807 11.0027 10.0042 11.0027H14.0042C15.3849 11.0027 16.5042 12.122 16.5042 13.5027C16.5042 14.8834 15.3849 16.0027 14.0042 16.0027H13.0042V17.0027H11.0042V16.0027H8.50421V14.0027Z"></path></svg>

                    <span>MARKETPLACE & VTU HUB</span>
                </div>
                <strong class="font-1-5 font-weight-600">
                 Buy & sell with ease.
                </strong>
                 <strong class="font-1-5 font-weight-600 c-primary">
                 Power your everyday.
                </strong>
            </div>
            {{-- body --}}
            <span>
                Get instant data, airtime, and electricity tokens directly inside the app. List your own items in the marketplace — gift cards, accounts, digital services.
            </span>
            <div onclick="window.location.href='{{ url('register') }}'" class="action-btn">
                EXPLORE MARKETPLACE
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"></path></svg>

            </div>
                </div>
            </div>
          </section>
 {{-- exclusive perks --}}
          <section class="w-full grid p-20 place-center g-10">
            {{-- title --}}
            <div class="column grid-full w-full g-5">
                <div class="row c-primary align-center g-10">
                    <div style="width:24px;background:var(--primary);height:2px">

                    </div>
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="15" width="15"><path d="M12 6.99999C16.4183 6.99999 20 10.5817 20 15C20 19.4183 16.4183 23 12 23C7.58172 23 4 19.4183 4 15C4 10.5817 7.58172 6.99999 12 6.99999ZM12 8.99999C8.68629 8.99999 6 11.6863 6 15C6 18.3137 8.68629 21 12 21C15.3137 21 18 18.3137 18 15C18 11.6863 15.3137 8.99999 12 8.99999ZM12 10.5L13.3225 13.1797L16.2798 13.6094L14.1399 15.6953L14.645 18.6406L12 17.25L9.35497 18.6406L9.86012 15.6953L7.72025 13.6094L10.6775 13.1797L12 10.5ZM18 1.99999V4.99999L16.6366 6.13755C15.5305 5.5577 14.3025 5.17884 13.0011 5.04948L13 1.99899L18 1.99999ZM11 1.99899L10.9997 5.04939C9.6984 5.17863 8.47046 5.55735 7.36441 6.13703L6 4.99999V1.99999L11 1.99899Z"></path></svg>
                    
                    <span>EXCLUSIVE PERKS</span>
                </div>
                <strong style="font-family: bebas neue" class="font-3">
                  More reasons to join
                </strong>
            </div>

              {{-- card --}}
            <div style="border:1px solid var(--rgt-005);box-shadow:0 0 10px rgba(0,0,0,0.01)" class="p-20 column w-full bg-light br-20 g-10">
                {{-- new row --}}
                <span class="c-primary">
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="50" width="50"><path d="M15.0049 2.00281C17.214 2.00281 19.0049 3.79367 19.0049 6.00281C19.0049 6.73184 18.8098 7.41532 18.4691 8.00392L23.0049 8.00281V10.0028H21.0049V20.0028C21.0049 20.5551 20.5572 21.0028 20.0049 21.0028H4.00488C3.4526 21.0028 3.00488 20.5551 3.00488 20.0028V10.0028H1.00488V8.00281L5.54065 8.00392C5.19992 7.41532 5.00488 6.73184 5.00488 6.00281C5.00488 3.79367 6.79574 2.00281 9.00488 2.00281C10.2001 2.00281 11.2729 2.52702 12.0058 3.35807C12.7369 2.52702 13.8097 2.00281 15.0049 2.00281ZM13.0049 10.0028H11.0049V20.0028H13.0049V10.0028ZM9.00488 4.00281C7.90031 4.00281 7.00488 4.89824 7.00488 6.00281C7.00488 7.05717 7.82076 7.92097 8.85562 7.99732L9.00488 8.00281H11.0049V6.00281C11.0049 5.00116 10.2686 4.1715 9.30766 4.02558L9.15415 4.00829L9.00488 4.00281ZM15.0049 4.00281C13.9505 4.00281 13.0867 4.81869 13.0104 5.85355L13.0049 6.00281V8.00281H15.0049C16.0592 8.00281 16.923 7.18693 16.9994 6.15207L17.0049 6.00281C17.0049 4.89824 16.1095 4.00281 15.0049 4.00281Z"></path></svg>

                </span>
                {{-- new row --}}
                <strong style="font-family: bebas neue;" class="font-1-5 c-primary">Daily Gift Code Drops</strong>
                {{-- new row --}}
                <span>
                  New free codes every morning — first come first serve.
                </span>
            </div>
              {{-- card --}}
            <div style="border:1px solid var(--rgt-005);box-shadow:0 0 10px rgba(0,0,0,0.01)" class="p-20 column w-full bg-light br-20 g-10">
                {{-- new row --}}
                <span class="c-primary">
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="50" width="50"><path d="M6 4H21C21.5523 4 22 4.44772 22 5V12H20V6H6V9L1 5L6 1V4ZM18 20H3C2.44772 20 2 19.5523 2 19V12H4V18H18V15L23 19L18 23V20Z"></path></svg>

                </span>
                {{-- new row --}}
                <strong style="font-family: bebas neue;" class="font-1-5 c-primary">Spin Streak Bonus</strong>
                {{-- new row --}}
                <span>
                 Spin 7 days in a row and unlock massive multipliers.
                </span>
            </div>
              {{-- card --}}
            <div style="border:1px solid var(--rgt-005);box-shadow:0 0 10px rgba(0,0,0,0.01)" class="p-20 column w-full bg-light br-20 g-10">
                {{-- new row --}}
                <span class="c-primary">
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="50" width="50"><path d="M12 1L20.2169 2.82598C20.6745 2.92766 21 3.33347 21 3.80217V13.7889C21 15.795 19.9974 17.6684 18.3282 18.7812L12 23L5.6718 18.7812C4.00261 17.6684 3 15.795 3 13.7889V3.80217C3 3.33347 3.32553 2.92766 3.78307 2.82598L12 1ZM12 3.04879L5 4.60434V13.7889C5 15.1263 5.6684 16.3752 6.7812 17.1171L12 20.5963L17.2188 17.1171C18.3316 16.3752 19 15.1263 19 13.7889V4.60434L12 3.04879ZM16.4524 8.22183L17.8666 9.63604L11.5026 16L7.25999 11.7574L8.67421 10.3431L11.5019 13.1709L16.4524 8.22183Z"></path></svg>

                </span>
                {{-- new row --}}
                <strong style="font-family: bebas neue;" class="font-1-5 c-primary">Escrow Marketplace</strong>
                {{-- new row --}}
                <span>
                Safe peer-to-peer trades with protection for both sides.
                </span>
            </div>
              {{-- card --}}
            <div style="border:1px solid var(--rgt-005);box-shadow:0 0 10px rgba(0,0,0,0.01)" class="p-20 column w-full bg-light br-20 g-10">
                {{-- new row --}}
                <span class="c-primary">
               <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="50" width="50"><path d="M17.5049 21.0027C15.5719 21.0027 14.0049 19.4357 14.0049 17.5027C14.0049 15.5697 15.5719 14.0027 17.5049 14.0027C19.4379 14.0027 21.0049 15.5697 21.0049 17.5027C21.0049 19.4357 19.4379 21.0027 17.5049 21.0027ZM17.5049 19.0027C18.3333 19.0027 19.0049 18.3312 19.0049 17.5027C19.0049 16.6743 18.3333 16.0027 17.5049 16.0027C16.6765 16.0027 16.0049 16.6743 16.0049 17.5027C16.0049 18.3312 16.6765 19.0027 17.5049 19.0027ZM6.50488 10.0027C4.57189 10.0027 3.00488 8.43574 3.00488 6.50275C3.00488 4.56975 4.57189 3.00275 6.50488 3.00275C8.43788 3.00275 10.0049 4.56975 10.0049 6.50275C10.0049 8.43574 8.43788 10.0027 6.50488 10.0027ZM6.50488 8.00275C7.33331 8.00275 8.00488 7.33117 8.00488 6.50275C8.00488 5.67432 7.33331 5.00275 6.50488 5.00275C5.67646 5.00275 5.00488 5.67432 5.00488 6.50275C5.00488 7.33117 5.67646 8.00275 6.50488 8.00275ZM19.076 3.51747L20.4902 4.93168L4.93382 20.488L3.5196 19.0738L19.076 3.51747Z"></path></svg>

                </span>
                {{-- new row --}}
                <strong style="font-family: bebas neue;" class="font-1-5 c-primary">VTU Cashback</strong>
                {{-- new row --}}
                <span>
                Get up to 5% back on every data or electricity purchase.
                </span>
            </div>
              {{-- card --}}
            <div style="border:1px solid var(--rgt-005);box-shadow:0 0 10px rgba(0,0,0,0.01)" class="p-20 column w-full bg-light br-20 g-10">
                {{-- new row --}}
                <span class="c-primary">
              <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="50" width="50"><path d="M2.00488 19H22.0049V21H2.00488V19ZM2.00488 5L7.00488 8.5L12.0049 2L17.0049 8.5L22.0049 5V17H2.00488V5ZM4.00488 8.84131V15H20.0049V8.84131L16.5854 11.2349L12.0049 5.28024L7.42435 11.2349L4.00488 8.84131Z"></path></svg>

                </span>
                {{-- new row --}}
                <strong style="font-family: bebas neue;" class="font-1-5 c-primary">OG Badge</strong>
                {{-- new row --}}
                <span>
                First 1000 users get OG status + lifetime rewards.
                </span>
            </div>
              {{-- card --}}
            <div style="border:1px solid var(--rgt-005);box-shadow:0 0 10px rgba(0,0,0,0.01)" class="p-20 column w-full bg-light br-20 g-10">
                {{-- new row --}}
                <span class="c-primary">
             <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="50" width="50"><path d="M14 14.252V16.3414C13.3744 16.1203 12.7013 16 12 16C8.68629 16 6 18.6863 6 22H4C4 17.5817 7.58172 14 12 14C12.6906 14 13.3608 14.0875 14 14.252ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13ZM12 11C14.21 11 16 9.21 16 7C16 4.79 14.21 3 12 3C9.79 3 8 4.79 8 7C8 9.21 9.79 11 12 11ZM18 17V14H20V17H23V19H20V22H18V19H15V17H18Z"></path></svg>

                </span>
                {{-- new row --}}
                <strong style="font-family: bebas neue;" class="font-1-5 c-primary">Referral Booster</strong>
                {{-- new row --}}
                <span>
                Earn commissions when you refer your friends and families.
                </span>
            </div>
          </section>

          {{-- faqs --}}
            <section id="faqs" style="grid-template-columns:none !important;" class="w-full grid p-20 place-center g-10">
            {{-- title --}}
            <div class="column grid-full w-full g-5">
                <div class="row c-primary align-center g-10">
                    <div style="width:24px;background:var(--primary);height:2px">

                    </div>
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="15" width="15"><path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20ZM11 15H13V17H11V15ZM13 13.3551V14H11V12.5C11 11.9477 11.4477 11.5 12 11.5C12.8284 11.5 13.5 10.8284 13.5 10C13.5 9.17157 12.8284 8.5 12 8.5C11.2723 8.5 10.6656 9.01823 10.5288 9.70577L8.56731 9.31346C8.88637 7.70919 10.302 6.5 12 6.5C13.933 6.5 15.5 8.067 15.5 10C15.5 11.5855 14.4457 12.9248 13 13.3551Z"></path></svg>

                    <span>QUESTIONS</span>
                </div>
                <strong style="font-family: bebas neue" class="font-3">
                    Got questions? We've got answers.
                </strong>
            </div>
            {{-- faq --}}
            <div class="faq">
                {{-- question --}}
                <div class="question">
                    <span>What is WenorGigs?</span>
                    <svg onclick="this.closest('.faq').classList.toggle('active')" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M11.9999 13.1714L16.9497 8.22168L18.3639 9.63589L11.9999 15.9999L5.63599 9.63589L7.0502 8.22168L11.9999 13.1714Z"></path></svg>

                </div>
                {{-- answer --}}
                <div class="answer">
                    <span>
                        WenorGigs is a daily earning platform featuring tasks, spin wheel, gift codes, a marketplace, and VTU services — all built for convenience.
                    </span>
                </div>
            </div>
              {{-- faq --}}
            <div class="faq">
                {{-- question --}}
                <div class="question">
                    <span>How do I get gift codes? </span>
                    <svg onclick="this.closest('.faq').classList.toggle('active')" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M11.9999 13.1714L16.9497 8.22168L18.3639 9.63589L11.9999 15.9999L5.63599 9.63589L7.0502 8.22168L11.9999 13.1714Z"></path></svg>

                </div>
                {{-- answer --}}
                <div class="answer">
                    <span>
                      Gift codes are shared daily via our Telegram and Whatsapp. Stay active!

                    </span>
                </div>
            </div>
              {{-- faq --}}
            <div class="faq">
                {{-- question --}}
                <div class="question">
                    <span>Can I withdraw my spin winnings? </span>
                    <svg onclick="this.closest('.faq').classList.toggle('active')" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M11.9999 13.1714L16.9497 8.22168L18.3639 9.63589L11.9999 15.9999L5.63599 9.63589L7.0502 8.22168L11.9999 13.1714Z"></path></svg>

                </div>
                {{-- answer --}}
                <div class="answer">
                    <span>
                         Yes! Every coin and cash won via spin or tasks is real and withdrawable to your bank.
                    </span>
                </div>
            </div>
              {{-- faq --}}
            <div class="faq">
                {{-- question --}}
                <div class="question">
                    <span>What VTU services are offered?  </span>
                    <svg onclick="this.closest('.faq').classList.toggle('active')" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M11.9999 13.1714L16.9497 8.22168L18.3639 9.63589L11.9999 15.9999L5.63599 9.63589L7.0502 8.22168L11.9999 13.1714Z"></path></svg>

                </div>
                {{-- answer --}}
                <div class="answer">
                    <span>
                       Data plans (MTN, Glo, Airtel), airtime, and electricity tokens for all Nigerian providers.
                       </span>
                </div>
            </div>
            </section>
            {{-- limited section --}}
             <section style="border-top:1px solid var(--primary-01);border-bottom:1px solid var(--primary-01);background:var(--primary-005)" class="w-full p-20 row align-center space-between c-primary g-20">
           <span>
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 23C7.85786 23 4.5 19.6421 4.5 15.5C4.5 13.3462 5.40786 11.4045 6.86179 10.0366C8.20403 8.77375 11.5 6.49951 11 1.5C17 5.5 20 9.5 14 15.5C15 15.5 16.5 15.5 19 13.0296C19.2697 13.8032 19.5 14.6345 19.5 15.5C19.5 19.6421 16.1421 23 12 23Z"></path></svg>

           </span>
                <div>Limited offer --- Join now and get welcome bonus up to &#8358;1,000 and double rewards.</div>
           <span>
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 23C7.85786 23 4.5 19.6421 4.5 15.5C4.5 13.3462 5.40786 11.4045 6.86179 10.0366C8.20403 8.77375 11.5 6.49951 11 1.5C17 5.5 20 9.5 14 15.5C15 15.5 16.5 15.5 19 13.0296C19.2697 13.8032 19.5 14.6345 19.5 15.5C19.5 19.6421 16.1421 23 12 23Z"></path></svg>
           </span>
            </section>

            {{-- entice section --}}
             <section style="grid-template-columns:none !important;" class="w-full text-center grid p-20 place-center g-10">
            
              <strong style="font-family: bebas neue" class="font-3">
                   YOUR DAILY EARNING<span class="c-primary"> IS GUARANTEED.</span>
                </strong>
                <span>Unlock tasks, gift codes, VTU discounts, and marketplace access. Sign up now — its free.</span>
            <div onclick="window.location.href='{{ url('register') }}'" class="action-btn">
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 23C16.1421 23 19.5 19.6421 19.5 15.5C19.5 14.6345 19.2697 13.8032 19 13.0296C17.3333 14.6765 16.0667 15.5 15.2 15.5C19.1954 8.5 17 5.5 11 1.5C11.5 6.49951 8.20403 8.77375 6.86179 10.0366C5.40786 11.4045 4.5 13.3462 4.5 15.5C4.5 19.6421 7.85786 23 12 23ZM12.7094 5.23498C15.9511 7.98528 15.9666 10.1223 13.463 14.5086C12.702 15.8419 13.6648 17.5 15.2 17.5C15.8884 17.5 16.5841 17.2992 17.3189 16.9051C16.6979 19.262 14.5519 21 12 21C8.96243 21 6.5 18.5376 6.5 15.5C6.5 13.9608 7.13279 12.5276 8.23225 11.4932C8.35826 11.3747 8.99749 10.8081 9.02477 10.7836C9.44862 10.4021 9.7978 10.0663 10.1429 9.69677C11.3733 8.37932 12.2571 6.91631 12.7094 5.23498Z"></path></svg>
                GET STARTED
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"></path></svg>
            </div>
            </section>
    </section>
@endsection
@section('js')
    <script class="js">
        window.addEventListener('load',()=>{
              let banners=document.querySelectorAll('.banner');
            banners.forEach((banner)=>{
                banner.addEventListener('touchstart',()=>{
                    banner.classList.add('active');
                });
                 banner.addEventListener('touchend',()=>{
                    banner.classList.remove('active');
                });
            })
        })
    </script>
@endsection