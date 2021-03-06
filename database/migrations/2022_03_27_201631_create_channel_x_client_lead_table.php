<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('channel_x_client_lead', function (Blueprint $table) {
            $table->mediumIncrements('id_channel_x_client_lead');
            $table->unsignedTinyInteger('fk_channel');
            $table->unsignedBigInteger('fk_client_lead');
            $table->boolean('active')->default(true);
            $table->timestamps();
            $table->softDeletes();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();

            $table->foreign('fk_channel')->references('id_channel')->on('channels');
            $table->foreign('fk_client_lead')->references('id_client_lead')->on('clients_leads');

            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('channel_x_client_lead');
    }
};