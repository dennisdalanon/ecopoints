<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('projects')->delete();

        $projects = array(
        	['id' => 1, 'project_name' => 'Swainston Rd Reserve', 'project_skin' => 'dark', 'project_description' => 'Put on your gumboots and join in a day of native tree planting with your local community. Get involved in activities around the country, and find out about volunteering for conservation.', 'project_type' => 'planting', 'location' => 'Auckland East', 'latitude' => '-36.878118', 'longitude' => '174.845550', 'image' => 'swainston-rd-reserve.jpg', 'points_required' => '20000', 'ideal_planting_date' => '2018-04-15 22:26:21', 'actual_planting_date' => '2018-02-10 22:26:21', 'recipient_id' => '1', 'primary_contact' => '7'],
        	['id' => 2, 'project_name' => 'Motutapu Island Replanting', 'project_skin' => 'light', 'project_description' => 'Put on your gumboots and join in a day of native tree planting with your local community. Get involved in activities around the country, and find out about volunteering for conservation.', 'project_type' => 'planting', 'location' => 'Hauraki Gulf', 'latitude' => '-36.762524', 'longitude' => '174.913879', 'image' => 'motutapu-island-replanting.jpg', 'points_required' => '30000', 'ideal_planting_date' => '2018-08-15 22:26:21', 'actual_planting_date' => '2018-06-20 22:26:21', 'recipient_id' => '3', 'primary_contact' => '6'],
            ['id' => 3, 'project_name' => 'River Bank Replanting', 'project_skin' => 'light', 'project_description' => 'Put on your gumboots and join in a day of native tree planting with your local community. Get involved in activities around the country, and find out about volunteering for conservation.', 'project_type' => 'planting', 'location' => 'Whakatane River', 'latitude' => '-38.334971', 'longitude' => '176.932296', 'image' => 'river-bank-replanting.jpg', 'points_required' => '40000', 'ideal_planting_date' => '2018-03-12 22:26:21', 'actual_planting_date' => '2018-01-12 22:26:21', 'recipient_id' => '2', 'primary_contact' => '8'],
            ['id' => 4, 'project_name' => 'Central Park Restoration', 'project_skin' => 'dark', 'project_description' => 'Put on your gumboots and join in a day of native tree planting with your local community. Get involved in activities around the country, and find out about volunteering for conservation.', 'project_type' => 'planting', 'location' => 'Wellington Central Park', 'latitude' => '-41.299750', 'longitude' => '174.766427', 'image' => 'central-park-restoration.jpg', 'points_required' => '20000', 'ideal_planting_date' => '2017-10-14 22:26:21', 'actual_planting_date' => '2017-08-10 22:26:21', 'recipient_id' => '2', 'primary_contact' => '8'],
            ['id' => 5, 'project_name' => 'Whenua Rangitira Eco Restoration', 'project_skin' => 'light', 'project_description' => 'Put on your gumboots and join in a day of native tree planting with your local community. Get involved in activities around the country, and find out about volunteering for conservation.', 'project_type' => 'planting', 'location' => 'Auckland CDB', 'latitude' => '-36.802910', 'longitude' => '174.695221', 'image' => 'whenua-rangitira-eco-restoration.jpg', 'points_required' => '40000', 'ideal_planting_date' => '2017-12-05 22:26:21', 'actual_planting_date' => '2017-10-16 22:26:21', 'recipient_id' => '1', 'primary_contact' => '7'],
            ['id' => 6, 'project_name' => 'Lincoln Rd Reserve', 'project_skin' => 'dark', 'project_description' => 'Put on your gumboots and join in a day of native tree planting with your local community. Get involved in activities around the country, and find out about volunteering for conservation.', 'project_type' => 'planting', 'location' => 'Auckland West', 'latitude' => '-36.861489', 'longitude' => '174.631529', 'image' => 'swainston-rd-reserve.jpg', 'points_required' => '25000', 'ideal_planting_date' => '2018-05-15 22:26:21', 'actual_planting_date' => '2018-03-10 22:26:21', 'recipient_id' => '1', 'primary_contact' => '7'],
            ['id' => 7, 'project_name' => 'Motutapu Island Weeding', 'project_skin' => 'light', 'project_description' => 'Put on your gumboots and join in a day of native tree planting with your local community. Get involved in activities around the country, and find out about volunteering for conservation.', 'project_type' => 'planting', 'location' => 'Hauraki Gulf', 'latitude' => '-36.762524', 'longitude' => '174.913879', 'image' => 'motutapu-island-replanting.jpg', 'points_required' => '60000', 'ideal_planting_date' => '2018-06-15 22:26:21', 'actual_planting_date' => '2018-04-20 22:26:21', 'recipient_id' => '3', 'primary_contact' => '6'],
            ['id' => 8, 'project_name' => 'The Garden Clearing', 'project_skin' => 'light', 'project_description' => 'Put on your gumboots and join in a day of native tree planting with your local community. Get involved in activities around the country, and find out about volunteering for conservation.', 'project_type' => 'planting', 'location' => 'Whakatane River', 'latitude' => '-38.334971', 'longitude' => '176.932296', 'image' => 'river-bank-replanting.jpg', 'points_required' => '50000', 'ideal_planting_date' => '2018-05-12 22:26:21', 'actual_planting_date' => '2018-03-12 22:26:21', 'recipient_id' => '2', 'primary_contact' => '8'],
            ['id' => 9, 'project_name' => 'Beehive Park Replacement', 'project_skin' => 'dark', 'project_description' => 'Put on your gumboots and join in a day of native tree planting with your local community. Get involved in activities around the country, and find out about volunteering for conservation.', 'project_type' => 'planting', 'location' => 'Wellington Central Park', 'latitude' => '-41.299750', 'longitude' => '174.766427', 'image' => 'central-park-restoration.jpg', 'points_required' => '28000', 'ideal_planting_date' => '2017-07-14 22:26:21', 'actual_planting_date' => '2017-05-10 22:26:21', 'recipient_id' => '2', 'primary_contact' => '8'],
            ['id' => 10, 'project_name' => 'Rangitoto Green Movement', 'project_skin' => 'light', 'project_description' => 'Put on your gumboots and join in a day of native tree planting with your local community. Get involved in activities around the country, and find out about volunteering for conservation.', 'project_type' => 'planting', 'location' => 'Auckland CDB', 'latitude' => '-36.802910', 'longitude' => '174.695221', 'image' => 'whenua-rangitira-eco-restoration.jpg', 'points_required' => '32000', 'ideal_planting_date' => '2017-10-05 22:26:21', 'actual_planting_date' => '2017-08-16 22:26:21', 'recipient_id' => '1', 'primary_contact' => '7'],
        );

        DB::table('projects')->insert($projects);
    }
}