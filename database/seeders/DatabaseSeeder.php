<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::table('casa_categorias')->insert([
            'id'=>1,
            'descricao'=>'APARTAMENTO'
        ],
    [
        'id'=>2,
        'descricao'=>'SIMPLES'
    ]);

        DB::table('imobiliarias')->insert([
            'id'=>1,
            'nome_fantasia'=>'IMOBILIARIA NETO',
            'razao_social'=>'IMOBILIARIA NETO LTDA',
            'email'=>'imobiliaria.neto@hotmail.com',
            'doc'=>'12.285.970/0001-60',
            'endereco'=> 'RUA 13, SERRA DE SÃO PEDRO. RONDONOPOLIS. MATO GROSSO.'
        ]);

        DB::table('locadores')->insert([
            'id'=>1,
            'nome'=>'KELVIN',
            'email'=>'kelvin@hotmail.com',
            'doc'=>'748.836.020-60',
            'endereco'=> 'RUA 15, JD ESTEVAO CUIABA. MATO GROSSO.'
        ]);

        DB::table('casas')->insert([
            'id'=>1,
            'imobiliaria_id'=>1,
            'casa_categoria_id'=>1,
            'descricao'=>'CASA AZUL 4P 1AREA',
            'endereco'=> 'RUA 13, CJ SÃO JOSE. RONDONOPOLIS. MATO GROSSO.',
            'dono_nome'=>'SENHOR CRISTOVAO BOEIRO SANTOS',
            'dono_doc'=>'351.269.270-27',
        ]);

        DB::table('locacoes')->insert([
            'id'=>1,
            'casa_id'=>1,
            'locador_id'=>1,
        ]);
    }
}
