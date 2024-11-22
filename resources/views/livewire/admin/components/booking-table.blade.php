<div class="p-6">
    <!-- toast -->
    <x-mary-toast />
    <div class="flex py-5 justify-between">

        <h1 class="text-2xl font-bold mb-4 text-gray-200">Danh Sách Đơn Đặt Phòng</h1>

    </div>
    <div class="relative overflow-x-auto sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3"> # <i class="pl-1 fa-solid fa-arrow-up"></i></th>
                    <th scope="col" class="px-6 py-3">Ngày tạo</th>
                    <th scope="col" class="px-6 py-3">Tên người dùng</th>
                    <th scope="col" class="px-6 py-3">Tổng tiền</th>
                    <th scope="col" class="px-6 py-3">Mã hoá đơn</th>
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
                        <td scope="row" class="px-6 py-4">{{$booking->bill_code}}</td>
                        <td scope="row" class="px-6 py-4">{{ $booking->total_guests }}</td>
                        <td scope="row" class="px-6 py-4">
                            <select class="rounded px-3 py-2 bg-gray-700 text-white"
                                wire:change="updateStatus({{ $booking->booking_id }}, $event.target.value)"
                                wire:model.defer="bookings.status">
                                <option value="booked" {{ $booking->status == 'booked' ? 'selected' : '' }}>Xác nhận</option>
                                <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Đang chờ
                                </option>
                                <option value="cancelled" {{ $booking->status == 'cancelled' ? 'selected' : '' }}>Đã huỷ
                                </option>
                            </select>
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