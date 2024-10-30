<x-main-layout>
    <x-flash></x-flash>
    <div class="test"></div>
    <div class="container mx-auto">
        @if ($cartItems->count() > 0)
            
            <table id="table" class="table-auto">
                <thead>
                    <tr>
                        <th class="w-10">#</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>quantity</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $item)
                            <tr data-id="{{$item->model->id}}">
                                <td class="w-10 text-center">{{$loop->iteration}}</td>
                                <td class="flex justify-center"><img class="p-4 max-w-52" src="{{asset($item->model->image)}}" alt="{{$item->model->name}}"></td>
                                <td>{{$item->model->name}}</dy>
                                <td>{{$item->qty}}</td>
                                <td>{{$item->price}}</td>
                                <td><x-button data-item-id="{{ $item->id }}" data-item-rowId="{{ $item->rowId }}">Delete</x-button></td>
                            </tr>
                    @endforeach
                    
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="6" class="text-right">
                            <h3><strong>Cart Totals</strong></h3>
                            <h6>Sub total <span>{{Cart::instance('cart')->subtotal()}}</span></h6>
                            <h6>Tax <span>{{Cart::instance('cart')->tax()}}</span></h6>
                            <h6>Total <span>{{Cart::instance('cart')->total()}}</span></h6>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6" class="text-right">
                            <div class="flex justify-end mt-4 mb-2">
                                <x-button href="{{route('index')}}" tag="a">Continue Shopping</x-button>
                            </div>
                            <div class="flex justify-end">
                                <x-button>Checkout</x-button>

                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>

        @else
            <div class="flex flex-col items-center justify-center">
                <div class="">Cart is empty</div>
                <x-button href="{{route('index')}}" tag="a">Start Shopping</x-button>
            </div>
            
        @endif
    </div>
    @section('script')
    <script>
        
            $('[data-item-id]').click(function(e){
                e.preventDefault();

                console.log('click');
                
    
                var btnDel = $(this);
    
                if(confirm("Do you really want to remove?")) {
                    $.ajax({
                        url: "{{route('cart.destroy')}}",
                        method: "DELETE",
                        data: {
                            _token: '{{ csrf_token() }}', 
                            id: btnDel.attr("data-item-id"),
                            rowId: btnDel.attr("data-item-rowId")
                        },
                         success: function (msg) {
                            window.location.reload();
                            // $(ele.parents("tr")).fadeOut(800, function(){
                            //     ele.html(msg).fadeIn().delay(2000);
                            // });
                            // $('#cart').reload();
                            // console.log(msg);
                            
                            // $('main').load(window.location.href+" main>*","");
                            
                         },
                        error: function (e){
                            console.log(e.responseJSON.message);
                        }
    
                    }).done(function(data){
                        $('text').html(
                            '<div class="text-green-500 font-bold">Успешно удалено</div>'
                        );
                    }).fail(function(data){
                        $('text').html(
                            '<div class="text-red-500 font-bold">НУ Успешно удалено</div>'
                        );
                    });
                }
            })
        
    </script>
    @endsection
</x-main-layout>