    <div class="fixed right-10 top-16 flex justify-end my-2">
        <div id='cart' class="group relative">
            <a class="flex gap-2 items-center py-2 px-4 rounded-md bg-gray-300" href="{{route('cart')}}">

                @if(Cart::instance('cart')->count() > 0)
                    <div class="pr-4">{{ Cart::total() }} - {{ Cart::count() }}</div>
                @else
                    <div class="pr-4">Cart is empty</div>
                @endif
                    
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                </svg>
            </a>
            <div class="hidden group-hover:block absolute right-0 rounded bg-slate-200 shadow-md {{ Cart::count() > 0 ? 'p-2' : '' }}">
                <ul class="min-w-80">
                    
                    @if (Cart::count() > 0)

                        @foreach (Cart::content() as $item )
                            <li class="flex">
                                <div class="min-w-6 p-1">{{$loop->iteration}}</div> 
                                <div class="p-1"><img class="w-10" src="{{asset($item->options->image)}}" alt="{{$item->name}}"></div>
                                <div class="p-1">{{ $item->name }}</div>
                                <div class="p-1">{{ $item->qty }}</div>
                                <div class="p-1">{{ $item->price }}</div>
                            </li>
                        @endforeach
                        
                    @endif
                    
                </ul>
            </div>
        </div>
         
    </div>
