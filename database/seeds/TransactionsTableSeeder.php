<?php

use Illuminate\Database\Seeder;

class TransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('transactions')->delete();

        $transactions = array(
        	['id' => 1, 'transaction_date' => new Datetime, 'merchant_id' => 1, 'value' => '1000000', 'status' => 'completed'],
            ['id' => 2, 'transaction_date' => new Datetime, 'merchant_id' => 2, 'value' => '500000', 'status' => 'completed'],
            ['id' => 3, 'transaction_date' => new Datetime, 'merchant_id' => 3, 'value' => '1000000', 'status' => 'completed'],
            ['id' => 4, 'transaction_date' => new Datetime, 'merchant_id' => 4, 'value' => '500000', 'status' => 'completed'],
            ['id' => 5, 'transaction_date' => new Datetime, 'merchant_id' => 5, 'value' => '1000000', 'status' => 'completed'],
            ['id' => 6, 'transaction_date' => new Datetime, 'merchant_id' => 6, 'value' => '250000', 'status' => 'completed'],
            ['id' => 7, 'transaction_date' => new Datetime, 'merchant_id' => 7, 'value' => '500000', 'status' => 'completed'],
            ['id' => 8, 'transaction_date' => new Datetime, 'merchant_id' => 8, 'value' => '100000', 'status' => 'completed'],
        );

        DB::table('transactions')->insert($transactions);
    }
}
