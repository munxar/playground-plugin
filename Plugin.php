<?php namespace Jazz\Playground;

use Jazz\Playground\FormWidgets\Token;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
    }

    public function registerSettings()
    {
    }
    public function registerFormWidgets() {
	    return [
	    	Token::class => 'token'
	    ];
    }
}
