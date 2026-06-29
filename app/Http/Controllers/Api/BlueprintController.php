<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlueprintRequest;
use App\Http\Resources\BlueprintResource;
use App\Models\Blueprint;

class BlueprintController extends Controller
{
    public function index()
    {
        $blueprints = auth()->user()->blueprints()->latest()->get();

        return BlueprintResource::collection($blueprints);
    }

    public function store(StoreBlueprintRequest $request)
    {
        $blueprint = auth()->user()->blueprints()->create($request->validated());

        return (new BlueprintResource($blueprint))
            ->response()
            ->setStatusCode(201);
    }

    public function show(Blueprint $blueprint)
    {
        return new BlueprintResource($blueprint);
    }
}