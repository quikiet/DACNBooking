<div class="p-6 bg-gray-100 shadow rounded-lg mt-6">
    <h2 class="text-2xl font-bold mb-4">Thêm Ảnh Vào Carousel</h2>

    {{-- Form Upload --}}
    <form wire:submit.prevent="save" enctype="multipart/form-data" class="space-y-4">
        <div>
            <x-mary-file wire:model="photos" label="Chọn Ảnh" multiple />
            @error('photos.*') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Thêm Ảnh
        </button>
    </form>

    <hr class="my-6">

    <h3 class="text-xl font-bold mb-3">Danh Sách Ảnh</h3>
    <div class="grid grid-cols-3 gap-4">
        @foreach ($images as $image)
            <div class="relative p-3 border rounded shadow">
                {{-- Nút Delete --}}
                <button wire:click="deleteImage({{ $image->id }})" onclick="confirm('Bạn có chắc chắn muốn xoá không?')"
                    class="absolute top-2 right-2 bg-red-500 text-white rounded-full px-2 py-1 hover:bg-red-700">
                    <x-mary-icon name="o-trash" />
                </button>

                {{-- Ảnh --}}
                <img src="{{ asset('storage/' . $image->image_path) }}" alt="Carousel Image"
                    class="w-full h-32 object-cover">
            </div>
        @endforeach
    </div>
</div>