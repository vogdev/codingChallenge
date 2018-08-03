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
        $shops = array(
            array('id' => '1','picture' => 'http://placehold.it/150x150','name' => 'name shop 1','email' => 'name@shop1.com','city' => 'Tinghir','lat' => '31.5204640','lng' => '-5.5302340','created_at' => '2018-08-01 23:00:00','updated_at' => '2018-08-01 23:00:00'),
            array('id' => '2','picture' => 'http://placehold.it/150x150','name' => 'name shop 2','email' => 'name@shop2.com','city' => 'Essaouira','lat' => '31.5063270','lng' => '-9.7543540','created_at' => '2018-08-01 23:00:00','updated_at' => '2018-08-01 23:00:00'),
            array('id' => '3','picture' => 'http://placehold.it/150x150','name' => 'name shop 3','email' => 'name@shop3.com','city' => 'Berrechid','lat' => '34.6894040','lng' => '-1.9128230','created_at' => '2018-08-01 23:00:00','updated_at' => '2018-08-01 23:00:00'),
            array('id' => '4','picture' => 'http://placehold.it/150x150','name' => 'name shop 4','email' => 'name@shop4.com','city' => 'Casablanca','lat' => '33.3511770','lng' => '-7.5778200','created_at' => '2018-08-01 23:00:00','updated_at' => '2018-08-01 23:00:00'),
            array('id' => '5','picture' => 'http://placehold.it/150x150','name' => 'name shop 5','email' => 'name@shop5.com','city' => 'Oujda','lat' => '33.5898860','lng' => '-7.6038690','created_at' => '2018-08-01 23:00:00','updated_at' => '2018-08-01 23:00:00'),
            array('id' => '6','picture' => 'http://placehold.it/150x150','name' => 'name shop 6','email' => 'name@shop6.com','city' => 'Marrakesh','lat' => '31.6697460','lng' => '-7.9733280','created_at' => '2018-08-01 23:00:00','updated_at' => '2018-08-01 23:00:00'),
            array('id' => '7','picture' => 'http://placehold.it/150x150','name' => 'name shop 7','email' => 'name@shop7.com','city' => 'Laayoune','lat' => '27.1252860','lng' => '-13.1625000','created_at' => '2018-08-01 23:00:00','updated_at' => '2018-08-01 23:00:00'),
            array('id' => '8','picture' => 'http://placehold.it/150x150','name' => 'name shop 8','email' => 'name@shop8.com','city' => 'Berkane','lat' => '34.9214100','lng' => '-2.3242950','created_at' => '2018-08-01 23:00:00','updated_at' => '2018-08-01 23:00:00')
          );
        foreach($shops as $key => $shop) {
              DB::table('shops')->insert([
                  'picture' => "http://placehold.it/150x150",
                  'name' => "shop name " . $shop['id'],
                  'email' => "email@shop" . $shop['id'] .".com",
                  'city' => $shop['city'],
                  'lat' => $shop['lat'],
                  'lng' => $shop['lng'],
                  ]);
        }
    }
}
