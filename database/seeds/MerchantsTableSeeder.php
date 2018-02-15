<?php

use Illuminate\Database\Seeder;

class MerchantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('merchants')->delete();

        $merchants = array(
        	['id' => 1, 'merchant_name' => 'Ecopoints', 'logo' => 'ecopoints-logo.png'],
        	['id' => 2, 'merchant_name' => 'Auckland Council', 'logo' => 'aucklandcouncil-logo.jpg'],
            ['id' => 3, 'merchant_name' => 'New World', 'logo' => 'new-world-logo.jpg'],
            ['id' => 4, 'merchant_name' => 'The Mad Butcher', 'logo' => 'the-mad-butcher-logo.png'],
            ['id' => 5, 'merchant_name' => 'Z Energy', 'logo' => 'z-energy-logo.png'],
            ['id' => 6, 'merchant_name' => 'Nissan New Zealand', 'logo' => 'nissan-logo.png'],
            ['id' => 7, 'merchant_name' => 'Turners and Growers', 'logo' => 'turners-and-growers-logo.jpg'],
            ['id' => 8, 'merchant_name' => 'Lockwood', 'logo' => 'lockwood-logo.jpg'],
        );

        DB::table('merchants')->insert($merchants);
    }
}
