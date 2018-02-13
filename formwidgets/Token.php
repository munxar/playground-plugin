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
     * @var number
     */
    protected $length = 16;

    /**
     * @var string
     */
    protected $alphabet = 'abcdefghijklmnopqrstuvwzyx1234567890';

    public function init()
    {
        $this->fillFromConfig([
            'length',
            'alphabet',
        ]);
    }

    /**
     * @inheritDoc
     */
    public function render()
    {
        $this->prepareVars();
	    return $this->makePartial('token');
    }

    /**
     * Prepares the form widget view data
     */
    public function prepareVars()
    {
        $this->vars['name'] = $this->formField->getName();
        $this->vars['model'] = $this->model;
        $this->vars['value'] = $this->model->exists ? $this->getLoadValue() : $this->getToken();
    }

	public function onCreateToken()
	{
		$this->prepareVars();
        $this->vars['value'] = $this->getToken();
		return[
			"#{$this->getId('token')}" => $this->makePartial( 'input' )
		];
	}

	private function getToken()
    {
        return TokenGenerator::generate($this->length, $this->alphabet);
    }
}
