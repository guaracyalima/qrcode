<?php

use Illuminate\Database\Seeder;

class TiclketTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Entities\Ticket::class, 50)->create();
    }
}
