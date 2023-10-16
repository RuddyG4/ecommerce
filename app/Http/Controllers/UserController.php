<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\Customer;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class UserController extends Controller
{
    use PasswordValidationRules;
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with(['customer','role:id,name'])->paginate();
        return Inertia::render('Users/Index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return Inertia::render('Users/Create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name' => ['required', 'string', 'max:60'],
            'last_name' => ['required', 'string', 'max:60'],
            'role_id' => ['required'],
            'phone' => ['string', 'max:30', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
        ]);

        $data['name'] = $data['first_name'] . ' ' . $data['last_name'];

        $user = User::create($data);

        $data['user_id'] = $user->id;

        Customer::create($data);
        return redirect(route('users.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::with(['customer','role:id,name'])->find($id);
        $roles = Role::all();
        return Inertia::render('Users/Show', compact('user', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::with(['customer','role:id,name'])->find($id);
        $roles = Role::all();
        return Inertia::render('Users/Show', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'first_name' => ['required', 'string', 'max:60'],
            'last_name' => ['required', 'string', 'max:60'],
            'role_id' => ['required'],
            'phone' => ['string', 'max:30', Rule::unique('users')->ignore($user->id)],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
        ]);

        $data['name'] = $data['first_name'] . ' ' . $data['last_name'];

        $user->update($data);
        $user->customer->update($data);
        
        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
