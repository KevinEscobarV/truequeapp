<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
          {{$product->name}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <section class="text-gray-400 bg-gray-900 body-font overflow-hidden rounded-lg">
                <div class="container px-5 py-24 mx-auto">
                  <div class="lg:w-4/5 mx-auto flex flex-wrap">
                    <div class="lg:w-1/2 w-full lg:pr-10 lg:py-6 mb-6 lg:mb-0">
                      <h2 class="text-sm title-font text-gray-500 tracking-widest">{{$product->provider->name}}</h2>
                      <h1 class="text-white text-3xl title-font font-medium mb-4">{{$product->name}}</h1>
                      <div class="flex mb-4">
                        <a class="flex-grow text-indigo-400 border-b-2 border-indigo-500 py-2 text-lg px-1">Descripción</a>
                        <a class="flex-grow border-b-2 border-gray-800 py-2 text-lg px-1">Reviews</a>
                        <a class="flex-grow border-b-2 border-gray-800 py-2 text-lg px-1">Details</a>
                      </div>
                      <p class="leading-relaxed mb-4">
                        {{$product->description}}
                        <div class="flex border-t border-gray-800 py-2">
                        <span class="text-gray-500">Material</span>
                        <span class="ml-auto text-white">{{$product->material}}</span>
                      </div>
                      <div class="flex border-t border-gray-800 py-2">
                        <span class="text-gray-500">Tamaño</span>
                        <span class="ml-auto text-white">{{$product->size}}</span>
                      </div>
                      <div class="flex border-t border-b mb-6 border-gray-800 py-2">
                        <span class="text-gray-500">Cantidad</span>
                        <span class="ml-auto text-white">{{$product->stock_in}}</span>
                      </div>
                      <livewire:add-cart-item :product="$product" />
                      
                    </div>
                    
                    <img alt="ecommerce" class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded" src="{{$product->images->first()->url}}">
                  </div>
                </div>
              </section>
        </div>
    </div>
</x-app-layout>