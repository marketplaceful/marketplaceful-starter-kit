<?php

namespace Database\Seeders;

use Hash;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Marketplaceful\Models\Listing;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->owner()->has(Listing::factory()
            ->count(10)
            ->published()
            ->state(new Sequence(
                ['title' => 'Modern Wooden Chair', 'price' => '6900', 'feature_image_path' => 'feature-images/modern-wooden-chair.jpg'],
                ['title' => 'White Chair', 'price' => '5600', 'feature_image_path' => 'feature-images/white-chair.jpg'],
                ['title' => 'Brown Stained', 'price' => '6000', 'feature_image_path' => 'feature-images/brown-stained.jpg'],
                ['title' => 'Charcoal grill, stainless steel', 'price' => '22800', 'feature_image_path' => 'feature-images/charcoal-grill-stainless-steel.jpg'],
                ['title' => 'Umbrella with base, gray', 'price' => '11999', 'feature_image_path' => 'feature-images/umbrella-with-base-gray.jpg'],
                ['title' => 'Chair, outdoor, black-brown', 'price' => '15090', 'feature_image_path' => 'feature-images/chair-outdoor-black-brown.jpg'],
                ['title' => 'Beach chair, foldable red', 'price' => '2499', 'feature_image_path' => 'feature-images/beach-chair-foldable-red.jpg'],
                ['title' => 'Side table, white', 'price' => '2499', 'feature_image_path' => 'feature-images/side-table-white.jpg'],
                ['title' => 'Bar stool, black-brown', 'price' => '3499', 'feature_image_path' => 'feature-images/bar-stool-black-brown.jpg'],
                ['title' => 'Stepladder, 3 steps, beech', 'price' => '2999', 'feature_image_path' => 'feature-images/stepladder-3-steps-beech.jpg'],
            )))->create([
            'name' => 'Oliver',
            'email' => 'oliver@radiocubito.com',
            'password' => Hash::make('oliver'),
        ]);

        (new Filesystem)->ensureDirectoryExists(storage_path('app/public/feature-images'));
        (new Filesystem)->copyDirectory(__DIR__.'/../_fixtures/images', storage_path('app/public/feature-images'));
    }
}
