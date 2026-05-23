@extends('layout.users.app')
@section('title')
    Dashboard
@endsection
@section('css')
    <style class="css">
        
        .balance-div{
          position:relative;
          background:radial-gradient(circle at 0% 0%,hsl(var(--primary-hsl),50%,30%) ,var(--primary));
          background: var(--primary);
          border-radius:10px;
          overflow:hidden;
          color:var(--primary-text);
        
          /* box-shadow: 0 0 10px rgba(0,0,0,0.1) */

        }
        .balance-div > div.before{
            
            position:absolute;
            z-index:100;
            height:90%;
            aspect-ratio:1;
            background:transparent;
            border-radius:50%;
            top:0;
            right:0;
            --transform: translate(40%,-40%);
            border:1px dashed var(--primary-text);
            animation:rotate 10s linear infinite;
            display:flex;
            flex-direction: column;
            align-items: center;
            justify-content:center;
            
        }
        .balance-div > div.before:before{
            content:'';
            height:50%;
            width:50%;
            background:transparent;
            border:1px solid var(--primary-text);
            border-radius:50%;
            opacity:0.5;

        }
        .balance-div > div.after{
            
            position:absolute;
            z-index:100;
            height:70%;
            aspect-ratio:1;
            background:transparent;
            border-radius:50%;
            bottom:0;
            left:0;
            --transform: translate(-40%,40%);
            border:1px dashed var(--primary-text);
            animation:rotate 10s linear infinite;
            display:flex;
            flex-direction: column;
            align-items: center;
            justify-content:center;
            opacity:0.6;
            
        }
        .balance-div > div.after:before{
            content:'';
            height:50%;
            width:50%;
            background:transparent;
            border:1px solid var(--primary-text);
            border-radius:50%;
            opacity:0.5;

        }
        @keyframes rotate{
            0%{
                 transform: var(--transform) rotate(0deg)
            }
            100%{
                transform: var(--transform) rotate(360deg)
            }
        }
        .balance-div > div:not(div.before,div.after){
            width: 100%;
            display:flex;
            flex-direction: column;
            padding:20px;
            gap:10px;
            position: relative;
            z-index: 400;
        }
        .balance-div .withdraw-btn{
            padding:5px 20px;
            border-radius: 1000px;
            font-weight:900;
            background:rgba(255,255,255,0.3);
            border:1px solid white;
            backdrop-filter:blur(10px);
            -webkit-backdrop-filter: blur(10px);

        }
        div.go{
            height:30px;
            width:30px;
            flex-shrink:0;
            border-radius:50%;
            background:var(--rgt-005);
            display:flex;
            flex-direction: column;
            align-items:center;
            justify-content: center;
            box-shadow: inset 0 2px 5px var(--rgt-01);
            color:var(--rgt-05);
        }
        .communities{
            width:100%;
            border-radius:var(--br-primary);
            background: var(--primary);
            color:var(--primary-text);
            position: relative;
        }
        .communities::before{
            content:'';
            position:absolute;
            top:0;
            right:0;
            background:var(--primary-text);
            opacity:0.1;
            height:70%;
            aspect-ratio:1;
            border-radius:50%;
            transform: translateX(20%) translateY(-20%);
            
        }
        .communities::after{
            content:'';
            position:absolute;
            bottom:0;
            left:0;
            background:var(--primary-text);
            opacity:0.1;
            height:50%;
            aspect-ratio:1;
            border-radius:50%;
            transform: translateX(-20%) translateY(20%);
            
        }
        .communities > div{
            padding: 20px;
            display:flex;
            flex-direction: column;
            gap:10px;
            position:relative;
            z-index:100;

        }
        .post.join-telegram{
            background:linear-gradient(to right,rgb(2, 84, 117),rgb(0, 183, 255));
        }
        .ad-title.active span{
            animation: scroll 5s linear infinite;
        }
        @keyframes scroll{
            0%{
                transform:translateX(100%)
            }
            100%{
                transform:translateX(-250%)
            }
        }

          .support-icon{
        position:fixed;
        bottom:20px;
        right:20px;
        background:#4caf50;
        color:white;
        border-radius:50%;
        z-index:1000;
        height:60px;
        width:60px;
        display:flex;
        align-items:center;
        justify-content:center;
        box-shadow: 0 0 10px rgba(0,0,0,0.5);
        cursor:pointer;
    }
        
    </style>
