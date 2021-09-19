<?php namespace Acme\Hostel\Components;

use Cms\Classes\ComponentBase;
use Acme\Hostel\Models\Page;

class PageList extends ComponentBase
{
    public $pages;

    public function componentDetails()
    {
        return [
            'name'          => 'Статьи',
            'description'   => 'Отображение статей'
        ];
    }

    public function prepareVars()
    {
      $this->pages = Page::active()->orderBy('id')->get();
    }

    public function onRun() 
    {
      $this->page['pages'] = $this->prepareVars();
    }
    
}