<div>

    <div>
        @if (session()->has('success'))
        <div class="text-sm text-green-300 pb-2 alert alert-success">
            {{ session('success') }}
        </div>

        @endif
    </div>
    <div>

        <form>
            @csrf
            @foreach($menus as $menu)
            <div class="flex items-center justify-start space-y-2 menu-item">
                <span class="flex-shrink-0 text-lg text-white"> {{$menu->name}}</span>
                <span class="border-b-4 border-dotted border-teal-200 flex-grow"></span>
                <span class="flex-shrink-0 text-lg text-white font-mono "> {{$menu->price}}</span>
                <div class="flex items-center pr-4">
                    <button type="button" wire:click.prevent="decrement({{ $menu->id }})" class="text-sm">-</button>
                    <span class="mx-2">{{ $quantities[$menu->id] }}</span>
                    <button type="button" wire:click.prevent="increment({{ $menu->id }})" class="text-sm">+</button>
                </div>

            </div>
            @endforeach
            <button class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2" value="">

                <a href="{{ route('order.show') }}"> دیدن سفارشات</a>
            </button>
            <button wire:click.prevent="addToOrder" class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2" value="{{ $menu->id }}">
                افزودن
            </button>
    </div>
    </form>


</div>