@endsection
@section('main')
<section onclick="window.open('{{ $social_settings->support_link ?? '' }}')" class="support-icon">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="30" width="30"><path d="M12.001 2C17.5238 2 22.001 6.47715 22.001 12C22.001 17.5228 17.5238 22 12.001 22C10.1671 22 8.44851 21.5064 6.97086 20.6447L2.00516 22L3.35712 17.0315C2.49494 15.5536 2.00098 13.8345 2.00098 12C2.00098 6.47715 6.47813 2 12.001 2ZM8.59339 7.30019L8.39232 7.30833C8.26293 7.31742 8.13607 7.34902 8.02057 7.40811C7.93392 7.45244 7.85348 7.51651 7.72709 7.63586C7.60774 7.74855 7.53857 7.84697 7.46569 7.94186C7.09599 8.4232 6.89729 9.01405 6.90098 9.62098C6.90299 10.1116 7.03043 10.5884 7.23169 11.0336C7.63982 11.9364 8.31288 12.8908 9.20194 13.7759C9.4155 13.9885 9.62473 14.2034 9.85034 14.402C10.9538 15.3736 12.2688 16.0742 13.6907 16.4482C13.6907 16.4482 14.2507 16.5342 14.2589 16.5347C14.4444 16.5447 14.6296 16.5313 14.8153 16.5218C15.1066 16.5068 15.391 16.428 15.6484 16.2909C15.8139 16.2028 15.8922 16.159 16.0311 16.0714C16.0311 16.0714 16.0737 16.0426 16.1559 15.9814C16.2909 15.8808 16.3743 15.81 16.4866 15.6934C16.5694 15.6074 16.6406 15.5058 16.6956 15.3913C16.7738 15.2281 16.8525 14.9166 16.8838 14.6579C16.9077 14.4603 16.9005 14.3523 16.8979 14.2854C16.8936 14.1778 16.8047 14.0671 16.7073 14.0201L16.1258 13.7587C16.1258 13.7587 15.2563 13.3803 14.7245 13.1377C14.6691 13.1124 14.6085 13.1007 14.5476 13.097C14.4142 13.0888 14.2647 13.1236 14.1696 13.2238C14.1646 13.2218 14.0984 13.279 13.3749 14.1555C13.335 14.2032 13.2415 14.3069 13.0798 14.2972C13.0554 14.2955 13.0311 14.292 13.0074 14.2858C12.9419 14.2685 12.8781 14.2457 12.8157 14.2193C12.692 14.1668 12.6486 14.1469 12.5641 14.1105C11.9868 13.8583 11.457 13.5209 10.9887 13.108C10.8631 12.9974 10.7463 12.8783 10.6259 12.7616C10.2057 12.3543 9.86169 11.9211 9.60577 11.4938C9.5918 11.4705 9.57027 11.4368 9.54708 11.3991C9.50521 11.331 9.45903 11.25 9.44455 11.1944C9.40738 11.0473 9.50599 10.9291 9.50599 10.9291C9.50599 10.9291 9.74939 10.663 9.86248 10.5183C9.97128 10.379 10.0652 10.2428 10.125 10.1457C10.2428 9.95633 10.2801 9.76062 10.2182 9.60963C9.93764 8.92565 9.64818 8.24536 9.34986 7.56894C9.29098 7.43545 9.11585 7.33846 8.95659 7.32007C8.90265 7.31384 8.84875 7.30758 8.79459 7.30402C8.66053 7.29748 8.5262 7.29892 8.39232 7.30833L8.59339 7.30019Z"></path></svg>

</section>

