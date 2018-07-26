<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = $this->data();
        foreach ($data as $item) {
            DB::table('users')->insert($item);
        }
    }

    private function data()
    {
        $now = Carbon::now()->format('Y-m-d H:i:s');
        $password = Hash::make(env('APP_DEFAULT_PASSWORD'));
        $data = [
            [
                'name' => '管理者',
                'email' => 'admin@programinggo.com',
                'password' => $password,
                'role' => USER_ROLE_ADMIN,
                'grade' => 0,
                'mode' => MODE_ENABLE,
                'created_at' => $now,
                'updated_at' => $now,
            ]
        ];
        return $data;
    }
}
