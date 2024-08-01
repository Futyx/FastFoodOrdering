<x-app-layout>

    <div class="bg-[url('https://i.postimg.cc/SRmfCbsp/IMG-9995-1.jpg')] bg-fixed bg-cover bg-no-repeat bg-center min-h-screen bg-gray-100 py-2  sm:py-12">

        <div class="flex flex-col justify-center">


            <div class="flex justify-start items-start pr-8">

                <fieldset class="text-xl w-1/2 border-2 border-indigo-400 shadow-neon rounded-lg px-4 py-2">
                    @livewire('order-counter')


                    <legend class="px-1 font-semibold  text-white"> {{ $category->name}}</legend>
                    <div class=" p-2 text-white ">

                        @livewire('create-cart', ['menus'=> $menus])

                    </div>




                </fieldset>



            </div>
        </div>
    </div>

</x-app-layout>