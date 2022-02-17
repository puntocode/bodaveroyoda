<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PreguntaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            ['pregunta' => '¿Quien crees que dio el primer paso? ',         'correcta' => 'OSVAL' ],
            ['pregunta' => '¿Quien dio el primer beso ? ',                  'correcta' => 'OSVAL' ],
            ['pregunta' => '¿Quien pidió cucharita primero? ',              'correcta' => 'VERO'  ],
            ['pregunta' => '¿Quien dijo "te amo" primero?',                 'correcta' => 'OSVAL' ],
            ['pregunta' => '¿Quién es más vanidoso/a?',                     'correcta' => 'VERO'  ],
            ['pregunta' => '¿Quién es el más peleador/a?',                  'correcta' => 'VERO'  ],
            ['pregunta' => '¿Quién es más despistado/a?',                   'correcta' => 'OSVAL' ],
            ['pregunta' => '¿Quién es más espontáneo/a?',                   'correcta' => 'VERO'  ],
            ['pregunta' => '¿Quién es más impuntual ',                      'correcta' => 'OSVAL' ],
            ['pregunta' => '¿Quién tiene mejor sentido del humor?',         'correcta' => 'OSVAL' ],
            ['pregunta' => '¿Quién es más sabelotodo?',                     'correcta' => 'OSVAL' ],
            ['pregunta' => '¿Quién es más hipocondriaco/a?',                'correcta' => 'VERO'  ],
            ['pregunta' => '¿Quién es más terco/a?',                        'correcta' => 'VERO'  ],
            ['pregunta' => '¿Quién maneja mejor?',                          'correcta' => 'VERO'  ],
            ['pregunta' => '¿Quién es más adicto/a a las redes sociales?',  'correcta' => 'VERO'  ],
        ];

        DB::table('preguntas')->insert($array);

    }
}
