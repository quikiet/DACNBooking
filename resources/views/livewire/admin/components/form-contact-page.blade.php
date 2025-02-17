<div>
    <div class="p-6 bg-gray-100 shadow rounded-lg">
        <h2 class="text-2xl font-bold mb-4">Cập Nhật Thông Tin Liên Hệ</h2>
        <x-mary-toast></x-mary-toast>
        {{-- Form Liên Hệ --}}
        <form wire:submit.prevent="save" class="space-y-4">

            {{-- Địa chỉ --}}
            <div>
                <label for="address" class="block font-semibold mb-1">Địa chỉ</label>
                <input type="text" wire:model="address" id="address" class="w-full px-3 py-2 border rounded">
                @error('address') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            {{-- Google Map --}}
            <div>
                <label for="google_map" class="block font-semibold mb-1">Google Map</label>
                <input type="url" wire:model="google_map" id="google_map" class="w-full px-3 py-2 border rounded">
                @error('google_map') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            {{-- Phone Numbers --}}
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="pn1" class="block font-semibold mb-1">Số Điện Thoại 1</label>
                    <input type="text" wire:model="pn1" id="pn1" class="w-full px-3 py-2 border rounded">
                    @error('pn1') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="pn2" class="block font-semibold mb-1">Số Điện Thoại 2</label>
                    <input type="text" wire:model="pn2" id="pn2" class="w-full px-3 py-2 border rounded">
                    @error('pn2') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>

            {{-- Email --}}
            <div>
                <label for="email" class="block font-semibold mb-1">Email</label>
                <input type="email" wire:model="email" id="email" class="w-full px-3 py-2 border rounded">
                @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            {{-- Facebook --}}
            <div>
                <label for="facebook" class="block font-semibold mb-1">Facebook</label>
                <input type="url" wire:model="facebook" id="facebook" class="w-full px-3 py-2 border rounded">
                @error('facebook') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            {{-- Instagram --}}
            <div>
                <label for="instagram" class="block font-semibold mb-1">Instagram</label>
                <input type="url" wire:model="instagram" id="instagram" class="w-full px-3 py-2 border rounded">
                @error('instagram') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            {{-- Nút Submit --}}
            <div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Lưu Thay Đổi
                </button>
            </div>
        </form>
    </div>

</div>