       <x-app-layout>

        <header>
            @livewire('search-component')
        </header>
       
            <div class="container mx-auto px-6 py-8">
                <div class="h-64 rounded-md overflow-hidden bg-cover bg-center" style="background-image: url('img/plan.jpeg')">
                    <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">
                        <div class="px-10 max-w-xl">
                            <h1 class="text-2xl text-white font-semibold">COMERCIALIZADORA EL TRUEQUE</h1>
                            <p class="mt-1 text-white -400">Venta de productos semi-Industriales en categoria de negocio, en la participacion de la creacion de nuevos establecimientos comerciales,Visitanos, podras crear tu tienda o la idea de negocio y la podremos hacer realidad tu  locale.</p>
                            <button class="flex items-center mt-4 px-3 py-2 bg-blue-600 text-white text-sm uppercase font-medium rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                <span>VISITAR</span>
                                <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="md:flex mt-8 md:-mx-4">
                    <div class="w-full h-64 md:mx-4 rounded-md overflow-hidden bg-cover bg-center md:w-1/2" style="background-image: url('img/Estu.jpeg')">
                        <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">
                            <div class="px-10 max-w-xl">
                                <h2 class="text-2xl text-white font-semibold">MISION</h2>
                                <p class="mt-2 text-white -400">Contribuir con el desarrollo de establecimientos en conjunto con los productos, que se ofrecen a la comunidad, con el fin de generar la creaci??n e innovaci??n de grandes, medianas y peque??as empresas, en la cual trabajamos constantemente para el desarrollar y realizar lo que creemos es el enfoque de mayor amplitud a nivel regional.</p>
                                <button class="flex items-center mt-4 text-white text-sm uppercase font-medium rounded hover:underline focus:outline-none">
                                    <span></span>
                                    <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="w-full h-64 mt-8 md:mx-4 rounded-md overflow-hidden bg-cover bg-center md:mt-0 md:w-1/2" style="background-image: url('img/estufita.jpeg')">
                        <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">
                            <div class="px-10 max-w-xl"> 
                                <h2 class="text-2xl text-white font-semibold">VISION</h2>
                                <p class="mt-2 text-white -400">Ser la empresa reconocida como l??der en la comercializaci??n de implementos semi-industriales, con el enfoque de obtener continuamente resultados, junto con el compromiso de servir a nuestros consumidores ret??ndonos continuamente, para alcanzar los m??ximos niveles de calidad en nuestros productos.</p>
                                <button class="flex items-center mt-4 text-white text-sm uppercase font-medium rounded hover:underline focus:outline-none">
                                    <span>Shop Now</span>
                                    <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-16">
                    <h1 class="text-black-100 text-2xl font-medium">PRODUCTOS</h1>
                    <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
                        @foreach ($products as $product)
                            <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden bg-white">
                                <div class="flex items-end justify-end h-56 w-full bg-cover" style="background-image: url('{{Storage::url($product->images->first()->url)}}')">
                                    <a href="{{route('product.show', $product)}}" class="p-4 rounded-full bg-blueGray-600 text-white mx-5 -mb-4 hover:bg-blueGray-500 focus:outline-none focus:bg-blueGray-500">
                                        <svg class="h-12 w-12" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                    </a>
                                </div>
                                <div class="px-5 py-3 bg-white w-full">
                                    <h3 class="text-gray-700 uppercase">{{$product->name}}</h3>
                                    <span class="text-gray-500 mt-2">{{$product->description}}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                {{-- <div class="mt-16">
                    <h3 class="text-gray-600 text-2xl font-medium">EJEMPLO</h3>
                    <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
                        <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                            <div class="flex items-end justify-end h-56 w-full bg-cover" style="background-image: url('img/Vitrina.jpeg')">
                                <button class="p-2 rounded-full bg-blue-600 text-white mx-5 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                    <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                </button>
                            </div>
                            <div class="px-5 py-3">
                                <h3 class="text-gray-700 uppercase">Vitrina</h3>
                                <span class="text-gray-500 mt-2">Aluminio, En Vidrio </span>
                            </div>
                        </div>
                        <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                            <div class="flex items-end justify-end h-56 w-full bg-cover" style="background-image: url('img/horno4.jpeg')">
                                <button class="p-2 rounded-full bg-blue-600 text-white mx-5 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                    <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                </button>
                            </div>
                            <div class="px-5 py-3">
                                <h3 class="text-gray-700 uppercase">Horno Industrial</h3>
                                <span class="text-gray-500 mt-2">Preparacion Alimentos</span>
                            </div>
                        </div>
                        <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                            <div class="flex items-end justify-end h-56 w-full bg-cover" style="background-image: url('img/folde.jpeg')">
                                <button class="p-2 rounded-full bg-blue-600 text-white mx-5 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                    <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                </button>
                            </div>
                            <div class="px-5 py-3">
                                <h3 class="text-gray-700 uppercase">Folde</h3>
                                <span class="text-gray-500 mt-2">Archivo </span>
                            </div>
                        </div>
                        <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                            <div class="flex items-end justify-end h-56 w-full bg-cover" style="background-image: url('img/asador.jpeg')">
                                <button class="p-2 rounded-full bg-blue-600 text-white mx-5 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                    <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                </button>
                            </div>
                            <div class="px-5 py-3">
                                <h3 class="text-gray-700 uppercase">Asador</h3>
                                <span class="text-gray-500 mt-2">Preparacion De Alimentos</span>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>


              </x-app-layout>
