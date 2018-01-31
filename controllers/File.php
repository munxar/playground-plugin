<?php namespace Jazz\Playground\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class File extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Jazz.Playground', 'main-menu-item', 'side-menu-item');
    }
}