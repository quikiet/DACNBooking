<?php

namespace App\Livewire\Admin;

use App\Models\checkin_form;
use App\Models\checkout_details;
use App\Models\checkout_form;
use Livewire\Component;
use Livewire\WithPagination;
use Mary\Traits\Toast;

class CheckOutDash extends Component
{
    use Toast;
    use WithPagination;
    public $search;

    public function render()
    {
        $checkouts = checkout_form::with(['checkout_details', 'checkin_form'])
            ->where('created_at', 'like', "%{$this->search}%")->paginate(6);
        return view('livewire.admin.check-out-dash', ['checkouts' => $checkouts])->layout('livewire.admin.dashboard');
    }
}
