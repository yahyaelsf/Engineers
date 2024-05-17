<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateTEngineersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_engineers', function (Blueprint $table) {
            $table->id('pk_i_id');
            $table->string('s_membership')->Nullable();
            $table->string('i_id_number')->nullable();
            $table->string('s_name');
            $table->string('s_address')->nullable();
            $table->string('s_mobile')->nullable();
            $table->integer('i_family')->nullable();
            $table->enum('e_type', ['food_parcel', 'healthy_package','vegetable_basket','cash_assistance',
            'flour_bag','clothes' ,'engineer_sponsorship' , 'martyr_sponsorship'])->nullable();
            $table->string('s_value')->nullable();
            $table->enum('e_donor', ['mercy', 'orphanage','Eng_jerusalem','Harmony','besieged_italy','companions_association' ,'safety_malaysia' , 'international_society_engineers','international_yndicate_engineers'])->nullable();
            $table->timestamp('dt_created_date')->nullable();
            $table->timestamp('dt_modified_date')->nullable();
            $table->timestamp('dt_deleted_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_engineers');
    }
}
