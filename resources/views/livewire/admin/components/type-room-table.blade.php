<div>
    <div class="container relative p-6 overflow-x-auto sm:rounded-lg" x-data="{open : false}">
        <div class="flex py-5 justify-between">
            <h1 class="text-2xl font-bold mb-4 text-gray-200">Danh Sách Kiểu Phòng</h1>
            <!-- Modal toggle -->
            <button @click="open = !open"
                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
                Thêm
            </button>

        </div>

        <!-- table hiển thị -->
        <table class="w-full text-sm text-left rtl:text-right text-gray-200 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <!-- <th scope="col" class="px-6 py-3">Id</th> -->
                    <th scope="col" class="px-6 py-3">Tên kiểu phòng</th>
                    <th scope="col" class="px-6 py-3">Giá</th>
                    <th scope="col" class="px-6 py-3">Người lớn</th>
                    <th scope="col" class="px-6 py-3">Trẻ em</th>
                    <th scope="col" class="px-6 py-3">Mô tả</th>
                    <th scope="col" class="px-6 py-3">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @if($type_Rooms->isNotEmpty())
                    @foreach ($type_Rooms as $typeRoom)
                        <tr>
                            <td>{{ $typeRoom->name }}</td>
                            <td>{{ $typeRoom->price }}</td>
                            <td>{{ $typeRoom->adult }}</td>
                            <td>{{ $typeRoom->children }}</td>
                            <td>{{ $typeRoom->description }}</td>
                            <td>
                                <button type="button" wire:click="editTypeRoom({{ $typeRoom->id }})">Edit</button>
                                <button type="button" wire:click="deleteTypeRoom({{ $typeRoom->id }})">Delete</button>
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