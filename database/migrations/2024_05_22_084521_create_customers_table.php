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
            $table->string('first_name')->unique()->nullable();
            $table->string('last_name')->unique()->nullable();
            $table->string('date_of_birth')->unique()->nullable();
            $table->string('phone_number', 15)->unique()->nullable()->index();
            $table->string('email')->unique()->nullable()->index();
            $table->string('bank_account_number')->unique()->nullable();
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
