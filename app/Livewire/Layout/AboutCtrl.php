<?php

namespace App\Livewire\Layout;

use App\Models\AboutPage;
use App\Models\CarouselPage;
use Livewire\Component;

class AboutCtrl extends Component
{

    public $abouts;
    public $carousels;

    public function mount()
    {
        $this->abouts = AboutPage::first();
        $this->carousels = CarouselPage::all();
    }

    public function render()
    {

        return view('livewire.layout.about-ctrl');
    }
}
