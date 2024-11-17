<div>

    <!-- toast -->
    <x-mary-toast />


    <div class="container relative px-6 overflow-x-auto sm:rounded-lg" x-data="{open : false}"
        @close-modal.window="open = false">
        <div class="flex py-5 justify-between">

            <h1 class="text-2xl font-bold mb-4 text-gray-200">Danh Sách Kiểu Phòng</h1>
            <!-- Modal toggle -->
            <button @click="open = !open"
                class="block text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                type="button">
                Thêm
            </button>

            <!-- Main modal -->
            <div id="crud-modal" tabindex="-1" aria-hidden="true" x-show="open" x-cloak x-transition
                class="bg-slate-800 bg-opacity-60 flex overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 max-h-full">
                <div class="relative p-5 w-full max-w-md max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div
                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                {{$typeRoomId ? 'Sửa loại phòng' : 'Thêm loại phòng'}}
                            </h3>
                            <button type=" button" @click="open = false"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-toggle="crud-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only" @click="open = false">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <form class="p-4 md:p-5" wire:submit="{{$typeRoomId ? 'update' : 'add'}}">
                            <div class="grid gap-4 mb-4 grid-cols-2">
                                <div class="col-span-2">
                                    <label for="name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tên kiểu
                                        phòng</label>
                                    <input type="text" name="name" id="name" wire:model.live="roomTypeForm.name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Type product name">
                                    @error('roomTypeForm.name') <small class="text-red-500 error">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-span-2">
                                    <label for="price"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Giá</label>
                                    <input type="number" wire:model.live="roomTypeForm.price"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="$2999">
                                    @error('roomTypeForm.price') <small
                                        class="text-red-500 error">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="sm:col-span-1">
                                    <label for="price"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Người
                                        lớn</label>
                                    <input type="number" wire:model.live="roomTypeForm.adult"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="0">
                                    @error('roomTypeForm.adult') <small
                                        class="text-red-500 error">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="sm:col-span-1">
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Trẻ
                                        em</label>
                                    <input type="number" wire:model.live="roomTypeForm.children"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="0">
                                    @error('roomTypeForm.children') <small
                                        class="text-red-500 error">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-span-2">
                                    <label for="description"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mô tả
                                        phòng</label>
                                    <textarea id="description" rows="4" wire:model.live="roomTypeForm.description"
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Mô tả"></textarea>
                                    @error('roomTypeForm.description') <small
                                        class="text-red-500 error">{{ $message }}</small>
                                    @enderror
                                </div>
                                <!-- upload ảnh -->
                                <div class="col-span-2">
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                        for="multiple_files">Hình ảnh</label>
                                    <input
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                        id="multiple_files" wire:model.live="images" type="file" multiple>
                                    @if ($images)
                                        <ul class="text-blue-400">
                                            @foreach ($images as $image)
                                                <li>{{ $image->getClientOriginalName() }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                    @error('images.*') <small class="text-red-500 error">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <!-- <button type="submit"
                                class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Xác nhận
                                <div wire:loading>
                                </div>
                            </button> -->
                            <button type="submit"
                                class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">

                                <span wire:loading.remove>Xác nhận</span> <!-- Hiển thị khi không tải -->

                                <span wire:loading>
                                    <svg class="me-1 -ms-1 w-5 h-5 animate-spin" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </span> <!-- Hiển thị khi đang tải -->
                            </button>

                        </form>
                    </div>
                </div>
            </div>


        </div>


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <!-- table hiển thị -->
            <table class="w-full text-sm text-left rtl:text-right text-gray-200 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <!-- <th scope="col" class="px-6 py-3">Id</th> -->
                        <th scope="col" class="px-6 py-3"> Hình ảnh </th>
                        <th scope="col" class="px-6 py-3">Tên kiểu phòng</th>
                        <th scope="col" class="px-6 py-3">Giá</th>
                        <th scope="col" class="px-6 py-3">Người lớn</th>
                        <th scope="col" class="px-6 py-3">Trẻ em</th>
                        <th scope="col" class="px-6 py-3">Mô tả</th>
                        <th scope="col" class="px-6 py-3">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @if($type_Rooms)
                        @foreach ($type_Rooms as $typeRoom)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    @if ($typeRoom->room_images)
                                        @foreach ($typeRoom->room_images->take(1) as $image)
                                            <img class="h-12 w-12" src="{{Storage::url($image->image_url)}}" alt="Hình ảnh về phòng">
                                        @endforeach
                                    @endif
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $typeRoom->name }}
                                </th>
                                <td class="px-6 py-4">{{ number_format($typeRoom->price, 0, ',', '.') }}</td>
                                <td class="px-6 py-4">{{ $typeRoom->adult }}</td>
                                <td class="px-6 py-4">{{ $typeRoom->children }}</td>
                                <td class="px-6 py-4">{{ $typeRoom->description }}</td>
                                <td class="px-6 py-4 flex">
                                    <div x-data="{open:false}">
                                        <button type="button" @click="open=!open; $wire.getTypeID({{$typeRoom->room_type_id}})"
                                            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-2 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                            Xoá</button>

                                        <div id="popup-modal" tabindex="-1" x-show="open" x-cloak
                                            class="bg-slate-800 bg-opacity-10 flex overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 max-h-full">
                                            <div class="relative p-4 w-full max-w-md max-h-full">
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                    <button type="button" @click="open=false"
                                                        class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                                        <svg class="w-3 h-3" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                        </svg>
                                                        <span class="sr-only" @click="open=false">Close modal</span>
                                                    </button>
                                                    <div class="p-4 md:p-5 text-center">
                                                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 20 20">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                        </svg>
                                                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                            Bạn có chắc chắn muốn xoá?
                                                        </h3>
                                                        <button type="button" @click="open=false"
                                                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                                            Không
                                                        </button>
                                                        <button type="button" wire:click="delete" @click="open = false"
                                                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                            Có
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" wire:click="edit({{ $typeRoom->room_type_id }})" @click="open=!open"
                                        class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-2 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Sửa</button>

                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" class="text-center">Không có kiểu phòng nào.</td>
                        </tr>
                    @endif


                </tbody>
            </table>
        </div>


    </div>
</div>