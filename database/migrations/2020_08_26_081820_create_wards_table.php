<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('wards', function (Blueprint $table) {
            $table->BigIncrements('id');
            $table->unsignedBigInteger('patient_id')->nullable();
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
            $table->string('patient_name');
            $table->unsignedBigInteger('doc_id')->nullable();
            $table->string('doc_name');
            $table->string('department');
            $table->foreign('doc_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('ward_type');
            $table->integer('No_of_days')->nullable();
            $table->integer('bed_no');
            $table->integer('charges')->nullable();
            $table->boolean('status')->default(0);
            $table->date('date');
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
        Schema::dropIfExists('wards');
        
    }
}
