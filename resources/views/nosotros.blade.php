<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl text-gray-800 leading-tight">
            Nosotros
        </h2>
    </x-slot>
                
                <section class="mx-2 text-gray-600 body-font relative">
                    <div class="px-5 py-12 flex sm:flex-nowrap flex-wrap">
                      <div class="lg:w-2/3 md:w-1/2 bg-gray-300 rounded-lg overflow-hidden sm:mr-10 p-10 flex items-end justify-start relative">
                        <iframe width="100%" height="100%" class="absolute inset-0" frameborder="0" title="map" marginheight="0" marginwidth="0" scrolling="no" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=es&amp;q=+(El%20Trueque%20Yopal)&amp;t=&amp;z=15&amp;ie=UTF8&amp;iwloc=B&amp;output=embed" style=""></iframe>

                        <div class="bg-white relative flex flex-wrap py-6 rounded shadow-md">
                          <div class="lg:w-1/2 px-6">
                            <h2 class="title-font font-semibold text-gray-900 tracking-widest text-sm">Acerca de:</h2>
                            <p class="mt-1 text-justify">El trueque es el intercambio de objetos o servicios por otros objetos o servicios y se diferencia de la compraventa habitual en que no intermedia el dinero en líquido en la transacción.</p>
                          </div>
                          <div class="lg:w-1/2 px-6 mt-4 lg:mt-0">
                            <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs">EMAIL</h2>
                            <a class="text-indigo-500 leading-relaxed">example@email.com</a>
                            <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs mt-4">TELEFONO</h2>
                            <p class="leading-relaxed">123-456-7890</p>
                          </div>
                        </div>
                      </div>
                      <div class="lg:w-1/3 md:w-1/2 bg-white rounded-md p-6 flex flex-col md:ml-auto w-full md:py-8 mt-8 md:mt-0">
                        <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">Contactanos</h2>
                        <p class="leading-relaxed mb-5 text-gray-600">Nos comunicaremos contigo lo mas pronto posible.</p>
                        <div class="relative mb-4">
                          <label for="name" class="leading-7 text-sm text-gray-600">Nombre</label>
                          <input type="text" id="name" name="name" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <div class="relative mb-4">
                          <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
                          <input type="email" id="email" name="email" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <div class="relative mb-4">
                          <label for="message" class="leading-7 text-sm text-gray-600">Mensaje</label>
                          <textarea id="message" name="message" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                        </div>
                        <button class="text-white bg-blueGray-500 border-0 py-2 px-6 focus:outline-none hover:bg-blueGray-600 rounded text-lg">Enviar</button>
                        <p class="text-xs text-gray-500 mt-3">Gracias por escribirnos, trabajamos para responderte lo mas pronto posible.</p>
                      </div>
                    </div>
                  </section>
      
</x-app-layout>
