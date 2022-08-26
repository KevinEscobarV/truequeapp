<div>
    @forelse (Cart::content() as $item)
        <li class="py-6 flex">
            <div class="flex-shrink-0 w-24 h-24 border border-gray-200 rounded-md overflow-hidden">
                <img src="{{ $item->options->image }}" alt="product" class="w-full h-full object-cover object-center">
            </div>

            <div class="ml-4 flex-1 flex flex-col">
                <div>
                    <div class="flex justify-between text-base font-medium text-gray-900">
                        <h3>
                            <a href="#">
                                {{ $item->name }}
                            </a>
                        </h3>
                        <p class="ml-4">
                            $ {{ number_format($item->price, 0, '', ',') }}
                        </p>
                    </div>
                    <p class="mt-1 text-sm text-gray-500">
                        {{ $item->options->size }}
                    </p>
                </div>
                <div class="flex-1 flex items-end justify-between text-sm">
                    <p class="text-gray-500">
                        Cantidad {{ $item->qty }}
                    </p>

                    <div class="flex">
                        <button wire:target="remove" wire:click="remove('{{$item->rowId}}')" wire:loading.attr="disabled" class="font-medium text-indigo-600 hover:text-indigo-500">Eliminar</button>
                    </div>
                </div>
            </div>
        </li>
    @empty
        <li class="py-6 flex">
            <div class="ml-4 flex-1 flex flex-col">
                <div>
                    <div class="flex justify-between text-base font-medium text-gray-900">
                        <h3>
                            <a href="#">
                                No tiene agregado ningun producto al carrito
                            </a>
                        </h3>
                        <p class="ml-4">
                            $ 0.00
                        </p>
                    </div>
                </div>
            </div>
        </li>
    @endforelse
</div>
