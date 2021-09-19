<?php namespace Acme\Hostel;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            'Acme\Hostel\Components\RoomsList' => 'roomslist',
            'Acme\Hostel\Components\ThemeSlider' => 'themeslider',
            'Acme\Hostel\Components\PageList' => 'pagelist',
            'Acme\Hostel\Components\PageSingle' => 'pagesingle'
        ];
    }

    public function registerSettings()
    {
    }
}
