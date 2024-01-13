<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Enums\CommonStatusesEnum;
use App\Repositories\SettingRepository;
use App\Http\Responses\ApiErrorResponse;
use App\Http\Responses\ApiSuccessResponse;

class SettingController extends Controller
{
    private $settingRepository;

    public function __construct(SettingRepository $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    }

    public function index()
    {
        try {
            $settings = $this->settingRepository->getAllSettings();

            return new ApiSuccessResponse(
                $settings,
                'Retrieve Setting List Successfully.',
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    public function show(Setting $setting)
    {
        try {
            return new ApiSuccessResponse(
                $setting,
                'Retrieve Setting Details Successfully.',
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    public function update(Request $request, Setting $setting)
    {
        try {
            $request->validate([
                'name' => ['required', 'string'],
                'value' => ['nullable'],
                'description' => ['nullable', 'string'],
                'status' => ['required', Rule::enum(CommonStatusesEnum::class)]
            ]);

            $data = [
                'name' => $request->name,
                'value' => $request->value,
                'description' => $request->description,
                'status' => $request->status
            ];

            $data = $this->settingRepository->updateSetting($setting->id, $data);

            return new ApiSuccessResponse(
                $data,
                'Update Setting Details Successfully.',
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    public function destroy(Setting $setting)
    {
        try {
            $this->settingRepository->deleteSetting($setting->id);

            return new ApiSuccessResponse(
                [],
                'Delete Setting Successfully.',
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }
}
