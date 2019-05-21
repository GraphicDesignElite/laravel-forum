<?php

use Illuminate\Database\Seeder;
use App\Thread;
class ThreadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $thread = new Thread();
        $thread->topic_id = 1;
        $thread->user_id = 1;
        $thread->title = 'First Example Thread';
        $thread->content = '<p>This is the first sample thread example.</p>';
        $thread->slug = 'first-example-thread';
        $thread->save();

        $thread2 = new Thread();
        $thread2->topic_id = 2;
        $thread2->user_id = 2;
        $thread2->title = 'Second Example Thread';
        $thread2->content = '<p>This is the second sample thread example.</p>';
        $thread2->slug = 'second-example-thread';
        $thread2->save();

        $thread3 = new Thread();
        $thread3->topic_id = 3;
        $thread3->user_id = 3;
        $thread3->title = 'Third Example Thread';
        $thread3->content = '<p>This is the third sample thread example.</p>';
        $thread3->slug = 'third-example-thread';
        $thread3->save();
    }
}
