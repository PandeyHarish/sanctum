<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {

        $status = $request->query('status', 'active');

        if (!in_array($status, ['active', 'inactive'])) {
            return response()->json(['error' => 'Invalid status value.'], 400);
        }


        $users = User::where('status', $status)->paginate(10);


        return response()->json($users);
    }
}
