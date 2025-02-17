<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="breadcrumbs text-sm pt-6">
        <p class="text-2xl font-semibold py-4">Lịch sử đặt phòng</p>
        <ul class="text-gray-400">
            <li><a href="trang-chu">Trang chủ</a></li>
            <li>Lịch sử đặt phòng</li>
        </ul>
    </div>
    <div class="grid grid-cols-3 items-start gap-5 py-5">
        @if ($booking_history->isNotEmpty())
            @foreach ($booking_history as $bookings)
                <div class="card rounded-sm bg-base-100 shadow-xl">
                    <div class="card-body">
                        @if ($bookings->bookingDetail)
                            <div class="grid grid-cols-2 gap-3">
                                @foreach ($bookings->bookingDetail as $detail)
                                    <div>
                                        <h2 class="card-title">
                                            <p>{{$detail->roomType->name}}</p>
                                        </h2>
                                        <div class="text-gray-400">
                                            <span>{{number_format($detail->roomType->price, 0, ',', '.')}}
                                                đ</span><span>/Đêm</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        <div class="grid grid-cols-2 gap-2">
                            <span>Check-in</span><span>Check-out</span>
                            <span class="text-gray-400">{{$bookings->check_in}}</span>
                            <span class="text-gray-400">{{$bookings->check_out}}</span>
                        </div>
                        <div>
                            <span>Tổng: </span><span class="text-gray-400">{{number_format($bookings->total_pay, 0, ',', '.')}}
                                VND</span>
                        </div>
                        <div>
                            <span>Mã đơn đặt phòng: </span><span class="text-gray-400">{{$bookings->bill_code}}</span>
                        </div>
                        <div>
                            <span>Ngày đặt: </span><span
                                class="text-gray-400">{{date_format($bookings->created_at, 'd/m/Y')}}</span>
                        </div>
                        <div class="py-2">
                            @if ($bookings->status == "pending")
                                <div class="badge bg-orange-300">Đang chờ</div>
                            @elseif($bookings->status == "booked")
                                <div class="badge bg-green-400 text-gray-100">Xác nhận</div>
                            @else
                                <div class="badge bg-red-500 text-gray-100">Đã huỷ</div>
                            @endif
                        </div>
                        <div class="flex justify-between gap-5">
                            <button class="btn bg-black text-white">Tải hoá đơn pdf</button>
                            <button class="btn bg-black text-white">Đánh giá và phản hồi</button>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-red-500">Bạn chưa có đơn đặt phòng nào !</p>
        @endif
    </div>
</div>