<div>
    <div class="flex">
        <span class="title-font font-medium text-2xl text-white"> $ {{ number_format($product->price_out, 0, '', ',') }}</span>
        <button class="rounded-full w-10 h-10 bg-gray-800 p-0 border-0 items-center justify-center text-gray-500 flex ml-auto">
          <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
            <path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"></path>
          </svg>
        </button>
        <x-jet-button wire:target="addItem" wire:click="addItem" wire:loading.attr="disabled" class="ml-4">
            Agregar
        </x-jet-button>
      </div>
</div>
