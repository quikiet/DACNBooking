<?php

namespace App\Livewire\Admin\Components;

use App\Models\AboutPage;
use Livewire\Component;
use Mary\Traits\Toast;

class FormAboutPage extends Component
{
    public $content;

    use Toast;

    public function mount()
    {
        $about = AboutPage::first();
        $this->content = $about ? $about->content : '';
    }

    public function updateAbout()
    {
        $about = AboutPage::first();
        if ($about && $about->content !== $this->content) {
            $about->update([
                'content' => $this->content,
            ]);
            $this->success('Thay đổi thành công', 'Cập nhật thông tin trang giới thiệu thành công');
        } else
            $this->info('Không có thay đổi', 'Nội dung không thay đổi.');
    }

    public function render()
    {
        $abouts = AboutPage::first();
        return view('livewire.admin.components.form-about-page', compact('abouts'));
    }
}
