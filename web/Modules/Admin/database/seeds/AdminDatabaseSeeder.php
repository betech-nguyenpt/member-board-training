<?php

namespace Modules\Admin\database\seeds;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class AdminDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Model::unguard();

        // $this->call('OtherTableSeeder');
    }
}
