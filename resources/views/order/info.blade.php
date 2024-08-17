<x-app-layout>

    <div class="bg-[url('https://i.postimg.cc/SRmfCbsp/IMG-9995-1.jpg')] bg-fixed bg-cover bg-no-repeat bg-center min-h-screen bg-gray-100 py-2  sm:py-12">

        <div class="grid sm:grid-cols-2 items-center gap-16  mx-auto max-w-4xl  shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] rounded-md text-white font-[sans-serif]">
            <div class="pr-8">
                <h1 class=" text-xl font-bold">فیش خرید شما :</h1>

                <div class="mt-8">
                    <ul class="">
                        @foreach ($orders as $order)

                        <li class="flex items-center" >کد سفارش :
                            {{ $order->id }}
                        </li>
                        <li>هزینه کل :
                            {{ $order->amount }}
                        </li>
                    </ul>

                    @endforeach
                </div>
            </div>

            <form action="" method="post" class="text-blue-800 w-80 space-y-4">
                @csrf
                <input type='text' name="name" placeholder='نام' class="w-full rounded-md py-2.5 px-4 border text-sm outline-[#007bff]" />
                <input type='text' name='last_name' placeholder='نام خانوادگی' class="w-full rounded-md py-2.5 px-4 border text-sm outline-[#007bff]" />
                <textarea  placeholder='آدرس' name='address' class="w-full rounded-md py-2.5 px-4 border text-sm outline-[#007bff]" ></textarea>
                <textarea placeholder='توضیحات' rows="6" name='detail' class="w-full rounded-md px-4 border text-sm pt-2.5 outline-[#007bff]"></textarea>
                <button type='button' type="submit" class="text-white bg-[#007bff] hover:bg-blue-600 font-semibold rounded-md text-sm px-4 py-2.5 w-full">پرداخت</button>
            </form>
        </div>


    </div>

</x-app-layout>