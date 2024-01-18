<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Setting;
use Illuminate\Http\Request;
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
                str_replace(':name', 'Settings', __('messages.retrieve.success')),
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
                str_replace(':name', 'Setting', __('messages.retrieve.success')),
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
                'value' => ['nullable'],
            ]);

            $data = [
                'value' => $request->value,
            ];

            $data = $this->settingRepository->updateSetting($setting->id, $data);

            return new ApiSuccessResponse(
                $data,
                str_replace(':name', 'Setting', __('messages.update.success')),
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
                str_replace(':name', 'Setting', __('messages.delete.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }
}
