<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\ShippingZone;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Enums\CommonStatusesEnum;
use App\Http\Responses\ApiErrorResponse;
use App\Http\Responses\ApiSuccessResponse;
use App\Repositories\ShippingZoneRepository;

class ShippingZoneController extends Controller
{
    private $shippingZoneRepository;

    public function __construct(ShippingZoneRepository $shippingZoneRepository)
    {
        $this->shippingZoneRepository = $shippingZoneRepository;
    }

    public function index()
    {
        try {
            $shippingZones = $this->shippingZoneRepository->getAllShippingZones();

            return new ApiSuccessResponse(
                $shippingZones,
                str_replace(':name', 'Shipping Zones', __('messages.retrieve.success')),
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
                'status' => ['required', 'string', Rule::enum(CommonStatusesEnum::class)],
                'state_ids' => ['required', 'array'],
                'state_ids.*' => ['required', 'integer', 'exists:states,id'],
                'shipping_method_ids' => ['required', 'array'],
                'shipping_method_ids.*' => ['required', 'integer', 'exists:shipping_methods,id'],
            ]);

            $data = [
                'name' => $request->name,
                'status' => $request->status,
            ];

            $shippingZone = $this->shippingZoneRepository->createShippingZone($data);

            // Zone Regions
            $shippingZone->regions()->attach($request->state_ids);
            $shippingZone->shippingMethods()->attach($request->shipping_method_ids);

            return new ApiSuccessResponse(
                $shippingZone,
                str_replace(':name', 'Shipping Zone', __('messages.create.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    public function show(ShippingZone $shippingZone)
    {
        try {
            return new ApiSuccessResponse(
                $shippingZone,
                str_replace(':name', 'Shipping Zone', __('messages.retrieve.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    public function update(Request $request, ShippingZone $shippingZone)
    {
        try {
            $request->validate([
                'name' => ['required', 'string'],
                'status' => ['required', 'string', Rule::enum(CommonStatusesEnum::class)],
                'state_ids' => ['required', 'array'],
                'state_ids.*' => ['required', 'integer', 'exists:states,id'],
                'shipping_method_ids' => ['required', 'array'],
                'shipping_method_ids.*' => ['required', 'integer', 'exists:shipping_methods,id'],
            ]);

            $data = [
                'name' => $request->name,
                'status' => $request->status,
            ];

            $shippingZone = $this->shippingZoneRepository->updateShippingZone($shippingZone->id, $data);

            $shippingZone->regions()->sync($request->state_ids);
            $shippingZone->shippingMethods()->sync($request->shipping_method_ids);

            return new ApiSuccessResponse(
                $shippingZone->load(['shippingMethods', 'regions']),
                str_replace(':name', 'Shipping Zone', __('messages.update.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    public function destroy(ShippingZone $shippingZone)
    {
        try {
            $this->shippingZoneRepository->deleteShippingZone($shippingZone->id);

            return new ApiSuccessResponse(
                [],
                str_replace(':name', 'Shipping Zone', __('messages.delete.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }
}
