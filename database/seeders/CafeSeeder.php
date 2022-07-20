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
                'description' => 'Cosy coffee shop in Larnaca downtown. There are 5-7 well-known coffee origins, V60, Cold Brew and classic drinks. A small main hall and a large garden in the backyard. Few power outlets for digital nomads',
                'code' => 'WJ7M+QX Larnaca, Cyprus',
                'place_id' => 'ChIJGyOA68eD4BQRZtKA5kM_O0c',
                'latitude' => '34.9143997',
                'longitude' => '33.634976',
            ],
            [
                'name' => 'Uluwatu Specialty Coffee',
                'description' => 'Large selection of coffee origins and comfortable sofas in the old town of Limassol. Few outlets only',
                'code' => 'M2GW+3J Limassol, Cyprus',
                'place_id' => 'ChIJbSttYBsz5xQR1h0m6ubX9g0',
                'latitude' => '34.675204',
                'longitude' => '33.04662',
            ],
            [
                'name' => 'South Coast Specialty Coffee',
                'description' => 'Large coffee shop in the Mackenzie beach area. Several classic coffee origins, tables with sockets and a separate playground for children',
                'code' => 'VJQP+WR Larnaca, Cyprus',
                'place_id' => 'ChIJf2r8H92C4BQRClDxls7Viu4',
                'latitude' => '34.889787',
                'longitude' => '33.6371021',
            ],
            [
                'name' => 'Menta Speciality CoffeeShop ',
                'description' => 'Tiny coffee shop with a few tables outside. Greek barista and the perfect V60 and Cold Brew',
                'code' => '5975+XF Nicosia, Cyprus',
                'place_id' => 'ChIJI3HxklcX3hQRHDVP87cbnIo',
                'latitude' => '35.1649223',
                'longitude' => '33.35864530000001',
            ],
            [
                'name' => 'Kollaborative Coffee Roasters',
                'description' => 'Middle-size coffee shop and bar in Nicosia old town. Selection of coffee origins, few tables inside and outside',
                'code' => '5984+RQ Nicosia, Cyprus',
                'place_id' => 'ChIJTf61IgAX3hQRCwEn_V1idxA',
                'latitude' => '35.1671026',
                'longitude' => '33.3569759',
            ],
            [
                'name' => 'Nomad Bread & Coffee',
                'description' => 'Small takeaway coffee shop in Limassol centre with lots of coffee origins. No power sockets at all',
                'code' => 'M2MX+67 Limassol, Cyprus',
                'place_id' => 'ChIJaWe7ozQz5xQRUKPzaPpiOCk',
                'latitude' => '34.6830013',
                'longitude' => '33.04813059999999',
            ],
            [
                'name' => 'BREW LAB',
                'description' => 'Small takeaway coffee shop with two small verandas in the old town of Nicosia. No outlets',
                'code' => '5985+Q8 Nicosia, Cyprus',
                'place_id' => 'ChIJa39mz1kX3hQRdnH8Pdx2yAU',
                'latitude' => '35.1669308',
                'longitude' => '33.3582758',
            ],
            [
                'name' => 'The Daily Roast',
                'description' => 'Friendly coffee shop with smiling barista, breakfast and brunch. There are few tables with outlets inside and outside',
                'code' => '5957+7M Strovolos, Cyprus',
                'place_id' => 'ChIJ-_-vweMZ3hQRrS0J-nQjuuY',
                'latitude' => '35.1582018',
                'longitude' => '33.3642074',
            ],
        ]);
    }
}
