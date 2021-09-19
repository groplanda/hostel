<?php namespace Acme\Hostel\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAcmeHostel2 extends Migration
{
    public function up()
    {
        Schema::table('acme_hostel_', function($table)
        {
            $table->string('sort_order')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('acme_hostel_', function($table)
        {
            $table->dropColumn('sort_order');
        });
    }
}
