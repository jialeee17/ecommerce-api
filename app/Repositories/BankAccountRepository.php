<?php

namespace App\Repositories;

use App\Models\BankAccount;

class BankAccountRepository
{
    public function getAllBankAccounts()
    {
        return BankAccount::all();
    }

    public function createBankAccount(array $data)
    {
        return BankAccount::create($data);
    }

    public function updateBankAccount($id, array $data)
    {
        $bankAccount = BankAccount::findOrFail($id);
        $bankAccount->update($data);

        return $bankAccount;
    }

    public function deleteBankAccount($id)
    {
        $bank = BankAccount::findOrFail($id);

        return $bank->delete();
    }
}
