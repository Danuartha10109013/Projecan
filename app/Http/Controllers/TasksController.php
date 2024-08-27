<?php

namespace App\Http\Controllers;

use App\Models\Pengumpulan;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TasksController extends Controller
{
    public function not_complite(){
        $ket = "Belum Dikerjakan";
        $ket1 = "";
        $tasksconfirmed=[];

        $tasks = Task::where('id_user', Auth::user()->id)
        ->where('status', 1) // 1 = belum dikerjakan
        ->where('confirmation' , '!=', "confirmed")
        ->get();
        return view('pegawai.tugas.index',compact('tasks','ket','ket1','tasksconfirmed'));
    }
    public function revision(){
        $ket = "Revisi";
        $ket1 = "";
        $tasksconfirmed=[];

        $tasks = Task::where('id_user', Auth::user()->id)
        ->where('status', 3) // 3 = revisi
        ->where('confirmation' , '!=', "confirmed")
        ->get();
        return view('pegawai.tugas.index',compact('tasks','ket','ket1','tasksconfirmed'));
    }
    public function complite(){
        $ket = "Selesai (Belum Dikonfirmasi)";
        $ket1 = "Selesai";
        $tasks = Task::where('id_user', Auth::user()->id)
        ->where('status', 2) // 2 = Sudah Dikerjakan
        ->where('confirmation' , '!=', "confirmed")
        ->get();
        $tasksconfirmed= Task::where('id_user', Auth::user()->id)
        ->where('status', 2) // 2 = Sudah Dikerjakan
        ->where('confirmation', "confirmed")
        ->get(); // sudah dikonfirmasi
        return view('pegawai.tugas.index',compact('tasks','tasksconfirmed','ket','ket1'));
    }

    public function detail($id){
        $task = Task::findOrFail($id);
        return view('pegawai.tugas.detail',compact('task'));
    }
    public function kumpulkan(Request $request,$id)
{
    dd($request->all());
    $request->validate([
        'bukti' => 'nullable|file|mimes:jpg,png,pdf,docx|max:2048',
        'catatan' => 'nullable|string|max:255',
        'id_tugas' => 'required'
    ]);

    $pengumpulan = Pengumpulan::findOrFail($id);
    
    // Handle file upload
    if ($request->hasFile('bukti')) {
        if ($pengumpulan->bukti && Storage::exists('public/bukti/' . $pengumpulan->bukti)) {
            Storage::delete('public/bukti/' . $pengumpulan->bukti);
        }

        $file = $request->file('bukti');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/bukti', $filename);

        $pengumpulan->bukti = $filename;
    }

    $pengumpulan->catatan = $request->input('catatan');
    $pengumpulan->save();

    $task = Task::findOrFail($id);
    $task->status = 2; // Mark as complete
    $task->save();

    return redirect()->route('pegawai.tasks-detail', $task->id)->with('success', 'Tugas berhasil dikumpulkan.');
}

    
}
