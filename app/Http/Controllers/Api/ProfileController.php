<?php

namespace App\Http\Controllers\Api;

use App\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Profile as ProfileResource;

class ProfileController extends Controller
{
    /**
     * Get outlet listing on Leaflet JS geoJSON data structure.
     *
     * @param  \Illuminate\Http\Request $request
     * @return Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $profiles = Profile::all();

        $geoJSONdata = $profiles->map(function ($profile) {
            return [
                'type'       => 'Feature',
                'properties' => new ProfileResource($profile),
                'geometry'   => [
                    'type'        => 'Point',
                    'coordinates' => [
                        $profile->longitude,
                        $profile->latitude,
                    ],
                ],
            ];
        });

        return response()->json([
            'type'     => 'FeatureCollection',
            'features' => $geoJSONdata,
        ]);
    }
}
