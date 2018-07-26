<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MsCategoriesTableSeeder extends Seeder
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
            DB::table('ms_categories')->insert($item);
        }
    }

    private function data()
    {
        $list = [
            'PHP',
            'iOS',
            'Android',
            'HTML5',
            'CSS3',
            'C#',
            'Java',
            'Ruby',
            'Nodejs',
            'Jquery',
            'Game Programming',
            'Server Enviroment'
        ];

        $index = 1;
        $data = [];
        $now = Carbon::now()->format('Y-m-d H:i:s');
        foreach ($list as $name) {
            $item = [
                'name' => $name,
                'mode' => MODE_ENABLE,
                'sort' => $index++,
                'created_at' => $now,
                'updated_at' => $now,
            ];
            array_push($data, $item);
        }
        return $data;
    }
}
