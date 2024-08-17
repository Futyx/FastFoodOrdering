<x-app-layout>
    <form class='m-10' method='post' action="{{ route('order.show') }}">
        @csrf
        @method('DELETE') <!-- This indicates a delete request -->

        @foreach ($cartItems as $item)
        <div class='p-8'>
            <p>{{ $item['name'] }}</p>
            <p>{{ $item['id'] }}</p>
            <button type="submit" name="item_id" value="{{ $item['id'] }}" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
        </div>
        @endforeach

        <button type="submit">Confirm</button>
    </form>

</x-app-layout>