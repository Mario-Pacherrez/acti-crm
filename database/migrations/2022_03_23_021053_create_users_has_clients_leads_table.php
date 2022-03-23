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
        Schema::create('users_has_clients_leads', function (Blueprint $table) {
            $table->id('id_user_has_client_lead');
            $table->unsignedInteger('fk_user');
            $table->unsignedInteger('fk_client_lead');
            $table->unsignedInteger('fk_lead_status');
            $table->boolean('active')->default(true);
            $table->string('status', 70)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();

            $table->foreign('fk_user')->references('id_user')->on('users');
            $table->foreign('fk_client_lead')->references('id_client_lead')->on('clients_leads');
            $table->foreign('fk_lead_status')->references('id_lead_status')->on('leads_status');

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
        Schema::dropIfExists('users_has_clients_leads');
    }
};