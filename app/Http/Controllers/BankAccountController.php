<?php

namespace App\Http\Controllers;

use App\Enums\CommonStatusesEnum;
use Exception;
use App\Models\BankAccount;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Responses\ApiErrorResponse;
use App\Http\Responses\ApiSuccessResponse;
use App\Repositories\BankAccountRepository;

class BankAccountController extends Controller
{
    private $bankAccountRepository;

    public function __construct(BankAccountRepository $bankAccountRepository)
    {
        $this->bankAccountRepository = $bankAccountRepository;
    }

    public function index()
    {
        try {
            $banks = $this->bankAccountRepository->getAllBankAccounts();

            return new ApiSuccessResponse(
                $banks,
                'Retrieve Bank Account List Successfully.',
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'bank_id' => ['required', 'integer', 'exists:banks,id'],
                'account_name' => ['required', 'string'],
                'account_number' => ['required', 'string'],
                'status' => ['required', 'string', Rule::enum(CommonStatusesEnum::class)],
            ]);

            $data = $this->bankAccountRepository->createBankAccount([
                'bank_id' => $request->bank_id,
                'account_name' => $request->account_name,
                'account_number' => $request->account_number,
                'status' => $request->status,
            ]);

            return new ApiSuccessResponse(
                $data,
                'Create Bank Account Successfully.',
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    public function show(BankAccount $bankAccount)
    {
        try {
            return new ApiSuccessResponse(
                $bankAccount,
                'Retrieve Bank Account Details Successfully.',
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    public function update(Request $request, BankAccount $bankAccount)
    {
        try {
            $request->validate([
                'bank_id' => ['required', 'integer', 'exists:banks,id'],
                'account_name' => ['required', 'string'],
                'account_number' => ['required', 'string'],
                'status' => ['required', 'string', Rule::enum(CommonStatusesEnum::class)],
            ]);

            $data = $this->bankAccountRepository->updateBankAccount($bankAccount->id, [
                'bank_id' => $request->bank_id,
                'account_name' => $request->account_name,
                'account_number' => $request->account_number,
                'status' => $request->status,
            ]);

            return new ApiSuccessResponse(
                $data,
                'Update Bank Account Details Successfully.',
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    public function destroy(BankAccount $bankAccount)
    {
        try {
            $this->bankAccountRepository->deleteBankAccount($bankAccount->id);

            return new ApiSuccessResponse(
                [],
                'Delete Bank Account Successfully.',
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }
}
