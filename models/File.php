<?php namespace Jazz\Playground\Models;

use Model;

/**
 * Model
 */
class File extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    /**
     * @var array Validation rules
     */
    public $rules = [
	    'token' => 'required|unique:jazz_playground_files',
    ];
	public $customMessages = [
		'token.required' => 'A token is required.',
		'token.unique' => 'Token must be unique'
	];
	public $implement = ['@RainLab.Translate.Behaviors.TranslatableModel'];

	public $translatable = ['token'];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'jazz_playground_files';
}
