<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Bank;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Repositories\BankRepository;
use App\Http\Responses\ApiErrorResponse;
use App\Http\Responses\ApiSuccessResponse;

class BankController extends Controller
{
    private $bankRepository;

    public function __construct(BankRepository $bankRepository)
    {
        $this->bankRepository = $bankRepository;
    }

    public function index()
    {
        try {
            $banks = $this->bankRepository->getAllBanks();

            return new ApiSuccessResponse(
                $banks,
                str_replace(':name', 'Banks', __('messages.retrieve.success')),
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
                'name' => ['required', 'string', 'unique:banks,name'],
            ]);

            $data = $this->bankRepository->createBank([
                'name' => $request->name,
            ]);

            return new ApiSuccessResponse(
                $data,
                str_replace(':name', 'Bank', __('messages.create.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    public function show(Bank $bank)
    {
        try {
            return new ApiSuccessResponse(
                $bank,
                str_replace(':name', 'Bank', __('messages.retrieve.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    public function update(Request $request, Bank $bank)
    {
        try {
            $request->validate([
                'name' => ['required', 'string', Rule::unique('banks', 'name')->ignore($bank)],
            ]);

            $data = $this->bankRepository->updateBank($bank->id, [
                'name' => $request->name,
            ]);

            return new ApiSuccessResponse(
                $data,
                str_replace(':name', 'Bank', __('messages.update.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    public function destroy(Bank $bank)
    {
        try {
            $this->bankRepository->deleteBank($bank->id);

            return new ApiSuccessResponse(
                [],
                str_replace(':name', 'Bank', __('messages.delete.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }
}
