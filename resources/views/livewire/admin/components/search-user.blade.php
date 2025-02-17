<div class=" pb-6">
    <div class=" p-6 mb-20">
        <div class="text-3xl text-white pb-3 border-b border-gray-100">Thêm phiếu thuê</div>
        <x-mary-toast />
        <div class="overflow-x-auto mb-3">
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
                        <tr class="hover:bg-gray-400">
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
            <div class="my-3">
                {{$users->links()}}
            </div>
        </div>


        <div class="p-6 bg-gray-700 my-5">
            <h1 class="text-white text-3xl text-center w-full bg-gray-500">Phiếu thuê</h1>
            <div class="grid grid-cols-2 gap-5 pb-6 items-start">
                <div class="col-span-2 grid grid-cols-2 gap-5 py-2 ">
                    <p class="col-span-2 text-white text-2xl pt-3 border-b border-secondary pb-2">Thông tin khách hàng
                    </p>
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
                        <x-mary-input wire:model="phone_number" placeholder="Số điện thoại"
                            icon="o-device-phone-mobile" />
                    </div>
                    <div class="flex gap-2 flex-col">
                        <div class="flex gap-4 justify-between">
                            <label for="phone" class="text-white">Số lượng phòng thuê</label>
                            <label for="phone" class="text-white">Số lượng phòng có sẵn: {{ $room_amount }}</label>
                        </div>
                        <x-mary-form wire:submit.prevent="selectRoomAmount" no-separator
                            class="grid grid-cols-2 gap-2 items-start">
                            <x-mary-input wire:model="selected_room_amount" placeholder="Số lượng phòng" type="number"
                                min="0" max="{{$room_amount}}" icon="o-home" />
                            <x-mary-button label="Xác nhận" class="btn-primary" type="submit"
                                spinner="selectRoomAmount" />
                        </x-mary-form>
                    </div>
                </div>
                @if ($amount)
                    <div class="col-span-2">
                        <x-mary-form wire:submit.prevent="calculateTotalPay" no-separator
                            class="grid grid-cols-2 gap-2 items-start">
                            @foreach ($roomsInfo as $index => $room)
                                <div class="grid grid-cols-2 gap-5 py-2 border-b border-dashed border-secondary">
                                    <label for="check_in" class="text-white">Ngày Check-in</label>
                                    <x-mary-datepicker min="{{$check_in}}" wire:model="roomsInfo.{{$index}}.check_in" />

                                    <label for="check_out" class="text-white">Ngày Check-out</label>
                                    <x-mary-datepicker wire:model="roomsInfo.{{$index}}.check_out" />

                                    <label class="text-white">Chọn loại phòng</label>
                                    <x-mary-select wire:model="roomsInfo.{{$index}}.type_room_id" :options="$room_types"
                                        option-value="room_type_id" option-label="name"
                                        wire:change="updateRoomOptions({{ $index }})" />


                                    <label for="room_id" class="text-white">Chọn phòng</label>
                                    <x-mary-select wire:model.live="roomsInfo.{{$index}}.room_id"
                                        :options="$roomsInfo[$index]['available_rooms'] ?? []" option-value="room_id"
                                        option-label="name" />

                                    <label for="price" class="text-white">Giá phòng</label>
                                    <x-mary-input wire:model="roomsInfo.{{$index}}.price" value="{{$room['price']}}" readonly />
                                </div>
                            @endforeach
                            <x-mary-textarea class="col-span-2" label="Ghi chú" wire:model="notes" rows="5" inline />
                            <x-mary-button label="Lưu thông tin" class="btn-primary col-span-2" wire:click="saveCheckInForm"
                                spinner="saveCheckInForm" />
                        </x-mary-form>
                    </div>
                @endif
                <div class="col-span-2 py-2 ">
                    <p class=" text-white text-2xl pt-3 border-b border-secondary py-2">Thông tin thanh toán
                    </p>
                    <div class="py-2">
                        <label for="room type" class="text-white text-xl">Tổng tiền: <span
                                class="text-gray-300 text-lg">{{$total_pay}}</span></label>
                    </div>
                </div>
            </div>
        </div>

        <x-mary-progress wire:loading target="search" class="progress-primary h-0.5" indeterminate />

    </div>
</div>