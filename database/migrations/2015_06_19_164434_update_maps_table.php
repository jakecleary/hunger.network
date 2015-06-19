<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateMapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('maps', function(Blueprint $table) {

            if(!Schema::hasColumn('maps', 'lat')) {
                $table->decimal('lat', 9, 6)->nullable();
            }

            if(!Schema::hasColumn('maps', 'lng')) {
                $table->decimal('lng', 9, 6)->nullable();
            }

            if(!Schema::hasColumn('maps', 'looking_for')) {
                $table->string('looking_for')->nullable();
            }

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('maps', function(Blueprint $table) {

            if(Schema::hasColumn('maps', 'lat')) {
                $table->dropColumn('lat');
            }

            if(Schema::hasColumn('maps', 'lng')) {
                $table->dropColumn('lng');
            }

            if(Schema::hasColumn('maps', 'looking_for')) {
                $table->dropColumn('looking_for');
            }

        });
    }
}
