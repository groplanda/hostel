<?php namespace Acme\Hostel\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateAcmeHostelPage extends Migration
{
    public function up()
    {
        Schema::create('acme_hostel_page', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('title', 255)->nullable();
            $table->text('content')->nullable();
            $table->string('poster', 255)->nullable();
            $table->boolean('is_active')->nullable()->default(0);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('acme_hostel_page');
    }
}
