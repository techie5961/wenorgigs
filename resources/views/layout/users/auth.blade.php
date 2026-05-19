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
{{-- include vite js --}}
@include('components.utilities',[
    'vite_js' => true
  ])
{{-- yield css --}}
     @yield('css')
    <title>{{ config('app.name') }} || Users || @yield('title') </title>
    <style>
        main{
            display:flex;
            flex-direction:column;
            align-items:center;
            justify-content:center;
            padding:20px;
            background:var(--primary-dark);
            background-image:url({{ asset('banners/fa31fdd3-721b-47a2-912d-3455594c9ff6.jpeg') }});
            background-size:cover;
            background-position:center;
        }
        form,.form{
            background:var(--bg-light);
            padding:0;
            border-radius:15px;
            display:flex;
            flex-direction: column;
            gap:10px;
            align-items:center;
            justify-content: center;
            
        }
        form input[type=checkbox],.form input[type=checkbox]{
            transform: scale(0.7)
        }
        .cont{
            border-radius:1000px;
            background:var(--primary-01);
            padding:15px;
        }
        .inp::placeholder{
            font-weight: 900;
        }
        .inp{
            font-weight: 900;
        }
        .cont:has(input:focus){
            box-shadow: 0 0 0 2px var(--primary-02)
        }
        .cont svg{
            fill: var(--primary);
        }
        button.post{
            font-family:'bebas neue' !important;
            border-radius:1000px;
            font-size:1.5rem;
        }
        .container{
            width:100%;
            display:flex;
            flex-direction:column;
            gap:10px;
            align-items:center;
            padding:20px;
            max-width: 500px;
        }
        .tab-bar{
            width:100%;
            display:grid;
            grid-template-columns: 1fr 1fr;
            place-items: center;
            
        }
        .tab{
            font-size: 1rem;
            border-bottom:1px solid var(--rgt-01);
            width:100%;
            padding:15px;
            display:flex;
            flex-direction:column;;
            align-items: center;
            position: relative;
            cursor:pointer;
            text-transform: uppercase;
            font-weight:900;
        }
        .tab.active:after{
            content: '';
            width:100%;
            bottom:0;
            background:var(--primary);
            height:4px;
            position: absolute;
        }
       
       
        
    </style>
</head>
<body>
    {{-- include action loader for post requests,get requests and spa loading --}}
    @include('components.utilities',[
        'action_loader' => true
    ])
    <header>

    </header>
    <main>
        {{-- yield main --}}
        @yield('main')
    </main>
    <footer>

    </footer>
  
  {{-- yield js --}}
    @yield('js')
</body>
</html>