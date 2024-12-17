<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <div>
        <main class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="py-6">
                <x-mary-toast />

                <div class="shadow border rounded-lg bg-white overflow-hidden">
                    <div class="">
                        @if ($contacts && $contacts->google_map)
                            <div class="ifr-map">
                                <iframe src="{{ $contacts->google_map }}" class="w-full" height="350" style="border:0;"
                                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                                </iframe>
                            </div>
                        @else
                            <div class="text-center py-4 text-gray-500">
                                <p>Bản đồ chưa được cập nhật.</p>
                            </div>
                        @endif
                        <div class="p-6 px-10">
                            <div>
                                <p class="font-semibold text-2xl pt-4">Liên hệ</p>
                                <p class="text-orange-400 py-4 border-b">{{$contacts->address}}</p>
                            </div>
                            <div class=" border-b py-4">
                                <div class="flex justify-between gap-5">
                                    <div>
                                        @if ($contacts->pn1)
                                            <div>
                                                <span>Số điện thoại: </span>
                                                <span class="text-orange-400 py-4">{{$contacts->pn1}}</span>
                                            </div>
                                        @endif
                                        @if ($contacts->pn2)
                                            <div>
                                                <span>Số điện thoại: </span>
                                                <span class="text-orange-400 py-4">{{$contacts->pn2}}</span>
                                            </div>
                                        @endif
                                        @if ($contacts->email)
                                            <div>
                                                <span>Địa chỉ email: </span>
                                                <span class="text-orange-400 py-4">{{$contacts->email}}</span>
                                            </div>
                                        @endif
                                    </div>
                                    <div>
                                        @if ($contacts->facebook)
                                            <div class="flex gap-2 items-center">
                                                <i class='bx bxl-facebook-circle text-2xl text-blue-500'></i>
                                                <a href=" {{$contacts->facebook}}" class="text-blue-500">
                                                    {{$contacts->facebook}}</a>
                                            </div>
                                        @endif
                                        @if ($contacts->facebook)
                                            <div class="flex gap-2 items-center">
                                                <i class='bx bxl-instagram-alt text-2xl text-pink-500'></i>
                                                <a href=" {{$contacts->instagram}}" class="text-pink-500">
                                                    {{$contacts->instagram}}</a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div>
                                <p class="font-semibold text-xl pt-4">Giữ liên hệ</p>
                                <form class="py-4" wire:submit.prevent="sendMail">
                                    <div class="grid grid-cols-2 gap-5">
                                        <div>
                                            <label class="">Họ tên <span class="text-red-500">*</span></label>
                                            <label class="input input-bordered flex items-center gap-2 mt-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"
                                                    fill="currentColor" class="h-4 w-4 opacity-70">
                                                    <path
                                                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM12.735 14c.618 0 1.093-.561.872-1.139a6.002 6.002 0 0 0-11.215 0c-.22.578.254 1.139.872 1.139h9.47Z" />
                                                </svg>
                                                <input type="text" wire:model="name"
                                                    class="grow border-none focus:outline-none focus:ring-0 focus:shadow-none"
                                                    placeholder="Họ và tên" />
                                                @error('name') <span class="text-red-500">{{ $message }}</span>
                                                @enderror
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
                                                <input type="email" wire:model="email"
                                                    class="no-selection grow border-none focus:outline-none focus:ring-0 focus:shadow-none"
                                                    placeholder="Email" />
                                                @error('email') <span class="text-red-500">{{ $message }}</span>
                                                @enderror
                                            </label>
                                        </div>
                                        <div class="col-span-2">
                                            <label class="form-control">
                                                <label class=" mb-3">Tin nhắn <span
                                                        class="text-red-500">*</span></label>

                                                <textarea class="textarea textarea-bordered h-24" wire:model="messages"
                                                    placeholder="Lời nhắn"></textarea>
                                                @error('messages') <span class="text-red-500">{{ $message }}</span>
                                                @enderror
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
                                                Liên hệ</label>
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
</div>