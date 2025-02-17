<div>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mt-10">
            <div class="hero-content text-center">
                <div class="max-w-md">
                    <h1 class="text-3xl font-semibold">Tận hưởng và tự tin đặt phòng</h1>
                    <p class="py-4 text-sm">
                        Điền thông tin cá nhân liên quan để thuận tiện cho việc liên hệ.
                    </p>
                </div>
            </div>
        </div>
        <div class="container">
            <div role="alert" class="mb-4 alert bg-blue-200 bg-opacity-55 rounded-none border border-cyan-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    class="stroke-info h-4 w-4 shrink-0">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>

                <span class="text-sm text-cyan-600 font-semibold">Hãy điền thông tin nhanh chóng! Giá và tình trạng
                    phòng có sẵn có
                    thể thay đổi.</span>
            </div>
            <div class="grid grid-cols-5 gap-5 items-start pb-10">
                <div class="col-span-3 bg-white rounded">
                    <div class="card rounded-none">
                        <div class="card-body">
                            <h2 class="card-title pb-4 border-b px-0">Điền thông tin!</h2>
                            <form wire:submit.prevent="fillInfor">
                                <div class="grid grid-cols-2 gap-5">
                                    <div>
                                        <label class="text-sm font-semibold">Họ tên</label>
                                        <label class="input input-bordered flex items-center gap-2 mt-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"
                                                fill="currentColor" class="h-4 w-4 opacity-70">
                                                <path
                                                    d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM12.735 14c.618 0 1.093-.561.872-1.139a6.002 6.002 0 0 0-11.215 0c-.22.578.254 1.139.872 1.139h9.47Z" />
                                            </svg>
                                            <input type="text" wire:model.defer="bookForm.customer_name"
                                                class="grow border-none focus:outline-none focus:ring-0 focus:shadow-none"
                                                placeholder="Họ và tên" />
                                        </label>
                                        @error('bookForm.customer_name')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <label class="text-sm font-semibold">Địa chỉ Email</label>
                                        <label class="input input-bordered flex items-center gap-2 mt-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"
                                                fill="currentColor" class="h-4 w-4 opacity-70">
                                                <path
                                                    d="M2.5 3A1.5 1.5 0 0 0 1 4.5v.793c.026.009.051.02.076.032L7.674 8.51c.206.1.446.1.652 0l6.598-3.185A.755.755 0 0 1 15 5.293V4.5A1.5 1.5 0 0 0 13.5 3h-11Z" />
                                                <path
                                                    d="M15 6.954 8.978 9.86a2.25 2.25 0 0 1-1.956 0L1 6.954V11.5A1.5 1.5 0 0 0 2.5 13h11a1.5 1.5 0 0 0 1.5-1.5V6.954Z" />
                                            </svg>
                                            <input type="email" wire:model.defer="bookForm.customer_email"
                                                class="no-selection grow border-none focus:outline-none focus:ring-0 focus:shadow-none"
                                                placeholder="Email" />
                                        </label>
                                        @error('bookForm.customer_email')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <label class="text-sm font-semibold">Số điện thoại</label>
                                        <label class="input input-bordered flex items-center gap-2 mt-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="h-4 w-4 opacity-70">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M10.5 1.5H8.25A2.25 2.25 0 0 0 6 3.75v16.5a2.25 2.25 0 0 0 2.25 2.25h7.5A2.25 2.25 0 0 0 18 20.25V3.75a2.25 2.25 0 0 0-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                                            </svg>
                                            <input type="text" wire:model.defer="bookForm.customer_phone"
                                                class="grow border-none focus:outline-none focus:ring-0 focus:shadow-none"
                                                placeholder="Số điện thoại" />
                                        </label>
                                        @error('bookForm.customer_phone')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <label class="text-sm font-semibold">Địa chỉ</label>
                                        <label class="input input-bordered flex items-center gap-2 mt-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="h-4 w-4 opacity-70">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205 3 1m1.5.5-1.5-.5M6.75 7.364V3h-3v18m3-13.636 10.5-3.819" />
                                            </svg>

                                            <input type="text" wire:model.defer="bookForm.customer_address"
                                                class="grow border-none focus:outline-none focus:ring-0 focus:shadow-none"
                                                placeholder="Địa chỉ" />
                                        </label>
                                    </div>
                                    <div>
                                        <div class="relative">
                                            <input type="date" wire:model.defer="check_in"
                                                class="bg-gray-50 px-2.5 pb-2.5 pt-4 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                placeholder="Select date" min="{{ $check_in }}">
                                            <label for="floating_outlined"
                                                class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Check-in
                                            </label>
                                        </div>
                                        @error('check_in')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <div class="relative">
                                            <input type="date" wire:model.defer="check_out"
                                                class="bg-gray-50 px-2.5 pb-2.5 pt-4 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                placeholder="Select date" min="{{ $check_in }}">
                                            <label for="floating_outlined"
                                                class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Check-out
                                            </label>
                                        </div>
                                        @error('check_out')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="py-6 flex justify-end items-center text-center">
                                    <!-- The button to open modal -->
                                    <button type="submit">
                                        <label for="my_modal_6"
                                            class="py-2 mt-3 px-11 min-w-full me-2 mb-2 text-sm font-medium text-gray-100 focus:outline-none bg-green-400 rounded-lg border border-gray-200 hover:bg-green-500 hover:text-gray-50 hover:shadow focus:z-10 focus:ring-4 focus:ring-gray-100 ">
                                            Đặt phòng</label>
                                    </button>
                                </div>
                            </form>
                            @if ($showModal)
                                <!-- Put this part before </body> tag -->
                                <input type="checkbox" id="my_modal_6" class="modal-toggle" />
                                <div class="modal" role="dialog">
                                    <div class="modal-box">
                                        <h3 class="text-lg font-bold">Xác nhận</h3>
                                        <p class="py-4">Bạn có chắc chắn thông tin xác nhận thanh toán ?</p>
                                        <div class="modal-action">
                                            <label for="my_modal_6"
                                                class="py-2 px-5 rounded-lg mt-3 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-gray-200 border-gray-200 hover:bg-gray-500 hover:text-gray-50 hover:shadow focus:z-10 focus:ring-4 focus:ring-gray-100  border ">
                                                Đóng
                                            </label>
                                            <form action="{{ route('vnpay') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="vnpay" value="1">
                                                <button type="submit"
                                                    class="py-2 mt-3 px-11 me-2 mb-2 text-sm font-medium text-gray-100 focus:outline-none bg-green-400 rounded-lg border border-gray-200 hover:bg-green-500 hover:text-gray-50 hover:shadow focus:z-10 focus:ring-4 focus:ring-gray-100 ">
                                                    Đặt phòng
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-span-2 bg-white rounded">
                    @if(count($cart) > 0)
                        @foreach ($cart as $item)
                            <div class="cart-item border-t py-2">

                                <div class="card rounded-none">
                                    <div class="grid grid-cols-2 gap-5 p-6">
                                        <div class="">
                                            <p class="font-semibold text-lg py-2">{{ $item['room_type_name'] }}</p>
                                            <p class="font-normal text-gray-400">{{ $item['description'] }}</p>
                                        </div>
                                        <figure>
                                            <img src="{{Storage::url($item['image'])}}" />
                                        </figure>
                                    </div>
                                    <div class="card-body py-0 pb-1">
                                        <div class="rounded">
                                            <div class="grid grid-cols-2">
                                                <div class="">
                                                    <div class="flex items-center gap-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                            stroke-width="1.5" stroke="currentColor" class="size-4">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                        </svg>
                                                        <p class="text-gray-400 text-sm">Check-in</p>
                                                    </div>
                                                    {{date_format(now()->addDays(1), 'd/m/Y')}}
                                                </div>
                                                <div>
                                                    <div class="flex items-center gap-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                            stroke-width="1.5" stroke="currentColor" class="size-4">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                        </svg>
                                                        <p class="text-gray-400 text-sm">Check-out</p>
                                                    </div>
                                                    {{date_format(now()->addDays(2), 'd/m/Y')}}
                                                </div>
                                                <div class="col-span-2 pt-4">
                                                    <div class="flex gap-2 items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                            stroke-width="1.5" stroke="currentColor" class="size-4">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                                        </svg>

                                                        <p class="text-gray-400 text-sm">Tổng khách</p>
                                                    </div>
                                                    {{$item['adult'] + $item['children']}} khách
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div>
                            <div class="cart-item border-t p-6">
                                <div class="flex items-center justify-between mb-3">
                                    <div>
                                        <div class="font-semibold">
                                            Tổng tiền
                                        </div>
                                        <div class="text-gray-400 text-sm">
                                            Chưa bao gồm phí và thuế
                                        </div>
                                    </div>
                                    <div>
                                        <p class="text-lg font-bold">Giá: {{number_format($totalPay, 0, ',', '.')}}
                                            VND</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="flex items-center justify-center h-full flex-col m-auto">
                            <p class="pt-2 pb-4">Chọn 1 phòng để tiếp tục.</p>
                            <a href="{{route('room')}}" class="link link-primary text-center">Chọn phòng</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>