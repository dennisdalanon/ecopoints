<?php

use Illuminate\Database\Seeder;

class RecipientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('recipients')->delete();

        $recipients = array(
        	['id' => 1, 'recipient_name' => 'Auckland Council', 'primary_member_contact' => '7'],
        	['id' => 2, 'recipient_name' => 'Wellington City Council', 'primary_member_contact' => '8'],
            ['id' => 3, 'recipient_name' => 'Motutapu Restoration Trust', 'primary_member_contact' => '6'],
        );

        DB::table('recipients')->insert($recipients);
    }
}