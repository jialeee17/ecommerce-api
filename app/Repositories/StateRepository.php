<?php

namespace App\Repositories;

use App\Models\State;

class StateRepository
{
    public function getAllStates()
    {
        return State::all();
    }

    public function createState(array $data)
    {
        return State::create($data);
    }

    public function updateState($id, array $data)
    {
        $state = State::findOrFail($id);
        $state->update($data);

        return $state;
    }

    public function deleteState($id)
    {
        $state = State::findOrFail($id);

        return $state->delete();
    }
}
