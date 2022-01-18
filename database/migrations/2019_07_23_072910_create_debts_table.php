<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDebtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('debts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('billnumber')->nullable();
            $table->string('lastcounternumber')->nullable();
            $table->string('currentcounternumber')->nullable();
            $table->string('periodconsumption')->nullable();
            $table->string('timefromyear')->nullable();
            $table->string('timefrommonth')->nullable();
            $table->string('timefromday')->nullable();
            $table->string('timetoyear')->nullable();
            $table->string('timetomonth')->nullable();
            $table->string('timetoday')->nullable();
            $table->string('paymentdeadlineyear')->nullable();
            $table->string('paymentdeadlinemonth')->nullable();
            $table->string('paymentdeadlineday')->nullable();
            $table->string('abbahacost')->nullable();
            $table->string('abonmancost')->nullable();
            $table->string('servicescost')->nullable();
            $table->string('specialisedservicescost')->nullable();
            $table->string('generalservicescost')->nullable();
            $table->string('maliat')->nullable();
            $table->string('lastdebt')->nullable();
            $table->string('totalcost')->nullable();
            $table->string('paymentstatus')->nullable();
            $table->timestamps();

            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('debts');
    }
}
