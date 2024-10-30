<x-dashboard-layout>
    <x-flash></x-flash>
    <div class="mr-4">
        <x-header-section>Category create</x-header-section>
        <div class="border-t pt-4">
            <x-form-base action="{{ route('categories.store') }}" enctype="multipart/form-data">
            
                @csrf
                <div class="mb-3">
                    <x-input-label for="name" class="required">Name</x-input-label>
                    <x-input name="name" type="text" id="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div class="mb-3">
                    <x-input-label for="description">Description</x-input-label>
                    <x-textarea name="description" id="description" rows="3">
                        {{ old('description') }}
                    </x-textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>
                <div class="mb-3">
                    <x-input-label for="slug">Slug</x-input-label>
                    <x-input name="slug" type="text" id="slug" :value="old('slug')" autofocus autocomplete="slug" />
                </div>
                <div class="mb-3">
                    <x-input-label for="image">Image category</x-input-label>
                    <x-input name="image" type="file" id="image" />
                </div>
                <div class="mb-3">
                    <x-input-label class="mr-3" for="parent">Parent category</x-input-label>
                    <x-select name="parent" id="parent" class="mr-2" aria-label="Parent category">
                        @empty($categories)
                            <option value="0">{{ __('There are not categories') }}</option>                            
                        @endempty

                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}" {{ $item->id == $item->category_parent ? 'selected' : '' }}>{{ $item->name }}</option>
                        @endforeach

                    </x-select>
                </div>
                <x-button class="mt-10">Add category</x-button>
            </x-form-base>
        </div>
    </div>

</x-dashboard-layout>
