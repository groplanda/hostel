<?php namespace Acme\Hostel\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAcmeHostelSlide2 extends Migration
{
    public function up()
    {
        Schema::table('acme_hostel_slide', function($table)
        {
            $table->increments('id')->change();
        });
    }
    
    public function down()
    {
        Schema::table('acme_hostel_slide', function($table)
        {
            $table->integer('id')->change();
        });
    }
}
