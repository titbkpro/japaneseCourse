<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateContactDetailInContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropColumn('contact_detail');
        });
        Schema::table('contacts', function (Blueprint $table) {
            $table->text('contact_detail')->after('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropColumn('contact_detail');
        });
        Schema::table('contacts', function (Blueprint $table) {
            $table->string('contact_detail')->after('description');
        });
    }
}
