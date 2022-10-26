<div>
<x-slot name="title">
        <h2 class="text-xl text-white leading-tight">
            Generar Factura
        </h2>
    </x-slot>
    <x-form-section-factura submit="save" class="mx-6 my-7">

        <x-slot name="description">
            @livewire('admin.agregar-producto-factura')
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6 sm:col-span-2">

                <x-jet-label>
                    Tipo
                </x-jet-label>

                <select wire:model="createForm.type"
                    class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option value="" selected disabled>Seleccione el Tipo</option>
                    <option value="factura">Factura</option>
                    <option value="cotizacion">Cotización</option>
                </select>

                <x-jet-input-error for="createForm.type" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Nombre
                </x-jet-label>
                <x-jet-input type="text" wire:model="createForm.nombre" class="w-full" />
                <x-jet-input-error for="createForm.nombre" />
            </div>

            <div class="col-span-6 sm:col-span-3">
                <x-jet-label>
                    Direccion
                </x-jet-label>
                <x-jet-input type="text" wire:model="createForm.direccion" class="w-full" />
                <x-jet-input-error for="createForm.direccion" />
            </div>

            <div class="col-span-6 sm:col-span-3">
                <x-jet-label>
                    Correo Electronico
                </x-jet-label>
                <x-jet-input type="email" wire:model="createForm.email" class="w-full" />
                <x-jet-input-error for="createForm.email" />
            </div>

            <div class="col-span-6 sm:col-span-3">
                <x-jet-label>
                    Nit / Numero de Identificación
                </x-jet-label>
                <x-jet-input type="text" wire:model="createForm.nit" class="w-full" />
                <x-jet-input-error for="createForm.nit" />
            </div>

            <div class="col-span-6 sm:col-span-3">
                <x-jet-label>
                    Telefono
                </x-jet-label>
                <x-jet-input type="tel" wire:model="createForm.telefono" class="w-full" />
                <x-jet-input-error for="createForm.telefono" />
            </div>

            <div class="col-span-6 sm:col-span-6">
                <h1>Productos</h1>
            </div>
            

            <div class="col-span-6 sm:col-span-6">
    
                <div>
                    @livewire('admin.contenido-cart')
                </div>
                <x-jet-input-error for="createForm.contenido" />
            </div>


        </x-slot>

        <x-slot name="actions">
            <x-jet-button>
                Generar 
            </x-jet-button>
        </x-slot>


    </x-form-section-factura>

    <div class="flex flex-col my-7 mx-6">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gradient-to-r from-blueGray-800 to-red-700 text-white">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                    No
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                    TIPO
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                    NOMBRE
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                    NIT
                                </th>

                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                    DIRECCION
                                </th>

                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                    FECHA DE CREACION
                                </th>

                                <th></th>

                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">

                            @foreach ($facturas as $factura)

                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                        {{$factura->ref }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 uppercase">
                                        {{ $factura->type }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                        {{ $factura->nombre }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                        {{ $factura->nit }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                        {{ $factura->direccion }}
                                    </td>
                                    {{-- <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $factura->created_at->format('d/m/Y') }}
                                    </td> --}}
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                          <div>
                                            <div class="text-sm font-medium text-gray-900">
                                                Fecha: {{ $factura->created_at->format('d/m/Y') }}
                                            </div>
                                            <div class="text-sm text-gray-600">
                                                Hora: {{ $factura->created_at->format('g:i a') }}
                                            </div>
                                          </div>
                                        </div>
                                      </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a class="pr-2 hover:text-blue-600 cursor-pointer"
                                            target="blank" href="{{route('admin.factura', $factura)}}">VER</a>
                                    </td>

                                    
                                </tr>

                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
