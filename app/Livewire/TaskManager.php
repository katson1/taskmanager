<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;
use App\Models\Category;

class TaskManager extends Component
{
    public $title;
    public $description;
    public $category_id;
    public $taskId;

    public $categories;

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'category_id' => 'nullable|exists:categories,id',
    ];

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function store()
    {
        $this->validate();

        Task::updateOrCreate(
            ['id' => $this->taskId],
            [
                'title' => $this->title,
                'description' => $this->description,
                'category_id' => $this->category_id
            ]
        );

        $this->resetFields();
        $this->emit('taskUpdated');
    }

    public function edit(Task $task)
    {
        $this->taskId = $task->id;
        $this->title = $task->title;
        $this->description = $task->description;
        $this->category_id = $task->category_id;
    }

    public function delete(Task $task)
    {
        $task->delete();
        $this->emit('taskUpdated');
    }

    private function resetFields()
    {
        $this->taskId = null;
        $this->title = '';
        $this->description = '';
        $this->category_id = '';
    }

    public function render()
    {
        $tasks = Task::all();
    
        return view('livewire.task-manager', ['tasks' => $tasks]);
    }
    
}
