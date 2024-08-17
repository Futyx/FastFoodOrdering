<x-app-layout>

    <div class="bg-[url('https://i.postimg.cc/SRmfCbsp/IMG-9995-1.jpg')]  bg-fixed bg-cover bg-no-repeat bg-center min-h-screen bg-gray-100 py-2  sm:py-12">


        <div class="bg-white rounded-lg shadow-md p-6 m-4 max-w-xl">

            <p> {{ $user->name }} عزیز</p>
            @if (session()->has('message'))
            <div class="text-sm text-green-500 pb-2 alert alert-success">
                {{ session('message') }}
            </div>
            @else
            <div class="pb-6">سفارشات ثبت نشده شما : </div>



            <table class=" w-full text-sm rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-center text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                    <tr class="">
                        <th scope="col" class="px-6 py-3">
                            نام
                        </th>

                        <th scope="col" class="px-6 py-3">
                            تعداد
                        </th>
                        <th scope="col" class="px-6 py-3">
                            قیمت کل
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <!-- تنظیمات -->
                        </th>
                    </tr>
                </thead>

                <tbody>




                    @livewire('order-list', ['cartItems'=> $cartItems])





                </tbody>


            </table>
            @endif
            <form method="POST" class="pt-6 flex justify-end">
                @csrf
                @if (session('success'))
                <button class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                پرداخت انلاین
                </button>
                @else
                <button class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                    ثبت سفارش
                </button>
                @endif
            </form>
        </div>




    </div>
</x-app-layout>