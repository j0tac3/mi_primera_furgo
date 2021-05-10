<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index() {
        $user = User::paginate(10);
        return UserResource::collection($user);
    }

    public function show($id) {
        $user = User::findOrFail($id);
        return new UserResource($user);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
            
        return User::create($request->all());
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        
        $user = User::findOrFail($id);       
        return  $user->update($request->all());
    }

    public function destroy($id) {
        $user = User::findOrFail($id);        
        return $user->delete();
    }
}
