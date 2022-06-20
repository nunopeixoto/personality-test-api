<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionResource;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::with('answers')
            ->limit(5)
            ->get()
            ->shuffle()
        ;

        $resources = QuestionResource::collection($questions);
        return response()->json($resources);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'question' => 'required|string|max:255|unique:questions',
            'answers' => 'required|array|min:2|max:4',
            'answers.*.answer' => 'required|string|max:255',
            'answers.*.introvert_score' => 'required|boolean'
        ]);

        $question = null;
        DB::transaction(function () use ($validated, &$question) {
            $question = Question::create([
                'question' => $validated['question']
            ]);
            $question->answers()->createMany($validated['answers']);
        });
        return response(new QuestionResource($question), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::find($id);
        if ($question === null) {
            abort(404);
        }

        return response()->json(new QuestionResource($question));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $question = Question::find($id);
        if ($question === null) {
            abort(404);
        }

        $validated = $request->validate([
            'question' => 'string|max:255',
        ]);

        $question->update($validated);
        $question->save();

        return response()->json(new QuestionResource($question));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::find($id);
        if ($question === null) {
            abort(404);
        }

        $question->delete();

        return response('');
    }
}
