<?php namespace Acme\Hostel\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Slides extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Acme.Hostel', 'main-menu-hostel', 'side-menu-slide');
    }
}
