<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('email', 255);
            $table->string('gsm_no', 64);
            $table->unsignedBigInteger('department_id');
            $table->date('birthday');
            $table->timestamps();
            $table->softDeletes();
            $table->index('department_id');
            $table->foreign('department_id')->references('id')->on('departments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->dropForeign('customers_department_id_foreign');
            $table->dropIndex('customers_department_id_index');
        });

        Schema::dropIfExists('customers');
    }
}
