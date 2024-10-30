<x-dashboard-layout>
    <x-flash></x-flash>
    <div class="mr-4">
        <div class="bg-gray-100 rounded">
            <h4 class="font-bold text-xl py-6 px-4">
                Add product <a href="{{ url('products') }}" class="block px-3 py-2 rounded bg-slate-800 text-gray-400 hover:text-gray-50 transition font-bold text-sm float-end">Back</a>
            </h4>
        </div>
        <div class="border-t pt-4">
            <x-form-base action="{{ route('products.store') }}" enctype='multipart/form-data'>
                @csrf
                <div class="mb-3">
                    <x-input-label class="mr-2" for="category_id" :value="__('Category')" />

                    <x-select name="category_id" id="category_id" aria-label="Default select example">
                        @unless (count($categories))
                             <option selected>There are not categories</option>
                        @endunless
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                @if ($loop->first)
                                        selected
                                @endif

                            >{{ $category->name }}</option>
                        @endforeach
                    </x-select>

                </div>
                <div class="mb-3">
                    <x-input-label for="name" :value="__('Name')" />
                    <x-input name="name" type="text" id="name" value="{{ old('name') }}"></x-input>
                    @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                </div>
                <div class="mb-3">
                    <x-input-label for="description" :value="__('Description')" />
                    <textarea name="description" class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" id="description" rows="3">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <x-input-label for="slug" :value="__('Slug')" />
                    <x-input name="slug" type="text" id="slug" value="{{ old('slug') }}" />
                        @error('slug')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                </div>
                <div class="mb-3">
                    <x-input-label for="image" :value="__('Image product')" />
                    <x-input name="image" type="file" id="image" />
                    @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 flex items-center gap-4">
                    <input name="is_active" type="checkbox" class="h-4 w-4 rounded-md border-0 checked:bg-white focus:ring-2 focus:ring-inset focus:ring-indigo-600" id="is-active" {{ old('is_active') == true ? 'checked' : '' }}>
                    <x-input-label for="is-active" :value="__('Is Active')" />
                </div>

                <x-button type='submit'>{{__('Add product')}}</x-primary-button>
            </x-form-base>
        </div>
    </div>

</x-dashboard-layout>
