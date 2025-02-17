<?php

namespace App\Livewire\Admin\Components;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserTable extends Component
{
    use WithPagination;
    public $search;
    public function render()
    {
        $users = User::where('name', 'like', "%{$this->search}%")
            ->orWhere('email', 'like', "%{$this->search}%")->paginate(5);
        return view('livewire.admin.components.user-table', [
            'users' => $users
        ]);
    }
}
