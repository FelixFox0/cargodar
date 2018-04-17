<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->unsignedInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->unsignedInteger('own_id');
            $table->foreign('own_id')->references('id')->on('owns');
            $table->unsignedInteger('companysdirection_id');
            $table->foreign('companysdirection_id')->references('id')->on('companysdirections');
            $table->string('owndopfield', 255);
            $table->string('fio', 255);
            $table->string('phone', 20);
            $table->string('mobilephone', 20);
            $table->string('email', 20);
            $table->string('skype', 20);
            $table->string('login', 20);
            $table->string('password', 40);
            $table->string('solt', 10);
            $table->text('token');
            $table->tinyInteger('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
