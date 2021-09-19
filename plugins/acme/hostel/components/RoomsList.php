<?php namespace Acme\Hostel\Components;

use Cms\Classes\ComponentBase;
use Acme\Hostel\Models\Hostel;

class RoomsList extends ComponentBase
{
    public $rooms;

    public function componentDetails()
    {
        return [
            'name'          => 'Комнаты',
            'description'   => 'Отображение комнат'
        ];
    }

    public function prepareVars()
    {
      $this->rooms = Hostel::active()->orderBy('id')->get();
    }

    public function onRun() 
    {
      $this->page['rooms'] = $this->prepareVars();
    }
    
}