<section onclick="this.classList.remove('active')" class="populate active">
<div onclick="event.stopPropagation()" class="child align-center text-center">
    <div class="h-70 w-70 no-shrink circle column align-center justify-center g-10 c-black" style="background:var(--primary-light)">
        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="40" width="40"><path d="M20.0049 13.0028V20.0028C20.0049 20.5551 19.5572 21.0028 19.0049 21.0028H5.00488C4.4526 21.0028 4.00488 20.5551 4.00488 20.0028V13.0028H20.0049ZM14.5049 2.00281C16.4379 2.00281 18.0049 3.56981 18.0049 5.50281C18.0049 6.04001 17.8839 6.54895 17.6676 7.00385L21.0049 7.00281C21.5572 7.00281 22.0049 7.45052 22.0049 8.00281V11.0028C22.0049 11.5551 21.5572 12.0028 21.0049 12.0028H3.00488C2.4526 12.0028 2.00488 11.5551 2.00488 11.0028V8.00281C2.00488 7.45052 2.4526 7.00281 3.00488 7.00281L6.34219 7.00385C6.12591 6.54895 6.00488 6.04001 6.00488 5.50281C6.00488 3.56981 7.57189 2.00281 9.50488 2.00281C10.4849 2.00281 11.3708 2.40557 12.0061 3.05459C12.639 2.40557 13.5249 2.00281 14.5049 2.00281ZM9.50488 4.00281C8.67646 4.00281 8.00488 4.67438 8.00488 5.50281C8.00488 6.2825 8.59977 6.92326 9.36042 6.99594L9.50488 7.00281H11.0049V5.50281C11.0049 4.72311 10.41 4.08236 9.64934 4.00967L9.50488 4.00281ZM14.5049 4.00281L14.3604 4.00967C13.6473 4.07782 13.0799 4.64524 13.0117 5.35835L13.0049 5.50281V7.00281H14.5049L14.6493 6.99594C15.41 6.92326 16.0049 6.2825 16.0049 5.50281C16.0049 4.72311 15.41 4.08236 14.6493 4.00967L14.5049 4.00281Z"></path></svg>

    </div>
    <div style="border-top:1px dashed var(--primary-07);border-bottom:1px dashed var(--primary-07)" class="w-full p-5 column g-10">
        {!! nl2br($social_settings->site_notification) !!}

    </div>
    <span class="font-size-07 opacity-07">💛💛{{ config('app.name') }} | Earn daily💛💛</span>
    <div class="column g-5 w-full">
         <button onclick="window.open('{{ $social_settings->telegram_community ?? '' }}')" class="post join-telegram" style="margin-top:0px !important;">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M17.0943 7.14643C17.6874 6.93123 17.9818 6.85378 18.1449 6.82608C18.1461 6.87823 18.1449 6.92051 18.1422 6.94825C17.9096 9.39217 16.8906 15.4048 16.3672 18.2026C16.2447 18.8578 16.1507 19.1697 15.5179 18.798C15.1014 18.5532 14.7245 18.2452 14.3207 17.9805C12.9961 17.1121 11.1 15.8189 11.2557 15.8967C9.95162 15.0373 10.4975 14.5111 11.2255 13.8093C11.3434 13.6957 11.466 13.5775 11.5863 13.4525C11.64 13.3967 11.9027 13.1524 12.2731 12.8081C13.4612 11.7035 15.7571 9.56903 15.8151 9.32202C15.8246 9.2815 15.8334 9.13045 15.7436 9.05068C15.6539 8.97092 15.5215 8.9982 15.4259 9.01989C15.2904 9.05064 13.1326 10.4769 8.95243 13.2986C8.33994 13.7192 7.78517 13.9242 7.28811 13.9134L7.29256 13.9156C6.63781 13.6847 5.9849 13.4859 5.32855 13.286C4.89736 13.1546 4.46469 13.0228 4.02904 12.8812C3.92249 12.8466 3.81853 12.8137 3.72083 12.783C8.24781 10.8109 11.263 9.51243 12.7739 8.884C14.9684 7.97124 16.2701 7.44551 17.0943 7.14643ZM19.5169 5.21806C19.2635 5.01244 18.985 4.91807 18.7915 4.87185C18.5917 4.82412 18.4018 4.80876 18.2578 4.8113C17.7814 4.81969 17.2697 4.95518 16.4121 5.26637C15.5373 5.58382 14.193 6.12763 12.0058 7.03736C10.4638 7.67874 7.39388 9.00115 2.80365 11.001C2.40046 11.1622 2.03086 11.3451 1.73884 11.5619C1.46919 11.7622 1.09173 12.1205 1.02268 12.6714C0.970519 13.0874 1.09182 13.4714 1.33782 13.7738C1.55198 14.037 1.82635 14.1969 2.03529 14.2981C2.34545 14.4483 2.76276 14.5791 3.12952 14.6941C3.70264 14.8737 4.27444 15.0572 4.84879 15.233C6.62691 15.7773 8.09066 16.2253 9.7012 17.2866C10.8825 18.0651 12.041 18.8775 13.2243 19.6531C13.6559 19.936 14.0593 20.2607 14.5049 20.5224C14.9916 20.8084 15.6104 21.0692 16.3636 20.9998C17.5019 20.8951 18.0941 19.8479 18.3331 18.5703C18.8552 15.7796 19.8909 9.68351 20.1332 7.13774C20.1648 6.80544 20.1278 6.433 20.097 6.25318C20.0653 6.068 19.9684 5.58448 19.5169 5.21806Z"></path></svg>

            Join Telegram
        </button>

    <button onclick="window.open('{{ $social_settings->whatsapp_community ?? '' }}')" class="post" style="margin-top:0px !important;">
       <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M7.25361 18.4944L7.97834 18.917C9.18909 19.623 10.5651 20 12.001 20C16.4193 20 20.001 16.4183 20.001 12C20.001 7.58172 16.4193 4 12.001 4C7.5827 4 4.00098 7.58172 4.00098 12C4.00098 13.4363 4.37821 14.8128 5.08466 16.0238L5.50704 16.7478L4.85355 19.1494L7.25361 18.4944ZM2.00516 22L3.35712 17.0315C2.49494 15.5536 2.00098 13.8345 2.00098 12C2.00098 6.47715 6.47813 2 12.001 2C17.5238 2 22.001 6.47715 22.001 12C22.001 17.5228 17.5238 22 12.001 22C10.1671 22 8.44851 21.5064 6.97086 20.6447L2.00516 22ZM8.39232 7.30833C8.5262 7.29892 8.66053 7.29748 8.79459 7.30402C8.84875 7.30758 8.90265 7.31384 8.95659 7.32007C9.11585 7.33846 9.29098 7.43545 9.34986 7.56894C9.64818 8.24536 9.93764 8.92565 10.2182 9.60963C10.2801 9.76062 10.2428 9.95633 10.125 10.1457C10.0652 10.2428 9.97128 10.379 9.86248 10.5183C9.74939 10.663 9.50599 10.9291 9.50599 10.9291C9.50599 10.9291 9.40738 11.0473 9.44455 11.1944C9.45903 11.25 9.50521 11.331 9.54708 11.3991C9.57027 11.4368 9.5918 11.4705 9.60577 11.4938C9.86169 11.9211 10.2057 12.3543 10.6259 12.7616C10.7463 12.8783 10.8631 12.9974 10.9887 13.108C11.457 13.5209 11.9868 13.8583 12.559 14.1082L12.5641 14.1105C12.6486 14.1469 12.692 14.1668 12.8157 14.2193C12.8781 14.2457 12.9419 14.2685 13.0074 14.2858C13.0311 14.292 13.0554 14.2955 13.0798 14.2972C13.2415 14.3069 13.335 14.2032 13.3749 14.1555C14.0984 13.279 14.1646 13.2218 14.1696 13.2222V13.2238C14.2647 13.1236 14.4142 13.0888 14.5476 13.097C14.6085 13.1007 14.6691 13.1124 14.7245 13.1377C15.2563 13.3803 16.1258 13.7587 16.1258 13.7587L16.7073 14.0201C16.8047 14.0671 16.8936 14.1778 16.8979 14.2854C16.9005 14.3523 16.9077 14.4603 16.8838 14.6579C16.8525 14.9166 16.7738 15.2281 16.6956 15.3913C16.6406 15.5058 16.5694 15.6074 16.4866 15.6934C16.3743 15.81 16.2909 15.8808 16.1559 15.9814C16.0737 16.0426 16.0311 16.0714 16.0311 16.0714C15.8922 16.159 15.8139 16.2028 15.6484 16.2909C15.391 16.428 15.1066 16.5068 14.8153 16.5218C14.6296 16.5313 14.4444 16.5447 14.2589 16.5347C14.2507 16.5342 13.6907 16.4482 13.6907 16.4482C12.2688 16.0742 10.9538 15.3736 9.85034 14.402C9.62473 14.2034 9.4155 13.9885 9.20194 13.7759C8.31288 12.8908 7.63982 11.9364 7.23169 11.0336C7.03043 10.5884 6.90299 10.1116 6.90098 9.62098C6.89729 9.01405 7.09599 8.4232 7.46569 7.94186C7.53857 7.84697 7.60774 7.74855 7.72709 7.63586C7.85348 7.51651 7.93392 7.45244 8.02057 7.40811C8.13607 7.34902 8.26293 7.31742 8.39232 7.30833Z"></path></svg>

        Join Whatsapp
    </button>

    </div>
