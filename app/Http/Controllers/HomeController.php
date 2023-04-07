<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Enroll;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    private $trainings, $training, $categories, $category, $enrollStatus;
    public function index()
    {
        $this->trainings = Training::where('status', 1)->get();
        return view('website.home.index', ['trainings' => $this->trainings]);
    }
    public function detail($id)
    {
        $this->categories = Category::all();
        $this->training = Training::find($id);
        $this->enrollStatus = Enroll::where(['training_id' => $id, 'student_id' => Session::get('student_id')])->first();
        return view('website.home.detail', [
            'training' => $this->training,
            'enrollStatus' => isset($this->enrollStatus) ? 1 :0,
            'categories' => $this->categories
            ]);
    }
    public function about()
    {
        return view('website.about.index');
    }
    public function traningCategory($id)
    {

        $this->category = Category::find($id);
        return view('website.training-category.index', ['category' => $this->category]);
    }

    public function allTraining()
    {
        return view('website.training.index');
    }

    public function contact()
    {
        return view('website.contact.index');
    }

    public function auth()
    {
        return view('website.auth.index');
    }
}
