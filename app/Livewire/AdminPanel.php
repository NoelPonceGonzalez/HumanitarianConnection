<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Carbon\Carbon;

class AdminPanel extends Component
{
    public $users;
    public $selectedUser;

    public $updatedUser;

    public function mount()
    {
        $this->showUsersPanel();
    }

    public function showUsersPanel()
    {
        $this->users = User::all();
    }

    public function deleteUser($userId)
    {
        $user = User::find($userId);
        if ($user) {
            $user->delete();

            $this->showUsersPanel();
        }
    }

    public function cancelEdit()
    {
        dd("si");
        $this->selectedUser = null;
    }

    public function updateUser()
    {
        dd($this->updatedUser);
        if ($this->selectedUser) {
            $user = User::find($this->selectedUser->id);
            try {
                $user->name = $this->updatedUser->name ?? $user->name;;
                $user->email = $this->updatedUser->email ?? $user->email;;
                $user->current_team_id = $this->updatedUser->current_team_id ?? $user->current_team_id;

                $user->save();
            } catch (\Exception $e) {
                dd($e);
            }
        }

        $this->selectedUser = null;
    }
    public function editUser($userId)
    {
        $this->selectedUser = User::find($userId);
    }

    public function render()
    {
        return view('livewire.admin-panel');
    }

}