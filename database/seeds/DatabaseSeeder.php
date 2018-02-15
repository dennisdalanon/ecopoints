<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call('CouponSerialNumberTableSeeder');
        $this->call('CouponDesignTableSeeder');
        $this->call('MerchantsTableSeeder');
        $this->call('TransactionsTableSeeder');
        $this->call('MembersTableSeeder');
        $this->call('CouponsTableSeeder');
        $this->call('RecipientsTableSeeder');
        $this->call('ProjectsTableSeeder');
    }
}
