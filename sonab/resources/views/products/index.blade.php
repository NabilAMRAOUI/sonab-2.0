<x-guest-layout>
  <x-slot name='header'>
      Shop
  </x-slot>
  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              
          </div>
      </div>
  </div>
  <!-- component -->
<div tabindex="0" class="focus:outline-none rounded-sm  ">
  <!-- Remove py-8 -->
  <div class="mx-auto container py-8">
      <div class="flex flex-wrap items-center lg:justify-between justify-center">
          <!-- Card 1 -->
          @foreach ($products as $product)
              
          
          <div tabindex="0" class="focus:outline-none mx-2 w-72 xl:mb-0 mb-8">
              <div>
                  <img alt="product image" src="{{ $product->image }}" tabindex="0" class="focus:outline-none w-full h-44" />
              </div>
              <div class="bg-white">
                  <div class="flex items-center justify-between px-4 pt-4">
                      
                      <div class="bg-gray-600 py-1.5 px-6 rounded-full">
                          <p tabindex="0" class="focus:outline-none text-xs text-white">{{ $product->formatted_price }}</p>
                      </div>
                  </div>
                    <div class="p-4">
                      <div class="flex items-center">
                          <h2 tabindex="0" class="focus:outline-none text-lg font-semibold">{{ $product->name }}</h2>
                          
                      </div>
                      <p tabindex="0" class="focus:outline-none text-xs text-gray-600 mt-2">{{ $product->description }}</p>
                      
                      <add-to-cart :product-id="{{ $product->id }}" />
                    </div>
                </div>
            </div>
          @endforeach
          
      </div>        
      
  </div>
  <!--- more free and premium Tailwind CSS components at https://tailwinduikit.com/ --->
</div>

</x-guest-layout>