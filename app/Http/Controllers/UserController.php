<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    // Create User API
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'name' => 'required|string|min:3|max:50',
        ]);

        $validated['password'] = bcrypt($validated['password']);

        $user = User::create($validated);

        // Send emails (Dummy logic, adjust as needed)
        Mail::raw('Your account has been created.', function ($message) use ($user) {
            $message->to($user->email)->subject('Account Created');
        });

        Mail::raw('A new user has registered.', function ($message) {
            $message->to('admin@example.com')->subject('New User Registration');
        });

        return response()->json([
            'id' => $user->id,
            'email' => $user->email,
            'name' => $user->name,
            'created_at' => $user->created_at,
        ], 201);
    }

    // Get Users API
    public function index(Request $request)
    {
        $search = $request->input('search');
        $sortBy = $request->input('sortBy', 'created_at');
        $page = $request->input('page', 1);

        $users = User::withCount('orders')
            ->where('active', true)
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', "%$search%")
                      ->orWhere('email', 'like', "%$search%");
            })
            ->orderBy($sortBy)
            ->paginate(10, ['id', 'email', 'name', 'created_at'], 'page', $page);

        return response()->json([
            'page' => $page,
            'users' => $users->items(),
        ]);
    }
}

