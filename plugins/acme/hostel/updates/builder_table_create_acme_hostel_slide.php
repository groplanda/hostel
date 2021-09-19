<?php namespace Acme\Hostel\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateAcmeHostelSlide extends Migration
{
    public function up()
    {
        Schema::create('acme_hostel_slide', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('id');
            $table->string('title', 255);
            $table->primary(['id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('acme_hostel_slide');
    }
}
