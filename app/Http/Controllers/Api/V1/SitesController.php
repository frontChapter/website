<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\FestivalSite;
use Illuminate\Http\Request;
use MarcinOrlowski\ResponseBuilder\ResponseBuilder;

class SitesController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'project_id' => 'required|string',
        ]);

        $festivalSite = FestivalSite::create([
            'app_id' => $request->project_id,
        ]);

        /**
         * @status 201
         */
        return ResponseBuilder::asSuccess()
            ->withHttpCode(201)
            ->build();
    }
}
