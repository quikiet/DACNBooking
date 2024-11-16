<?php

namespace App\Livewire\Admin\Components;

use App\Models\User;
use Livewire\Component;

class UserTable extends Component
{
    public function render()
    {
        $users = User::all();
        return view('livewire.admin.components.user-table', [
            'users' => $users
        ]);
    }
}
