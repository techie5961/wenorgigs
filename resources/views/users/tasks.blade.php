@extends('layout.users.app')
@section('title')
    Daily Tasks
@endsection
<style class="css">
    .card .icon{
        background: var(--primary-text);
        color:var(--primary);
        height:60px;
        width:60px;
        flex-shrink: 0;
        display: flex;
        flex-direction:column;
        align-items:center;
        justify-content:center;
        gap:10px;
        border-radius:50%;
        position: relative;
        
        
    }
 
    /* .icon::after{
        content: '';
        position:absolute;
        bottom:0px;
        right:0px;
        height:10px;
        width:10px;
        background:var(--primary);
        border:4px solid var(--primary-text);
        border-radius:50%;
        box-shadow:0 0 10px var(--primary-03);
       
    } */
    .go{
        height:40px;
        width:40px;
        display:flex;
        flex-direction:column;
        align-items:center;
        justify-content: center;
        gap:10px;
        border-radius:50%;
        background:var(--primary-text);
        /* border:1px solid var(--rgt-005); */
        flex-shrink: 0;
        color:var(--primary);
        /* background:gold; */
        /* box-shadow:inset 0 5px 5px var(--rgt-005) */
    }
      .card{
        width:100%;
        padding:15px;
        display:flex;
        flex-direction:column;
        gap:10px;
        background:var(--bg-light);
        border-radius:15px;
        border:1px solid var(--rgt-02);
      }
</style>
@section('main')
    <section class="w-full column g-10">
        <strong class="page-title">Daily Tasks</strong>
        <span class="opacity-07">Earn real cash for completing tasks</span>
        @if ($tasks->isEmpty())
            @include('components.utilities',[
                'empty' => true,
                'text' => 'No Task Available'
            ])
        @else
        <div class="grid pc-grid-2 g-10 place-center w-full">
            @foreach ($tasks as $data)
            <div class="card">
               {{-- new row --}}
               <div class="row w-full align-center g-5">
                 <div>
                 <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="15" width="15"><path d="M19 4H5V20H19V4ZM3 2.9918C3 2.44405 3.44749 2 3.9985 2H19.9997C20.5519 2 20.9996 2.44772 20.9997 3L21 20.9925C21 21.5489 20.5551 22 20.0066 22H3.9934C3.44476 22 3 21.5447 3 21.0082V2.9918ZM11.2929 13.1213L15.5355 8.87868L16.9497 10.2929L11.2929 15.9497L7.40381 12.0607L8.81802 10.6464L11.2929 13.1213Z"></path></svg>

                </div>

                <strong class="font-1">{{ $data->type->name }}</strong>
               </div>
               {{-- new row --}}
               <strong style="display:inline-block;border:1px dotted #4caf50;background:rgba(0,255,0,0.1);color:#256827;width:fit-content;padding:5px 15px;border-radius:1000px;" class="font-1 c-green">+{{ $currency.number_format($data->type->earning,2) }}</strong>
               
               {{-- new row --}}
               <div style="background:var(--rgt-01);height:7px;overflow:hidden;" class="w-full br-1000">
                <div style="height:100%;background:var(--primary);width:{{ (($data->proofs/$data->limit) * 100) }}%">

                </div>
               </div>
               <span class="opacity-06">{{ number_format($data->proofs) }} of {{ $data->limit }} completed</span>
               {{-- new row --}}
                <button style="height:fit-content;margin-top:0;" onclick="Redirect('{{ url('users/task?id='.$data->id.'') }}')" class="post w-fit p-x-20 p-10 h-fit">
                    Perform Task
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="15" width="15"><path d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"></path></svg>

                </button>
            </div>


           
        @endforeach
        </div>
            @if ($tasks->lastPage() > 1)
                @include('components.utilities',[
                    'paginate' => true,
                    'data' => $tasks
                ])
            @endif
        @endif
    </section>
@endsection