<?php

use Illuminate\Database\Seeder;
use App\Discussion ; 

class DiscussionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $t1 = "Laravel for beginners";
        $t2 = "pagination implementation in laravel";
        $t3 = "introduction to web development for beginners";
        $t4 = "deploy laravel apps on digital ocean";


        $d1 = [
            'title'=> $t1,
            'content'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc eu scelerisque est. Mauris a auctor diam. Donec vitae tincidunt felis, sit amet lobortis ante. Suspendisse potenti. Proin quis orci vitae metus pellentesque molestie vitae suscipit ligula.',
            'channel_id'=>1,
            'user_id'=>2,
            'slug'=> str_slug($t1)
        ];
        $d2 =[
            'title'=> $t2,
            'content'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc eu scelerisque est. Mauris a auctor diam. Donec vitae tincidunt felis, sit amet lobortis ante. Suspendisse potenti. Proin quis orci vitae metus pellentesque molestie vitae suscipit ligula.',
            'channel_id'=>2,
            'user_id'=>1,
            'slug'=> str_slug($t2)
        ];
        $d3= [
            'title'=> $t3,
            'content'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc eu scelerisque est. Mauris a auctor diam. Donec vitae tincidunt felis, sit amet lobortis ante. Suspendisse potenti. Proin quis orci vitae metus pellentesque molestie vitae suscipit ligula.',
            'channel_id'=>2,
            'user_id'=>1,
            'slug'=> str_slug($t3)
        ];
        $d4 =[
            'title'=> $t4,
            'content'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc eu scelerisque est. Mauris a auctor diam. Donec vitae tincidunt felis, sit amet lobortis ante. Suspendisse potenti. Proin quis orci vitae metus pellentesque molestie vitae suscipit ligula.',
            'channel_id'=>5,
            'user_id'=>1,
            'slug'=> str_slug($t4)
        ];

        Discussion::create($d1);
        Discussion::create($d2);
        Discussion::create($d3);
        Discussion::create($d4);
    }
}
