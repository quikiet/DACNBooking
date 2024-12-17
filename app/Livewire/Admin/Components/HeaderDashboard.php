<?php

namespace App\Livewire\Admin\Components;

use App\Livewire\Actions\Logout;
use App\Models\User;
use Auth;
// use Illuminate\Auth\Events\Logout;
use Livewire\Component;

class HeaderDashboard extends Component
{

    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
    public function render()
    {
        $user = User::where('id', Auth::id())->get();
        return view('livewire.admin.components.header-dashboard', compact('user'));
    }
}
