<div>
    <h2>Danh sách Booking</h2>
    <table>
        <thead>
            <tr>
                <th>Booking ID</th>
                <th>Khách hàng</th>
                <th>Ngày Check-in</th>
                <th>Ngày Check-out</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $booking)
                <tr>
                    <td>{{ $booking->booking_id }}</td>
                    <td>{{ $booking->customer_name }}</td>
                    <td>{{ $booking->check_in }}</td>
                    <td>{{ $booking->check_out }}</td>
                    <td>{{ $booking->status }}</td>
                    <td>
                        <button wire:click="selectBooking({{ $booking->booking_id }})">Chọn</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if ($selectedBooking)
        <h2>Chi tiết Booking: {{ $selectedBooking->customer_name }}</h2>
        <p>Ngày Check-in: {{ $checkIn }}</p>
        <p>Ngày Check-out: {{ $checkOut }}</p>

        <h3>Danh sách Phòng đã gán:</h3>
        <ul>
            @foreach ($assignedRooms as $room)
                <li>
                    Phòng: {{ $room->room->name }} ({{ $room->room->room_number }})
                    <button wire:click="unassignRoom({{ $room->room_id }})">Hủy gán</button>
                </li>
            @endforeach
        </ul>

        <h3>Danh sách Phòng trống:</h3>
        <ul>
            @foreach ($availableRooms as $room)
                <li>
                    Phòng: {{ $room->name }} ({{ $room->room_number }})
                    <button wire:click="assignRoom({{ $room->room_id }})">Gán</button>
                </li>
            @endforeach
        </ul>
    @endif
</div>