<div>

    @if (session('SuccessMes'))
        <div x-data="{ open: true }">
            <div class="fixed top-10 right-10 max-w-xs p-4 text-green-500 bg-green-100 rounded-lg shadow-lg dark:bg-green-600 dark:text-white"
                x-show="open" x-transition @click.away="open = false">
                <div class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-green-500 dark:text-green-200"
                        fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                    </svg>
                    <span>{{ session('SuccessMes') }}</span>
                    <button @click="open = false" class="text-red-500 font-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                            fill="#434343">
                            <path
                                d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    @endif







    <div class="container relative px-6 overflow-x-auto sm:rounded-lg" x-data="{open : false}"
        @close-modal.window="open = false; resetField">
        <div class="flex py-5 justify-between">

            <h1 class="text-2xl font-bold mb-4 text-gray-200">Danh Sách Phòng</h1>
            <!-- Modal toggle -->
            <button @click="open = !open"
                class="flex justify-center items-center text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                type="button">
                <span class="pr-2 text-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"
                        fill="currentColor">
                        <path
                            d="M440-280h80v-160h160v-80H520v-160h-80v160H280v80h160v160Zm40 200q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
                    </svg>
                </span>
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
                                {{ $roomId ? 'Cập nhật phòng' : 'Thêm phòng mới'  }}
                            </h3>
                            <button type=" button" @click="open = false" wire:click="resetField"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-toggle="crud-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only" @click="open = false" wire:click="resetField">Close
                                    modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->



                        <form wire:submit.prevent="{{ $roomId ? 'update' : 'add'  }}" class="p-4 md:p-5">
                            <div class="grid gap-4 mb-4 grid-cols-2">
                                <div class="col-span-2">
                                    <!-- Các trường thông tin phòng -->
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tên
                                        phòng</label>
                                    <input
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        type="text" wire:model.live="roomForm.name" placeholder="Tên phòng">
                                    @error('roomForm.name') <small class="text-red-500 error">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-span-1">

                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Số
                                        phòng</label>
                                    <input
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        type="text" wire:model.live="roomForm.room_number" placeholder="Số phòng">
                                    @error('roomForm.room_number') <small
                                    class="text-red-500 error">{{ $message }}</small> @enderror

                                </div>

                                <div class="col-span-1">
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Kiểu phòng</label>
                                    <select wire:model.live="roomForm.room_type_id"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected>Chọn kiểu phòng</option>
                                        @foreach($typeRooms as $typeRoom)
                                            <option value="{{ $typeRoom->room_type_id }}">{{ $typeRoom->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('roomForm.room_type_id') <small
                                    class="text-red-500 error">{{ $message }}</small> @enderror
                                </div>

                                <!-- Trạng thái phòng -->
                                <div class="col-span-2">
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Trạng thái phòng</label>
                                    <select wire:model.live="roomForm.status"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="available">Còn trống</option>
                                        <option value="booked">Đã đặt</option>
                                        <option value="fixing">Đang sửa</option>
                                        <option value="occupied">Đang sử dụng</option>
                                    </select>

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

                            <div class="col-span-2 flex justify-end">
                                <button type="submit"
                                    class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Xác nhận
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- table hiển thị -->


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3"> Hình ảnh </th>
                        <th scope="col" class="px-6 py-3"> Tên Phòng </th>
                        <th scope="col" class="px-6 py-3">Số phòng</th>
                        <th scope="col" class="px-6 py-3">Trạng thái</th>
                        <th scope="col" class="px-6 py-3">Loại phòng</th>
                        <th scope="col" class="px-6 py-3">Số lượng người</th>
                        <th scope="col" class="px-6 py-3"> Action </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rooms as $room)

                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                @if ($room->room_images)
                                    @foreach ($room->room_images->take(1) as $image)
                                        <img class="h-12 w-12" src="{{Storage::url($image->image_url)}}" alt="Hình ảnh về phòng">
                                    @endforeach
                                @endif
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $room->name }}
                            </th>
                            <td scope="row" class="px-6 py-4">{{ $room->room_number }}</td>
                            <td scope="row" class="px-6 py-4">
                                @if ($room->status == 'available')
                                    <span class=" px-3 py-2 bg-green-500 rounded-full text-white">Còn trống</span>
                                @elseif($room->status == 'booked')
                                    <span class=" px-3 py-2 bg-blue-500 rounded-full text-white">Đã đặt</span>
                                @elseif($room->status == 'fixing')
                                    <span class=" px-3 py-2 bg-yellow-400 rounded-full text-white">Đang sửa</span>
                                @else
                                    <span class=" px-3 py-2 bg-red-600 rounded-full text-white">Đang sử dụng</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">{{ $room->typeRoom->name }}</td>
                            <td class="px-6 py-4">{{ $room->typeRoom->adult }}</td>
                            <td scope="row" class="px-6 py-4">
                                <div class="flex justify-around items-center">
                                    <div x-data=" {open:false}">
                                        <button type="button" @click="open=!open; $wire.getRoomId({{$room->room_id}})"
                                            class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960"
                                                width="20px" fill="currentColor" class="">
                                                <path
                                                    d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z" />
                                            </svg>
                                        </button>

                                        <div id="popup-modal" tabindex="-1" x-show="open" x-cloak
                                            class="bg-slate-800 bg-opacity-10 flex overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 max-h-full">
                                            <div class="relative p-4 w-full max-w-md max-h-full">
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                    <button type="button" @click="open=false"
                                                        class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                                        <svg class="w-3 h-3" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 14 14">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                        </svg>
                                                        <span class="sr-only" @click="open=false">Close modal</span>
                                                    </button>
                                                    <div class="p-4 md:p-5 text-center">
                                                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 20 20">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                        </svg>
                                                        <h3
                                                            class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
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
                                    <div>
                                        <button type="button" wire:click="edit({{ $room->room_id }})" @click="open=!open"
                                            class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960"
                                                width="20px" fill="currentColor">
                                                <path
                                                    d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>