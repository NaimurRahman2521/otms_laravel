<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;
use function Symfony\Component\String\b;

class AdminTrainingController extends Controller
{
    private $trainings, $training, $message;

    public function index()
    {
        $this->trainings = Training::all();
        return view('admin.training.manage', ['trainings' => $this->trainings]);
    }

    public function show($id)
    {
        $this->training = Training::find($id);
        return view('admin.training.detail', ['training' => $this->training]);
    }

    public function status($id)
    {
        $this->message = Training::updateTrainingStatus($id);
        return back()->with('message', $this->message);
    }
}
