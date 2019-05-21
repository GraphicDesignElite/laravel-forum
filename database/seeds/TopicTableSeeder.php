<?php

use Illuminate\Database\Seeder;
use App\Topic;
class TopicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $topic = new Topic();
        $topic->name = 'First Topic';
        $topic->description = 'This is the first sample topic';
        $topic->slug = 'first-topic';
        $topic->save();

        $topic2 = new Topic();
        $topic2->name = 'Second Topic';
        $topic2->description = 'This is the second sample topic';
        $topic2->slug = 'second-topic';
        $topic2->save();

        $topic3 = new Topic();
        $topic3->name = 'Third Topic';
        $topic3->description = 'This is the third sample topic';
        $topic3->slug = 'third-topic';
        $topic3->save();
    }
}
