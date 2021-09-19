<?php namespace Acme\Hostel\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAcmeHostel extends Migration
{
    public function up()
    {
        Schema::table('acme_hostel_', function($table)
        {
            $table->boolean('is_active')->nullable()->default(0);
        });
    }
    
    public function down()
    {
        Schema::table('acme_hostel_', function($table)
        {
            $table->dropColumn('is_active');
        });
    }
}
