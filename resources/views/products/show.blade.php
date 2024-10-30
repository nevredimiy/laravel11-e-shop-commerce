<x-main-layout>

    <!--
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    theme: {
      extend: {
        gridTemplateRows: {
          '[auto,auto,1fr]': 'auto auto 1fr',
        },
      },
    },
    plugins: [
      // ...
      require('@tailwindcss/aspect-ratio'),
    ],
  }
  ```
-->
<div class="bg-white">
    <x-flash></x-flash>
    <div class="pt-6">
      <nav aria-label="Breadcrumb">
        <ol role="list" class="mx-auto flex max-w-2xl items-center space-x-2 px-4 sm:px-6 lg:max-w-7xl lg:px-8">
          <li>
            <div class="flex items-center">
              <a href="#" class="mr-2 text-sm font-medium text-gray-900">{{$category_name}}</a>
              <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" aria-hidden="true" class="h-5 w-4 text-gray-300">
                <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
              </svg>
            </div>
          </li>  
          <li class="text-sm">
            <div aria-current="page" class="font-medium text-gray-500 hover:text-gray-600">{{ $product->name }}</div>
          </li>
        </ol>
      </nav>
  
      <div class="flex flex-col p-2 sm:flex-row container mx-auto">

          <!-- Image gallery -->
          <div class="sm:w-1/2 sm:p-4 lg:w-1/3">

            <!-- Main image -->
            <div class="">
                <img class="w-full" src="{{asset($product->image)}}" alt="{{$product->name}}">
            </div>

            <!-- Thumb -->
            <div class="flex flex-nowrap overflow-hidden justify-around">
                <img class="w-1/4" src="{{asset($product->image)}}" alt="{{$product->name}}">
                <img class="w-1/4" src="{{asset($product->image)}}" alt="{{$product->name}}">
                <img class="w-1/4" src="{{asset($product->image)}}" alt="{{$product->name}}">
            </div>
          </div>

          <!-- Product info -->
          <div class="sm:w-1/2 sm:p-4 lg:w-1/3 lg:pl-10">
            <h2 class="font-bold text-2xl sm:text-4xl sm:mt-4 mb-6">{{$product->name}}</h2>
            <div class="flex justify-between items-end mb-6">
              <div class="text-sm sm:text-2xl font-medium">{{$product->price}} uah</div>
              <x-button tag="a" href="{{ route('add-to-cart', $product->id) }}" id="add-to-cart" data-product-id="{{$product->id}}">Add to cart</x-button>
            </div>
            <div class="">
              <div class=""><span class="font-bold">Material:</span> Silver 925</div>
              <div class=""><span class="font-bold">Weight:</span> 5 gram</div>
              <div class=""><span class="font-bold">Size:</span> 25 x 35 mm</div>
              <div class=""><span class="font-bold">Material:</span> Silver 925</div>
              <div class=""><span class="font-bold">Weight:</span> 5 gram</div>
              <div class=""><span class="font-bold">Size:</span> 25 x 35 mm</div>
            </div>
            
            <hr class="my-10">
            <div class="">
              <div class="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit, illo maxime enim molestias distinctio voluptate modi repudiandae officia architecto beatae temporibus dolorum ratione cum, veritatis impedit quas. Facere, omnis placeat?</div>
            </div>
          </div>

          <!-- Side -->
          <div class="bg-gray-100 dark:bg-gray-800 rounded-md px-2">
            <div class="">            
              <x-form-base>
                <h2 class="dark:text-gray-200 font-medium mb-2">Search product</h2>
                <div class="flex items-center gap-4 relative">
                  <x-input class=""></x-input>
                  <button type="submit" class="absolute right-0 border-none px-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>                  
                  </button>
                </div>
              </x-form-base>
            </div>
          </div>
      </div>
      <div class="">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt illo voluptates quasi consectetur perferendis quam quod recusandae hic, voluptatum vitae dignissimos. Corrupti, iure porro architecto rem blanditiis quas amet repellat!
        Sint ipsum ducimus porro velit sequi dignissimos ex. Atque, eos quisquam laborum fugit vero magni exercitationem est minus reiciendis esse dignissimos iure, laboriosam optio voluptatum in distinctio autem perspiciatis ut.
        A odit voluptatem illo dolor doloribus in iure cum perferendis laboriosam suscipit labore eum dolores, vero dolorem mollitia, iusto quo veritatis minus provident est culpa. Provident nobis itaque a nesciunt?
        Cupiditate vel, sed omnis iste molestias ab dicta laborum officiis a veritatis vero totam illo fugiat in eos inventore natus. Aperiam iste repudiandae, voluptate velit ullam laudantium totam voluptas quos!
        Est corporis earum nemo. Quo repellendus, repudiandae necessitatibus eos impedit quisquam, dicta libero deleniti minus illo laboriosam ab officiis expedita harum rerum adipisci pariatur. Dicta sapiente error explicabo fugit at.
        Vitae, nesciunt debitis, illum culpa aperiam id modi quae iusto illo corrupti, laborum omnis facere numquam. Ea, sint incidunt nostrum cupiditate eligendi similique atque quod nobis sequi mollitia. Tempore, atque.
        Consectetur fugit itaque similique corporis, nemo error exercitationem amet quidem doloribus iusto quae officia tempora earum optio, illum minus aperiam, tempore distinctio. Culpa veritatis expedita excepturi commodi voluptatibus quo! Pariatur.
        Ipsum ad repellat quo quis cupiditate voluptates excepturi, aliquam nam ducimus illum itaque quia assumenda ab saepe voluptate beatae repudiandae temporibus nemo? Architecto placeat recusandae ipsum nulla molestiae ut ab?
        Magnam dignissimos perspiciatis iusto tempora asperiores numquam atque, porro labore fugit sint qui, cumque accusamus beatae ad nobis rerum neque consequuntur laudantium? Doloremque ea impedit expedita beatae dolorem nulla architecto.
        Debitis suscipit dignissimos est. Iste, magnam. Fuga nobis architecto rerum placeat commodi distinctio reprehenderit? Distinctio ullam architecto atque aut beatae dicta itaque unde facere expedita ipsum. Optio qui sint laboriosam!
      </div>
      
    </div>
  </div>

  

  @section("script")
  <script>
    console.log("it show template");
    
    
  </script>
    
  @endsection
  

</x-main-layout>