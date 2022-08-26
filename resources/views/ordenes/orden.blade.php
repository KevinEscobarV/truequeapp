<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
          RESUMEN DE PRODUCTOS
        </h2>
    </x-slot>

    <section class="text-white bg-gradient-to-b from-gray-900 to-transparent  body-font">
        <div class="container px-5 py-24 mx-auto">
          <div class="flex flex-col text-center w-full mb-20">
            <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-white">Pricing</h1>
            <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Banh mi cornhole echo park skateboard authentic crucifix neutra tilde lyft biodiesel artisan direct trade mumblecore 3 wolf moon twee</p>
          </div>
          <div class="lg:w-2/3 w-full mx-auto overflow-auto">
            <table class="table-auto w-full text-left whitespace-no-wrap">
              <thead>
                <tr>
                  <th class="px-4 py-3 title-font tracking-wider font-medium text-white text-sm bg-gray-800 rounded-tl rounded-bl">Plan</th>
                  <th class="px-4 py-3 title-font tracking-wider font-medium text-white text-sm bg-gray-800">Speed</th>
                  <th class="px-4 py-3 title-font tracking-wider font-medium text-white text-sm bg-gray-800">Storage</th>
                  <th class="px-4 py-3 title-font tracking-wider font-medium text-white text-sm bg-gray-800">Price</th>
                  <th class="w-10 title-font tracking-wider font-medium text-white text-sm bg-gray-800 rounded-tr rounded-br"></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="px-4 py-3">Start</td>
                  <td class="px-4 py-3">5 Mb/s</td>
                  <td class="px-4 py-3">15 GB</td>
                  <td class="px-4 py-3 text-lg text-white">Free</td>
                  <td class="w-10 text-center">
                    <input name="plan" type="radio">
                  </td>
                </tr>
                <tr>
                  <td class="border-t-2 border-gray-800 px-4 py-3">Pro</td>
                  <td class="border-t-2 border-gray-800 px-4 py-3">25 Mb/s</td>
                  <td class="border-t-2 border-gray-800 px-4 py-3">25 GB</td>
                  <td class="border-t-2 border-gray-800 px-4 py-3 text-lg text-white">$24</td>
                  <td class="border-t-2 border-gray-800 w-10 text-center">
                    <input name="plan" type="radio">
                  </td>
                </tr>
                <tr>
                  <td class="border-t-2 border-gray-800 px-4 py-3">Business</td>
                  <td class="border-t-2 border-gray-800 px-4 py-3">36 Mb/s</td>
                  <td class="border-t-2 border-gray-800 px-4 py-3">40 GB</td>
                  <td class="border-t-2 border-gray-800 px-4 py-3 text-lg text-white">$50</td>
                  <td class="border-t-2 border-gray-800 w-10 text-center">
                    <input name="plan" type="radio">
                  </td>
                </tr>
                <tr>
                  <td class="border-t-2 border-b-2 border-gray-800 px-4 py-3">Exclusive</td>
                  <td class="border-t-2 border-b-2 border-gray-800 px-4 py-3">48 Mb/s</td>
                  <td class="border-t-2 border-b-2 border-gray-800 px-4 py-3">120 GB</td>
                  <td class="border-t-2 border-b-2 border-gray-800 px-4 py-3 text-lg text-white">$72</td>
                  <td class="border-t-2 border-b-2 border-gray-800 w-10 text-center">
                    <input name="plan" type="radio">
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="flex pl-4 mt-4 lg:w-2/3 w-full mx-auto">

            <form>
              <script
                src="https://checkout.wompi.co/widget.js"
                data-render="button"
                data-public-key="{{$public_key}}"
                data-currency="{{$currency}}"
                data-amount-in-cents="{{$total}}"
                data-reference="{{$referencia}}"
                data-signature:integrity="{{$integridad}}"
                >
              </script>
            </form>
            
          </div>
        </div>
      </section>

</x-app-layout>