<div>
    <div class="container mx-auto px-6 py-3">          
        <div class="relative mt-6 max-w-lg mx-auto">
        <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
            <svg class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="none">
                <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </span>
            <input class="w-full border rounded-md pl-10 pr-4 py-2 focus:border-blue-500 focus:outline-none focus:shadow-outline" type="text" wire:model="search" placeholder="Buscar">
        </div>

        <div class="absolute w-full mt-1 hidden" :class="{ 'hidden' : !$wire.open }" @click.away="$wire.open = false">
            <div class="bg-white rounded-lg shadow-lg">
                <div class="px-4  py-3 space-y-1">
                    @forelse ($products as $product)
                        <a href="{{ route('product.show', $product) }}" class="flex">
                            <img class="w-20 object-cover mr-4 mb-2 rounded-md shadow-lg" src="{{ Storage::url($product->images->first()->url) }}" alt="">
                            <div class="ml-4 text-gray-700">
                                <p class="text-lg font-semibold leading-5">{{$product->name}}</p>
                                <p>Categoria: {{$product->category->name}}</p>
                            </div>
                        </a>
                    @empty
                        <p class="text-md m-3 leading-5">
                            No existe ningún registro con los parametros especificados
                        </p>
                    @endforelse
                </div>
            </div>
        </div>

    </div>
</div>
