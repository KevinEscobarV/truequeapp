<div>
    
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="flex flex-col">
        <div class="overflow-x-auto">
            <div class="align-middle inline-block min-w-full">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <div class="flex bg-gradient-to-r from-blueGray-800 to-teal-700 px-2 py-4 sm:px-5">
                        <x-jet-input type="text" wire:model="search" class="placeholder:text-slate-400 w-full"
                            placeholder="Buscar un producto..." />
                        <div>
                            <select wire:model="perPage"
                                class="ml-6 border-gray-300 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                class="outline-none">
                                <option value="2">2 por página</option>
                                <option value="5">5 por página</option>
                                <option value="10">10 por página</option>
                                <option value="15">15 por página</option>
                                <option value="25">25 por página</option>
                                <option value="50">50 por página</option>
                                <option value="100">100 por página</option>
                            </select>
                        </div>
                    </div>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gradient-to-r from-blueGray-800 to-teal-700 text-white">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                    No.
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                    NOMBRE
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                    PRECIO
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                    DESCRIPCIÓN
                                </th>
                                
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">
                                    CANTIDAD
                                </th>
                                <th></th>
                              

                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">

                            @foreach ($products as $product)

                                <tr>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        <p>{{ $product->id }}</p>                                       
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        <p>{{ $product->name }}</p>
                                        <p>{{ $product->provider->name }} {{ $product->provider->last_name }}</p>
                                    </td>                                  
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $product->price_in }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $product->description }}
                                    </td>
                                   

                                    <td class="text-sm text-white text-center">
                                        <div class="flex">
                                            <button class="bg-blueGray-500 rounded-md p-2 w-8" wire:click="menos">-</button>
                                                <span class="mx-2 border-2 rounded-md p-2 text-gray-800">{{ $qty }}</span>
                                            <button class="bg-blueGray-500 rounded-md p-2 w-8" wire:click="mas">+</button>
                                        </div>
                                    </td>


                                    <td class="px-6 py-4 text-white text-right text-sm font-medium">
                                        <a class="p-2 hover:bg-blueGray-700 cursor-pointer border-2 bg-blueGray-500 rounded-md"
                                            wire:click="addItem('{{ $product->id }}')">AGREGAR</a>
                                    </td>

                                </tr>

                            @endforeach


                        </tbody>
                    </table>
                    @if ($products->haspages())
                        <div class="py-2 px-4">
                            {{ $products->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>
