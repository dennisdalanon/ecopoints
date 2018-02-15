<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   public function run()
    {
        DB::table('users')->delete();

        $users = array(
        	['id' => 1, 'first_name' => 'Scott', 'last_name' => 'Wilson', 'email' => 'scott@wilson.org.nz', 'password' => '$2y$10$1kpNSNAL0g.sYZCeVg5XPuPcyoUhn/nd3rhXTr001OjS3MhMPkTfq', 'created_at' => new DateTime],
        	['id' => 2, 'first_name' => 'Martyn', 'last_name' => 'Seddon', 'email' => 'martyn.seddon@gmail.com', 'password' => '$2y$10$1kpNSNAL0g.sYZCeVg5XPuPcyoUhn/nd3rhXTr001OjS3MhMPkTfq', 'created_at' => new DateTime],
            ['id' => 3, 'first_name' => 'Emma', 'last_name' => 'Wilson', 'email' => 'emma@wilson.org.nz', 'password' => '$2y$10$1kpNSNAL0g.sYZCeVg5XPuPcyoUhn/nd3rhXTr001OjS3MhMPkTfq', 'created_at' => new DateTime],
            ['id' => 4, 'first_name' => 'Merchant 1', 'last_name' => 'Merchant', 'email' => 'testing1@netbyte.com', 'password' => '$2y$10$1kpNSNAL0g.sYZCeVg5XPuPcyoUhn/nd3rhXTr001OjS3MhMPkTfq', 'created_at' => new DateTime],
            ['id' => 5, 'first_name' => 'Merchant 2', 'last_name' => 'Merchant', 'email' => 'testing2@netbyte.com', 'password' => '$2y$10$1kpNSNAL0g.sYZCeVg5XPuPcyoUhn/nd3rhXTr001OjS3MhMPkTfq', 'created_at' => new DateTime],
            ['id' => 6, 'first_name' => 'Desley', 'last_name' => 'Simpson', 'email' => 'testing3@netbyte.com', 'password' => '$2y$10$1kpNSNAL0g.sYZCeVg5XPuPcyoUhn/nd3rhXTr001OjS3MhMPkTfq', 'created_at' => new DateTime],
            ['id' => 7, 'first_name' => 'Phil', 'last_name' => 'Goff', 'email' => 'testing4@netbyte.com', 'password' => '$2y$10$1kpNSNAL0g.sYZCeVg5XPuPcyoUhn/nd3rhXTr001OjS3MhMPkTfq', 'created_at' => new DateTime],
            ['id' => 8, 'first_name' => 'Justin', 'last_name' => 'Lester', 'email' => 'testing5@netbyte.com', 'password' => '$2y$10$1kpNSNAL0g.sYZCeVg5XPuPcyoUhn/nd3rhXTr001OjS3MhMPkTfq', 'created_at' => new DateTime],
            ['id' => 9, 'first_name' => 'John', 'last_name' => 'Doe', 'email' => 'testing6@netbyte.com', 'password' => '$2y$10$1kpNSNAL0g.sYZCeVg5XPuPcyoUhn/nd3rhXTr001OjS3MhMPkTfq', 'created_at' => new DateTime],
            ['id' => 10, 'first_name' => 'Chris', 'last_name' => 'Javierto', 'email_address' => 'chris@netbyte.com', 'password' => '$2y$10$1kpNSNAL0g.sYZCeVg5XPuPcyoUhn/nd3rhXTr001OjS3MhMPkTfq', 'created_at' => new DateTime],
            ['id' => 11, 'first_name' => 'Dennis', 'last_name' => 'Dalanon', 'email_address' => 'dennis.dalanon@gmail.com', 'password' => '$2y$10$1kpNSNAL0g.sYZCeVg5XPuPcyoUhn/nd3rhXTr001OjS3MhMPkTfq', 'created_at' => new DateTime],
            ['id' => 12, 'first_name' => 'Jacki', 'last_name' => 'Jeanmonod', 'email_address' => 'jacki@netbyte.com', 'password' => '$2y$10$1kpNSNAL0g.sYZCeVg5XPuPcyoUhn/nd3rhXTr001OjS3MhMPkTfq', 'created_at' => new DateTime],
            ['id' => 13, 'first_name' => 'Otto', 'last_name' => 'September', 'email_address' => 'otto@netbyte.com', 'password' => '$2y$10$1kpNSNAL0g.sYZCeVg5XPuPcyoUhn/nd3rhXTr001OjS3MhMPkTfq', 'created_at' => new DateTime],
            ['id' => 14, 'first_name' => 'Peter', 'last_name' => 'Parker', 'email_address' => 'peter@netbyte.com', 'password' => '$2y$10$1kpNSNAL0g.sYZCeVg5XPuPcyoUhn/nd3rhXTr001OjS3MhMPkTfq', 'created_at' => new DateTime],
            ['id' => 15, 'first_name' => 'Freddie', 'last_name' => 'Merc', 'email_address' => 'freddie@netbyte.com', 'password' => '$2y$10$1kpNSNAL0g.sYZCeVg5XPuPcyoUhn/nd3rhXTr001OjS3MhMPkTfq', 'created_at' => new DateTime],
            ['id' => 16, 'first_name' => 'Han', 'last_name' => 'Solo', 'email_address' => 'han@netbyte.com', 'password' => '$2y$10$1kpNSNAL0g.sYZCeVg5XPuPcyoUhn/nd3rhXTr001OjS3MhMPkTfq', 'created_at' => new DateTime],
            ['id' => 17, 'first_name' => 'John', 'last_name' => 'Jan', 'email_address' => 'john@netbyte.com', 'password' => '$2y$10$1kpNSNAL0g.sYZCeVg5XPuPcyoUhn/nd3rhXTr001OjS3MhMPkTfq', 'created_at' => new DateTime],
            ['id' => 18, 'first_name' => 'Terry', 'last_name' => 'Teri', 'email_address' => 'terry@netbyte.com', 'password' => '$2y$10$1kpNSNAL0g.sYZCeVg5XPuPcyoUhn/nd3rhXTr001OjS3MhMPkTfq', 'created_at' => new DateTime],
            ['id' => 19, 'first_name' => 'Paul', 'last_name' => 'Call', 'email_address' => 'paul@netbyte.com', 'password' => '$2y$10$1kpNSNAL0g.sYZCeVg5XPuPcyoUhn/nd3rhXTr001OjS3MhMPkTfq', 'created_at' => new DateTime],
            ['id' => 20, 'first_name' => 'Vicki', 'last_name' => 'Hail', 'email_address' => 'vicki@netbyte.com', 'password' => '$2y$10$1kpNSNAL0g.sYZCeVg5XPuPcyoUhn/nd3rhXTr001OjS3MhMPkTfq', 'created_at' => new DateTime],
            ['id' => 21, 'first_name' => 'Elon', 'last_name' => 'Fast', 'email_address' => 'elon@netbyte.com', 'password' => '$2y$10$1kpNSNAL0g.sYZCeVg5XPuPcyoUhn/nd3rhXTr001OjS3MhMPkTfq', 'created_at' => new DateTime],
            ['id' => 22, 'first_name' => 'Steve', 'last_name' => 'Great', 'email_address' => 'steve@netbyte.com', 'password' => '$2y$10$1kpNSNAL0g.sYZCeVg5XPuPcyoUhn/nd3rhXTr001OjS3MhMPkTfq', 'created_at' => new DateTime],
            ['id' => 23, 'first_name' => 'Michael', 'last_name' => 'Bin', 'email_address' => 'michael@netbyte.com', 'password' => '$2y$10$1kpNSNAL0g.sYZCeVg5XPuPcyoUhn/nd3rhXTr001OjS3MhMPkTfq', 'created_at' => new DateTime],
            ['id' => 24, 'first_name' => 'Richard', 'last_name' => 'Lion', 'email_address' => 'richard@netbyte.com', 'password' => '$2y$10$1kpNSNAL0g.sYZCeVg5XPuPcyoUhn/nd3rhXTr001OjS3MhMPkTfq', 'created_at' => new DateTime],
            ['id' => 25, 'first_name' => 'Elizabeth', 'last_name' => 'Wales', 'email_address' => 'elizabeth@netbyte.com', 'password' => '$2y$10$1kpNSNAL0g.sYZCeVg5XPuPcyoUhn/nd3rhXTr001OjS3MhMPkTfq', 'created_at' => new DateTime],
        );

        DB::table('users')->insert($users);
    }
}
