<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->string('image');
        });

        /* Não foi usado Factory/Seeders apenas por uma questão de simplificar o processo */
        DB::table('product')->insert([
            [
                'name' => 'Relógio inteligente Zeblaze',
                'description' => 'Se você pensa em comprar um smartwatch, esta opção pode acabar com as suas dúvidas. Com um design discreto e elegante, irá trazer todas as notificações diretamente no seu pulso.',
                'image' => 'assets/img/products/product.jpeg'
            ],
            [
                'name' => 'Beleza e saúde',
                'description' => 'Os 5 produtos de beleza e saúde mais buscados no Zoom. Se você pensa em comprar um smartwatch, esta opção pode acabar com as suas dúvidas. Com um design discreto e elegante, irá trazer todas as notificações diretamente no seu pulso.',
                'image' => 'assets/img/products/beleza.jpg'
            ],
            [
                'name' => 'Plume Self-Optimizing Wi-Fi',
                'description' => 'O eero Wi-Fi é um sistema desenvolvido em parceria com as equipas da Amazon e com integração à Alexa. Permite que controle o Wi-Fi em toda a sua casa usando apenas a voz. Se tem o sistema Alexa, em junção com ele pode usar o seu eero para encontrar os seus dispositivos espalhados pela casa.',
                'image' => 'assets/img/products/tecnologia.jpg'
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
};
