<?php namespace Jazz\Playground\FormWidgets;

use Backend\Classes\FormWidgetBase;
use Jazz\Playground\Classes\TokenGenerator;

/**
 * token Form Widget
 */
class Token extends FormWidgetBase
{
    /**
     * @inheritDoc
     */
    protected $defaultAlias = 'jazz_playground_token';

    /**
     * @inheritDoc
     */
    public function init()
    {
    }

    /**
     * @inheritDoc
     */
    public function render()
    {
	    $this->onCreateToken();
        //$this->prepareVars();
	    return $this->makePartial('token');

    }

    /**
     * Prepares the form widget view data
     */
    public function prepareVars()
    {
        $this->vars['name'] = $this->formField->getName();
        $this->vars['value'] = $this->getLoadValue();
        $this->vars['model'] = $this->model;
    }

	/**
	 * @inheritDoc
	 */
	public function loadAssets()
	{
	}

    /**
     * @inheritDoc
     */
    public function getSaveValue($value)
    {
        return $value;
    }

	public function onCreateToken()
	{
		$this->prepareVars();
		$length = "";
		$alphabet = "";
		$this->vars['value'] =  TokenGenerator::generate(16, "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789", $length, $alphabet);
		$tokenId = $this->getId('token');
		return[
			"#$tokenId" => $this->makePartial( 'input' )
		];
	}
}
