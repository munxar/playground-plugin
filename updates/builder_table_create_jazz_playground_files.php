<?php namespace Jazz\Playground\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateJazzPlaygroundFiles extends Migration
{
    public function up()
    {
        Schema::create('jazz_playground_files', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('token')->unique();
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('jazz_playground_files');
    }
}