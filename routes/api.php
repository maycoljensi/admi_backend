<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use Illuminate\Http\Request;

Route::post('/login', function (Request $request) {
    $admin = Admin::where('email', $request->email)->first();

    if (!$admin || !Hash::check($request->password, $admin->password)) {
        return response()->json(['message' => 'Credenciales incorrectas ❌'], 401);
    }

    return response()->json([
        'message' => 'Inicio de sesión exitoso ✅',
        'admin' => [
            'id' => $admin->id,
            'name' => $admin->name,
            'email' => $admin->email
        ]
    ]);
});

