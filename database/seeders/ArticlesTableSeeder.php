<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;
use App\Models\Article; //これがないと"Target Class not found"や"Article not found"になる
use App\Models\User;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Query Builder
        DB::table('articles')->delete();
        $user = User::first();
        Article::factory()->count(20)->create(['user_id' => $user->id,]);

        //以下はFactoryを使わない方法
        //Fakerを使用してダミーデータの作成
        //$faker = Faker::create('en_US');
        //Articleデータの作成
        //for($i=0; $i<10; $i++){
            //Article::create([
                //'title' => $faker->sentence(),
                //'body' => $faker->paragraph(),
                //'published_at' => Carbon::today()
            //]);
        //}
    }
}
