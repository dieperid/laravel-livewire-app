<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Clicker extends Component
{
    /**
     * Name of the user
     */
    public $name;
    /**
     * Email address of the user
     */
    public $email;
    /**
     * Password of the user
     */
    public $password;

    /**
     * Function to create a new user
     */
    public function createNewUser()
    {
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ]);
    }

    /**
     * Function used to render the component
     */
    public function render()
    {
        // Definding variables in render method to make them accessible in the view of the component

        $title = "New title";

        $users = User::all();

        return view('livewire.clicker', [
            'title' => $title,
            'users' => $users
        ]);
    }
}
