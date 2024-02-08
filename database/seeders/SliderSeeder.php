<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sliders = [
            [
                'title' => 'Slide 1',
                'path' => 'C:\xampp\htdocs\ITVH_JobPortal\public\img\slider1.jpg'
            ],
            [
                'title' => 'Slide 2',
                'path' => 'C:\xampp\htdocs\ITVH_JobPortal\public\img\slider2.jpg'
            ],
            [
                'title' => 'Slide 3',
                'path' => 'C:\xampp\htdocs\ITVH_JobPortal\public\img\slider3.jpg'
            ],
            [
                'title' => 'Slide 4',
                'path' => 'C:\xampp\htdocs\ITVH_JobPortal\public\img\slider4.jpg'
            ],
            [
                'title' => 'Slide 5',
                'path' => 'C:\xampp\htdocs\ITVH_JobPortal\public\img\slider5.jpg'
            ]
        ];
 
        foreach ($sliders as $slider) {
            Slider::create($slider);
        }
    }
    
}
