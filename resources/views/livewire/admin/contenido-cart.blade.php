<div>
    <div>
        <div class="flex">
            @forelse (Cart::content() as $item)
                    <li class="flex px-2 py-1">

                        <article class="flex-1 relative">
                            <h1 class="font-bold">{{ $item->name }}</h1>
                            <div>

                                <p>Cant: {{ $item->qty }}</p>                         
                                @isset($item->options['size'])
                                <p>Tamaño: {{$item->options['size']}}</p>
                                @endisset

                            </div>
                            <p>COP {{ $item->price }}</p>                    
                                        
                            <a class="ml-6 cursor-pointer absolute right-1 top-1 bg-orange-600 rounded-md px-2 py-1" 
                                wire:click="delete('{{$item->rowId}}')"
                                wire:loading.class="text-red-600 opacity-25"
                                wire:target="delete('{{ $item->rowId }}')">
                                X
                            </a>

                        </article>
                    </li>
                @empty
                   
                        <p class="text-center text-gray-500">No tiene agregado ningún Producto agregado en la Factura</p>
                   
                @endforelse
        </div>
    </div>
</div>
