<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CafeSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('cafes')->insert([
            [
                'name' => "Paul's Coffee Roasters",
                'description' => 'We source, roast & brew specialty coffee in-store and we have been on the specialty coffee map since 2018. We love great coffee as much as beautiful design, and we cherish good chats with all coffee/book/conversation lovers. It all starts with a warm hello and a cup of coffee.',
                'code' => 'WJ7M+QX Larnaca, Cyprus',
                'placeId' => 'ChIJGyOA68eD4BQRZtKA5kM_O0c',
                'position' => '34.9143997, 33.634976',
            ],
            [
                'name' => 'Uluwatu Specialty Coffee',
                'description' => 'Freshly roasted coffee from Square Mile Coffee Roasters based in London and homemade artisan gelato',
                'code' => 'M2GW+3J Limassol, Cyprus',
                'placeId' => 'ChIJbSttYBsz5xQR1h0m6ubX9g0',
                'position' => '34.675204, 33.04662',
            ],
            [
                'name' => 'South Coast Specialty Coffee',
                'description' => null,
                'code' => 'VJQP+WR Larnaca, Cyprus',
                'placeId' => 'ChIJf2r8H92C4BQRClDxls7Viu4',
                'position' => '34.889787, 33.6371021',
            ],
            [
                'name' => 'Menta Speciality CoffeeShop ',
                'description' => 'In House Roasting, Homemade Sweets',
                'code' => '5975+XF Nicosia, Cyprus',
                'placeId' => 'ChIJI3HxklcX3hQRHDVP87cbnIo',
                'position' => '35.1649223, 33.35864530000001',
            ],
            [
                'name' => 'Kollaborative Coffee Roasters',
                'description' => 'Specialty coffee roasters, merchants and fine drinking',
                'code' => '5984+RQ Nicosia, Cyprus',
                'placeId' => 'ChIJTf61IgAX3hQRCwEn_V1idxA',
                'position' => '35.1671026, 33.3569759',
            ],
            [
                'name' => 'Nomad Bread & Coffee',
                'description' => 'Sourdough bakery and specialty coffee house!',
                'code' => 'M2MX+67 Limassol, Cyprus',
                'placeId' => 'ChIJaWe7ozQz5xQRUKPzaPpiOCk',
                'position' => '34.6830013, 33.04813059999999',
            ],
        ]);
    }
}
