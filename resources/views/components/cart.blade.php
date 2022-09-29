<div :class="cartOpen ? 'translate-x-0 ease-out' : 'translate-x-full ease-in'" class="fixed right-0 top-0 max-w-lg w-full h-full px-6 py-4 transition duration-300 transform overflow-y-auto shadow-md bg-white z-50">

        <div class="h-full flex flex-col">
          <div class="flex-1">
            <div class="flex items-start justify-between">
              <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">
                Carrito de Compras
              </h2>
              <div class="ml-3 h-7 flex items-center">
                <button @click="cartOpen = !cartOpen" class="-m-2 p-2 text-gray-400 hover:text-gray-500">
                  <span class="sr-only">Close panel</span>
                  <!-- Heroicon name: outline/x -->
                  <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                  </svg>
                </button>
              </div>
            </div>

            <div class="mt-8">
              <div class="flow-root">
                <ul role="list" class="-my-6 divide-y divide-gray-200">

                  <livewire:cart-component />

                </ul>
              </div>
            </div>
          </div>

          <div class="border-t border-gray-200 py-6 px-4 sm:px-6">
            <livewire:sub-total-component />
            <p class="mt-0.5 text-sm text-gray-500">Envío e impuestos calculados al finalizar la compra.</p>
            <div class="mt-6">
              <a href="{{route('orden')}}" class="flex justify-center items-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">Ir a Pagar</a>
            </div>
          </div>
        </div>
    
</div>