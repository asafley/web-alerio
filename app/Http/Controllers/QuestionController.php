<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;
use App\Http\Resources\QuestionResource;
use App\Models\Question;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class QuestionController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        // TODO : Enable authorization
        //$this->authorize('viewAny', Question::class);

        $questions = Question::all();

        if ($questions->isEmpty()) {
            // Return an empty JSON array with 200 status code
            return response()->json([], 200);
        }

        // Return collection of Questions in JSON format
        return response()->json(QuestionResource::collection($questions), 200);
    }

    /*
     * Public index method to retrieve all questions without authorization
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function publicIndex()
    {
        $questions = Question::all();

        if ($questions->isEmpty()) {
            // Return an empty JSON array with 200 status code
            return response()->json([], 200);
        }

        // Return collection of Questions in JSON format
        return response()->json(QuestionResource::collection($questions), 200);
    }

    public function store(QuestionRequest $request)
    {
        // TODO : Enable authorization
        //$this->authorize('create', Question::class);

        // Create a new Question using the validated data from the request
        $newQuestion = Question::create($request->validated());

        // Return the newly created Question in JSON format with 201 status code
        return response()->json(QuestionResource::make($newQuestion), 201);
    }

    public function show(Question $question)
    {
        //$this->authorize('view', $question);

        return response()->json(QuestionResource::make($question), 200);
    }

    public function update(QuestionRequest $request, Question $question)
    {
        //$this->authorize('update', $question);

        $status = $question->update($request->validated());

        return response()->json(QuestionResource::make($question), $status ? 200 : 201);
    }

    public function destroy(Question $question)
    {
        //$this->authorize('delete', $question);

        $question->delete();

        return response()->json([], 200);
    }
}
