<?php namespace Jazz\Playground\Models;

use Model;

/**
 * Model
 */
class File extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    /*
     * Validation
     */
    public $rules = [
        'token' => 'required|unique'
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'jazz_playground_files';
}