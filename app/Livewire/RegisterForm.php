<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class RegisterForm extends Component
{
    use WithPagination;
    use WithFileUploads;

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
     * Picture of the user + validation rules for the property
     */
    #[Rule('nullable|sometimes|image|max:1024')]
    public $image = '';

    /**
     * Function to create a new user
     */
    public function createNewUser()
    {
        // Validation of the form data
        $validated = $this->validate();

        if ($this->image) {
            $validated['image'] = $this->image->store('uploads', 'public');
        }

        // User::create([
        //     'name' => $this->name,
        //     'email' => $this->email,
        //     'password' => $this->password,
        // ]);

        User::create($validated);

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
