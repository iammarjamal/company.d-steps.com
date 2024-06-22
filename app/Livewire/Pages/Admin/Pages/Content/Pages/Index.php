<?php

namespace App\Livewire\Pages\Admin\Pages\Content\Pages;

use App\Models\CarouselImage;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{

    use WithFileUploads;

    public $title;
    public $description;
    public $image;
    public $page = 'home';

    // Search users
    #[Url]
    public $search;

    // Pagination
    public $pagination = 5;

    public function save()
    {
        $data = $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $imgPath = $this->image->store('slider-'.$this->page, 'public');

        CarouselImage::create([
            'page' => $this->page,
            'imgSrc' => $imgPath,
            'imgAlt' => $data['title'],
            'title' => $data['title'],
            'description' => $data['description'],
        ]);


        $this->dispatch('save');
        $this->resetInputs();
    }

    private function resetInputs()
    {
        $this->title = null;
        $this->description = null;
        $this->image = null;
    }

    #[On('remove')]
    #[On('save')]
    public function resetFilters()
    {
        $this->search = '';
        $this->page = 'home';

        // Close Sidebar
        $this->dispatch('filters');
    }

    public function filters()
    {
        $this->validate([
            'search' => 'nullable|string',
        ]);

        // Close Sidebar
        $this->dispatch('filters');
    }


    public function setPagination()
    {
        $this->pagination += 5;
    }

    public function render()
    {
        $imageQuery = CarouselImage::orderBy('created_at', 'DESC');

        if ($this->search) {
            $imageQuery->where('title', 'like', '%' . $this->search . '%')
                ->orWhere('description', 'like', '%' . $this->search . '%');

        }

        if($this->page){
            $imageQuery->where('page', $this->page );
        }

        $images = $imageQuery->take($this->pagination)->get();
        $count = $imageQuery->count();

        return view('pages.admin.pages.content.pages.index', [
            'images' => $images,
            'count' => $count,
        ])
            ->layout('pages.admin.layouts.layout')
            ->title(trans('app.dashboard.navbar.title.content'));
    }
}
