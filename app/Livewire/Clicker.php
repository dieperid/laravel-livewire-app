<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Clicker extends Component
{
    /**
     * Public variable to make it accessible in the view of the component
     */
    public $username = 'testUser';

    /**
     * Function to create a new user
     */
    public function createNewUser()
    {
        User::create([
            'name' => 'testUser2',
            'email' => 'test@test2.com',
            'password' => 'randomPassword',
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
