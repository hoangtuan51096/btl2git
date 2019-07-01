<?php

namespace Database\Seeds;

use Illuminate\Database\Seeder;

class WalletsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('wallets')->truncate();
        App\Models\Wallet::create([
            'user_id' => '1',
            'money' => '50000',
            'name' => 'MoMo',
        ]);
    }
}
