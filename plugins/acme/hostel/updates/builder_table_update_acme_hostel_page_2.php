<?php namespace Acme\Hostel\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAcmeHostelPage2 extends Migration
{
    public function up()
    {
        Schema::table('acme_hostel_page', function($table)
        {
            $table->string('seo_title', 255)->nullable();
            $table->string('seo_description', 255)->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('acme_hostel_page', function($table)
        {
            $table->dropColumn('seo_title');
            $table->dropColumn('seo_description');
        });
    }
}
