<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Livewire\Component;
use Livewire\WithPagination;

class AdminHomeSliderComponent extends Component
{

    use WithPagination;
    public $slide_id;

    public function deleteSlide()
    {

        $slide = HomeSlider::find($this->slide_id);
        unlink('assets/imgs/slider/' . $slide->image);
        $slide->delete();
        session()->flash('message', 'Slide deleted successfully');
        redirect('/admin/slider');
    }

    public function render()
    {
        $slides = HomeSlider::orderBy('created_at', 'DESC')->get();
        return view('livewire.admin.admin-home-slider-component', ['slides' => $slides]);
    }
}
