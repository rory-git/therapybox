<?php

use Illuminate\Database\Seeder;


class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('todos')->insert([
            [
                'title' => 'lorem ipsum site dolar em fasdkfasdfl kfadslkfs askfs',
                'complete' => true,
                'user_id' => 1
            ],
            [
                'title' => 'lorem ipsum site dolar em fasdkfasdfl kfadslkfs askfs',
                'complete' => false,
                'user_id' => 1
            ],
            [
                'title' => 'lorem ipsum site dolar em fasdkfasdfl kfadslkfs askfs',
                'complete' => false,
                'user_id' => 1
            ],
        ]);
    }
}
