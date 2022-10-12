<div>

    <x-slot name="title">
        <h2 class="text-xl text-white leading-tight">
            Gestion de Productos
        </h2>
    </x-slot>

    <x-form-section-admin submit="save" class="mx-6 my-7">
        <x-slot name="title">
            Agregar un Nuevo Producto
        </x-slot>

        <x-slot name="description">
            Complete la información necesaria para poder agregar un nuevo producto.
        </x-slot>

        <x-slot name="form">

            <div class="col-span-6 sm:col-span-3">
                <x-jet-label>
                    Nombre
                </x-jet-label>
                <x-jet-input type="text" wire:model="createForm.name" class="w-full" />
                <x-jet-input-error for="createForm.name" />
            </div>

            <div class="col-span-6 sm:col-span-3">
                <x-jet-label>
                    Slug
                </x-jet-label>
                <x-jet-input type="text" wire:model="createForm.slug" placeholder="Se llena automaticamente"
                    class="w-full bg-gray-100" disabled />
                <x-jet-input-error for="createForm.slug" />
            </div>

            <div class="col-span-6 sm:col-span-3">
                <x-jet-label>
                    Material
                </x-jet-label>
                <x-jet-input type="text" wire:model="createForm.material" class="w-full" />
                <x-jet-input-error for="createForm.material" />
            </div>

            <div class="col-span-6 sm:col-span-3">
                <x-jet-label>
                    Tamaño
                </x-jet-label>
                <x-jet-input type="text" wire:model="createForm.size" class="w-full" />
                <x-jet-input-error for="createForm.size" />
            </div>

            <div class="col-span-6 sm:col-span-2">
                <x-jet-label>
                    Porcentaje de Precio de Salida
                </x-jet-label>
                <x-jet-input type="number" wire:model="percent" placeholder="Escribir unicamente el numero"
                    class="w-full bg-orange-100" />
            </div>

            <div class="col-span-6 sm:col-span-2">
                <x-jet-label>
                    Precio Entrada
                </x-jet-label>
                <x-jet-input type="number" wire:model="createForm.price_in" class="w-full" />
                <x-jet-input-error for="createForm.price_in" />
            </div>

            <div class="col-span-6 sm:col-span-2">
                <x-jet-label>
                    Precio Salida
                </x-jet-label>
                <x-jet-input type="number" wire:model="createForm.price_out" placeholder="Segun el precio de entrada" class="w-full bg-gray-100" disabled />
                <x-jet-input-error for="createForm.price_out" />
            </div>

            <div class="col-span-6 sm:col-span-3">
                <x-jet-label>
                    Stock Entrada
                </x-jet-label>
                <x-jet-input type="text" wire:model="createForm.stock_in" class="w-full" />
                <x-jet-input-error for="createForm.stock_in" />
            </div>

            <div class="col-span-6 sm:col-span-3">
                <x-jet-label>
                    Stock Salida
                </x-jet-label>
                <x-jet-input type="text" wire:model="createForm.stock_out" class="w-full" />
                <x-jet-input-error for="createForm.stock_out" />
            </div>

            <div class="col-span-6 sm:col-span-6">
                <x-jet-label>
                    Descripción
                </x-jet-label>
                <textarea wire:model="createForm.description" class="w-full h-40 rounded-md" cols="30" rows="10"></textarea>
                <x-jet-input-error for="createForm.description" />
            </div>

            <div class="col-span-6 sm:col-span-3">

                <x-jet-label>
                    Proveedor
                </x-jet-label>

                <select wire:model="createForm.provider_id"
                    class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">

                    <option value="" selected disabled>Seleccione un Proveedor</option>

                    @foreach ($providers as $provider)
                        <option value="{{ $provider->id }}">{{ $provider->name }} {{ $provider->last_name }}</option>
                    @endforeach

                </select>

                <x-jet-input-error for="createForm.provider_id" />
            </div>

            <div class="col-span-6 sm:col-span-3">

                <x-jet-label>
                    Categoria
                </x-jet-label>

                <select wire:model="createForm.provider_id"
                    class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">

                    <option value="" selected disabled>Seleccione una Categoria</option>

                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach

                </select>

                <x-jet-input-error for="createForm.provider_id" />
            </div>

            <div class="col-span-6 sm:col-span-3">

                <x-jet-label>
                    Imagenes
                </x-jet-label>

                <input type="file" wire:model="images" class="w-full" multiple>

                <x-jet-input-error for="images.*" />
            </div>

        </x-slot>

        <x-slot name="actions">
            <x-jet-button>
                Agregar
            </x-jet-button>
        </x-slot>


    </x-form-section-admin>

    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="flex flex-col my-7 mx-6">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gradient-to-r from-blueGray-600 to-teal-600 text-white">
                            <tr>
                                <th colspan="1"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                </th>
                                <th colspan="4"
                                    class="px-6 py-3 text-left text-base text-blue-300 font-bold uppercase tracking-wider">
                                    PRODUCTO
                                </th>
                                <th colspan="2"
                                    class="px-6 py-3 text-left text-base text-red-300 font-bold uppercase tracking-wider">
                                    ENTRADAS
                                </th>
                                <th colspan="2"
                                    class="px-6 py-3 text-left text-base text-green-300 font-bold uppercase tracking-wider">
                                    SALIDAS
                                </th>
                                <th colspan="2"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                </th>
                            </tr>
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                    No.
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                    IMAGEN
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                    NOMBRE
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                    MATERIAL
                                </th>

                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                    TAMAÑO
                                </th>

                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs text-red-300 font-bold uppercase tracking-wider">
                                    CANTIDAD
                                </th>

                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs text-red-300 font-bold uppercase tracking-wider">
                                    PRECIO UNITARIO
                                </th>

                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs text-green-300 font-bold uppercase tracking-wider">
                                    CANTIDAD
                                </th>

                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs text-green-300 font-bold uppercase tracking-wider">
                                    PRECIO UNITARIO
                                </th>

                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                    PROVEEDOR
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                    ACCIONES
                                </th>

                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">

                            @foreach ($products as $product)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $product->id }}
                                    </td>
                                    <td class="px-6 py-4">
                                        @if ($product->images->count())
                                            <img class="h-12 w-12 rounded-md object-cover"
                                                src="{{ Storage::url($product->images->first()->url) }}"
                                                alt="">
                                        @else
                                            <img class="h-12 w-12 rounded-md object-cover"
                                                src="{{ asset('img/default-product.png') }}" alt="">
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $product->name }}
                                        <div class="text-sm text-blueGray-400">Categoria:
                                            {{ $product->category->name }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $product->material }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 border-r">
                                        {{ $product->size }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-center text-gray-500">
                                        {{ $product->stock_in }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 border-r">
                                        $ {{ number_format($product->price_in, 0, '', ',') }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-center text-gray-500">
                                        {{ $product->stock_out }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 border-r">
                                        $ {{ number_format($product->price_out, 0, '', ',') }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500 border-r">
                                        {{ $product->provider->name }}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="flex gap-x-2">
                                            <a class="pr-2 text-blue-400 hover:text-blue-600 cursor-pointer"
                                                wire:click="edit('{{ $product->id }}')">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                                </svg>
                                            </a>
                                            <a class="pl-2 text-red-400 hover:text-red-600 cursor-pointer text-md"
                                                wire:click="$emit('deleteProduct', '{{ $product->id }}')">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg>
                                            </a>
                                        </div>
                                    </td>

                                    {{-- <td class="px-6 py-4 whitespace-nowrap text-center text-sm">
                                        <a class="pl-2 hover:text-red-600 cursor-pointer text-md"
                                            wire:click="$emit('deleteProduct', '{{ $product->id }}')">Eliminar</a>
                                    </td> --}}

                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                    @if ($products->haspages())
                        <div class="px-4 py-2">
                            {{ $products->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <x-jet-dialog-modal wire:model="editForm.open" maxWidth="5xl">
        <x-slot name="title">
            Editar
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                    <x-jet-label>
                        Nombre
                    </x-jet-label>
                    <x-jet-input type="text" wire:model="editForm.name" class="w-full" />
                    <x-jet-input-error for="editForm.name" />
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <x-jet-label>
                        Slug
                    </x-jet-label>
                    <x-jet-input type="text" wire:model="editForm.slug" placeholder="Se llena automaticamente"
                        class="w-full" disabled />
                    <x-jet-input-error for="editForm.slug" />
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <x-jet-label>
                        Material
                    </x-jet-label>
                    <x-jet-input type="text" wire:model="editForm.material" class="w-full" />
                    <x-jet-input-error for="editForm.material" />
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <x-jet-label>
                        Tamaño
                    </x-jet-label>
                    <x-jet-input type="text" wire:model="editForm.size" class="w-full" />
                    <x-jet-input-error for="editForm.size" />
                </div>

                <div class="col-span-6 sm:col-span-2">
                    <x-jet-label>
                        Porcentaje de Precio de Salida
                    </x-jet-label>
                    <x-jet-input type="number" wire:model="percent" placeholder="Escribir unicamente el numero"
                        class="w-full bg-orange-100" />
                </div>

                <div class="col-span-6 sm:col-span-2">
                    <x-jet-label>
                        Precio Entrada
                    </x-jet-label>
                    <x-jet-input type="number" wire:model="editForm.price_in" class="w-full" />
                    <x-jet-input-error for="editForm.price_in" />
                </div>

                <div class="col-span-6 sm:col-span-2">
                    <x-jet-label>
                        Precio Salida
                    </x-jet-label>
                    <x-jet-input type="number" wire:model="editForm.price_out" class="w-full" disabled />
                    <x-jet-input-error for="editForm.price_out" />
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <x-jet-label>
                        Stock Entrada
                    </x-jet-label>
                    <x-jet-input type="text" wire:model="editForm.stock_in" class="w-full" />
                    <x-jet-input-error for="editForm.stock_in" />
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <x-jet-label>
                        Stock Salida
                    </x-jet-label>
                    <x-jet-input type="text" wire:model="editForm.stock_out" class="w-full" />
                    <x-jet-input-error for="editForm.stock_out" />
                </div>

                <div class="col-span-6 sm:col-span-6">
                    <x-jet-label>
                        Descripción
                    </x-jet-label>
                    <textarea wire:model="editForm.description" class="w-full h-40 rounded-md" cols="30" rows="10"></textarea>
                    <x-jet-input-error for="editForm.description" />
                </div>

                <div class="col-span-6 sm:col-span-3">

                    <x-jet-label>
                        Proveedor
                    </x-jet-label>

                    <select wire:model="editForm.provider_id"
                        class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">

                        <option value="" selected disabled>Seleccione un Proveedor</option>

                        @foreach ($providers as $provider)
                            <option value="{{ $provider->id }}">{{ $provider->name }} {{ $provider->last_name }}
                            </option>
                        @endforeach

                    </select>

                    <x-jet-input-error for="editForm.provider_id" />
                </div>

                <div class="col-span-6 sm:col-span-3">

                    <x-jet-label>
                        Categoria
                    </x-jet-label>

                    <select wire:model="editForm.provider_id"
                        class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">

                        <option value="" selected disabled>Seleccione una Categoria</option>

                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach

                    </select>

                    <x-jet-input-error for="editForm.provider_id" />
                </div>

                <div class="col-span-6 sm:col-span-3">

                    <x-jet-label>
                        Imagenes
                    </x-jet-label>

                    <input type="file" wire:model="images" class="w-full" multiple>

                    <x-jet-input-error for="images.*" />
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-update-button wire:click="update" wire:loading.attr="disabled" wire:target="update">
                Actualizar
            </x-update-button>
        </x-slot>
    </x-jet-dialog-modal>

    @push('script')
        <script>
            Livewire.on('deleteProduct', productId => {

                Swal.fire({
                    title: '¿Estas Seguro?',
                    text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Sí, bórralo!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emitTo('admin.products-component', 'delete', productId)
                        Swal.fire(
                            '¡Eliminado!',
                            'Se ha eliminado correctamente.',
                            'success'
                        )
                    }
                })
            })
        </script>
    @endpush

</div>
