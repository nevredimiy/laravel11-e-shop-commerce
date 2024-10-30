<x-dashboard-layout>
    <x-flash></x-flash>
    <div class="mr-4">
        <x-header-section href="products" buttonName="{{__('Back')}}">{{ __('Edit product')}}</x-header-section>
        <div class="mt-4">
            <x-form-base action="{{ url('products/' . $product->id) }}" enctype='multipart/form-data'>
                @csrf
                @method('PUT')
                <x-card-m>
                    <x-input-label class="mr-3" for="parent">Category</x-input-label>
                    <x-select name="category_id" id="category_id" class="mr-2" aria-label="Parent Category">
                        @unless (count($categories))
                             <option selected>{{__('There are not categories')}}</option>
                        @endunless
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    @if ($category->id == $product->category_id)
                                            selected
                                    @endif
                                >{{ $category->name }}</option>
                            @endforeach
                    </x-select>
                </x-card-m>
                <x-card-m>
                    <x-input-label>{{__('Name')}}</x-input-label>
                    <x-text-input name="name" type="text" id="name" value="{{ $product->name }}" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2"></x-input-error>
                </x-card-m>
                
                <x-card-m>
                    <x-input-label for="description">{{__('Description')}}</x-input-label>
                    <x-textarea name="description" id="description" rows="3">
                        {{ $product->description }}
                    </x-textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </x-card-m>

                <x-card-m>
                    <x-input-label>{{__('Price')}}</x-input-label>
                    <x-text-input name="price" type="number" step="0.01" id="price" value="{{ $product->price }}" />
                    <x-input-error :messages="$errors->get('price')" class="mt-2"></x-input-error>
                </x-card-m>

                <x-card-m>
                    <x-input-label for="slug">{{__('Slug')}}</x-input-label>
                    <x-text-input name="slug" type="text" id="slug" :value="$product->slug" autocomplete="slug" />
                </x-card-m>
                <x-card-m>
                    <x-thumb src="/{{$product->image}}" alt="{{$product->name}}" />
                    <x-input-label for="image">{{__('Image product')}}</x-input-label>
                    <x-text-input name="image" type="file" id="image" />
                </x-card-m>

                <x-card-m class="flex items-center gap-2">                   
                    <input @checked(old('active', $product->is_active)) type="checkbox" name="is_active1" id="is-active1" class="">
                    <x-input-label class="flex items-center gap-2">{{__('Is Active')}}</x-input-label>
                </x-card-m>
                <x-button type="submit">{{__('Update product')}}</x-button>
            </x-form-base>
        </div>
    </div>

</x-dashboard-layout>
