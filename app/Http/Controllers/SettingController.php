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
        $this->authorize('viewAny', Setting::class);

        return SettingResource::collection(Setting::all());
    }

    public function store(SettingRequest $request)
    {
        $this->authorize('create', Setting::class);

        return new SettingResource(Setting::create($request->validated()));
    }

    public function show(Setting $setting)
    {
        $this->authorize('view', $setting);

        return new SettingResource($setting);
    }

    public function update(SettingRequest $request, Setting $setting)
    {
        $this->authorize('update', $setting);

        $setting->update($request->validated());

        return new SettingResource($setting);
    }

    public function destroy(Setting $setting)
    {
        $this->authorize('delete', $setting);

        $setting->delete();

        return response()->json();
    }
}
