<?php

namespace App\Http\Requests;

use App\Models\Task;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTaskRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('task_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'description' => [
                'required',
            ],
            'status_id' => [
                'required',
                'integer',
            ],
            'tags.*' => [
                'integer',
            ],
            'tags' => [
                'required',
                'array',
            ],
            'attachment' => [
                'required',
            ],
            'due_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
