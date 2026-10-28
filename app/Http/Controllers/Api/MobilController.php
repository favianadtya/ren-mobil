<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mobil;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MobilController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Mobil::query()->get());
    }

    public function store(Request $request): JsonResponse
    {
        $mobil = Mobil::query()->create($request->validate($this->rules()));

        return response()->json($mobil, 201);
    }

    public function show(Mobil $mobil): JsonResponse
    {
        return response()->json($mobil);
    }

    public function update(Request $request, Mobil $mobil): JsonResponse
    {
        $mobil->update($request->validate($this->rules($request->isMethod('patch'))));

        return response()->json($mobil);
    }

    public function destroy(Mobil $mobil): JsonResponse
    {
        $mobil->delete();

        return response()->json(null, 204);
    }

    private function rules(bool $partial = false): array
    {
        $required = $partial ? 'sometimes|required|' : 'required|';

        return [
            'nama' => $required . 'string',
            'brand' => $required . 'string',
            'harga' => $required . 'integer|min:0',
            'tahun' => $required . 'integer|min:0|max:65535',
            'transmisi' => $required . 'in:Manual,Matic,CVT',
            'bahan_bakar' => $required . 'in:Bensin,Diesel,Hybrid,Listrik',
            'status' => $partial ? 'sometimes|required|in:tersedia,sold' : 'sometimes|in:tersedia,sold',
            'foto' => $partial ? 'sometimes|nullable|string' : 'nullable|string',
        ];
    }
}
