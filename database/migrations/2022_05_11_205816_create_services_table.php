<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            $table->integer('service_number');
            $table->string('origin', 30);
            $table->string('destination', 30);
            $table->float('service_value');
            //foreign keys - Método mais verboso.
            /*
            $table->unsignedBigInteger('plate_id');
            $table->foreign('plate_id')->references('id')->on('plates');
            $table->unsignedBigInteger('insurance_id');
            $table->foreign('insurance_id')->references('id')->on('insurances');
            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')->references('id')->on('companies');
            $table->unsignedBigInteger('driver_id');
            $table->foreign('driver_id')->references('id')->on('drivers');
            */
            //foreign keys - Método menos verboso.
            $table->foreignId('plate_id',)->nullable()->constrained('plates');
            $table->foreignId('insurance_id')->constrained('insurances');
            $table->foreignId('company_id')->constrained('companies');
            $table->foreignId('driver_id')->constrained('drivers');
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
        Schema::table('services', function (Blueprint $table){
            $table->dropForeign('plate_id');
            $table->dropForeign('insurance_id');
            $table->dropForeign('company_id');
            $table->dropForeign('driver_id');
        });
        Schema::dropIfExists('services');

    }
}
