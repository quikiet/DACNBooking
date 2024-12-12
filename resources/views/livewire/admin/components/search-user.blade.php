<div class="h-full pb-6">
    <div class="h-full p-6">

        <div class="text-3xl text-white pb-5 border-b border-gray-100">Thêm phiếu thuê</div>

        <div class="overflow-x-auto mt-3">
            <div class="my-5 flex gap-2 flex-col w-52">
                <label for="phone" class="text-white">Tìm kiếm người dùng</label>
                <x-mary-input wire:model.live="search" placeholder="Tìm kiếm..." hint="Tìm kiếm người dùng..."
                    icon="o-magnifying-glass" />
            </div>
            <table class="table-auto w-full border-collapse border border-gray-200">
                <thead>
                    <tr class="bg-gray-700 text-white">
                        <th class="border border-gray-300 px-4 py-2">#</th>
                        <th class="border border-gray-300 px-4 py-2">Tên người dùng</th>
                        <th class="border border-gray-300 px-4 py-2">Email</th>
                        <th class="border border-gray-300 px-4 py-2">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $index => $user)
                        <tr class="hover:bg-gray-100">
                            <td class="border text-white border-gray-300 px-4 py-2 text-center">{{ $index + 1 }}</td>
                            <td class="border text-white border-gray-300 px-4 py-2">{{ $user->name }}</td>
                            <td class="border text-white border-gray-300 px-4 py-2">{{ $user->email }}</td>
                            <td class="border text-white border-gray-300 px-4 py-2 text-center">
                                <button type="button" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded"
                                    wire:click="selectUser({{ $user->id }})">
                                    Chọn
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div wire:loading>
            <span class="loading loading-bars loading-md "></span>
        </div>

        <div class="max-w-3xl m-auto py-6 px-10">
            <div class="grid grid-cols-2 gap-5 border-b py-6 border-gray-200">
                <div class="flex gap-2 flex-col">
                    <label for="user" class="text-white">Tên người dùng</label>
                    <x-mary-input wire:model="name" placeholder="Your name" icon="o-user" />
                </div>
                <div class="flex gap-2 flex-col">
                    <label for="email" class="text-white">Địa chỉ email</label>
                    <x-mary-input wire:model="email" placeholder="Địa chỉ email" icon="o-envelope" />
                </div>
                <div class="flex gap-2 flex-col">
                    <label for="phone" class="text-white">Số điện thoại</label>
                    <x-mary-input wire:model="phone_number" placeholder="Số điện thoại" icon="o-device-phone-mobile" />
                </div>
            </div>
            <div class="grid grid-cols-2 gap-5 py-6">
                <div class="flex gap-2 flex-col">
                    <label for="room type" class="text-white">Chọn kiểu phòng</label>
                    <x-mary-select icon="o-queue-list" :options="$room_types" wire:model.live="type_room_id"
                        option-value="type_room_id" option-label="name" />
                </div>
                <div class="flex gap-2 flex-col">
                    <label for="room type" class="text-white">Giá phòng</label>
                    <x-mary-input icon="o-banknotes" value="{{ $selected_price }}" readonly />
                </div>
            </div>
        </div>


    </div>
</div>