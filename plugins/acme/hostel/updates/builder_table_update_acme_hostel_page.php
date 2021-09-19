<?php namespace Acme\Hostel\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAcmeHostelPage extends Migration
{
    public function up()
    {
        Schema::table('acme_hostel_page', function($table)
        {
            $table->string('slug', 255)->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('acme_hostel_page', function($table)
        {
            $table->dropColumn('slug');
        });
    }
}
