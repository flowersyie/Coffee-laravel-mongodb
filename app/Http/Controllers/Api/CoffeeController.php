<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CoffeeMenu;
use App\Http\Resources\CoffeeResource;
use Illuminate\Support\Facades\Validator;

class CoffeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = CoffeeMenu::all();
    // return CoffeeResource::collection($data);

        return new CoffeeResource(true, 'Menampilkan semua data', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'item_id' => 'required|numeric',
            'item_name' => 'required|string',
            'category' => 'required|string',
            'price' => 'required|numeric',
            'is_seasonal' => 'required|string',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        // $data = CoffeeMenu::create($request->all());
        // return new CoffeeResource($data);

        $data = CoffeeMenu::create($request->all());
        return new CoffeeResource(true, 'Data berhasil diupdate', $data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (is_numeric($id)) {
            $coffee = CoffeeMenu::where('item_id', (int)$id)->firstOrFail();
        } else {
            $coffee = CoffeeMenu::where('_id', $id)->firstOrFail();
        }
        return new CoffeeResource($coffee);

        // $coffe = CoffeeMenu::find($id);

        // if (!$coffe) {
        //     return response()->json(['message' => 'Coffee item not found.'], 404);
        // }
        // return $coffee->toResource(MovieResource::class);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    if (is_numeric($id)) {
        $coffee = CoffeeMenu::where('item_id', (int)$id)->firstOrFail();
    } else {
        $coffee = CoffeeMenu::where('_id', $id)->firstOrFail();
    }

    $validator = Validator::make($request->all(), [
        'item_id'     => 'numeric',
        'item_name'   => 'string',
        'category'    => 'string',
        'price'       => 'numeric',
        'is_seasonal' => 'string',
    ]);

    // if ($validator->fails()) {
    //     return response()->json([
    //         'status'  => 'error',
    //         'message' => $validator->errors()
    //     ], 422);
    // }

    // $coffee->update($request->all());

    

    $coffee->update($request->all());
    return new CoffeeResource(true, 'Data berhasil diupdate', $coffee);
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    if (is_numeric($id)) {
            $coffee = CoffeeMenu::where('item_id', (int)$id)->firstOrFail();
        } else {
            $coffee = CoffeeMenu::where('_id', $id)->firstOrFail();
        }
        

        $coffee->delete();
        return response()->json(['message' => 'Coffee item deleted successfully.'], 200);

        $coffee->delete();
        return new CoffeeResource(true, 'Data berhasil dihapus', 200);
}
}
