<?php namespace Jazz\Playground\FormWidgets;

/**
 * MLToken Form Widget
 */
class MLToken extends Token
{
    use \RainLab\Translate\Traits\MLControl;

    /**
     * @inheritDoc
     */
    protected $defaultAlias = 'mltoken';

    public $originalAssetPath;
    public $originalViewPath;

    /**
     * {@inheritDoc}
     */
    public function init()
    {
        parent::init();
        $this->initLocale();
    }

    public function render()
    {
        $this->actAsParent();
        $parentContent = parent::render();
        $this->actAsParent(false);

        if (!$this->isAvailable) {
            return $parentContent;
        }

        $this->vars['token'] = $parentContent;
        return $this->makePartial('mltoken');
    }

    public function prepareVars()
    {
        parent::prepareVars();
        $this->prepareLocaleVars();
    }

	/**
	 * {@inheritDoc}
	 */
	protected function loadAssets()
	{
		parent::loadAssets();
		$this->loadLocaleAssets();
		$this->addCss('css/mltoken.css');

	}

    /**
     * Returns an array of translated values for this field
     * @return array
     */
    public function getSaveValue($value)
    {
        return $this->getLocaleSaveValue($value);
    }

    protected function actAsParent($switch = true)
    {
        if ($switch) {
            $this->originalAssetPath = $this->assetPath;
            $this->originalViewPath = $this->viewPath;
            $this->assetPath = '/plugins/jazz/playground/formwidgets/token/assets';
            $this->viewPath = base_path().'/plugins/jazz/playground/formwidgets/token/partials';
        }
        else {
            $this->assetPath = $this->originalAssetPath;
            $this->viewPath = $this->originalViewPath;
        }
    }
}
