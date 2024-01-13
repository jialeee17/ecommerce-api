<?php

namespace App\Repositories;

use App\Models\Setting;

class SettingRepository
{
    public function getAllSettings()
    {
        return Setting::all();
    }

    public function createSetting(array $data)
    {
        return Setting::create($data);
    }

    public function updateSetting($id, array $data)
    {
        $setting = Setting::findOrFail($id);
        $setting->update($data);

        return $setting;
    }

    public function deleteSetting($id)
    {
        $setting = Setting::findOrFail($id);

        return $setting->delete();
    }
}
