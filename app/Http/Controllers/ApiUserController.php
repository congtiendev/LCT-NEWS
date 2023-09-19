<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserResource;

class ApiUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return UserResource::collection($users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::create($request->all());
        return new UserResource($user);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        if ($user) {
            return new UserResource($user);
        } else {
            return response()->json([
                'message' => 'Không tìm thấy sinh viên có mã ' . $id
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        if ($user) {
            return new UserResource($user);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if ($user) {
            $user->update($request->all());
            return new UserResource($user);
        } else {
            return response()->json([
                'message' => 'Không tìm thấy sinh viên có mã ' . $id
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return response()->json([
                'message' => 'Xóa sinh viên có mã ' . $id . ' thành công'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Không tìm thấy sinh viên có mã ' . $id
            ], 404);
        }
    }
}
