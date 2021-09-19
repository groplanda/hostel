<?php namespace Acme\Contactform\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAcmeContactformOrder2 extends Migration
{
    public function up()
    {
        Schema::table('acme_contactform_order', function($table)
        {
            $table->renameColumn('nest_left', 'sort_order');
        });
    }
    
    public function down()
    {
        Schema::table('acme_contactform_order', function($table)
        {
            $table->renameColumn('sort_order', 'nest_left');
        });
    }
}
