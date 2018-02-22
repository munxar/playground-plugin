<?php namespace Jazz\Playground\FormWidgets;

use Backend\Classes\FormWidgetBase;
use Jazz\Playground\Classes\TokenGenerator;
use RainLab\Translate\Models\Locale;

/**
 * token Form Widget
 */
class Token extends FormWidgetBase
{
	use \RainLab\Translate\Traits\MLControl;
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
    protected $alphabet = 'abcdefghijklmnopqrstuvwzyxABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';

    public function init()
    {
        $this->fillFromConfig([
            'length',
            'alphabet',
        ]);
	    $this->initLocale();
    }

    /**
     * @inheritDoc
     */
    public function render()
    {
	    $this->isAvailable = Locale::isAvailable();

        $this->prepareVars();

	    if ($this->isAvailable) {
		    return $this->makePartial('token');
	    }
	    else {
		    return $this->renderFallbackField();
	    }
    }

	/**
	 * Returns an array of translated values for this field
	 * @return array
	 */
	public function getSaveValue($value)
	{
		return $this->getLocaleSaveValue($value);
	}

    /**
     * Prepares the form widget view data
     */
    public function prepareVars()
    {
        $this->vars['name'] = $this->formField->getName();
        $this->vars['model'] = $this->model;
        $this->vars['value'] = $this->model->exists ? $this->getLoadValue() : $this->getToken();
	    $this->prepareLocaleVars();
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

	protected function loadAssets()
	{
		$this->loadLocaleAssets();
	}

}