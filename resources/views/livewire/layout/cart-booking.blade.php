<div>
    <div class="py-4">
        <div class="md:flex justify-between md:min-w-full py-1">
            <p>
                {{ \Carbon\Carbon::now()->addDays(1)->locale('vi')->translatedFormat('d F Y') }} –
                {{ \Carbon\Carbon::now()->addDays(2)->locale('vi')->translatedFormat('d F Y') }}
            </p>
            <p>
                1 night
            </p>
        </div>
        <p>1 phòng, 2 khách</p>
    </div>
    <div wire:loading class="text-center py-2 text-gray-500">
        <div
            class="px-3 py-1 text-xs font-medium leading-none text-center text-blue-800 bg-blue-200 rounded-full animate-pulse ">
            Đang xử lý...</div>
    </div>

    <div wire:loading.remove>
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
                    <div class="flex justify-between items-center">
                        <p class="text-sm">Số lượng khách : {{($item['adult'] + $item['children']) * $item['quantity']}} -
                        <p class="text-sm">
                            {{ $item['quantity'] }} phòng
                        </p>
                        </p>
                        <p>Giá: {{ number_format($item['price_per_room'] * $item['quantity'], '0', ',', '.') }} VND</p>
                    </div>
                    <small class=" text-gray-400 flex items-center gap-2">
                        <i class='bx bxs-user'></i>{{$item['adult'] * $item['quantity']}}
                        <i class='bx bx-child text-lg'></i> {{$item['children'] * $item['quantity']}}
                    </small>
                </div>
            @endforeach
            <div>
                <div class="cart-item border-t py-4">
                    <div class="flex items-center justify-between mb-3">
                        <div class="font-semibold">
                            Tổng tiền
                        </div>
                        <div>
                            <p class="text-lg font-bold">Giá: {{number_format($totalPay, 0, ',', '.')}} VND</p>
                        </div>
                    </div>
                </div>
                <div class="w-full py-2 text-sm font-medium cursor-pointer text-gray-100 focus:outline-none bg-green-400 rounded-lg border border-gray-200 hover:bg-green-500 hover:text-gray-50 hover:shadow focus:z-10 focus:ring-4 focus:ring-gray-100 text-center"
                    @click="window.location.href = '{{ route('payment') }}'">
                    Đặt phòng
                </div>


            </div>
        @else
            <div class="border-t flex items-center flex-col">
                <p class="pt-2 pb-4">Chọn 1 phòng để tiếp tục.</p>
                <button type="button"
                    class="text-white min-w-full bg-green-400  cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                    disabled>Đặt phòng</button>
            </div>
        @endif
    </div>

</div>