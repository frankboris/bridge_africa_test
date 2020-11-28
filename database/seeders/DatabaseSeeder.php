<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Eloquent;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        // Ask for db migration refresh, default is no
        if ($this->command->confirm('Do you wish to refresh migration before seeding, it will clear all old data ?')) {

            // Call the php artisan migrate:fresh using Artisan
            $this->command->call('migrate:fresh');

            $this->command->line("Database cleared.");
        }

        $users = \App\Models\User::factory(2)->create();
        $this->command->info('Added 2 users successfully completed');

        foreach ($users as $user) {
            \App\Models\Product::factory(15)->create(['user_id' => $user->id]);
            $this->command->info('Added 15 products to user ' . $user->name . ' successfully completed');
        }

        Eloquent::reguard();
    }
}
