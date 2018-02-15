<?php

use Illuminate\Database\Seeder;

class CouponDesignTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('coupon_designs')->delete();

        $coupon_designs = array(
        	['id' => 1, 'design_name' => 'Standard 1 point', 'file_name' => '1-point-coupon-front.png'],
        	['id' => 2, 'design_name' => 'Standard 5 point', 'file_name' => '5-point-coupon-front.png'],
        	['id' => 3, 'design_name' => 'Standard 10 point', 'file_name' => '10-point-coupon-front.png'],
        	['id' => 4, 'design_name' => 'Standard 20 point', 'file_name' => '20-point-coupon-front.png'],
            ['id' => 5, 'design_name' => 'Standard 50 point', 'file_name' => '50-point-coupon-front.png'],
            ['id' => 6, 'design_name' => 'Standard 100 point', 'file_name' => '100-point-coupon-front.png'],
        );

        DB::table('coupon_designs')->insert($coupon_designs);
    }
}
