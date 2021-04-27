<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    { 
        $this->call('BlogPostTableSeeder');
        $this->command->info('BlogPostTableseeded!');// \App\Models\User::factory(10)->create();
    }
}

class BlogPostTableSeeder extends Seeder {

    public function run()
    {
      

    }

}
