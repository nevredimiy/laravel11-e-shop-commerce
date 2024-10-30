<x-dashboard-layout>
   <x-flash></x-flash>
    <div class="mr-4">
        <x-header-section href="categories" buttonName="{{__('Back')}}">{{__('Edit category')}}</x-header-section>
        <div class="mt-4">
            <form method="POST" action="{{ url('categories/'.$category->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <x-input-label class="required">{{__('Name')}}</x-input-label>
                    <x-text-input name="name" type="text" id="name" value="{{ $category->name }}" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2"></x-input-error>
                </div>
                <div class="mb-3">
                    <x-input-label for="description">{{__('Description')}}</x-input-label>
                    <x-textarea name="description" id="description" rows="3">
                        {{ old('description') }}
                    </x-textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>
                <div class="mb-3">
                    <x-input-label for="slug">Slug</x-input-label>
                    <x-text-input name="slug" type="text" id="slug" :value="old('slug')" autocomplete="slug" />
                </div>
                <div class="mb-3">
                    <x-thumb src="/{{$category->image}}" alt="{{$category->name}}" />
                    <x-input-label for="image">{{__('Image category')}}</x-input-label>
                    <x-text-input name="image" type="file" id="image" />
                </div>

                <div class="mb-3">
                    <x-input-label for="parent">Parent category</x-input-label>
                    <x-select name="parent" id="parent" class="mr-2" aria-label="Parent category">
                        {{__('Choice parent category')}}
                        <x-slot:options>
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}" {{ $item->id == $id ? 'selected' : '' }}>{{ $item->name }}</option>
                            @endforeach
                        </x-slot>
                    </x-select>
                </div>

                <x-button class="mt-10">{{__('Update category')}}</x-button>
            </form>
        </div>
    </div>
</x-dashboard-layout>
