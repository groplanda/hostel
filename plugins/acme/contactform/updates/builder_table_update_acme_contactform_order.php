<?php namespace Acme\Contactform\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAcmeContactformOrder extends Migration
{
    public function up()
    {
        Schema::table('acme_contactform_order', function($table)
        {
            $table->integer('nest_left')->default(1);
        });
    }
    
    public function down()
    {
        Schema::table('acme_contactform_order', function($table)
        {
            $table->dropColumn('nest_left');
        });
    }
}
