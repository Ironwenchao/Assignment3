<?php

use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            'manufacturer_id' => 1,
            'name' => 'Apple iPhone X',
            'price' => '1593',
            'type' => 'mobile phone',
            'description' => '5.8-inch Super Retina HD display with HDR and True Tone',
            'image'=> 'item_images/AppleiPhoneX.jpeg',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        
        
        DB::table('items')->insert([
            'manufacturer_id' => 2,
            'name' => 'Samsung Galacy 9',
            'price' => '1200',
            'type' => 'mobile phone',
            'description' => 'Long lasting 4,000mAh battery',
            'image'=> 'item_images/SamsungGalacy9.jpeg',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        
        
        DB::table('items')->insert([
            'manufacturer_id' => 4,
            'name' => 'Oppo X21',
            'price' => '900',
            'type' => 'mobile phone',
            'description' => 'Cutting-edge processor for super-fast downloads',
            'image'=> 'item_images/OppoX21.jpeg',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]); 
        
        
        DB::table('items')->insert([
            'manufacturer_id' => 1,
            'name' => 'Apple iPhone 8',
            'price' => '1250',
            'type' => 'mobile phone',
            'description' => 'Advanced cameras! Wireless charging! All-glass design!',
            'image'=> 'item_images/AppleiPhone8.jpeg',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        
        DB::table('items')->insert([
            'manufacturer_id' => 3,
            'name' => 'Huawei mate 10',
            'price' => '1199',
            'type' => 'mobile phone',
            'description' => 'Powerful and efficient Octa-Core Processing!',
            'image'=> 'item_images/Huaweimate10.jpeg',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        
        
        DB::table('items')->insert([
            'manufacturer_id' => 1,
            'name' => 'Apple  Macbook',
            'price' => '2399',
            'type' => 'labtop',
            'description' => 'Quad-core Intel Core i5 processor!',
            'image'=> 'item_images/AppleMacbook.jpeg',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        
        
        DB::table('items')->insert([
            'manufacturer_id' => 5,
            'name' => 'Canon EOS 750D',
            'price' => '769',
            'type' => 'camera',
            'description' => '24.2MP APS-C CMOS Sensor! 24.2MP APS-C CMOS Sensor! Wi-Fi/NFC/Bluetooth!',
            'image'=> 'item_images/CanonEOS750D.jpeg',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        
        DB::table('items')->insert([
            'manufacturer_id' => 6,
            'name' => 'Sony ILCE-7M3',
            'price' => '3099',
            'type' => 'camera',
            'description' => '24.2 MP Exmor R CMOS Sensor! 10fps Continuous Shooting! 
                            693 Phase Detect and 425 Contrast AF Points!',
            'image'=> 'item_images/SonyILCE-7M3.jpeg',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
    }
}
