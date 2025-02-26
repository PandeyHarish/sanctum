<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // Get the 'status' query parameter (default to 'active' if not provided)
        $status = $request->query('status', 'active');

        if (!in_array($status, ['active', 'inactive'])) {
            return response()->json(['error' => 'Invalid status value.'], 400);
        }

        // Query users based on status with pagination (10 per page)
        $users = User::where('status', $status)->paginate(10);

        // Return paginated list of users
        return response()->json($users);
    }
}
