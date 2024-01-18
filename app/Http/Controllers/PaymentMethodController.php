<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use Illuminate\Validation\Rule;
use App\Enums\CommonStatusesEnum;
use App\Http\Responses\ApiErrorResponse;
use App\Http\Responses\ApiSuccessResponse;
use App\Repositories\PaymentMethodRepository;

class PaymentMethodController extends Controller
{
    private $paymentMethodRepository;

    public function __construct(PaymentMethodRepository $paymentMethodRepository)
    {
        $this->paymentMethodRepository = $paymentMethodRepository;
    }

    public function index()
    {
        try {
            $paymentMethods = $this->paymentMethodRepository->getAllPaymentMethods();

            return new ApiSuccessResponse(
                $paymentMethods,
                str_replace(':name', 'Payment Methods', __('messages.retrieve.success')),
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
                'name' => ['required', 'string'],
                'description' => ['nullable', 'string'],
                'status' => ['required', Rule::enum(CommonStatusesEnum::class)],
            ]);

            $data = $this->paymentMethodRepository->createPaymentMethod([
                'name' => $request->name,
                'description' => $request->description,
                'status' => $request->status,
            ]);

            return new ApiSuccessResponse(
                $data,
                str_replace(':name', 'Payment Method', __('messages.create.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    public function show(PaymentMethod $paymentMethod)
    {
        try {
            return new ApiSuccessResponse(
                $paymentMethod,
                str_replace(':name', 'Payment Method', __('messages.retrieve.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    public function update(Request $request, PaymentMethod $paymentMethod)
    {
        try {
            $request->validate([
                'name' => ['required', 'string'],
                'description' => ['nullable', 'string'],
                'status' => ['required', Rule::enum(CommonStatusesEnum::class)],
            ]);

            $data = $this->paymentMethodRepository->updatePaymentMethod($paymentMethod->id, [
                'name' => $request->name,
                'description' => $request->description,
                'status' => $request->status,
            ]);

            return new ApiSuccessResponse(
                $data,
                str_replace(':name', 'Payment Method', __('messages.update.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    public function destroy(PaymentMethod $paymentMethod)
    {
        try {
            $this->paymentMethodRepository->deletePaymentMethod($paymentMethod->id);

            return new ApiSuccessResponse(
                [],
                str_replace(':name', 'Payment Method', __('messages.delete.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }
}
