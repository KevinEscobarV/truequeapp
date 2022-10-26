<div>

    <div wire:ignore class="grid grid-cols-1 sm:grid-cols-3 gap-6 m-4">
        <div class="bg-white rounded-md shadow-md p-3">
            <canvas id="products1" width="200" height="200"></canvas>
        </div>
        <div class="bg-white rounded-md shadow-md p-3">
            <canvas id="products2" width="200" height="200"></canvas>
        </div>
        <div class="bg-white rounded-md shadow-md p-3">
            <canvas id="products3" width="200" height="200"></canvas>
        </div>
    </div>

    <div class="p-4">
        <div class="flex flex-col">
            <div class="overflow-x-auto">
                <div class="align-middle inline-block min-w-full">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <div class="flex bg-gradient-to-r from-blueGray-600 to-teal-600 px-2 py-4 sm:px-5">
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
                            <thead class="bg-gradient-to-r from-blueGray-600 to-teal-600 text-white">
                                <tr>
                                    <th colspan="2" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                    </th>
                                    <th colspan="4" class="px-6 py-3 text-left text-base text-blue-300 font-bold uppercase tracking-wider">
                                        PRODUCTO
                                    </th>
                                    <th colspan="3" class="px-6 py-3 text-left text-base text-red-300 font-bold uppercase tracking-wider">
                                        ENTRADAS
                                    </th>
                                    <th colspan="3" class="px-6 py-3 text-left text-base text-green-300 font-bold uppercase tracking-wider">
                                        SALIDAS
                                    </th>
                                    <th colspan="1" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                        No.
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                        FECHA DE ENTRADA
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
                                        class="px-6 py-3 text-left text-xs text-red-300 font-bold uppercase tracking-wider">
                                        PRECIO TOTAL
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
                                        class="px-6 py-3 text-left text-xs text-green-300 font-bold uppercase tracking-wider">
                                        PRECIO TOTAL
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                        PROVEEDOR
                                    </th>

                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">

                                @foreach ($products as $product)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $product->id }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500">
                                            {{ $product->created_at->format('d/m/Y') }}
                                            {{ $product->created_at->format('h:m:s A') }}
                                        </td>
                                        <td class="px-6 py-4">
                                            @if ($product->images->count())
                                                <img class="h-12 w-12 rounded-md object-cover"
                                                    src="{{ Storage::url($product->images->first()->url) }}" alt="">
                                            @else
                                                <img class="h-12 w-12 rounded-md object-cover"
                                                    src="{{ asset('img/default-product.png') }}" alt="">
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500">
                                            {{ $product->name }}
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
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            $ {{ number_format($product->price_in, 0, '', ',') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 border-r">
                                            $ {{ number_format($product->price_in * $product->stock_in, 0, '', ',') }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-center text-gray-500">
                                            {{ $product->stock_out }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            $ {{ number_format($product->price_out, 0, '', ',') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 border-r">
                                            $ {{ number_format($product->price_out * $product->stock_out, 0, '', ',') }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500">
                                            {{ $product->provider->name }} {{ $product->provider->last_name }}
                                        </td>


                                        {{-- <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a class="pr-2 hover:text-blue-600 cursor-pointer"
                                                wire:click="edit('{{ $product->id }}')">Editar</a>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm">
                                            <a class="pl-2 hover:text-red-600 cursor-pointer text-md"
                                                wire:click="$emit('deleteProduct', '{{ $product->id }}')">Eliminar</a>
                                        </td> --}}

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

    @push('script')
        <script>

            var products = {!! $products_max_cant->toJson() !!};
            var names = [];
            var cant = [];

            products.forEach(function(product) {
                names.push(product.name);
                cant.push(product.stock_in);
            });

            function grafica1() {
                 
                const products1 = document.getElementById('products1').getContext('2d');
                const myChart = new Chart(products1, {
                    type: 'pie',
                    data: {
                        labels: names,
                        datasets: [{
                            label: '# of Votes',
                            data: cant,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.5)',
                                'rgba(54, 162, 235, 0.5)',
                                'rgba(255, 206, 86, 0.5)',
                                'rgba(75, 192, 192, 0.5)',
                                'rgba(153, 102, 255, 0.5)',
                                'rgba(255, 159, 64, 0.5)',
                                'rgba(0, 222, 219, 0.5)',
                                'rgba(222, 0, 27, 0.5)',
                                'rgba(13, 222, 0, 0.5)',
                                'rgba(106, 0, 155, 0.5)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(0, 222, 219, 1)',
                                'rgba(222, 0, 27, 1)',
                                'rgba(13, 222, 0, 1)',
                                'rgba(106, 0, 155, 1)'
                            ],
                            borderWidth: 3
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }

            function grafica2() {
                const products2 = document.getElementById('products2').getContext('2d');
                const myChart = new Chart(products2, {
                    type: 'pie',
                    data: {
                        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                        datasets: [{
                            label: '# of Votes',
                            data: [12, 19, 3, 5, 2, 3],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }

            function grafica3() {
                const products3 = document.getElementById('products3').getContext('2d');
                const myChart = new Chart(products3, {
                    type: 'line',
                    data: {
                        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                        datasets: [{
                            label: '# of Votes',
                            data: [12, 19, 3, 5, 2, 3],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }

            grafica1();
            grafica2();
            grafica3();

        </script>
    @endpush
</div>
