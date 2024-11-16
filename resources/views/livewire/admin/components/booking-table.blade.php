<div class="p-6">
    <div class="flex py-5 justify-between">

        <h1 class="text-2xl font-bold mb-4 text-gray-200">Danh Sách Đặt Phòng</h1>
        <!-- Modal toggle -->
        <button @click="open = !open"
            class="block text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
            type="button">
            Thêm
        </button>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3"> # <i class="pl-1 fa-solid fa-arrow-up"></i></th>
                    <th scope="col" class="px-6 py-3">Ngày tạo</th>
                    <th scope="col" class="px-6 py-3">Tên người dùng</th>
                    <th scope="col" class="px-6 py-3">Tổng tiền</th>
                    <th scope="col" class="px-6 py-3">Khách</th>
                    <th scope="col" class="px-6 py-3">Trạng thái</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)

                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td scope="row" class="px-6 py-4">{{ $booking->booking_id }}</td>
                        <td scope="row" class="px-6 py-4">{{ date_format($booking->created_at, "d/m/Y") }}</td>
                        <th scope="row" class="px-6 py-4  font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$booking->user->name}}
                        </th>
                        <td scope="row" class="px-6 py-4">{{ number_format($booking->total_pay, 0, ',', '.') }} VNĐ</td>
                        <td scope="row" class="px-6 py-4">{{ $booking->total_guests }}</td>
                        <td scope="row" class="px-6 py-4">
                            @if ($booking->status == 'booked')
                                <span class=" px-3 py-2 bg-green-500 rounded-full text-white">Xác nhận</span>
                            @elseif($booking->status == 'pending')
                                <span class=" px-3 py-2 bg-yellow-400 rounded-full text-white">Đang chờ</span>
                            @else
                                <span class=" px-3 py-2 bg-red-600 rounded-full text-white">Đã huỷ</span>
                            @endif
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="p-4">
            {{ $bookings->links() }}
        </div>
    </div>

</div>