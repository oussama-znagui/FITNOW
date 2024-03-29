<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProgressRequest;
use App\Models\PPD;
use Illuminate\Http\Request;

class PPDController extends Controller
{
    public function index()
    {
        return PPD::All();
    }

    public function store(StoreProgressRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData += ["user_id" => auth("sanctum")->id()];
        $progress =  PPD::create($validatedData);

        return response()->json([
            "data" => $progress,
            "success" => true,
            201
        ]);
    }

    public function show(PPD $PPD)
    {
        return response()->json($PPD);
    }

    public function update(Request $request, PPD $PPD)
    {

        $PPD->update($request->all());

        return response()->json($PPD);
    }

    public function destroy(PPD $PPD)
    {
        $PPD->delete();

        return response()->json(null, 204);
    }
}
