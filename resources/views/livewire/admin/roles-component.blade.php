<div>
    <x-slot name="title">
        <h2 class="text-xl text-white leading-tight">
            Gestion de Roles
        </h2>
    </x-slot>
    <div class="py-2" x-data="{ open: false }">
        <div class="mx-auto sm:px-6 lg:px-8 mt-2">
            <div class="text-left">
                <button @click="open = ! open" x-text="open ? 'Cerrar Formulario' : 'Abrir Formulario'"
                    x-bind:class="open ? 'bg-orange-600 hover:bg-orange-400 focus:ring-orange-500' :
                        'bg-teal-700 hover:bg-teal-500 focus:ring-teal-500'"
                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white focus:outline-none focus:ring-2 focus:ring-offset-2">
                </button>
            </div>
            <div x-show="open" x-collapse class="mt-4">
                <x-jet-form-section submit="save">
                    <x-slot name="title">
                        Agregar un nuevo Usuario
                    </x-slot>
                    <x-slot name="description">
                        Complete la información necesaria para poder agregar una nuevo Usuario.
                    </x-slot>
                    <x-slot name="form">
                        <div class="col-span-6 sm:col-span-2">
                            <x-jet-label>
                                Nombre
                            </x-jet-label>
                            <x-jet-input type="text" wire:model="createForm.name" class="w-full" />
                            <x-jet-input-error for="createForm.name" />
                        </div>
                        <div class="col-span-6 sm:col-span-6">
                            <hr class="my-2">
                            <x-jet-label class="mb-2">
                                Permisos
                            </x-jet-label>
                            <div class="grid grid-cols-4">
                                @foreach ($permissions as $permission)
                                    <x-jet-label>
                                        <x-jet-checkbox wire:model.defer="createForm.permissions" name="permissions[]"
                                            value="{{ $permission->id }}" />
                                        {{ $permission->description }}
                                    </x-jet-label>
                                @endforeach
                            </div>
                            <x-jet-input-error for="createForm.permissions" />
                        </div>
                    </x-slot>
                    <x-slot name="actions">
                        <x-jet-action-message class="mr-3" on="saved">
                            Rol Guardado Exitosamente.
                        </x-jet-action-message>
                        <x-jet-button>
                            Guardar Rol
                        </x-jet-button>
                    </x-slot>
                </x-jet-form-section>
            </div>
        </div>
    </div>
    <div class="py-6">
        <div class="mx-auto sm:px-6 lg:px-8">
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="flex flex-col shadow-xl rounded-lg">
                <div class="-my-2 overflow-x-auto">
                    <div class="py-2 align-middle inline-block min-w-full ">
                        <div class="overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <div class="flex bg-teal-700 px-2 py-4 sm:px-5">
                                <x-jet-input type="text" wire:model="search"
                                    class="placeholder:text-slate-400 w-full" placeholder="Buscar un usuario..." />
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
                                <thead class="bg-teal-700 text-white">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                            Roles 
                                        </th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($roles as $rol)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $rol->name }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a class="pr-2 hover:text-blue-600 cursor-pointer"
                                                    wire:click="edit('{{ $rol->id }}')">Editar</a>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm">
                                                <a class="pl-2 hover:text-red-600 cursor-pointer text-md"
                                                    wire:click="$emit('deleteRol', '{{ $rol->id }}')">Eliminar</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="bg-gray-100 px-4 py-3 border-t border-gray-200 sm:px-6">
                                {{ $roles->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-jet-dialog-modal wire:model="editForm.open">
        <x-slot name="title">
            Editar
        </x-slot>
        <x-slot name="content">
            <div class="col-span-6 sm:col-span-2">
                <x-jet-label>
                    Nombre
                </x-jet-label>
                <x-jet-input type="text" wire:model="editForm.name" class="w-full" />
                <x-jet-input-error for="editForm.name" />
            </div>
            <div class="col-span-6 sm:col-span-6">
                <hr class="my-2">
                <x-jet-label class="mb-2">
                    Permisos
                </x-jet-label>
                <div class="grid grid-cols-4">
                    @foreach ($permissions as $permission)
                        <x-jet-label>
                            <x-jet-checkbox wire:model.defer="editForm.permissions" name="permissions[]"
                                value="{{ $permission->id }}" />
                            {{ $permission->description }}
                        </x-jet-label>
                    @endforeach
                </div>
                <x-jet-input-error for="editForm.permissions" />
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
            Livewire.on('deleteRol', roleId => {

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
                        Livewire.emitTo('admin.roles-component', 'delete', roleId)
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
