<div>

    <x-slot name="title">
        <h2 class="text-xl text-white leading-tight">
            Gestion de Proveedores
        </h2>
    </x-slot>

    <x-form-section-admin submit="save" class="mx-6 my-7">
        <x-slot name="title">
            Agregar un Nuevo Producto
        </x-slot>

        <x-slot name="description">
            Complete la información necesaria para poder agregar un nuevo proveedor.
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
                    Apellido
                </x-jet-label>
                <x-jet-input type="text" wire:model="createForm.last_name" class="w-full" />
                <x-jet-input-error for="createForm.last_name" />
            </div>

            <div class="col-span-6 sm:col-span-3">
                <x-jet-label>
                    Ciudad / Municipio
                </x-jet-label>
                <x-jet-input type="text" wire:model="createForm.city" class="w-full" />
                <x-jet-input-error for="createForm.city" />
            </div>

            <div class="col-span-6 sm:col-span-3">
                <x-jet-label>
                    Telefono
                </x-jet-label>
                <x-jet-input type="text" wire:model="createForm.phone" class="w-full" />
                <x-jet-input-error for="createForm.phone" />
            </div>

            <div class="col-span-6 sm:col-span-6">
                <x-jet-label>
                    Descripción
                </x-jet-label>
                <textarea wire:model="createForm.description" id="" cols="30" rows="10" class="w-full h-40 rounded-md"></textarea>
                <x-jet-input-error for="createForm.description" />
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
                        <thead class="bg-gradient-to-r from-blueGray-800 to-orange-700 text-white">
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
                                    APELLIDO
                                </th>

                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                    CIUDAD
                                </th>

                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                    TELEFONO
                                </th>

                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                    DESCRIPCIÓN
                                </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">

                            @foreach ($providers as $provider)

                                <tr>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $provider->id }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $provider->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $provider->last_name }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $provider->city }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $provider->phone }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $provider->description }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="flex gap-x-2">
                                            <a class="pr-2 text-blue-400 hover:text-blue-600 cursor-pointer"
                                                wire:click="edit('{{ $provider->id }}')">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                                </svg>
                                            </a>
                                            <a class="pl-2 text-red-400 hover:text-red-600 cursor-pointer text-md"
                                                wire:click="$emit('deleteProvider', '{{ $provider->id }}')">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg>
                                            </a>
                                        </div>
                                    </td>

                                </tr>

                            @endforeach

                        </tbody>
                    </table>
                    @if($providers->haspages())
                        <div class="py-2 px-4">
                            {{ $providers->links() }}
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
                    Apellido
                </x-jet-label>
                <x-jet-input type="text" wire:model="editForm.last_name" class="w-full" />
                <x-jet-input-error for="editForm.last_name" />
            </div>

            <div class="mb-6">
                <x-jet-label>
                    Ciudad / Municipio
                </x-jet-label>
                <x-jet-input type="text" wire:model="editForm.city" class="w-full" />
                <x-jet-input-error for="editForm.city" />
            </div>

            <div class="mb-6">
                <x-jet-label>
                    Telefono
                </x-jet-label>
                <x-jet-input type="text" wire:model="editForm.phone" class="w-full" />
                <x-jet-input-error for="editForm.phone" />
            </div>

            <div class="mb-6">
                <x-jet-label>
                    Descripción
                </x-jet-label>
                <textarea wire:model="editForm.description" id="" cols="30" rows="10" class="w-full h-40 rounded-md"></textarea>
                <x-jet-input-error for="editForm.description" />
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
            Livewire.on('deleteProvider', providerId => {

                Swal.fire({
                    title: '¿Estas Seguro?',
                    text: "¡Al eliminar este proveedor se eliminaran todos los productos asociados a el!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Sí, bórralo!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emitTo('admin.provider-component', 'delete', providerId)
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
