<div class="p-6">
    <!-- toast -->
    <x-mary-toast />
    <div class="flex py-5 pb-2 justify-between">

        <h1 class="text-2xl font-bold mb-4 text-gray-200">Danh Sách Đơn Đặt Phòng</h1>

    </div>
    <x-mary-progress wire:loading target="search" class="progress-primary h-0.5" indeterminate />
    <form class="max-w-96 my-4">
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
    <div class="relative overflow-x-auto sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3"> # <i class="pl-1 fa-solid fa-arrow-up"></i></th>
                    <th scope="col" class="px-6 py-3">Ngày tạo</th>
                    <th scope="col" class="px-6 py-3">Tên người dùng</th>
                    <th scope="col" class="px-6 py-3">Tổng tiền</th>
                    <th scope="col" class="px-6 py-3">Mã hoá đơn</th>
                    <th scope="col" class="px-6 py-3">Trạng thái</th>
                    <th scope="col" class="px-6 py-3">Hành động</th>
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
                        <td scope="row" class="px-6 py-4">
                            <a class="link no-underline text-blue-400 hover:text-blue-500 transition"><x-mary-icon
                                    name="o-eye" /></a>
                            <button type="button" class="text-red-500 hover:text-red-700 transition"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa?');">
                                <x-mary-icon name="o-archive-box-x-mark" />
                            </button>
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