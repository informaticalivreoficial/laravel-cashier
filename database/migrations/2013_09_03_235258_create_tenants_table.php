<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid');
            $table->string('name')->unique();
            $table->integer('status')->default('0');
            $table->string('email')->unique();
            $table->string('cnpj')->unique();
            $table->string('ie')->nullable();
            $table->string('dominio')->nullable();
            $table->string('template')->nullable();

            /** imagens */
            $table->string('logomarca')->nullable();
            $table->string('favicon')->nullable();
            $table->string('metaimg')->nullable();
            $table->string('imgheader')->nullable();

            /** address */
            $table->string('cep')->nullable();
            $table->string('rua')->nullable();
            $table->string('num')->nullable();
            $table->string('complemento')->nullable();
            $table->string('bairro')->nullable();
            $table->integer('uf')->nullable();
            $table->integer('cidade')->nullable();

            /** contact */
            $table->string('telefone1')->nullable();
            $table->string('telefone2')->nullable();
            $table->string('telefone3')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('skype')->nullable();
            $table->string('email1')->nullable();

            /** Redes Sociais */
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('vimeo')->nullable();
            $table->string('youtube')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('instagram')->nullable();
            $table->string('fliccr')->nullable();
            $table->string('soundclound')->nullable();
            $table->string('snapchat')->nullable();

            /** seo */
            $table->text('descricao')->nullable();
            $table->text('mapa_google')->nullable();
            $table->text('metatags')->nullable();

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
        Schema::dropIfExists('tenants');
    }
}
