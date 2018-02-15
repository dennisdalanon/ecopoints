<?php

use Illuminate\Database\Seeder;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('members')->delete();

        $members = array(
        	['id' => 1, 'first_name' => 'Scott', 'last_name' => 'Wilson', 'nickname' => 'webguy', 'email_address' => 'scott@wilson.org.nz', 'created_at' => new DateTime],
        	['id' => 2, 'first_name' => 'Martyn', 'last_name' => 'Seddon', 'nickname' => 'marty', 'email_address' => 'martyn.seddon@gmail.com', 'created_at' => new DateTime],
            ['id' => 3, 'first_name' => 'Emma', 'last_name' => 'Wilson', 'nickname' => 'g-friend', 'email_address' => 'emma@wilson.org.nz', 'created_at' => new DateTime],
            ['id' => 4, 'first_name' => 'Merchant 1', 'last_name' => 'Merchant', 'nickname' => 'merchant1', 'email_address' => 'testing1@netbyte.com', 'created_at' => new DateTime],
            ['id' => 5, 'first_name' => 'Merchant 2', 'last_name' => 'Merchant', 'nickname' => 'merchant2', 'email_address' => 'testing2@netbyte.com', 'created_at' => new DateTime],
            ['id' => 6, 'first_name' => 'Desley', 'last_name' => 'Simpson', 'nickname' => 'desley', 'email_address' => 'testing3@netbyte.com', 'created_at' => new DateTime],
            ['id' => 7, 'first_name' => 'Phil', 'last_name' => 'Goff', 'nickname' => 'goff', 'email_address' => 'testing4@netbyte.com', 'created_at' => new DateTime],
            ['id' => 8, 'first_name' => 'Justin', 'last_name' => 'Lester', 'nickname' => 'lester', 'email_address' => 'testing5@netbyte.com', 'created_at' => new DateTime],
            ['id' => 9, 'first_name' => 'John', 'last_name' => 'Doe', 'nickname' => 'johndoe', 'email_address' => 'testing6@netbyte.com', 'created_at' => new DateTime],
            ['id' => 10, 'first_name' => 'Chris', 'last_name' => 'Javierto', 'nickname' => 'chris', 'email_address' => 'chris@netbyte.com', 'created_at' => new DateTime],
            ['id' => 11, 'first_name' => 'Dennis', 'last_name' => 'Dalanon', 'nickname' => 'denden', 'email_address' => 'dennis.dalanon@gmail.com', 'created_at' => new DateTime],
            ['id' => 12, 'first_name' => 'Jacki', 'last_name' => 'Jeanmonod', 'nickname' => 'jacki', 'email_address' => 'jacki@netbyte.com', 'created_at' => new DateTime],
            ['id' => 13, 'first_name' => 'Otto', 'last_name' => 'September', 'nickname' => 'octo', 'email_address' => 'otto@netbyte.com', 'created_at' => new DateTime],
            ['id' => 14, 'first_name' => 'Peter', 'last_name' => 'Parker', 'nickname' => 'pete', 'email_address' => 'peter@netbyte.com', 'created_at' => new DateTime],
            ['id' => 15, 'first_name' => 'Freddie', 'last_name' => 'Merc', 'nickname' => 'fred', 'email_address' => 'freddie@netbyte.com', 'created_at' => new DateTime],
            ['id' => 16, 'first_name' => 'Han', 'last_name' => 'Solo', 'nickname' => 'han', 'email_address' => 'han@netbyte.com', 'created_at' => new DateTime],
            ['id' => 17, 'first_name' => 'John', 'last_name' => 'Jan', 'nickname' => 'john', 'email_address' => 'john@netbyte.com', 'created_at' => new DateTime],
            ['id' => 18, 'first_name' => 'Terry', 'last_name' => 'Teri', 'nickname' => 'terry', 'email_address' => 'terry@netbyte.com', 'created_at' => new DateTime],
            ['id' => 19, 'first_name' => 'Paul', 'last_name' => 'Call', 'nickname' => 'paul', 'email_address' => 'paul@netbyte.com', 'created_at' => new DateTime],
            ['id' => 20, 'first_name' => 'Vicki', 'last_name' => 'Hail', 'nickname' => 'vicki', 'email_address' => 'vicki@netbyte.com', 'created_at' => new DateTime],
            ['id' => 21, 'first_name' => 'Elon', 'last_name' => 'Fast', 'nickname' => 'elon', 'email_address' => 'elon@netbyte.com', 'created_at' => new DateTime],
            ['id' => 22, 'first_name' => 'Steve', 'last_name' => 'Great', 'nickname' => 'steve', 'email_address' => 'steve@netbyte.com', 'created_at' => new DateTime],
            ['id' => 23, 'first_name' => 'Michael', 'last_name' => 'Bin', 'nickname' => 'michael', 'email_address' => 'michael@netbyte.com', 'created_at' => new DateTime],
            ['id' => 24, 'first_name' => 'Richard', 'last_name' => 'Lion', 'nickname' => 'richard', 'email_address' => 'richard@netbyte.com', 'created_at' => new DateTime],
            ['id' => 25, 'first_name' => 'Elizabeth', 'last_name' => 'Wales', 'nickname' => 'elizabeth', 'email_address' => 'elizabeth@netbyte.com', 'created_at' => new DateTime],
        );

        DB::table('members')->insert($members);
    }
}
