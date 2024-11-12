<div>
    <div class="bg-white">
        <div x-data="{open:false}">

            <!-- cart booking -->
            <div>
                <div class="relative z-50 lg:hidden" role="dialog" aria-modal="true" x-show="open" x-cloak>
                    <div class="fixed inset-0 bg-black bg-opacity-25" aria-hidden="true" @click="open = !open">
                        <div @click.stop
                            class="relative ml-auto flex h-full w-full max-w-xs flex-col overflow-y-auto bg-white py-4 pb-12 shadow-xl">
                            <div class="flex items-center justify-between px-4">
                                <h2 class="text-lg font-medium text-gray-900">Bộ lọc</h2>
                                <button type="button" @click="open = true"
                                    class="-mr-2 flex h-10 w-10 items-center justify-center rounded-md bg-white p-2 text-gray-400">
                                    <span class="sr-only">Close menu</span>
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" aria-hidden="true" data-slot="icon">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>

                            <div>
                                <form class="mt-4 border-t border-gray-200">
                                    <div class="border-t border-gray-200 px-4 py-6">
                                        <h1 class="pb-3 font-semibold text-xl">Chọn ngày</h1>
                                        <div class="pb-4">
                                            <label>Check-in</label>
                                            <input type="date"
                                                class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        </div>
                                        <div class="pb-4">
                                            <label>Check-out</label>
                                            <input type="date"
                                                class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        </div>
                                        <!-- Filter section, show/hide based on section state. -->
                                        <div class="pt-6" id="filter-section-mobile-0">
                                            <div class="space-y-6">
                                                <div class="border-t border-b border-gray-200 py-6 mb-4">
                                                    <div class="-my-3 flow-root">
                                                        <button
                                                            class="flex w-full items-center justify-between bg-white py-3 text-sm text-gray-400 hover:text-gray-500"
                                                            aria-controls="filter-section-0">
                                                            <span class=" text-gray-900 font-semibold text-lg">Tiện
                                                                Nghi
                                                            </span>
                                                        </button>
                                                    </div>
                                                    <div class="pt-6" id="filter-section-0">
                                                        <div class="space-y-4">
                                                            <div class="grid grid-cols-2 gap-5">
                                                                <div class="flex items-center">
                                                                    <input type="checkbox"
                                                                        class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                                    <label class="ml-3 text-sm text-gray-600">Máy
                                                                        lạnh</label>
                                                                </div>
                                                                <div class="flex items-center">
                                                                    <input type="checkbox"
                                                                        class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                                    <label
                                                                        class="ml-3 text-sm text-gray-600">TiVi</label>
                                                                </div>
                                                                <div class="flex items-center">
                                                                    <input type="checkbox" checked
                                                                        class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                                    <label class="ml-3 text-sm text-gray-600">Máy
                                                                        sưởi</label>
                                                                </div>
                                                                <div class="flex items-center">
                                                                    <input type="checkbox"
                                                                        class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                                    <label class="ml-3 text-sm text-gray-600">Giường
                                                                        phụ</label>
                                                                </div>
                                                                <div class="flex items-center">
                                                                    <input type="checkbox"
                                                                        class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                                    <label class="ml-3 text-sm text-gray-600">Bồn
                                                                        tắm</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h1 class="font-semibold text-xl">Số lượng khách</h1>
                                                <div class="grid grid-cols-2 gap-5">
                                                    <div class="mb-2">
                                                        <label>Người lớn</label>
                                                        <input type="number" min="0" max="10"
                                                            class="bg-gray-50 mt-3 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    </div>
                                                    <div class="mb-2">
                                                        <label>Trẻ em</label>
                                                        <input type="number" min="0" max="10"
                                                            class="bg-gray-50 mt-3 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <main class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex items-baseline justify-between border-b border-gray-200 pb-6 pt-10">
                    <h1 class="text-4xl font-semibold tracking-tight text-gray-900">Phòng của chúng tôi</h1>
                    <div class="flex items-center">
                        <div class="relative inline-block text-left">
                            <button id="dropDownFilterButton" data-dropdown-toggle="dropDownFilter"
                                class="text-gray-800  font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center"
                                type="button">Bộ lọc <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            <!-- Dropdown menu -->
                            <div id="dropDownFilter"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropDownFilterButton">
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign
                                            out</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <button type="button" class="-m-2 ml-5 p-2 text-gray-400 hover:text-gray-500 sm:ml-7">
                            <span class="sr-only">View grid</span>
                            <svg class="h-5 w-5" aria-hidden="true" viewBox="0 0 20 20" fill="currentColor"
                                data-slot="icon">
                                <path fill-rule="evenodd"
                                    d="M4.25 2A2.25 2.25 0 0 0 2 4.25v2.5A2.25 2.25 0 0 0 4.25 9h2.5A2.25 2.25 0 0 0 9 6.75v-2.5A2.25 2.25 0 0 0 6.75 2h-2.5Zm0 9A2.25 2.25 0 0 0 2 13.25v2.5A2.25 2.25 0 0 0 4.25 18h2.5A2.25 2.25 0 0 0 9 15.75v-2.5A2.25 2.25 0 0 0 6.75 11h-2.5Zm9-9A2.25 2.25 0 0 0 11 4.25v2.5A2.25 2.25 0 0 0 13.25 9h2.5A2.25 2.25 0 0 0 18 6.75v-2.5A2.25 2.25 0 0 0 15.75 2h-2.5Zm0 9A2.25 2.25 0 0 0 11 13.25v2.5A2.25 2.25 0 0 0 13.25 18h2.5A2.25 2.25 0 0 0 18 15.75v-2.5A2.25 2.25 0 0 0 15.75 11h-2.5Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>


                        <button type="button" class="-m-2 ml-4 p-2 text-gray-400 hover:text-gray-500 sm:ml-6 lg:hidden"
                            @click="open=!open">
                            <span class="sr-only">Filters</span>
                            <svg class="h-5 w-5" aria-hidden="true" viewBox="0 0 20 20" fill="currentColor"
                                data-slot="icon">
                                <path fill-rule="evenodd"
                                    d="M2.628 1.601C5.028 1.206 7.49 1 10 1s4.973.206 7.372.601a.75.75 0 0 1 .628.74v2.288a2.25 2.25 0 0 1-.659 1.59l-4.682 4.683a2.25 2.25 0 0 0-.659 1.59v3.037c0 .684-.31 1.33-.844 1.757l-1.937 1.55A.75.75 0 0 1 8 18.25v-5.757a2.25 2.25 0 0 0-.659-1.591L2.659 6.22A2.25 2.25 0 0 1 2 4.629V2.34a.75.75 0 0 1 .628-.74Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>

                <section aria-labelledby="products-heading" class="pb-24 pt-6">

                    <div>
                        <div class="p-4 shadow bg-white rounded border mb-3">
                            <form class="w-full">
                                <div class="md:grid-cols-12 items-center gap-5 grid grid-cols-2">
                                    <div class="col-span-4">
                                        <div class="relative">
                                            <input type="date"
                                                class="bg-gray-50 px-2.5 pb-2.5 pt-4 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Select date">
                                            <label for="floating_outlined"
                                                class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Check-in
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-span-4">
                                        <div class="relative">
                                            <input type="date"
                                                class="bg-gray-50 px-2.5 pb-2.5 pt-4 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Select date">
                                            <label for="floating_outlined"
                                                class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Check-out
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-span-2 items-center flex gap-10 relative" wire:model.live="adult">
                                        <label for="floating_outlined"
                                            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 
                                            peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Người
                                            lớn
                                        </label>
                                        <select id="underline_select" wire:model="adult"
                                            class="block py-2.5 px-2 w-1/2 text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                                            <option class="px-2 mx-4" selected value="1">1</option>
                                            <option class="px-2 mx-4" value="2">2</option>
                                            <option class="px-2 mx-4" value="3">3</option>
                                            <option class="px-2 mx-4" value="4">4</option>
                                            <option class="px-2 mx-4" value="5">5</option>
                                        </select>
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                            width="24px" fill="currentColor">
                                            <path
                                                d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Zm80-80h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56 0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T560-640q0-33-23.5-56.5T480-720q-33 0-56.5 23.5T400-640q0 33 23.5 56.5T480-560Zm0-80Zm0 400Z" />
                                        </svg>
                                    </div>
                                    <div class="col-span-2 items-center flex gap-10 relative"
                                        wire:model.live="children">
                                        <label for="floating_outlined"
                                            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">
                                            Trẻ
                                            em
                                        </label>
                                        <select id="underline_select" wire:model="adult"
                                            class="block py-2.5 px-2 w-1/2 text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                                            <option class="px-2 mx-4" selected value="1">1</option>
                                            <option class="px-2 mx-4" value="2">2</option>
                                            <option class="px-2 mx-4" value="3">3</option>
                                            <option class="px-2 mx-4" value="4">4</option>
                                            <option class="px-2 mx-4" value="5">5</option>
                                        </select>
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                            width="24px" fill="currentColor">
                                            <path
                                                d="M580-490q-21 0-35.5-14.5T530-540q0-21 14.5-35.5T580-590q21 0 35.5 14.5T630-540q0 21-14.5 35.5T580-490Zm-200 0q-21 0-35.5-14.5T330-540q0-21 14.5-35.5T380-590q21 0 35.5 14.5T430-540q0 21-14.5 35.5T380-490Zm100 210q-60 0-108.5-33T300-400h360q-23 54-71.5 87T480-280Zm0 160q-75 0-140.5-28.5t-114-77q-48.5-48.5-77-114T120-480q0-75 28.5-140.5t77-114q48.5-48.5 114-77T480-840q75 0 140.5 28.5t114 77q48.5 48.5 77 114T840-480q0 75-28.5 140.5t-77 114q-48.5 48.5-114 77T480-120Zm0-80q116 0 198-82t82-198q0-116-82-198t-198-82h-12q-6 0-12 2-6 6-8 13t-2 15q0 21 14.5 35.5T496-680q9 0 16.5-3t15.5-3q12 0 20 9t8 21q0 23-21.5 29.5T496-620q-45 0-77.5-32.5T386-730v-6q0-3 1-8-83 30-135 101t-52 163q0 116 82 198t198 82Zm0-280Z" />
                                        </svg>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-x-8 gap-y-10 lg:grid-cols-6">

                        <!-- Product grid -->
                        <div class="lg:col-span-4">
                            @foreach ($typeRooms as $typeRoom)
                                <div
                                    class="flex flex-col mb-5 bg-white border border-gray-200 rounded-lg shadow md:flex-row md:min-w-full hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                                    <div class="md:flex-none md:p-2 overflow-hidden md:w-1/3 md:h-[250px] ">
                                        @if ($typeRoom->room_images)
                                            @foreach ($typeRoom->room_images->take(1) as $image)
                                                <img class="object-cover w-full rounded-t-lg rounded h-96 md:h-full"
                                                    src="{{Storage::url($image->image_url)}}" alt="Hình ảnh">
                                            @endforeach
                                        @endif
                                    </div>
                                    <div
                                        class="md:flex-auto md:w-1/2 md:min-h-full flex flex-col justify-around p-4 leading-normal">
                                        <h5
                                            class="mb-2 text-2xl md:text-xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                            {{$typeRoom->name}}
                                        </h5>
                                        <div>
                                            <p class="mb-1 font-normal text-gray-700 dark:text-gray-400">
                                                Cơ sở hạ tầng
                                            </p>
                                            <div class="flex gap-2">
                                                <small class="rounded-full bg-slate-300 px-1">Ban công</small>
                                                <small class="rounded-full bg-slate-300 px-1">Phòng ngủ</small>
                                                <small class="rounded-full bg-slate-300 px-1">Phòng tắm</small>
                                            </div>
                                        </div>
                                        <div>
                                            <p class="mb-1 font-normal text-gray-700 dark:text-gray-400">
                                                Tiện nghi
                                            </p>
                                            <div class="flex gap-2">
                                                <small class="rounded-full bg-slate-300 px-1">Phòng tắm</small>
                                                <small class="rounded-full bg-slate-300 px-1">Phòng tắm</small>
                                                <small class="rounded-full bg-slate-300 px-1">Phòng tắm</small>
                                            </div>
                                        </div>
                                        <div>
                                            <p class="mb-1 font-normal text-gray-700 dark:text-gray-400">
                                                Số lượng khách
                                            </p>
                                            <div class="flex gap-2">
                                                <small
                                                    class="rounded-full bg-slate-300 px-1"><span>{{$typeRoom->adult}}</span>
                                                    Người
                                                    lớn</small>
                                                <small
                                                    class="rounded-full bg-slate-300 px-1"><span>{{$typeRoom->children}}</span>
                                                    Trẻ
                                                    em</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="md:flex-none md:w-48 md:m-auto md:min-h-full">
                                        <div class="flex flex-col items-center">
                                            <p class="py-3"><span>{{ number_format($typeRoom->price, 0, ',', '.') }}
                                                    đ/đêm</span></p>
                                            <div>
                                                <button
                                                    wire:click="addToCart({{ $typeRoom->room_type_id }}, 1, {{ $typeRoom->price }})"
                                                    class="py-2 px-11 me-2 mb-2 text-sm font-medium text-gray-100 focus:outline-none bg-green-400 rounded-lg border border-gray-200 hover:bg-green-500 hover:text-gray-50 hover:shadow focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                                    Đặt ngay
                                                </button>
                                            </div>

                                            <button type="button"
                                                class="py-2 px-10 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-green-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Xem
                                                thêm</button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- cart booking -->
                        <div class="lg:col-span-2">
                            <div class="shadow border rounded sticky top-24 p-4">
                                @livewire('layout.cart-booking')
                            </div>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>
</div>