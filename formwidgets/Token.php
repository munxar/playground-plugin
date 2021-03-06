<?php namespace Jazz\Playground\FormWidgets;

use Backend\Classes\FormWidgetBase;

/**
 * Token Form Widget
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
        $this->prepareVars();
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
    public function getSaveValue($value)
    {
        return $value;
    }

    public function onGetToken()
    {
        sleep(1);
        $this->prepareVars();
        $this->vars['value'] = 42;

        return [
            '#'.$this->getId('group') => $this->makePartial('input')
        ];
    }
}
