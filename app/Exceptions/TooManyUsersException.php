<?php

namespace App\Exceptions;

use Exception;
use App\Models\Team;
use Filament\Notifications\Notification; 

class TooManyUsersException extends Exception
{
    public function __construct(Team $team)
    {
        $this->team = $team;
    }

    public function render()
    {
        Notification::make() 
            ->title('Too many users.')
            ->body("You have too many registered users to switch to this plan.")
            ->warning()
            ->send();
    }
}
