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
    public $search = '';
    public $sort = 'title_asc'; // valor padrão para a ordenação

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
        $this->emit('taskUpdated'); // Emitir evento para atualizar a lista de tarefas
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
        $this->emit('taskUpdated'); // Emitir evento para atualizar a lista de tarefas
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
        $tasksQuery = Task::query()
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                      ->orWhere('description', 'like', '%' . $this->search . '%');
            })
            ->when($this->sort, function ($query) {
                switch ($this->sort) {
                    case 'title_asc':
                        $query->orderBy('title', 'asc');
                        break;
                    case 'title_desc':
                        $query->orderBy('title', 'desc');
                        break;
                    case 'created_at_asc':
                        $query->orderBy('created_at', 'asc');
                        break;
                    case 'created_at_desc':
                        $query->orderBy('created_at', 'desc');
                        break;
                }
            });

        $tasks = $tasksQuery->get();

        return view('livewire.task-manager', ['tasks' => $tasks]);
    }
}
