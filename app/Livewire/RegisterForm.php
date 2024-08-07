<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class RegisterForm extends Component
{
    use WithPagination;

    /**
     * Name of the user + validation rules for the property
     */
    #[Rule('required|min:2|max:50')]
    public $name = '';

    /**
     * Email address of the user + validation rules for the property
     */
    #[Rule('required|email|unique:users')]
    public $email = '';

    /**
     * Password of the user + validation rules for the property
     */
    #[Rule('required|min:5')]
    public $password = '';

    /**
     * Function to create a new user
     */
    public function createNewUser()
    {
        // Validation of the form data
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ]);

        // Reset value of the field to the default value
        $this->reset(['name', 'email', 'password']);

        // Display success message
        request()->session()->flash('success', 'User created successfully !');
    }

    /**
     * Function used to render the component
     */
    public function render()
    {
        // Definding variables in render method to make them accessible in the view of the component

        $title = "New title";

        $users = User::paginate(5);

        return view('livewire.register-form', [
            'title' => $title,
            'users' => $users
        ]);
    }
}
