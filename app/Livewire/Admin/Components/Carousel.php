<?php

namespace App\Livewire\Admin\Components;

use App\Models\CarouselPage;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Mary\Traits\Toast;
use Storage;

class Carousel extends Component
{
    use Toast;
    use WithFileUploads;

    public array $photos = [];

    // Xử lý file upload và lưu đường dẫn vào database
    public function save()
    {
        // Validate từng file trong mảng photos
        $this->validate([
            'photos' => 'required',
            'photos.*' => 'image|max:1024', // Mỗi file tối đa 1MB
        ]);

        foreach ($this->photos as $photo) {
            // Lưu file vào thư mục storage/public/carousels
            $path = $photo->store('carousels', 'public');

            // Lưu đường dẫn vào database
            CarouselPage::create([
                'image_path' => $path,
            ]);
        }

        // Xóa dữ liệu đã nhập
        $this->photos = [];
        $this->success('Thêm ảnh', 'Ảnh đã được thêm thành công!');
    }

    public function deleteImage($id)
    {
        $image = CarouselPage::findOrFail($id);
        Storage::disk('public')->delete($image->image_path);

        $image->delete();
        $this->success('Xoá ảnh', 'Ảnh đã được xoá thành công!');
    }

    public function render()
    {
        $images = CarouselPage::all(); // Lấy danh sách ảnh đã thêm
        return view('livewire.admin.components.carousel', compact('images'));
    }
}
