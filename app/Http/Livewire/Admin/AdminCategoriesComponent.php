<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class AdminCategoriesComponent extends Component
{
    use WithPagination;

    public function render()
    {
        $categories = Category::orderBy('name', 'ASC')->paginate();
        return view('livewire.admin.admin-categories-component', ['categories' => $categories]);
    }
}
