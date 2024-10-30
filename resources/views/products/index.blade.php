<x-dashboard-layout>
    
    <div class="mr-4">
        <x-header-section href="products/create" buttonName="{{__('Add product')}}">{{ __('Products') }}</x-header-section>
        <div class="border-t">
            <table class="table-auto w-full m-0 p-0">
                <thead class="hidden md:table-header-group">
                <tr>
                    <th class="md:border-2">{{__('#')}}</th>
                    <th class="md:border-2">{{__('Image')}}</th>
                    <th class="md:border-2">{{__('Name')}}</th>
                    <th class="md:border-2">{{__('Description')}}</th>
                    <th class="md:border-2">{{__('Price')}}</th>
                    <th class="md:border-2">{{__('Category')}}</th>
                    <th class="md:border-2">{{__('Is Active')}}</th>
                    <th class="md:border-2">{{__('Slug')}}</th>
                    <th class="md:border-2">{{__('Action')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($products as $product)
                <tr class="border-2 border-slate-950 p-2 block my-1 rounded md:p-0 md:table-row md:my-0">
                    <td data-label="#" class="md:border-2 md:text-center">{{ $loop->iteration }}</td>
                    <td data-label="Image" class="flex justify-between md:table-cell md:border-2 md:place-items-center"><img class="block w-20" src="{{ asset($product->image) }}" alt="{{ $product->name }}"></td>
                    <td data-label="Name" class="md:border-2 md:text-center">{{ $product->name }}</td>
                    <td data-label="Description" class="md:border-2 md:text-center">{{ $product->description }}</td>
                    <td data-label="Price" class="md:border-2 md:text-center">{{ $product->price }}</td>
                    <td data-label="Category" class="md:border-2 md:text-center">{{ $product->category_id }}</td>
                    <td data-label="Is Active" class="md:border-2 md:text-center {{ $product->is_active == 1 ? 'text-green-600' : 'text-red-400' }}">{{ $product->is_active == 1 ? 'Active' : 'No active' }}</td>
                    <td data-label="Slug" class="md:border-2 md:text-center">{{ $product->slug }}</td>
                    <td data-label="Action" class="md:border-2 md:place-items-center">
                        <div class="flex gap-2 justify-end">
                            <x-button tag="a" href="{{ route('products.show', ['id' => $product->id]) }}" >{{ __('Show') }}</x-button>
                            <x-button tag="a" href="{{ url('products/'.$product->id.'/edit') }}">{{__('Edit')}}</x-button>
                            <form method="POST" action="{{ url('products/'.$product->id) }}">
                                @csrf
                                @method('DELETE')
                                <x-button type="submit" onclick="return confirm('Are you sure?')">{{ __('Delete') }}</x-button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach

                </tbody>
            </table>
            <div class="my-2">
                {{ $products->links() }}
            </div>
        </div>
    </div>

</x-dashboard-layout>
