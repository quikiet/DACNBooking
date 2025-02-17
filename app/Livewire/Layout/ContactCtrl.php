<?php

namespace App\Livewire\Layout;

use App\Mail\UserNotificationMail;
use App\Models\ContactPage;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Mary\Traits\Toast;
use Request;

class ContactCtrl extends Component
{
    use Toast;

    // Các biến public để lưu thông tin nhập từ form
    public $contacts;
    public $name, $email, $phone, $messages;

    // Phương thức gửi email
    public function sendMail()
    {

        try {
            // Gửi email mà không cần validate
            Mail::to($this->email)->send(new UserNotificationMail($this->name, $this->messages));

            // Reset form và thông báo thành công
            $this->reset(['name', 'email', 'messages']);
            $this->success('success', 'Email đã được gửi thành công!');
        } catch (\Exception $e) {
            // Xử lý lỗi nếu có
            $this->addError('error', 'Có lỗi xảy ra khi gửi email: ' . $e->getMessage());
        }
    }



    // Phương thức mount để lấy thông tin từ ContactPage
    public function mount()
    {
        // Lấy thông tin liên hệ từ cơ sở dữ liệu
        $this->contacts = ContactPage::first();
    }

    // Phương thức render để hiển thị view
    public function render()
    {
        return view('livewire.layout.contact-ctrl');
    }
}