</div>
</section>
<section class="column w-full g-10">
    {{-- balance div --}}
    <div class="balance-div">
        <div class="before">

        </div>
         <div class="after">

        </div>
        {{-- balance div body --}}
        <div>
            {{-- new row --}}
            <div style="border-bottom:1px solid var(--primary-text-01);padding-bottom:20px;" class="row w-full space-between align-center g-10">
                <div class="column g-10">
                    <span>Earning Balance</span>
                    <strong style="font-size:2.5rem;" class="font-weight-900">
                        {{ $currency }} <span style="font-family:var(--design-font)">{{ number_format(Auth::guard('users')->user()->main_balance,2) }}</span>
                    </strong>
                </div>
                {{-- withdraw btn --}}
                <div onclick="Redirect('{{ url('users/withdraw') }}')" class="withdraw-btn">Withdraw</div>
            </div>
            {{-- new row --}}
            <div class="row w-full g-10 space-between">
                {{-- total earned --}}
                <div class="column g-5">
                    <span>Deposit balance</span>
                    <strong class="desc font-weight-900">{{ $currency }}{{ number_format(Auth::guard('users')->user()->deposit_balance,2) }}</strong>
                </div>
                  {{-- total withdrawn --}}
                <div style="text-align: end" class="column g-5">
                    <span>Affiliate balance</span>
                    <strong class="desc font-weight-900">{{ $currency }}{{ number_format(Auth::guard('users')->user()->affiliate_balance,2) }}</strong>
                </div>
            </div>
        </div>
       
    </div>
   

    {{-- analytics --}}
    <div class="w-full grid grid-2 pc-grid-4 place-center g-10">
        {{-- new analytic --}}
        <div  style="border:1px solid var(--rgt-01)" class="w-full bg-light br-10 p-10 space-between row align-center g-10">
           {{-- new column --}}
            <div class="column g-5">
                <small class="opacity-07">Total Referrals</small>
                <strong class="font-1">{{ number_format($total_downlines) }}</strong>
            </div>
            {{-- icon --}}
            <div style="background:rgba(255, 69, 0,0.1);color:orangered" class="p-10 h-fit perfect-square br-10">
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 11C14.7614 11 17 13.2386 17 16V22H15V16C15 14.4023 13.7511 13.0963 12.1763 13.0051L12 13C10.4023 13 9.09634 14.2489 9.00509 15.8237L9 16V22H7V16C7 13.2386 9.23858 11 12 11ZM5.5 14C5.77885 14 6.05009 14.0326 6.3101 14.0942C6.14202 14.594 6.03873 15.122 6.00896 15.6693L6 16L6.0007 16.0856C5.88757 16.0456 5.76821 16.0187 5.64446 16.0069L5.5 16C4.7203 16 4.07955 16.5949 4.00687 17.3555L4 17.5V22H2V17.5C2 15.567 3.567 14 5.5 14ZM18.5 14C20.433 14 22 15.567 22 17.5V22H20V17.5C20 16.7203 19.4051 16.0796 18.6445 16.0069L18.5 16C18.3248 16 18.1566 16.03 18.0003 16.0852L18 16C18 15.3343 17.8916 14.694 17.6915 14.0956C17.9499 14.0326 18.2211 14 18.5 14ZM5.5 8C6.88071 8 8 9.11929 8 10.5C8 11.8807 6.88071 13 5.5 13C4.11929 13 3 11.8807 3 10.5C3 9.11929 4.11929 8 5.5 8ZM18.5 8C19.8807 8 21 9.11929 21 10.5C21 11.8807 19.8807 13 18.5 13C17.1193 13 16 11.8807 16 10.5C16 9.11929 17.1193 8 18.5 8ZM5.5 10C5.22386 10 5 10.2239 5 10.5C5 10.7761 5.22386 11 5.5 11C5.77614 11 6 10.7761 6 10.5C6 10.2239 5.77614 10 5.5 10ZM18.5 10C18.2239 10 18 10.2239 18 10.5C18 10.7761 18.2239 11 18.5 11C18.7761 11 19 10.7761 19 10.5C19 10.2239 18.7761 10 18.5 10ZM12 2C14.2091 2 16 3.79086 16 6C16 8.20914 14.2091 10 12 10C9.79086 10 8 8.20914 8 6C8 3.79086 9.79086 2 12 2ZM12 4C10.8954 4 10 4.89543 10 6C10 7.10457 10.8954 8 12 8C13.1046 8 14 7.10457 14 6C14 4.89543 13.1046 4 12 4Z"></path></svg>

            </div>
        </div>
         {{-- new analytic --}}
        <div  style="border:1px solid var(--rgt-01)" class="w-full bg-light br-10 p-10 space-between row align-center g-10">
           {{-- new column --}}
            <div class="column g-5">
                <small class="opacity-07">Referral Earnings</small>
                <strong class="font-1">{{ $currency.number_format($referral_earnings) }}</strong>
            </div>
            {{-- icon --}}
            <div style="background:rgba(0, 255, 0,0.1);color:#4caf50;" class="p-10 h-fit perfect-square br-10">
             <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M16 16C17.6569 16 19 17.3431 19 19C19 20.6569 17.6569 22 16 22C14.3431 22 13 20.6569 13 19C13 17.3431 14.3431 16 16 16ZM6 12C8.20914 12 10 13.7909 10 16C10 18.2091 8.20914 20 6 20C3.79086 20 2 18.2091 2 16C2 13.7909 3.79086 12 6 12ZM16 18C15.4477 18 15 18.4477 15 19C15 19.5523 15.4477 20 16 20C16.5523 20 17 19.5523 17 19C17 18.4477 16.5523 18 16 18ZM6 14C4.89543 14 4 14.8954 4 16C4 17.1046 4.89543 18 6 18C7.10457 18 8 17.1046 8 16C8 14.8954 7.10457 14 6 14ZM14.5 2C17.5376 2 20 4.46243 20 7.5C20 10.5376 17.5376 13 14.5 13C11.4624 13 9 10.5376 9 7.5C9 4.46243 11.4624 2 14.5 2ZM14.5 4C12.567 4 11 5.567 11 7.5C11 9.433 12.567 11 14.5 11C16.433 11 18 9.433 18 7.5C18 5.567 16.433 4 14.5 4Z"></path></svg>

            </div>
        </div>
         {{-- new analytic --}}
        <div  style="border:1px solid var(--rgt-01)" class="w-full bg-light br-10 p-10 space-between row align-center g-10">
           {{-- new column --}}
            <div class="column g-5">
                <small class="opacity-07">Total Withdrawn</small>
                <strong class="font-1">{{ $currency.number_format($total_withdrawn) }}</strong>
            </div>
            {{-- icon --}}
            <div style="background:rgba(0, 225, 255, 0.1);color:rgb(4, 153, 252);" class="p-10 h-fit perfect-square br-10">
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M9 2.4578V4.58152C6.06817 5.76829 4 8.64262 4 12C4 16.4183 7.58172 20 12 20C15.3574 20 18.2317 17.9318 19.4185 15H21.5422C20.2679 19.0571 16.4776 22 12 22C6.47715 22 2 17.5228 2 12C2 7.52236 4.94289 3.73207 9 2.4578ZM12 2C17.5228 2 22 6.47715 22 12C22 12.3375 21.9833 12.6711 21.9506 13H11V2.04938C11.3289 2.01672 11.6625 2 12 2ZM13 4.06189V11H19.9381C19.4869 7.38128 16.6187 4.51314 13 4.06189Z"></path></svg>

            </div>
        </div>
          {{-- new analytic --}}
        <div  style="border:1px solid var(--rgt-01)" class="w-full bg-light br-10 p-10 space-between row align-center g-10">
           {{-- new column --}}
            <div class="column g-5">
                <small class="opacity-07">Cumulative Earnings</small>
                <strong class="font-1">{{ $currency.number_format($total_earned) }}</strong>
            </div>
            {{-- icon --}}
            <div style="background:rgba(255, 0, 179, 0.1);color:rgb(252, 4, 157);" class="p-10 h-fit perfect-square br-10">
           <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M2 13H8V21H2V13ZM9 3H15V21H9V3ZM16 8H22V21H16V8Z"></path></svg>

            </div>
        </div>
    </div>
    <strong class="title block m-right-auto " style="font-size:1.5rem;">Quick Links</strong>
    {{-- new item --}}
    <div style="grid-template-columns: repeat(auto-fit,minmax(150px,1fr))" class="w-full grid g-10 place-center">
        {{-- new --}}
        <div onclick="window.open('{{ $social_settings->advert->telegram }}')" style="border:1px solid var(--rgt-01)" class="w-full bg-light p-10 br-10 no-select pointer row space-between align-center g-10">
           {{-- new column --}}
            <div style="max-width:calc(100% - 60px)" class="column g-5">
                <small class="opacity-07">Click to Place Advert</small>
              <div class="font-weight-600 font-1 ws-nowrap overflow-hidden ad-title"><span class="row">Telegram</span></div>
            </div>
            {{-- new block --}}
            <div style="background:rgb(0, 116, 170,0.2);color:rgb(0, 116, 170)" class="h-40 w-40 br-10 column align-center justify-center no-shrink">
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M2.14753 11.8099C7.3949 9.52374 10.894 8.01654 12.6447 7.28833C17.6435 5.20916 18.6822 4.84799 19.3592 4.83606C19.5081 4.83344 19.8411 4.87034 20.0567 5.04534C20.2388 5.1931 20.2889 5.39271 20.3129 5.5328C20.3369 5.6729 20.3667 5.99204 20.343 6.2414C20.0721 9.08763 18.9 15.9947 18.3037 19.1825C18.0514 20.5314 17.5546 20.9836 17.0736 21.0279C16.0283 21.1241 15.2345 20.3371 14.2221 19.6735C12.6379 18.635 11.7429 17.9885 10.2051 16.9751C8.42795 15.804 9.58001 15.1603 10.5928 14.1084C10.8579 13.8331 15.4635 9.64397 15.5526 9.26395C15.5637 9.21642 15.5741 9.03926 15.4688 8.94571C15.3636 8.85216 15.2083 8.88415 15.0962 8.9096C14.9373 8.94566 12.4064 10.6184 7.50365 13.928C6.78528 14.4212 6.13461 14.6616 5.55163 14.649C4.90893 14.6351 3.67265 14.2856 2.7536 13.9869C1.62635 13.6204 0.730432 13.4267 0.808447 12.8044C0.849081 12.4803 1.29544 12.1488 2.14753 11.8099Z"></path></svg>

            </div>
        </div>
          {{-- new --}}
        <div  onclick="window.open('{{ $social_settings->advert->whatsapp }}')" style="border:1px solid var(--rgt-01)" class="w-full bg-light p-10 br-10 no-select pointer row space-between align-center g-10">
           {{-- new column --}}
            <div style="max-width:calc(100% - 60px)" class="column g-5">
                <small class="opacity-07">Click to Place Advert</small>
            <div class="font-weight-600 font-1 ws-nowrap overflow-hidden ad-title"><span class="row">Whatsapp</span></div>
            </div>
            {{-- new block --}}
            <div style="background:rgb(0, 255, 0,0.2);color:rgb(1, 179, 1)" class="h-40 w-40 br-10 column align-center justify-center no-shrink">
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12.001 2C17.5238 2 22.001 6.47715 22.001 12C22.001 17.5228 17.5238 22 12.001 22C10.1671 22 8.44851 21.5064 6.97086 20.6447L2.00516 22L3.35712 17.0315C2.49494 15.5536 2.00098 13.8345 2.00098 12C2.00098 6.47715 6.47813 2 12.001 2ZM8.59339 7.30019L8.39232 7.30833C8.26293 7.31742 8.13607 7.34902 8.02057 7.40811C7.93392 7.45244 7.85348 7.51651 7.72709 7.63586C7.60774 7.74855 7.53857 7.84697 7.46569 7.94186C7.09599 8.4232 6.89729 9.01405 6.90098 9.62098C6.90299 10.1116 7.03043 10.5884 7.23169 11.0336C7.63982 11.9364 8.31288 12.8908 9.20194 13.7759C9.4155 13.9885 9.62473 14.2034 9.85034 14.402C10.9538 15.3736 12.2688 16.0742 13.6907 16.4482C13.6907 16.4482 14.2507 16.5342 14.2589 16.5347C14.4444 16.5447 14.6296 16.5313 14.8153 16.5218C15.1066 16.5068 15.391 16.428 15.6484 16.2909C15.8139 16.2028 15.8922 16.159 16.0311 16.0714C16.0311 16.0714 16.0737 16.0426 16.1559 15.9814C16.2909 15.8808 16.3743 15.81 16.4866 15.6934C16.5694 15.6074 16.6406 15.5058 16.6956 15.3913C16.7738 15.2281 16.8525 14.9166 16.8838 14.6579C16.9077 14.4603 16.9005 14.3523 16.8979 14.2854C16.8936 14.1778 16.8047 14.0671 16.7073 14.0201L16.1258 13.7587C16.1258 13.7587 15.2563 13.3803 14.7245 13.1377C14.6691 13.1124 14.6085 13.1007 14.5476 13.097C14.4142 13.0888 14.2647 13.1236 14.1696 13.2238C14.1646 13.2218 14.0984 13.279 13.3749 14.1555C13.335 14.2032 13.2415 14.3069 13.0798 14.2972C13.0554 14.2955 13.0311 14.292 13.0074 14.2858C12.9419 14.2685 12.8781 14.2457 12.8157 14.2193C12.692 14.1668 12.6486 14.1469 12.5641 14.1105C11.9868 13.8583 11.457 13.5209 10.9887 13.108C10.8631 12.9974 10.7463 12.8783 10.6259 12.7616C10.2057 12.3543 9.86169 11.9211 9.60577 11.4938C9.5918 11.4705 9.57027 11.4368 9.54708 11.3991C9.50521 11.331 9.45903 11.25 9.44455 11.1944C9.40738 11.0473 9.50599 10.9291 9.50599 10.9291C9.50599 10.9291 9.74939 10.663 9.86248 10.5183C9.97128 10.379 10.0652 10.2428 10.125 10.1457C10.2428 9.95633 10.2801 9.76062 10.2182 9.60963C9.93764 8.92565 9.64818 8.24536 9.34986 7.56894C9.29098 7.43545 9.11585 7.33846 8.95659 7.32007C8.90265 7.31384 8.84875 7.30758 8.79459 7.30402C8.66053 7.29748 8.5262 7.29892 8.39232 7.30833L8.59339 7.30019Z"></path></svg>

            </div>
        </div>
      
    </div>
    {{-- quick links --}}
    <div style="box-shadow: 0 0 10px rgba(0,0,0,0.1)" class="w-full bg-light p-10 br-10 grid grid-4 place-center g-10">
        {{-- new --}}
        <div onclick="Redirect('{{ url('users/tasks') }}')" class="column align-center g-5">
            <div style="background:linear-gradient(to bottom right,var(--primary),var(--primary-dark));color:var(--primary-text)" class="w-fit column align-center justify-center h-50 w-50 no-shrink br-10 p-10">
              <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="25" width="25"><path d="M5.37833 4.51335C7.14264 2.95113 9.46301 2.00275 12.0049 2.00275C17.5277 2.00275 22.0049 6.4799 22.0049 12.0027C22.0049 14.1277 21.3421 16.0978 20.212 17.7177L17.5049 12.0027H20.0049C20.0049 7.58447 16.4232 4.00275 12.0049 4.00275C9.76058 4.00275 7.73213 4.92691 6.27932 6.41544L5.37833 4.51335ZM18.6314 19.4921C16.8671 21.0544 14.5468 22.0027 12.0049 22.0027C6.48204 22.0027 2.00488 17.5256 2.00488 12.0027C2.00488 9.8778 2.66767 7.90766 3.79778 6.28776L6.50488 12.0027H4.00488C4.00488 16.421 7.5866 20.0027 12.0049 20.0027C14.2492 20.0027 16.2776 19.0786 17.7304 17.59L18.6314 19.4921ZM8.50488 14.0027H14.0049C14.281 14.0027 14.5049 13.7789 14.5049 13.5027C14.5049 13.2266 14.281 13.0027 14.0049 13.0027H10.0049C8.62417 13.0027 7.50488 11.8835 7.50488 10.5027C7.50488 9.12203 8.62417 8.00275 10.0049 8.00275H11.0049V7.00275H13.0049V8.00275H15.5049V10.0027H10.0049C9.72874 10.0027 9.50488 10.2266 9.50488 10.5027C9.50488 10.7789 9.72874 11.0027 10.0049 11.0027H14.0049C15.3856 11.0027 16.5049 12.122 16.5049 13.5027C16.5049 14.8835 15.3856 16.0027 14.0049 16.0027H13.0049V17.0027H11.0049V16.0027H8.50488V14.0027Z"></path></svg>

            </div>
            <span>Daily Tasks</span>
        </div>
         {{-- new --}}
        <div onclick="Redirect('{{ url('users/gift/code') }}')" class="column align-center g-5">
            <div style="background:linear-gradient(to bottom right,var(--primary),var(--primary-dark));color:var(--primary-text)" class="w-fit column align-center justify-center h-50 w-50 no-shrink br-10 p-10">
             <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="25" width="25"><path d="M15.0049 2.00281C17.214 2.00281 19.0049 3.79367 19.0049 6.00281C19.0049 6.73184 18.8098 7.41532 18.4691 8.00392L23.0049 8.00281V10.0028H21.0049V20.0028C21.0049 20.5551 20.5572 21.0028 20.0049 21.0028H4.00488C3.4526 21.0028 3.00488 20.5551 3.00488 20.0028V10.0028H1.00488V8.00281L5.54065 8.00392C5.19992 7.41532 5.00488 6.73184 5.00488 6.00281C5.00488 3.79367 6.79574 2.00281 9.00488 2.00281C10.2001 2.00281 11.2729 2.52702 12.0058 3.35807C12.7369 2.52702 13.8097 2.00281 15.0049 2.00281ZM13.0049 10.0028H11.0049V20.0028H13.0049V10.0028ZM9.00488 4.00281C7.90031 4.00281 7.00488 4.89824 7.00488 6.00281C7.00488 7.05717 7.82076 7.92097 8.85562 7.99732L9.00488 8.00281H11.0049V6.00281C11.0049 5.00116 10.2686 4.1715 9.30766 4.02558L9.15415 4.00829L9.00488 4.00281ZM15.0049 4.00281C13.9505 4.00281 13.0867 4.81869 13.0104 5.85355L13.0049 6.00281V8.00281H15.0049C16.0592 8.00281 16.923 7.18693 16.9994 6.15207L17.0049 6.00281C17.0049 4.89824 16.1095 4.00281 15.0049 4.00281Z"></path></svg>

            </div>
            <span>Gift Code</span>
        </div>
          {{-- new --}}
        <div onclick="Redirect('{{ url('users/daily/spin') }}')" class="column align-center g-5">
            <div style="background:linear-gradient(to bottom right,var(--primary),var(--primary-dark));color:var(--primary-text)" class="w-fit column align-center justify-center h-50 w-50 no-shrink br-10 p-10">
           <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="25" width="25"><path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z"></path></svg>

            </div>
            <span>Daily Spin</span>
        </div>
         {{-- new --}}
        <div onclick="Redirect('{{ url('users/marketplace') }}')" class="column align-center g-5">
            <div style="background:linear-gradient(to bottom right,var(--primary),var(--primary-dark));color:var(--primary-text)" class="w-fit column align-center justify-center h-50 w-50 no-shrink br-10 p-10">
           <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="25" width="25"><path d="M4.00436 6.41686L0.761719 3.17422L2.17593 1.76001L5.41857 5.00265H20.6603C21.2126 5.00265 21.6603 5.45037 21.6603 6.00265C21.6603 6.09997 21.6461 6.19678 21.6182 6.29L19.2182 14.29C19.0913 14.713 18.7019 15.0027 18.2603 15.0027H6.00436V17.0027H17.0044V19.0027H5.00436C4.45207 19.0027 4.00436 18.5549 4.00436 18.0027V6.41686ZM5.50436 23.0027C4.67593 23.0027 4.00436 22.3311 4.00436 21.5027C4.00436 20.6742 4.67593 20.0027 5.50436 20.0027C6.33279 20.0027 7.00436 20.6742 7.00436 21.5027C7.00436 22.3311 6.33279 23.0027 5.50436 23.0027ZM17.5044 23.0027C16.6759 23.0027 16.0044 22.3311 16.0044 21.5027C16.0044 20.6742 16.6759 20.0027 17.5044 20.0027C18.3328 20.0027 19.0044 20.6742 19.0044 21.5027C19.0044 22.3311 18.3328 23.0027 17.5044 23.0027Z"></path></svg>

            </div>
            <span>Marketplace</span>
        </div>
    </div>
      
       {{-- refer section --}}
       <div style="border:1px solid var(--rgt-005)" class="bg-light br-10 p-20 column g-10">
       {{-- new row --}}
        <div class="row w-full g-10 align-center space-between">
            <strong style="font-family: var(--design-font);font-size:1.5rem;color:var(--primary-dark)" class="desc">Your Referral Link</strong>
            <span onclick="Redirect('{{ url('users/referrals') }}')" class="c-primary">View</span>
        </div>
        {{-- new row --}}
        <span>Invite your friends and earn commissions.</span>
        <div class="w-full row space-between align-center g-10 p-10 br-10">
           <div style="border:1px solid var(--rgt-01);" class="w-full h-40 p-10 overflow-auto br-10">
            <span class="ws-nowrap overflow-auto no-scrollbar">{{ url('users/register?ref='.Auth::guard('users')->user()->uniqid.'') }}</span>
          </div> 
            <div onclick="copy('{{ url('users/register?ref='.Auth::guard('users')->user()->uniqid.'') }}')" class="p-10 ws-nowrap pc-pointer bg-primary primary-text h-40 w-40 no-select circle">
           <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M6.9998 6V3C6.9998 2.44772 7.44752 2 7.9998 2H19.9998C20.5521 2 20.9998 2.44772 20.9998 3V17C20.9998 17.5523 20.5521 18 19.9998 18H16.9998V20.9991C16.9998 21.5519 16.5499 22 15.993 22H4.00666C3.45059 22 3 21.5554 3 20.9991L3.0026 7.00087C3.0027 6.44811 3.45264 6 4.00942 6H6.9998ZM8.9998 6H16.9998V16H18.9998V4H8.9998V6Z"></path></svg>

            </div>
        </div>
       </div>
       {{-- communities section --}}
      
   
</section>
@endsection
@section('js')
    <script class="js">
        window.addEventListener('load',()=>{
               document.querySelectorAll('.ad-title').forEach((data)=>{
                // alert(data.scrollWidth)
                if(data.scrollWidth > data.clientWidth){
                    data.classList.add('active');
                }
            })
        })
      
    </script>
@endsection
