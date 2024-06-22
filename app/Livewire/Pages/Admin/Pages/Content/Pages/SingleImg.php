<?php

namespace App\Livewire\Pages\Admin\Pages\Content\Pages;

use App\Livewire\Pages\Admin\Pages\Content\Pages\Index as CarouselIndex;
use App\Models\CarouselImage;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class SingleImg extends Component
{

    public $image;
    public $id;

    public function remove($id)
    {
        $this->id = $id;
        $this->validate([
            'id' => 'required|integer',
        ]);

        $image = CarouselImage::find($id);
        Storage::disk('public')->delete($image->imgSrc);
        sleep(1);
        $image->delete();
        $this->dispatch('remove')->to(CarouselIndex::class);
    }


    public function mount($image)
    {
        $this->image = $image;
        $this->id = $this->image->id;
    }


    public function render()
    {
        return view('pages.admin.pages.content.pages.single-img');
    }
}
