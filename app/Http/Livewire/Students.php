<?php

namespace App\Http\Livewire;

use App\Models\schools;
use App\Models\students as ModelsStudents;
use Livewire\Component;
use Livewire\WithPagination;

class Students extends Component
{
    use WithPagination;
    public $show_form = false;


    public $name;
    public $email;
    public $school;


    public $schools;

    public function toggle_form()
    {
        $this->show_form = !$this->show_form;
    }

    public function save_student()
    {
        $this->validate([
            'name' =>"required",
            'email' => "required|email",
            'school' => "required"
        ]);
        ModelsStudents::UpdateOrCreate([
            'name' => $this->name,
            'email' => $this->email,
            'school' => $this->school,
        ]);

        $this->name='';
        $this->email='';
        $this->school='';
        $this->toggle_form();
        session()->flash('message','Student Saved Successfully!');
    }


    public function edit($id)
    {
        $student = ModelsStudents::findOrFail($id);
        $this->name = $student->name;
        $this->email = $student->email;
        $this->school = $student->school;
        $this->toggle_form();
    }

    public function destroy($id)
    {
        ModelsStudents::findOrFail($id)->delete();
        session()->flash('message','Student Deleted Successfully!');
    }
    public function render()
    {
        $this->schools = schools::all();
        return view('livewire.students',[
            'students' => ModelsStudents::latest()->paginate(5)
        ]);
    }
}
