<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Livewire\WithFileUploads;

class AdminEditCategoryComponent extends Component
{
    use  WithFileUploads;

    public $category_id;
    public $name;
    public $slug;
    public $image;
    public $is_popular;
    public $newImage;

    public function mount($category_id){

        $category = Category::find($category_id);

        $this->category_id = $category->id;
        $this->name = $category->name;
        $this->slug = $category->slug;
        $this->image = $category->image;
        $this->is_popular = $category->is_popular;
    }

    public function generateSlug(){

        $this->slug = Str::slug($this->name);
    }

    public function updated($fields){

        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' => 'required',
        ]);
    }

    public function updateCategory(){

        $this->validate([
            'name' => 'required',
            'slug'=> 'required',
        ]);

        $category = Category::find($this->category_id);

        $category->name = $this->name;
        $category->slug = $this->slug;

        if($this->newImage){

            // unlink('assets/imgs/categories/' . $category->image);
            $imageName = Carbon::now()->timestamp . '.' . $this->newImage->extension();
            $this->newImage->storeAs('categories', $imageName);
            $category->image = $imageName;
        }
        $category->is_popular = $this->is_popular;

        $category->save();
        session()->flash('message', 'Category updated successfully');
    }


    public function render()
    {
        return view('livewire.admin.admin-edit-category-component');
    }
}
