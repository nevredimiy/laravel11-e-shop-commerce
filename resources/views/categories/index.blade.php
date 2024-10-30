<x-dashboard-layout>
            
    <div class="mr-4">
        <x-header-section href="categories/create" buttonName="{{ __('Add category') }}">{{ __('Categories') }}</x-header-section>
        <div class="border-t">
            <table class="table-auto w-full m-0 p-0">
                <thead class="hidden md:table-header-group">
                <tr>
                    <th class="md:border-2">{{__('#')}}</th>
                    <th class="md:border-2">{{__('Image')}}</th>
                    <th class="md:border-2">{{__('Name')}}</th>
                    <th class="md:border-2">{{__('Description')}}</th>
                    <th class="md:border-2">{{__('Parent Category')}}</th>
                    <th class="md:border-2">{{__('Action')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($categories as $category)
                <tr class="border-2 border-slate-950 p-2 block my-1 rounded md:p-0 md:table-row md:my-0">
                    <td data-label="#" class="md:border-2 md:text-center">{{ $loop->iteration }}</td>
                    <td data-label="Image" class="flex justify-between md:table-cell md:border-2 md:place-items-center"><img class="block w-20" src="{{ asset($category->image) }}" alt="{{ $category->name }}"></td>
                    <td data-label="Name" class="md:border-2 md:text-center">{{ $category->name }}</td>
                    <td data-label="Description" class="md:border-2 md:text-center">{{ $category->description }}</td>
                    <td data-label="Parent Category" class="md:border-2 md:text-center">{{ $category->category_parent }}</td>
                    <td data-label="Action" class="md:border-2 md:place-items-center">
                        <div class="flex gap-2">
                            <x-button tag="a" href="categories/{{$category->id}}/edit">{{ __('Edit')}}</x-button>
                            <form method="POST" action="{{ url('categories/'.$category->id) }}">
                                @csrf
                                @method('DELETE')
                                <x-button onclick="return confirm('Are you sure?')" type="submit">{{ __('Delete')}}</x-button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>

</x-dashboard-layout>
