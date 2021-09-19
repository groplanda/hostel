<?php namespace Acme\Hostel\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAcmeHostelSlide extends Migration
{
    public function up()
    {
        Schema::table('acme_hostel_slide', function($table)
        {
            $table->string('title', 255)->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('acme_hostel_slide', function($table)
        {
            $table->string('title', 255)->nullable(false)->change();
        });
    }
}
