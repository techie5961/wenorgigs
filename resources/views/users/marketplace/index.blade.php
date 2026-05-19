@extends('layout.users.app')
@section('title')
    Marketplace
@endsection
@section('css')
    <style class="css">
        .products-section{
            column-count: 2;
            column-gap:10px;
           
        }
     
        @media(min-width:800px){
            .products-section{
                column-count: 4;
            }
        }
        
    </style>
@endsection
@section('main')
    <section class="w-full column g-10">
        <strong class="page-title">Marketplace</strong>
        <span>Shop from a list of products availble on Wenor Store</span>
        @if ($products->isEmpty())
            @include('components.utilities',[
                'empty' => true,
                'text' => 'No Product available'
            ])
        @else
            <section class="w-full products-section">
                @foreach ($products as $data)
                    <div class="column m-top-10 g-5">
                        <img class="w-full" src="{{ asset('photos/marketplace/'.$data->photo.'') }}" alt="">
                     <div class="column w-full g-2">
                        {{-- new row --}}
                          <span class="opacity-07">{{ $data->category }}</span>
                          {{-- new row --}}
                        <div class="c-primary font-1 font-weight-600 ws-nowrap text-overflow-ellipsis">{{ $data->name }}</div>
                       {{-- new row --}}
                        <div class="row align-center g-5">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path opacity="0.5" d="M19.7165 20.3624C21.143 19.5846 22 18.5873 22 17.5C22 16.3475 21.0372 15.2961 19.4537 14.5C17.6226 13.5794 14.9617 13 12 13C9.03833 13 6.37738 13.5794 4.54631 14.5C2.96285 15.2961 2 16.3475 2 17.5C2 18.6525 2.96285 19.7039 4.54631 20.5C6.37738 21.4206 9.03833 22 12 22C15.1066 22 17.8823 21.3625 19.7165 20.3624Z" fill="CurrentColor" "=""></path>
<path fill-rule="evenodd" clip-rule="evenodd" d="M5 8.51464C5 4.9167 8.13401 2 12 2C15.866 2 19 4.9167 19 8.51464C19 12.0844 16.7658 16.2499 13.2801 17.7396C12.4675 18.0868 11.5325 18.0868 10.7199 17.7396C7.23416 16.2499 5 12.0844 5 8.51464ZM12 11C13.1046 11 14 10.1046 14 9C14 7.89543 13.1046 7 12 7C10.8954 7 10 7.89543 10 9C10 10.1046 10.8954 11 12 11Z" fill="CurrentColor" "=""></path>
</svg>


                            <small>{{ $data->location }} State</small>
                        </div>
                        {{-- new row --}}
                        <div class="w-full text-overflow-ellipsis ws-nowrap">{{ $data->address }}</div>
                     </div>
                    
                     <strong class="font-1">
                          {{ $currency.number_format($data->price,2) }}
                     </strong>
                     {{-- new row --}}
                     <div onclick="Redirect('{{ url('users/marketplace/purchase?id='.$data->id.'') }}')" class="bg-primary font-weight-900 p-10 no-select g-10 pointer w-full primary-text row align-center justify-center">
                        Shop
                      
                       
                     </div>
                    </div>
                @endforeach
            </section>
        @endif
    </section>
@endsection