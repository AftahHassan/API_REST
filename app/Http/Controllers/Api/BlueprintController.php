<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blueprint;
use Illuminate\Http\Request;

class BlueprintController extends Controller
{
    public function index()
    {
        $blueprints = auth()->user()->blueprints()->latest()->get();

        return response()->json($blueprints);
    }

    public function show(Blueprint $blueprint)
    {
        return response()->json($blueprint);
    }
}