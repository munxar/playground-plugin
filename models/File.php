<?php namespace Jazz\Playground\Models;

use Model;
use RainLab\Translate\Behaviors\TranslatableModel;

/**
 * Model
 */
class File extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $implement = [
        TranslatableModel::class
    ];

    public $translatable = ['token'];

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

    /**
     * @var string The database table used by the model.
     */
    public $table = 'jazz_playground_files';
}
