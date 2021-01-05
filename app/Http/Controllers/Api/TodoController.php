<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\CreateTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use App\Models\Todo;
use App\Repository\Contracts\TodoContract;

class TodoController extends Controller
{
    protected $todo;
    public function __construct(TodoContract $todo)
    {
        $this->todo = $todo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = $this->todo->fetchAll();

        if ($todos->count() > 0) {
            return $this->respondWithPaginatedData($todos);
        }
        return $this->respondWithNoContent();
    }


    /**
     * Store todo.
     *
     * @param  CreateTodoRequest  $request
     * @return json
     */
    public function store(CreateTodoRequest $request)
    {
        $validatedAttr = $request->validated();

        try {
            $todo = $this->todo->createModel($validatedAttr);

            return $this->respondSuccessWithData($todo, 201);
        } catch (\Exception $e) {
            return $this->respondErrorWithMessage('Todo was not saved');
        }
    }

    /**
     * Fetch single todo
     *
     * @param  Todo $todo
     * @return json
     */
    public function show(Todo $todo)
    {
        return $this->respondSuccessWithData($todo);
    }


    /**
     * Update todo
     * @param UpdateTodoRequest $request
     * @param  Todo $todo
     * @return json
     */
    public function update(UpdateTodoRequest $request, Todo $todo)
    {
        $validatedAttr = $request->validated();

        try {
            $this->todo->updateModel($todo, $validatedAttr);

            return $this->respondSuccessWithData($todo);
        } catch (\Exception $e) {
            return $this->respondErrorWithMessage(sprintf('Todo was not updated, $%', $e));
        }
    }

    /**
     * Remove todo
     *
     * @param  Todo $todo
     * @return json
     */
    public function destroy(Todo $todo)
    {
        $oldData = $todo;

        try {
            $todo = $this->todo->deleteModel($todo);

            return $this->respondSuccessWithMessage(sprintf("Todo, %s, was deleted", $oldData->title));
        } catch (\Exception $e) {
            return $this->respondErrorWithMessage($e);
        }
    }
}
