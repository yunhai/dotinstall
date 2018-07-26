<?php


use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MsLanguagesTableSeeder extends Seeder
{
    public function run()
    {
        $data = $this->data();
        foreach ($data as $item) {
            DB::table('ms_languages')->insert($item);
        }
    }

    private function data()
    {
        $list = [
            'PHP' => 'php',
            'Swift' => 'swift',
            'Android' => 'java',
            'HTML5' => 'html',
            'CSS3' => 'css',
            'Java' => 'java',
            'Javascript' => 'javascript',
        ];

        $index = 1;
        $data = [];
        $now = Carbon::now()->format('Y-m-d H:i:s');
        foreach ($list as $fullname => $name) {
            $item = [
                'name' => $name,
                'fullname' => $fullname,
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
