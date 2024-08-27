<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TasksAtController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $orderBy = $request->input('order_by', 'default');
        $perPage = $request->input('per_page', 8);

        $query = Task::query();

        if ($search) {
            $query->where('nama_tugas', 'like', "%{$search}%");
        }

        switch ($orderBy) {
            case 'newest':
                $query->orderBy('created_at', 'desc');
                break;
            case 'oldest':
                $query->orderBy('created_at', 'asc');
                break;
            case 'random':
                $query->inRandomOrder();
                break;
            default:
                $query->orderBy('created_at', 'desc');
                break;
        }

        $tasks = $query->paginate($perPage);

        return view('atasan.tugas.index', ['tasks' => $tasks]);
    }
}
