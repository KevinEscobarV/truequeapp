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

            <div class="col-span-6 sm:col-span-3">
                <x-jet-label>
                    Precio
                </x-jet-label>
                <x-jet-input type="text" wire:model="createForm.price" class="w-full" />
                <x-jet-input-error for="createForm.price" />
            </div>

            <div class="col-span-6 sm:col-span-3">
                <x-jet-label>
                    Descripción
                </x-jet-label>
                <x-jet-input type="text" wire:model="createForm.description" class="w-full" />
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
                    Imagenes
                </x-jet-label>

                <input type="file" wire:model="images" class="w-full" multiple >

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
                                    MATERIAL
                                </th>

                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                    TAMAÑO
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
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                    PROVEEDOR
                                </th>
                                <th></th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">

                            @foreach ($products as $product)

                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $product->id }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $product->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $product->material }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $product->size }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $product->price_in }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $product->description }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $product->provider->name }} {{ $product->provider->last_name }}
                                    </td>


                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a class="pr-2 hover:text-blue-600 cursor-pointer"
                                            wire:click="edit('{{ $product->id }}')">Editar</a>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm">
                                        <a class="pl-2 hover:text-red-600 cursor-pointer text-md"
                                            wire:click="$emit('deleteProduct', '{{ $product->id }}')">Eliminar</a>
                                    </td>

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

    <x-jet-dialog-modal wire:model="editForm.open">
        <x-slot name="title">
            Editar
        </x-slot>

        <x-slot name="content">

            <div class="mb-6">
                <x-jet-label>
                    Nombre
                </x-jet-label>
                <x-jet-input type="text" wire:model="editForm.name" class="w-full" />
                <x-jet-input-error for="editForm.name" />
            </div>

            <div class="mb-6">
                <x-jet-label>
                    Material
                </x-jet-label>
                <x-jet-input type="text" wire:model="editForm.material" class="w-full" />
                <x-jet-input-error for="editForm.material" />
            </div>

            <div class="mb-6">
                <x-jet-label>
                    Tamaño
                </x-jet-label>
                <x-jet-input type="text" wire:model="editForm.size" class="w-full" />
                <x-jet-input-error for="editForm.size" />
            </div>

            <div class="mb-6">
                <x-jet-label>
                    Precio
                </x-jet-label>
                <x-jet-input type="text" wire:model="editForm.price" class="w-full" />
                <x-jet-input-error for="editForm.price" />
            </div>

            <div class="mb-6">
                <x-jet-label>
                    Descripción
                </x-jet-label>
                <x-jet-input type="text" wire:model="editForm.description" class="w-full" />
                <x-jet-input-error for="editForm.description" />
            </div>

            <div class="mb-6">

                <x-jet-label>
                    Proveedor
                </x-jet-label>

                <select wire:model="editForm.provider_id"
                    class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">

                    <option value="" selected disabled>Seleccione un Proveedor</option>

                    @foreach ($providers as $provider)
                        <option value="{{ $provider->id }}">{{ $provider->name }}</option>
                    @endforeach

                </select>

                <x-jet-input-error for="editForm.provider_id" />
            </div>

            <div class="mb-6">

                <x-jet-label>
                    Imagenes
                </x-jet-label>

                <input type="file" wire:model="edit_images" class="w-full" multiple >

                <x-jet-input-error for="edit_images.*" />
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
