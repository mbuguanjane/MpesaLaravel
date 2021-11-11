<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->String('TransactionType');
            $table->String('TransID');
            $table->timestamp('TransTime');
            $table->Integer('TransAmount');
            $table->String('BusinessShortCode');
            $table->String('BillRefNumber')->nullable();
            $table->String('InvoiceNumber')->nullable();
            $table->Integer('OrgAccountBalance')->nullable();
            $table->String('ThirdPartyTransID')->nullable();
            $table->String('MSISDN');
            $table->String('FirstName');
            $table->String('MiddleName');
            $table->String('LastName');
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
        Schema::dropIfExists('payments');
    }
}
