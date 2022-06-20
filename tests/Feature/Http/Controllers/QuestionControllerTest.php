<?php

namespace Tests\Feature\Http;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class QuestionControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp() : void
    {
        parent::setUp();
        $this->withHeaders([
            'Accept' => 'application/json'
        ]);
    }

    public function test_index()
    {
        // Empty list
        $response = $this->get('/api/questions');
        $response->assertStatus(200);
        $response->assertJson([]);

        // OK
        $question = Question::factory()->create();

        $response = $this->get('/api/questions');
        $response->assertStatus(200);
        $response->assertExactJson([
            [
                'id' => $question->id,
                'question' => $question->question,
                'answers' => []
            ]
        ]);
    }

    public function test_store()
    {
        $payload = [
            'question' => 'This is a question',
            'answers' => [
                ['answer' => 'answer1', 'introvert_score' => true],
                ['answer' => 'answer2', 'introvert_score' => false]
            ]
        ];

        $response = $this->post('/api/questions', $payload);
        $response->assertStatus(201);
        $this->assertEquals(1, Question::count()); // we only have one question
        $this->assertEquals(2, Answer::count()); // we only have two answers

        // Duplicate question
        $response = $this->post('/api/questions', $payload);
        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['question']);

        // No answers
        $response = $this->post('/api/questions', [
            'question' => 'A question'
        ]);
        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['answers']);
    }


    public function test_show()
    {
        $question = Question::factory()->create();

        // Not found
        $response = $this->get("/api/questions/++$question->id");
        $response->assertStatus(404);

        // OK
        $response = $this->get("/api/questions/$question->id");
        $response->assertStatus(200);
        $response->assertExactJson([
            'id' => $question->id,
            'question' => $question->question,
            'answers' => []
        ]);
    }


    public function test_update()
    {
        $question = Question::factory()->create();

        // Not found
        $response = $this->patch("/api/question/2");
        $response->assertStatus(404);

        // OK
        $response = $this->patch("/api/questions/$question->id", [
            'question' => 'A updated question'
        ]);
        $response->assertStatus(200);
        $question->refresh();
        $this->assertEquals('A updated question', $question->question);
    }


    public function test_destroy()
    {
        $question = Question::factory()->create();

        // Not found
        $response = $this->delete('/api/questions/2');
        $response->assertStatus(404);

        // OK
        $response = $this->delete("/api/questions/$question->id");
        $response->assertStatus(200);
    }
}
