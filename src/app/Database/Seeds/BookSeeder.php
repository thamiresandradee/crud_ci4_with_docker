<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
               'title' => 'Querido John',
               'description' => 'Quando Savannah Lynn Curtis entra em sua vida, John Tyree sabe que esta pronto para começar de novo. Ele, um jovem rebelde, se alista no exército logo após terminar a escola, sem saber o que faria de sua vida. Então, durante sua licença, ele conhece Savannah, a garota de seus sonhos. A atração mútua cresce rapidamente e logo transforma-se em um tipo de amor que faz com que Savannah jure esperá-lo concluir seus deveres militares. Mas ninguém pôde prever que os atentados de 11 de Setembro pudessem mudar o mundo todo. E como muitos homens e mulheres corajosos, John deveria escolher entre seu amor por Savannah e seu país. Agora, quando ele finalmente retorna para Carolina do Norte, John descobre como o amor pode transformar as pessoas de uma forma que jamais poderia imaginar.',
               'author' => 'Nicolas Sparks',
               'page_number' => 100,
               'created_at' => date('Y-m-d H:i:s')
            ],
            [
               'title' => 'Um Homem de Sorte',
               'description' => '“Mas não estava em outra época e lugar, e nada daquilo era normal. Trazia a fotografia dela consigo há mais de cinco anos. Atravessou o país por ela.” “Era estranho pensar nas reviravoltas que a vida de um homem pode dar. Até um ano atrás, Thibault teria pulado de alegria diante da oportunidade de passar um fim de semana ao lado de Amy e suas amigas. Provavelmente, era exatamente isso de que precisava, mas quando elas o deixaram na entrada da cidade de Hampton, com o calor da tarde de agosto em seu ápice, ele acenou para elas, sentindo-se estranhamente aliviado. Colocar uma carapuça de normalidade havia-o deixado exausto. Depois de sair do Colorado, há cinco meses, ele não havia passado mais do que algumas horas sozinho com alguém por livre e espontânea vontade. (...) Imaginava ter caminhado mais de 30 quilômetros por dia, embora não tivesse feito um registro formal do tempo e das distâncias percorridas. Esse não era o objetivo da viagem. Imaginava que algumas pessoas acreditavam que ele viajava para esquecer as lembranças do mundo que havia deixado para trás, o que dava à viagem uma conotação poética. prazer de caminhar. Estavam todos errados. Ele gostava de caminhar e tinha um destino para chegar.',
               'author' => 'Nicolas Sparks',
               'page_number' => 1050,
               'created_at' => date('Y-m-d H:i:s')
            ]
         ];

         $this->db->table('books')->insertBatch($data);
    }
}
