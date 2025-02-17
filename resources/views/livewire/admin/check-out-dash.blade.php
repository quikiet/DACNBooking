<div>
    @section('content')

    <div>
        <div class="container relative px-6 overflow-x-auto sm:rounded-lg" x-data="{open : false}"
            @close-modal.window="open = false">
            <div class="flex py-5 pb-2 justify-between">

                <h1 class="text-2xl font-bold mb-4 text-gray-200">Danh Sách Phiếu Trả</h1>
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
            <x-mary-progress wire:loading target="search" class="progress-primary h-0.5" indeterminate />
            <form class="max-w-96 my-4 mt-0">
                <h1 class="mb-2 text-gray-200">Ngày trả đơn</h1>
                <label for="default-search"
                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" id="default-search" wire:model.live="search"
                        class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 "
                        placeholder="Tìm kiếm..." required />
                </div>
            </form>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Mã phiếu thuê</th>
                            <th scope="col" class="px-6 py-3">Ngày trả phòng</th>
                            <th scope="col" class="px-6 py-3">Tổng tiền phòng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($checkouts as $checkout)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            dark:hover:bg-gray-600">
                                <td class=" px-6 py-4">{{ $checkout->checkin_id }}</td>
                                <td class="px-6 py-4">{{ $checkout->checkout_date }}</td>
                                <td class="px-6 py-4">{{ $checkout->total_pay }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="my-3">
                    {{ $checkouts->links() }}
                </div>
            </div>

        </div>
    </div>

    @endsection
</div>