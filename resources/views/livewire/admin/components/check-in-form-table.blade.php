<div>
    <div class="container relative px-6 overflow-x-auto sm:rounded-lg" x-data="{open : false}"
        @close-modal.window="open = false">
        <div class="flex py-5 justify-between">

            <h1 class="text-2xl font-bold mb-4 text-gray-200">Danh Sách Phiếu Thuê</h1>
            <!-- Modal toggle -->
            <a href="{{route('admin.add-checkin')}}" class=" flex justify-center items-center text-white bg-green-700
                hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm
                px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                type="button">
                <span class="pr-2 text-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"
                        fill="currentColor">
                        <path
                            d="M440-280h80v-160h160v-80H520v-160h-80v160H280v80h160v160Zm40 200q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
                    </svg>
                </span>
                Thêm
            </a>

        </div>

        <x-mary-toast />

        <!-- table hiển thị -->


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3"> Tên Phòng </th>
                        <th scope="col" class="px-6 py-3">Số phòng</th>
                        <th scope="col" class="px-6 py-3">Trạng thái</th>
                        <th scope="col" class="px-6 py-3">Loại phòng</th>
                        <th scope="col" class="px-6 py-3">Số lượng người</th>
                        <th scope="col" class="px-6 py-3"> Action </th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>

        </div>

    </div>
</div>