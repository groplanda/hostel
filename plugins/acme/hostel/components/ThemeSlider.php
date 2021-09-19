<?php namespace Acme\Hostel\Components;

use Cms\Classes\ComponentBase;
use Acme\Hostel\Models\Slide;

class ThemeSlider extends ComponentBase
{
    public $slides;

    public function componentDetails()
    {
        return [
            'name'          => 'Слайдер',
            'description'   => 'Вставить слайдер'
        ];
    }

    public function defineProperties()
    {
        return [
            'sliderName' => [
                'title'             => 'Выберите слайдер',
                'type'              => 'dropdown',
                'default'           => '1'
            ],
        ];
    }

    public function getSliderNameOptions()
    {
        return Slide::all()->lists('title', 'id');
    }

    public function prepareVars()
    {
      $this->slides = Slide::where( 'id', '=', $this->property('sliderName') )->first();
    }

    public function onRun() 
    {
      $this->page['slides'] = $this->prepareVars();
    }
    
}