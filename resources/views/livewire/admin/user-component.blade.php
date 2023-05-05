<div>
<div class="py-2" x-data="{ open: false }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="text-right">              
                <button @click="open = ! open" x-text="open ? 'Cerrar Formulario' : 'Abrir Formulario'"
                x-bind:class="open ? 'bg-orange-600 hover:bg-orange-400 focus:ring-orange-500' : 'bg-teal-700 hover:bg-teal-500 focus:ring-teal-500'"
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
                        <div class="col-span-6 sm:col-span-2">
                            <x-jet-label>
                                Apellido
                            </x-jet-label>
                            <x-jet-input type="text" wire:model="createForm.apellido" class="w-full" />
                            <x-jet-input-error for="createForm.apellido" />
                        </div>
                        <div class="col-span-6 sm:col-span-2">
                            <x-jet-label>
                                Identificación
                            </x-jet-label>
                            <x-jet-input type="text" wire:model="createForm.identificacion" class="w-full" />
                            <x-jet-input-error for="createForm.identificacion" />
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <x-jet-label>
                                Correo
                            </x-jet-label>
                            <x-jet-input type="email" wire:model="createForm.email" class="w-full" />
                            <x-jet-input-error for="createForm.email" />
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <x-jet-label>
                                Contraseña
                            </x-jet-label>
                            <x-jet-input type="password" wire:model="createForm.password" class="w-full" />
                            <x-jet-input-error for="createForm.password" />
                        </div>
                        <div class="col-span-6 sm:col-span-6">
                            <hr class="my-2">
                            <x-jet-label class="mb-2">
                                Rol
                            </x-jet-label>
                            <div class="grid grid-cols-4">
                                @foreach ($roles as $role)
                                    <x-jet-label>
                                        <x-jet-checkbox wire:model.defer="createForm.roles" name="roles[]"
                                            value="{{ $role->id }}" />
                                        {{ $role->name }}
                                    </x-jet-label>
                                @endforeach
                            </div>
                            <x-jet-input-error for="createForm.roles" />
                        </div>
                    </x-slot>
                    <x-slot name="actions">
                        <x-jet-action-message class="mr-3" on="saved">
                            Usuario Guardado Exitosamente.
                        </x-jet-action-message>
                        <x-jet-button>
                            Guardar Usuario
                        </x-jet-button>
                    </x-slot>
                </x-jet-form-section>
            </div>
        </div>
    </div>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="flex flex-col shadow-xl rounded-lg">
                <div class="-my-2 overflow-x-auto">
                    <div class="py-2 align-middle inline-block min-w-full ">
                        <div class="overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <div class="flex bg-teal-700 px-2 py-4 sm:px-5">
                                <x-jet-input type="text" wire:model="search" class="placeholder:text-slate-400 w-full"
                                    placeholder="Buscar un usuario..." />
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
                                            Nombre
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                            Identificación
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                            Rol
                                        </th>
                                        <th></th>                                       
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($users as $user)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 h-10 w-10">
                                                        <img class="h-10 w-10 rounded-xl object-cover"
                                                            src="{{ $user->profile_photo_url }}"
                                                            alt="{{ $user->name }}">
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{ $user->name }}
                                                            {{ $user->apellido }}</div>
                                                        <div class="text-sm text-gray-500">{{ $user->email }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $user->identificacion }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $user->role_name}}
                                            </td>
                                           
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <div class="flex gap-x-2">
                                                    <a class="pr-2 text-blue-400 hover:text-blue-600 cursor-pointer"
                                                    href="{{route('admin.usuarios.edit', $user)}}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                                        </svg>
                                                    </a>
                                                    <a class="pl-2 text-red-400 hover:text-red-600 cursor-pointer text-md"
                                                        wire:click="$emit('deleteUser', '{{ $user->id }}')">
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
                            <div class="bg-gray-100 px-4 py-3 border-t border-gray-200 sm:px-6">
                                {{ $users->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('script')
        <script>
            Livewire.on('deleteUser', userId => {

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
                        Livewire.emitTo('admin.user-component', 'delete', userId)
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
