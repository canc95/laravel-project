<?php

use Illuminate\Database\Seeder;
use App\Models\State;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $states = [
        'Abruzzo',
        'Basilicata',
        'Calabria',
        'Campania',
        'Emilia-Romagna',
        'Friuli-Venezia Giulia',
        'Lazio',
        'Liguria',
        'Lombardia',
        'Marche',
        'Molise',
        'Piemonte',
        'Puglia',
        'Sardegna',
        'Sicilia',
        'Toscana',
        'Trentino-Alto Adige',
        'Umbria',
        "Valle d'Aosta",
        'Veneto',
      ];

      foreach ($states as $state) {
        $new_state = new State();
        $new_state->country_id = '1';
        $new_state->name       = $state;
        $new_state->save();
      }
    }
}
