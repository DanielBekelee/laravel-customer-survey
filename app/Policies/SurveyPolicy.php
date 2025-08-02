<?php

namespace App\Policies;

use App\Models\Survey;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SurveyPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Survey $survey)
    {
        return $user->id === $survey->user_id;
    }

    public function delete(User $user, Survey $survey)
    {
        return $user->id === $survey->user_id;
    }
}