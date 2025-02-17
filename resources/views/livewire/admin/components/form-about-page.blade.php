<div>
    <div class="container mx-auto p-6 bg-gray-100 shadow rounded-lg">
        <h1 class="text-2xl font-bold mb-4">Cập Nhật Giới Thiệu</h1>
        <x-mary-toast position="toast-top toast-center" />

        <form wire:submit="updateAbout" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            {{-- Description --}}
            <div>
                <div>
                    <label for="description" class="block font-semibold mb-1">Nội dung</label>
                    <textarea name="description" id="description" rows="3" wire:model="content"
                        class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:ring-blue-300">{{$abouts->content}}</textarea>
                </div>
            </div>

            <div>

            </div>

            {{-- Submit Button --}}
            <div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded">
                    Lưu Thay Đổi
                </button>
            </div>
        </form>
    </div>
</div>