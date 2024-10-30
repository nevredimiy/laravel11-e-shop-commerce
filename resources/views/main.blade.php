<x-main-layout>
    <x-slot:logo>
        {{ $logo[0]->logo }}
    </x-slot:logo>
    @section('title', 'Заголовок для данной страницы')
    <div class="container mx-auto">
        <x-flash></x-flash>
        <x-flash status="message"></x-flash>
        <div class="">
            <ul class="mt-5 flex flex-wrap">
                @foreach ($products as $product)
                    <li class="md:w-1/3 p-4">
                        <div class="flex flex-col items-center rounded border shadow-lg mx-2 py-4">
                            <h2><a href="{{route('products.show', $product->id)}}">{{$product->name}}</a></h2>
                            <img class="h-52" src="{{asset($product->image)}}" alt="{{$product->name}}">
                            <div class="flex gap-4 items-center">
                                <span class="font-bold text-2xl">{{$product->price}}</span>
                                <x-button tag="a" data-add-to-cart href="{{route('add-to-cart')}}" data-quantity="1" data-id="{{$product->id}}">Add to cart</x-button>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    @section('script')
        <script>

            $('[data-add-to-cart]').click(function (e) {
                e.preventDefault();
                var btn = $(this);
                $('#cart').addClass('animate-bounce');
                setInterval(() => {
                    $('#cart').removeClass('animate-bounce');
                }, 3000);
                
                $.ajax({
                    url: btn.attr('href'),
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: btn.attr('data-id'),
                        quantity: btn.attr('data-quantity')
                    },
                    success: function (response){
                        // window.location.reload()
                        $('#cart').load(location.href + ' #cart>*', '')
                    },
                    error: function (e) {
                        console.log(e.responseJSON.message)
                    }
                });

            });
        </script>
    @endsection
</x-main-layout>
