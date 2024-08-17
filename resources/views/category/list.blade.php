<x-app-layout>



    <div class="bg-[url('https://i.postimg.cc/SRmfCbsp/IMG-9995-1.jpg')] bg-fixed bg-cover bg-no-repeat bg-center min-h-screen bg-gray-100 py-2  sm:py-12">

        
        <div class="flex flex-col justify-center">

            <div class="flex justify-center items-center">

                <fieldset class="text-xl text-center w-2/3 px-2 shadow-neon rounded-lg  py-2">

                    @foreach($categories as $category)
                    <div class="p-4 text-white ">
                        <a href="{{ route('menus.show', ['name' => $category->name]) }}" class="rounded-full transition hover:text-gray-800 hover:bg-purple-500 font-semibold p-2 border-1 ">
                            {{ $category->name}}</a>
                    </div>
                    @endforeach


                </fieldset>





                @if(session('success'))
                <div class="bg-green-300 border-l-4 h-12 w-80 border-green-700 text-white p-4 rounded-lg">
                    <p class="text-sm font-semibold">سفارش شما با موفقیت به <a href="{{ route('order') }}">سبد خرید</a>اضافه شد</p>


                </div>
                @endif

            </div>
        </div>
    </div>



</x-app-layout>