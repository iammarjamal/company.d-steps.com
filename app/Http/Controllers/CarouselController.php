<?php

namespace App\Http\Controllers;

use App\Models\CarouselImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarouselController extends Controller
{


    private $defaultImages;

    public function __construct()
    {
        $this->defaultImages = [
            [
                'imgSrc' => 'https://penguinui.s3.amazonaws.com/component-assets/carousel/default-slide-1.webp',
                'imgAlt' => 'عنوان 1',
                'title' => 'عنوان 1',
                'description' => ' هذا النص يمكن استبداله 1',
            ],
            [
                'imgSrc' => 'https://penguinui.s3.amazonaws.com/component-assets/carousel/default-slide-2.webp',
                'imgAlt' => 'عنوان 2',
                'title' => 'عنوان 2',
                'description' => ' هذا النص يمكن استبداله 2',
            ],
            [
                'imgSrc' => 'https://penguinui.s3.amazonaws.com/component-assets/carousel/default-slide-3.webp',
                'imgAlt' => 'عنوان 3',
                'title' => 'عنوان 3',
                'description' => ' هذا النص يمكن استبداله 3',
            ],
        ];
    }


    public function getHomeImages()
    {
        $images = CarouselImage::where('page' , 'home')->get();

        if ($images->isEmpty()) {
            return response()->json($this->defaultImages);
        }

        $images->transform(function ($image) {
            $image->imgSrc = Storage::url($image->imgSrc);
            return $image;
        });

        return response()->json($images);
    }


    public function getBranchesImages()
    {

        $images = CarouselImage::where('page' , 'branches')->get();

        if ($images->isEmpty()) {
            return response()->json($this->defaultImages);
        }

        $images->transform(function ($image) {
            $image->imgSrc = Storage::url($image->imgSrc);
            return $image;
        });

        return response()->json($images);
    }

    public function getAboutImages()
    {

        $images = CarouselImage::where('page' , 'about')->get();

        if ($images->isEmpty()) {
            return response()->json($this->defaultImages);
        }

        $images->transform(function ($image) {
            $image->imgSrc = Storage::url($image->imgSrc);
            return $image;
        });

        return response()->json($images);
    }
}
