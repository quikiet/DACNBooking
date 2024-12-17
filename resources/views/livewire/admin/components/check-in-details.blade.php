<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Quí Kiệt') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- boxicon -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- swiper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

</head>

<body class="font-sans antialiased" theme="mytheme" class="min-h-screen bg-secondary">

    <div class="h-full flex items-center justify-center">
        <div class="max-w-3xl w-full px-6 py-8 bg-white shadow-lg rounded-lg">
            <div class="text-center px-5 border-b-2 border-primary pb-2 ">
                <h2 class="text-xl text-center font-semibold">Chi tiết Phiếu Thuê</h2>
                <p class="text-sm text-gray-400 font-medium">Khách sạn Trần Quí Kiệt</p>
            </div>
            <div class="flex flex-col items-center justify-center">
                <div class="font-bold text-3xl ">
                    Phiếu thuê
                </div>
                <div>
                    <span>
                        <hr> Mã phiếu thuê
                    </span>{{$checkIn->checkin_id}}
                    <hr>
                </div>
            </div>
            <div class="grid items-start grid-cols-5 gap-5 py-4">
                <div class="col-span-2 shadow bg-secondary p-5">
                    <p class="text-sm"><strong class="text-lg">Tên khách hàng:</strong>
                        {{ $checkIn->users->name ?? 'N/A' }}</p>
                    <p class="text-sm"><strong class="text-lg">Ngày tạo đơn:</strong>
                        {{ $checkIn->created_at->format('Y-m-d') }}</p>
                </div>
                <div class="col-span-3 shadow bg-secondary p-5">
                    <h3 class="text-xl">Danh sách phòng</h3>
                    <ul>
                        @foreach ($checkIn->checkin_details as $detail)
                            <li class="font-semibold text-lg">
                                Phòng: <span
                                    class="text-sm font-medium text-gray-400">{{ $detail->room->room_number ?? 'N/A' }}</span>
                                -
                                Giá: <span
                                    class="text-sm font-medium text-gray-400">{{ number_format($detail->sub_total, 0, ',', '.') }}
                                    VND</span>

                            </li>
                            <div>
                                <hr>
                                <h3 class="text-lg py-2 border-black border-dashed">Thời gian nhận phòng: <span
                                        class="text-sm text-primary">{{$detail->checkin_date}}</span>
                                </h3>
                                <hr>
                                <h3 class="text-lg py-2 border-black border-dashed">Thời gian trả phòng: <span
                                        class="text-sm text-primary">{{$detail->expectedCheckOutDate}}</span>
                                </h3>
                                <hr>
                                <h3 class="text-lg py-2 border-black border-dashed">Tổng tiền: <span
                                        class="text-sm text-gray-400">{{$detail->sub_total}}</span>
                                </h3>
                            </div>
                            @if ($detail->exported)
                                <p href="{{ route('admin.checkout', ['checkinId' => $detail->id]) }}"
                                    class="font-medium py-2 text-primary">
                                    Phiếu đã được xuất</p>
                            @else
                                <a href="{{ route('admin.checkout', ['checkinId' => $detail->id]) }}"
                                    class="link py-2 hover:text-primary">Xuất phiếu thuê <x-mary-icon
                                        name="o-arrow-long-right" /></a>
                            @endif
                        @endforeach
                    </ul>
                </div>

                @if ($checkIn->notes)
                    <div class="col-span-5 pb-2">
                        <div>
                            <h3 class="text-lg py-2 border-black border-dashed">Ghi chú<p class="text-sm text-gray-400">
                                    {{$checkIn->notes}}
                                </p>
                            </h3>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="h-full flex items-center justify-center">
        <div class="max-w-3xl w-full px-6 py-8 bg-white shadow-lg rounded-lg">
            <h2 class="text-xl font-semibold text-center">Chỉnh sửa Phiếu Thuê</h2>

            <form wire:submit.prevent="update">
                <!-- Ghi chú -->
                <div class="mb-4">
                    <label class="block text-sm font-medium">Ghi chú:</label>
                    <textarea wire:model="notes" class="w-full border rounded p-2">{{$notes}}</textarea>
                </div>

                <!-- Ngày nhận phòng -->
                <div class="mb-4">
                    <label class="block text-sm font-medium">Ngày nhận phòng:</label>
                    <input type="date" wire:model="checkin_date" value="{{$checkin_date}}"
                        class="w-full border rounded p-2">
                </div>

                <!-- Ngày trả phòng -->
                <div class="mb-4">
                    <label class="block text-sm font-medium">Ngày trả phòng:</label>
                    <input type="date" wire:model="expectedCheckOutDate" value="{{$expectedCheckOutDate }}"
                        class="w-full border rounded p-2">
                </div>

                <!-- Các nút hành động -->
                <div class="flex justify-end gap-4">
                    <a href="{{ route('admin.checkin') }}" class="btn btn-secondary">Hủy</a>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        Lưu thay đổi
                    </button>
                </div>
            </form>
        </div>
    </div>



    @livewireScripts

</body>


</html>