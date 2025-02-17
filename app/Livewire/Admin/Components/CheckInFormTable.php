<?php

namespace App\Livewire\Admin\Components;

use App\Models\checkin_form;
use Livewire\Component;
use Livewire\WithPagination;
use Mary\Traits\Toast;

class CheckInFormTable extends Component
{
    use WithPagination;
    use Toast;
    public $search;

    public function destroy($id)
    {
        $checkin = checkin_form::findOrFail($id);
        $checkin->delete();
        $this->success('Xoá phiếu thuê', 'Xoá phiếu thuê thành công!');
    }


    public function render()
    {
        $checkins = checkin_form::with(['users', 'checkin_details.room'])
            ->where('created_at', 'like', "%{$this->search}%")->paginate(6);

        return view('livewire.admin.components.check-in-form-table', compact('checkins'));
    }
}
