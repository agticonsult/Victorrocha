<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $uuid1 = Uuid::uuid4();

        DB::table('users')->insert([
            [
                'id' => $uuid1,
                'name' => 'Agile',
                'email' => 'suporte@agile.inf.br',
                'password' => Hash::make('sup2011@'),
                'ativo' => User::ATIVO,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
