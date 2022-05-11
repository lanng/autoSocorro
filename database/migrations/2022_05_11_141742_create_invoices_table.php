<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->date('date_issue');
            $table->integer('invoice_number');
            $table->foreignId('insurance_id')->constrained('insurances');
            $table->foreignId('company_id')->constrained('companies');
            $table->float('value');
            $table->date('date_receipt');
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
        Schema::table('invoices', function (Blueprint $table){
            $table->dropForeign('insurance_id');
            $table->dropForeign('company_id');
        });

        Schema::dropIfExists('invoices');
    }
}
