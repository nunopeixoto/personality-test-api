<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seedQuestion1();
        $this->seedQuestion2();
        $this->seedQuestion3();
        $this->seedQuestion4();
        $this->seedQuestion5();

    }

    private function seedQuestion1()
    {
        $question = Question::create([
            'question' => 'You’re really busy at work and a colleague is telling you their life story and personal woes. You:'
        ]);

        Answer::insert([
            [
                'question_id' => $question->id,
                'answer' => 'Don\'t interrupt them',
                'introvert_score' => 0
            ],
            [
                'question_id' => $question->id,
                'answer' => 'Think it’s more important to give them some of your time; work can wait',
                'introvert_score' => 0
            ],
            [
                'question_id' => $question->id,
                'answer' => 'Listen, but with only with half an ear',
                'introvert_score' => 1
            ],
            [
                'question_id' => $question->id,
                'answer' => 'Interrupt and explain that you are really busy at the moment',
                'introvert_score' => 1
            ]
        ]);
    }

    private function seedQuestion2()
    {
        $question = Question::create([
            'question' => 'You’ve been sitting in the doctor’s waiting room for more than 25 minutes. You:'
        ]);

        Answer::insert([
            [
                'question_id' => $question->id,
                'answer' => 'Look at your watch every two minutes',
                'introvert_score' => 1
            ],
            [
                'question_id' => $question->id,
                'answer' => 'Bubble with inner anger, but keep quiet',
                'introvert_score' => 1
            ],
            [
                'question_id' => $question->id,
                'answer' => 'Explain to other equally impatient people in the room that the doctor is always running late',
                'introvert_score' => 0
            ],
            [
                'question_id' => $question->id,
                'answer' => 'Complain in a loud voice, while tapping your foot impatiently',
                'introvert_score' => 0
            ]
        ]);
    }

    private function seedQuestion3()
    {
        $question = Question::create([
            'question' => 'You’re having an animated discussion with a colleague regarding a project that you’re in charge of. You:'
        ]);

        Answer::insert([
            [
                'question_id' => $question->id,
                'answer' => 'Don’t dare contradict them',
                'introvert_score' => 1
            ],
            [
                'question_id' => $question->id,
                'answer' => 'Think that they are obviously right',
                'introvert_score' => 1
            ],
            [
                'question_id' => $question->id,
                'answer' => 'Defend your own point of view, tooth and nail',
                'introvert_score' => 0
            ],
            [
                'question_id' => $question->id,
                'answer' => 'Continuously interrupt your colleague',
                'introvert_score' => 0
            ]
        ]);
    }

    private function seedQuestion4()
    {
        $question = Question::create([
            'question' => 'You are taking part in a guided tour of a museum. You:'
        ]);

        Answer::insert([
            [
                'question_id' => $question->id,
                'answer' => 'Are a bit too far towards the back so don’t really hear what the guide is saying',
                'introvert_score' => 1
            ],
            [
                'question_id' => $question->id,
                'answer' => 'Follow the group without question',
                'introvert_score' => 0
            ],
            [
                'question_id' => $question->id,
                'answer' => 'Make sure that everyone is able to hear properly',
                'introvert_score' => 0
            ],
            [
                'question_id' => $question->id,
                'answer' => 'Are right up the front, adding your own comments in a loud voice',
                'introvert_score' => 0
            ]
        ]);
    }

    private function seedQuestion5()
    {
        $question = Question::create([
            'question' => 'During dinner parties at your home, you have a hard time with people who:'
        ]);

        Answer::insert([
            [
                'question_id' => $question->id,
                'answer' => 'Ask you to tell a story in front of everyone else',
                'introvert_score' => 1
            ],
            [
                'question_id' => $question->id,
                'answer' => 'Talk privately between themselves',
                'introvert_score' => 0
            ],
            [
                'question_id' => $question->id,
                'answer' => 'Hang around you all evening',
                'introvert_score' => 1
            ],
            [
                'question_id' => $question->id,
                'answer' => 'Always drag the conversation back to themselves',
                'introvert_score' => 0
            ]
        ]);
    }
}
