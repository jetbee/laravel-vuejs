<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Utils\HtmlEscapeEx;

class TaskController extends Controller
{
    public function index()
    {
        return HtmlEscapeEx::toEscapedArray(Task::all()->toArray(),['content']);
    }

    public function store(TaskRequest $request)
    {
        return HtmlEscapeEx::toEscapedArray(
            Task::create($request->all()),
            ['content']
        );
    }

    public function show(Task $task)
    {
        return HtmlEscapeEx::toEscapedArray($task->toArray(),['content']);
    }

    public function update(TaskRequest $request, Task $task)
    {
        $task->update($request->all());
        return HtmlEscapeEx::toEscapedArray($task->toArray(),['content']);
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return HtmlEscapeEx::toEscapedArray($task->toArray(),['content']);
    }
}
