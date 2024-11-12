<div>
    <div class="py-4">
        <div class="md:flex justify-between md:min-w-full py-1">
            <p>
                Tue, 12 Nov 24 – Wed, 13 Nov 24
            </p>
            <p>
                1 night
            </p>
        </div>
        <p>1 phòng, 2 khách</p>
    </div>
    @if(count($cart) > 0)
        @foreach ($cart as $item)
            <div class="cart-item border-t py-2">
                <div class="flex items-center justify-between">
                    <p class="font-semibold">{{ $item['room_type_name'] }}</p>
                    <button wire:click="removeFromCart({{$item['room_type_id']}})">
                        <svg xmlns="http://www.w3.org/2000/svg" height="21px" viewBox="0 -960 960 960" width="21px"
                            fill="currentColor">
                            <path
                                d="M312-144q-29.7 0-50.85-21.15Q240-186.3 240-216v-480h-48v-72h192v-48h192v48h192v72h-48v479.57Q720-186 698.85-165T648-144H312Zm336-552H312v480h336v-480ZM384-288h72v-336h-72v336Zm120 0h72v-336h-72v336ZM312-696v480-480Z" />
                        </svg>
                    </button>
                </div>
                <p> {{ $item['quantity'] }} phòng</p>
                <div class="flex justify-between items-center">
                    <p>Số lượng khách : {{$item['adult'] + $item['children']}}</p>
                    <p>Giá: {{ number_format($item['price_per_room'], '0', ',', '.') }} VND</p>
                </div>
            </div>
        @endforeach
        <button
            class="py-2 mt-3 px-11 min-w-full me-2 mb-2 text-sm font-medium text-gray-100 focus:outline-none bg-green-400 rounded-lg border border-gray-200 hover:bg-green-500 hover:text-gray-50 hover:shadow focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
            Đặt ngay
        </button>
    @else
        <div class="border-t flex items-center flex-col">
            <p class="pt-2 pb-4">Chọn 1 phòng để tiếp tục.</p>
            <button type="button"
                class="text-white min-w-full bg-green-400 dark:bg-green-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                disabled>Đặt phòng</button>
        </div>
    @endif


</div>