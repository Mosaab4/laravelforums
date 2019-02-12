<?php

use Illuminate\Database\Seeder;
use App\Reply;

class RepliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $r1 = [
            'user_id'=>1,
            'discussion_id'=>1,
            'content'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc eu scelerisque est. Mauris a auctor diam.'
        ];
        
        $r2 = [
            'user_id'=>1,
            'discussion_id'=>2,
            'content'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc eu scelerisque est. Mauris a auctor diam.'
        ];
        
        $r3 = [
            'user_id'=>2,
            'discussion_id'=>4,
            'content'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc eu scelerisque est. Mauris a auctor diam.'
        ];

        $r4 = [
            'user_id'=>2,
            'discussion_id'=>4,
            'content'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc eu scelerisque est. Mauris a auctor diam.'
        ];

        Reply::Create($r1);
        Reply::Create($r2);
        Reply::Create($r3);
        Reply::Create($r4);


        
    }
}
