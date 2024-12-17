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
            <h2 class="text-xl font-semibold text-center">Chỉnh sửa Phiếu Thuê</h2>
            <form wire:submit.prevent="update">
                <!-- Ghi chú -->
                <div class="mb-4">
                    <label class="block text-sm font-medium">Ghi chú:</label>
                    <textarea wire:model="notes"
                        class="w-full border rounded p-2">{{ $checkIn->notes ?? '' }}</textarea>
                </div>

                <!-- Ngày nhận phòng -->
                <div class="mb-4">
                    <label class="block text-sm font-medium">Ngày nhận phòng:</label>
                    <input type="date" wire:model="checkin_date" class="w-full border rounded p-2"
                        value="{{ $checkIn->checkin_date ?? '' }}">
                </div>

                <!-- Ngày trả phòng -->
                <div class="mb-4">
                    <label class="block text-sm font-medium">Ngày trả phòng:</label>
                    <input type="date" wire:model="expectedCheckOutDate" class="w-full border rounded p-2"
                        value="{{ $checkIn->expectedCheckOutDate ?? '' }}">
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