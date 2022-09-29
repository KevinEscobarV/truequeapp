<div>
    
    <x-slot name="title">
        <h2 class="text-xl text-white leading-tight">
            Gestion de Categorias
        </h2>
    </x-slot>

    <x-form-section-admin submit="save" class="mx-6 my-7">
        <x-slot name="title">
            Agregar una nueva categoria
        </x-slot>

        <x-slot name="description">
            Complete la información necesaria para poder agregar una nueva categoria
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
                <x-jet-input type="text" wire:model="createForm.slug" class="w-full" />
                <x-jet-input-error for="createForm.slug" />
            </div>

            <div class="col-span-6 sm:col-span-3">
                <x-jet-label>
                    Descripción
                </x-jet-label>
                <x-jet-input type="text" wire:model="createForm.description" class="w-full" />
                <x-jet-input-error for="createForm.description" />
            </div>

            <div class="col-span-6 sm:col-span-6">
                <x-jet-label>
                    Imagen
                </x-jet-label>
                <x-jet-input type="file" wire:model="createForm.image" class="w-full" />
                <x-jet-input-error for="createForm.image" />
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
                                    SLUG
                                </th>

                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                    DESCRIPCIÓN
                                </th>

                                <th></th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">

                            @foreach ($categories as $category)

                                <tr>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $category->id }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded-xl object-cover"
                                                    src="{{ Storage::url($category->image) }}"
                                                    alt="{{ $category->name }}">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $category->name }}
                                                </div>
                                                <div class="text-sm text-gray-500">Productos: {{ $category->products->count() }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $category->slug }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $category->description }}
                                    </td>


                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a class="pr-2 hover:text-blue-600 cursor-pointer"
                                            wire:click="edit('{{ $category->id }}')">Editar</a>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm">
                                        <a class="pl-2 hover:text-red-600 cursor-pointer text-md"
                                            wire:click="$emit('deleteCategory', '{{ $category->id }}')">Eliminar</a>
                                    </td>

                                </tr>

                            @endforeach

                        </tbody>
                    </table>
                    @if($categories->haspages())
                        <div class="py-2 px-4">
                            {{ $categories->links() }}
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
                @if ($editForm['image'])
                    <img class="w-full h-64 object-cover object-center rounded-lg"
                        src="{{ Storage::url($editForm['image']) }}">
                @endif
            </div>

            <div class="mb-6">
                <x-jet-label>
                    Nombre
                </x-jet-label>
                <x-jet-input type="text" wire:model="editForm.name" class="w-full" />
                <x-jet-input-error for="editForm.name" />
            </div>

            <div class="mb-6">
                <x-jet-label>
                    Slug
                </x-jet-label>
                <x-jet-input type="text" wire:model="editForm.slug" class="w-full" />
                <x-jet-input-error for="editForm.slug" />
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
                    Imagen
                </x-jet-label>
                <x-jet-input type="file" wire:model="editForm.image" class="w-full" />
                <x-jet-input-error for="editForm.image" />
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
            Livewire.on('deleteCategory', categoryId => {

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
                        Livewire.emitTo('admin.category-component', 'delete', categoryId)
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
