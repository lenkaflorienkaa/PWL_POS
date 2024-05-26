<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        return UserModel::all();
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255',

        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $user = UserModel::create($request->all());
        return response()->json($user, 201);
    }

    public function show($user)
    {
        return response()->json(UserModel::find($user));
    }

    public function update(Request $request, $user)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255',

        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $user->update($request->all());
        return response()->json(UserModel::find($user));
    }

    public function destroy($user)
    {
        $user->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil dihapus!'
        ]);
    }
}
