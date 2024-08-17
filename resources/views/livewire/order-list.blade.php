<div>
<div>
        @if (session()->has('success'))
        <div class="text-sm text-green-300 pb-2 alert alert-success">
            {{ session('success') }}
        </div>

        @endif
    </div>


    @if($cartItems && count($cartItems) > 0)
    @foreach ($cartItems as $item)

    <tr wire:key="{{ $item['id'] }}" class="odd:bg-white text-center odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            {{ $item['name'] }}
        </th>

        <td class="px-6 py-4">
            <div wire:key="{{ $item['id'] }}_quantity" class="flex items-center">
                <button wire:click="decrement({{ $item['id'] }})" class="border rounded-md py-2 px-4 mr-2">-</button>
                <span class="text-center w-8">{{ $quantities[$item['id']] }}</span>
                <button wire:click="increment({{ $item['id'] }})" class="border rounded-md py-2 px-4 ml-2">+</button>
            </div>
        </td>
        <td class="px-6 py-4">
            {{ $item['totalPrice'] }}
        </td>

        <td class="px-6 py-4">
            <span>{{$menuName}}</span>
            <button wire:click="remove({{ $item['id'] }})" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                حذف</button>
        </td>
    </tr>

    @endforeach
   

    @else
    <tr>
        <td colspan="4" class="text-center">شما سفارشی ندارید</td>
    </tr>
    @endif



</div>