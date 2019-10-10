<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Vaciando tabla antes de llenarla de nuevo
         */
        $this->truncateTables([
            'cities'
        ]);

         $this->call(CitiesSeeder::class);
    }

    protected function truncateTables(array $tables)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); //ignorar llaves foraneas
        foreach($tables as $table){
            DB::table($table)->truncate(); //vaciar la tabla
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); //reactivar validacion dellave foranea
    }
}
