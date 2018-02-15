<?php

use Illuminate\Database\Seeder;

class CouponSerialNumberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //DB::table('coupon_serial_numbers')->delete();

        /*$coupon_serial_numbers = array(         
            ['serial_number' => (hash10())],
        );

        DB::table('coupon_serial_numbers')->insert($coupon_serial_numbers);*/
        DB::unprepared('call serial50()');
        //DB::unprepared('call ecopoints10()');
    }
}
