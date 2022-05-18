<?php

namespace Modules\Member\database\seeds;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class MemberDatabaseSeeder extends Seeder
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
