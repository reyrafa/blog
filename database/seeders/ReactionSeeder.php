<?php

namespace Database\Seeders;

use App\Models\Reaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $reactions = [
           [
               'reaction' =>  '👍',
               'created_at' => now(),
               'updated_at' => now()
           ],
           [
               'reaction' =>  '👎',
               'created_at' => now(),
               'updated_at' => now()
           ],
           [
               'reaction' =>  '❤️',
               'created_at' => now(),
               'updated_at' => now()
           ],

       ];
       Reaction::insert($reactions);
    }
}
