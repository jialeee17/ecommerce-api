<?php

namespace App\Repositories;

use App\Models\Bank;

class BankRepository
{
    public function getAllBanks()
    {
        return Bank::all();
    }

    public function createBank(array $data)
    {
        return Bank::create($data);
    }

    public function updateBank($id, array $data)
    {
        $bank = Bank::findOrFail($id);
        $bank->update($data);

        return $bank;
    }

    public function deleteBank($id)
    {
        $bank = Bank::findOrFail($id);

        return $bank->delete();
    }
}
