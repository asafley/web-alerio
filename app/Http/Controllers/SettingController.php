<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingRequest;
use App\Http\Resources\SettingResource;
use App\Models\Setting;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class SettingController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        // TODO : Enable authorization
        //$this->authorize('viewAny', Setting::class);

        $settings = Setting::all();

        if ($settings->isEmpty()) {
            // Return an empty JSON array with 200 status code
            return response()->json([], 200);
        }

        // Return collection of Settings in JSON format
        return response()->json(SettingResource::collection($settings), 200);
    }

    public function store(SettingRequest $request)
    {
        // TODO : Enable authorization
        //$this->authorize('create', Setting::class);

        // Create a new Setting using the validated data from the request
        $newSetting = Setting::create($request->validated());

        // Return the newly created Setting in JSON format with 201 status code
        return response()->json(SettingResource::make($newSetting), 201);
    }

    public function show(Setting $setting)
    {
        //$this->authorize('view', $setting);

        return response()->json(SettingResource::make($setting), 200);
    }

    public function update(SettingRequest $request, Setting $setting)
    {
        //$this->authorize('update', $setting);

        $status = $setting->update($request->validated());

        return response()->json(SettingResource::make($setting), $status ? 200 : 201);
    }

    public function destroy(Setting $setting)
    {
        //$this->authorize('delete', $setting);

        $setting->delete();

        return response()->json([], 200);
    }
}
