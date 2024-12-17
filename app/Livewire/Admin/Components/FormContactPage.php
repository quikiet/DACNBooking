<?php

namespace App\Livewire\Admin\Components;

use App\Models\ContactPage;
use Livewire\Component;
use Mary\Traits\Toast;

class FormContactPage extends Component
{
    public $address;
    public $google_map;
    public $pn1;
    public $pn2;
    public $email;
    public $facebook;
    public $instagram;
    use Toast;

    public function mount()
    {
        $contact = ContactPage::first();
        if ($contact) {
            $this->address = $contact->address;
            $this->google_map = $contact->google_map;
            $this->pn1 = $contact->pn1;
            $this->pn2 = $contact->pn2;
            $this->email = $contact->email;
            $this->facebook = $contact->facebook;
            $this->instagram = $contact->instagram;
        }
    }

    public function save()
    {
        $validatedData = $this->validate([
            'address' => 'required|string|max:255',
            'google_map' => 'nullable|url',
            'pn1' => 'nullable|string|max:20',
            'pn2' => 'nullable|string|max:20',
            'email' => 'required|email',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
        ]);

        ContactPage::updateOrCreate([], $validatedData);

        $this->success('Lưu thành công', 'Thông tin liên hệ đã được cập nhật.');
    }

    public function render()
    {
        return view('livewire.admin.components.form-contact-page');
    }
}
