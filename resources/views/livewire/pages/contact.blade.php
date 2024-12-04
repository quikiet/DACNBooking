<x-app-layout>

    @section('content')

    <div>
        <main class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="py-6">
                <div class="shadow border rounded-lg bg-white overflow-hidden">
                    <div class="">
                        <div class="ifr-map">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3920.0771566263015!2d106.61480117507637!3d10.728532389417335!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ddd54d7b0f9%3A0x71bb91451324b3db!2zNjcvOCBOZ3V54buFbiBRdcO9IFnDqm0sIEtodSBQaOG7kSA0LCBCw6xuaCBUw6JuLCBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1733223690501!5m2!1svi!2s"
                                class="w-full" height="350" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        <div class="p-6 px-10">
                            <div>
                                <p class="font-semibold text-2xl pt-4">Liên hệ</p>
                                <p class="text-orange-400 py-4 border-b">67/8/4 Nguyễn Quý Yêm, An Lạc, Bình
                                    Tân.</p>
                            </div>
                            <div class=" border-b py-4">
                                <div>
                                    <span>Số điện thoại: </span>
                                    <span class="text-orange-400 py-4">+84934092819</span>
                                </div>
                                <div>
                                    <span>Địa chỉ email: </span>
                                    <span class="text-orange-400 py-4">quikiet2003@gmail.com</span>
                                </div>
                            </div>
                            <div class=" border-b py-4">
                                <div>
                                    <span>Bãi đậu xe miễn phí, Bãi đậu xe có bảo vệ </span>
                                </div>
                            </div>
                            <div>
                                <p class="font-semibold text-xl pt-4">Giữ liên hệ</p>
                                <form class="py-4">
                                    <div class="grid grid-cols-2 gap-5">
                                        <div>
                                            <label class="">Họ tên <span class="text-red-500">*</span></label>
                                            <label class="input input-bordered flex items-center gap-2 mt-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"
                                                    fill="currentColor" class="h-4 w-4 opacity-70">
                                                    <path
                                                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM12.735 14c.618 0 1.093-.561.872-1.139a6.002 6.002 0 0 0-11.215 0c-.22.578.254 1.139.872 1.139h9.47Z" />
                                                </svg>
                                                <input type="text"
                                                    class="grow border-none focus:outline-none focus:ring-0 focus:shadow-none"
                                                    placeholder="Họ và tên" />
                                            </label>
                                        </div>
                                        <div>
                                            <label class="">Địa chỉ email <span class="text-red-500">*</span></label>
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
                                        </div>
                                        <div>
                                            <label class="">Số điện thoại <span class="text-red-500">*</span></label>
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
                                        </div>
                                        <div class="col-span-2">
                                            <label class="form-control">
                                                <label class=" mb-3">Tin nhắn <span
                                                        class="text-red-500">*</span></label>

                                                <textarea class="textarea textarea-bordered h-24"
                                                    placeholder="Lời nhắn"></textarea>
                                            </label>
                                            <p class="text-sm pt-2">Vì lý do bảo mật, xin đừng nhập thông tin thẻ tín
                                                dụng
                                                của bạn tại đây.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="py-6 flex justify-end items-center text-center">
                                        <!-- The button to open modal -->
                                        <button type="submit">
                                            <label for="my_modal_6"
                                                class="py-2 mt-3 px-11 min-w-full me-2 mb-2 text-sm font-medium text-gray-100 focus:outline-none bg-orange-400 rounded-lg border border-gray-200 hover:bg-orange-500 hover:text-gray-50 hover:shadow focus:z-10 focus:ring-4 focus:ring-gray-100 ">
                                                Đặt phòng</label>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    @endsection


</x-app-layout>