<div>


    <!-- toast -->
    <x-mary-toast />

    <div class="md:h-auto pb-4">
        <div class="sm:min-w-full">
            <div class="h-64 md:h-[350px] w-full bg-cover bg-center relative"
                style="background-image: 
                url('https://www.sixsensescondao.com/wp-content/uploads/2020/12/resized_SixSenses_ConDao_OceanVilla_David-Mitchener_Architecture-Interiors-Photography-Category-scaled.jpg');">
            </div>
            <div class="container m-auto md:left-1/2 md:-translate-x-1/2 md:-translate-y-1/2 md:absolute">
                <div>
                    <div class="p-6 shadow bg-white rounded border-orange-400 border-2 mb-3">
                        <form class="w-full" wire:submit.prevent="searchRooms">
                            <div class="md:grid-cols-12 items-center gap-5 grid grid-cols-2">
                                <div class="col-span-4">
                                    <div class="relative">
                                        <input type="date" wire:model.live= "check_in"
                                            class="bg-gray-50 px-2.5 pb-2.5 pt-4 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                            placeholder="Select date">
                                        <label for="floating_outlined"
                                            class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Check-in
                                        </label>
                                    </div>
                                </div>
                                <div class="col-span-4">
                                    <div class="relative">
                                        <input type="date" wire:model.live= "check_out"
                                            class="bg-gray-50 px-2.5 pb-2.5 pt-4 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                            placeholder="Select date">
                                        <label for="floating_outlined"
                                            class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Check-out
                                        </label>
                                    </div>
                                </div>
                                <div class="col-span-2 items-center flex gap-10 relative" wire:model.live="adult">
                                    <label for="floating_outlined"
                                        class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 
                                            peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Người
                                        lớn
                                    </label>
                                    <select id="underline_select" wire:model="adult"
                                        class="block py-2.5 px-2 w-1/2 text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
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
                                <div class="col-span-2 items-center flex gap-10 relative" wire:model.live="children">
                                    <label for="floating_outlined"
                                        class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">
                                        Trẻ
                                        em
                                    </label>
                                    <select id="underline_select" wire:model="children"
                                        class="block py-2.5 px-2 w-1/2 text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
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
                                    <button type="submit">Tìm</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-5">
        <div x-data="{open:false}">

            <main class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <section aria-labelledby="products-heading" class="pb-10 pt-6">


                    <div class="grid grid-cols-1 gap-x-8 gap-y-10 lg:grid-cols-6">

                        <!-- Product grid -->
                        <div class="lg:col-span-4">
                            @foreach ($typeRooms as $typeRoom)
                                                    <div
                                                        class="mb-5 bg-white border border-gray-200 rounded-lg shadow md:flex-row md:min-w-full">
                                                        <div>
                                                            <div class="md:grid grid-cols-5 md:flex-none overflow-hidden">
                                                                <div class="col-span-2 md:max-h-[230px]">
                                                                    @if ($typeRoom->room_images)
                                                                                                            @php
                                                                                                                $slides = collect($typeRoom->room_images)->map(function ($image) {
                                                                                                                    return [
                                                                                                                        'image' => Storage::url($image->image_url),
                                                                                                                    ];
                                                                                                                })->toArray();
                                                                                                            @endphp
                                                                                                            <x-mary-carousel class="rounded-none rounded-tl-lg md:max-h-[230px]" :slides="$slides"
                                                                                                                without-indicators />
                                                                    @endif
                                                                </div>
                                                                <div
                                                                    class="col-span-3 md:flex-auto md:min-h-full flex flex-col p-4 pt-2 leading-normal">
                                                                    <h5
                                                                        class="mb-2 text-2xl md:text-xl font-semibold tracking-tight text-gray-900 ">
                                                                        {{$typeRoom->name}}
                                                                    </h5>
                                                                    <div>

                                                                    </div>
                                                                    <div>
                                                                        <p class="mb-1 font-normal text-gray-700">
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
                                                                        <div>
                                                                            <p class="mb-1 font-extralight text-s text-gray-700">
                                                                                {{$typeRoom->description}}
                                                                            </p>
                                                                            <a href="#" class="font-medium text-xs text-blue-600 underline">
                                                                                Xem thêm
                                                                            </a>
                                                                        </div>
                                                                        <div class="justify-end items-center flex gap-5">
                                                                            <p class="mb-1 font-semibold text-s text-gray-700">Số lượng
                                                                            </p>
                                                                            <input type="number" min="1"
                                                                                wire:model.lazy="quantities.{{ $typeRoom->room_type_id}}"
                                                                                max="{{ $typeRoom->available_rooms_count }}"
                                                                                class="input input-bordered w-12 max-w-xs" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div>
                                                                <div
                                                                    class="md:flex md:justify-between border-t-2 md:flex-none md:w-full md:m-auto md:min-h-full p-4">
                                                                    <div>
                                                                        <div class="flex gap-2">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                                                                viewBox="0 -960 960 960" width="24px" fill="currentColor">
                                                                                <path
                                                                                    d="M480-280q17 0 28.5-11.5T520-320q0-17-11.5-28.5T480-360q-17 0-28.5 11.5T440-320q0 17 11.5 28.5T480-280Zm-40-160h80v-240h-80v240Zm40 360q-83
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
                                                                            </svg>
                                                                            <p>Yêu cầu đặt cọc 50%</p>
                                                                        </div>
                                                                        <a href="#" class="underline text-xs">Xem chi tiết</a>
                                                                    </div>
                                                                    <div class="flex flex-col md:flex-row items-end">
                                                                        <p class="p-3"><span>{{ number_format($typeRoom->price, 0, ',', '.') }}
                                                                                đ/đêm</span></p>
                                                                        <div class="">
                                                                            @if (session()->get("available_rooms.$typeRoom->room_type_id", $typeRoom->available_rooms_count) > 0)

                                                                                <div>
                                                                                    <p class="text-end p-3 text-green-500 font-bold text-xs">
                                                                                        Còn
                                                                                        {{ session()->get("available_rooms.$typeRoom->room_type_id", $typeRoom->available_rooms_count) }}
                                                                                        phòng
                                                                                    </p>
                                                                                </div>
                                                                                <div>
                                                                                    <button
                                                                                        wire:click="addToCart({{ $typeRoom->room_type_id }},{{ $quantities[$typeRoom->room_type_id] ?? 1 }}, {{ $typeRoom->price }})"
                                                                                        class="py-2 px-11 me-2 mb-2 text-sm font-semibold text-gray-900 focus:outline-none bg-orange-400 rounded-lg border hover:bg-orange-500  hover:shadow focus:z-10 focus:ring-4 focus:ring-orange-100 ">
                                                                                        Đặt ngay
                                                                                    </button>
                                                                                </div>

                                                                            @else($typeRoom->available_rooms_count <= 0) <div>
                                                                                        <p class="text-red-500 font-bold text-xs text-end p-3">
                                                                                            Đã hết phòng
                                                                                        </p>
                                                                                </div>
                                                                                <div>

                                                                                    <button type="button"
                                                                                        class="text-white bg-gray-400 cursor-not-allowed font-medium rounded-lg text-sm px-11 py-2 me-2 mb-2 text-center"
                                                                                        disabled>Đặt ngay</button>
                                                                                </div>
                                                                            @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                            @endforeach
                    </div>

                    <!-- cart booking -->
                    <div class="lg:col-span-2">
                        <div class="shadow border rounded bg-white sticky top-24 p-4">
                            @livewire('layout.cart-booking')
                        </div>
                    </div>
                </section>
        </div>
        </main>
    </div>
</div>
</div>