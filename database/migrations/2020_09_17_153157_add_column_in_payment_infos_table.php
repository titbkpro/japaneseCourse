<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnInPaymentInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payment_infos', function (Blueprint $table) {
            $table->string('name')->after('id');
            $table->boolean('status')->after('content')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payment_infos', function (Blueprint $table) {
            $table->dropColumn(['name', 'status']);
        });
    }
}
