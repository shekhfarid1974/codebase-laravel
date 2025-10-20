<?php

namespace App\Http\Controllers\Auth;

use Log;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/dashboard';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'terms' => ['required', 'accepted'], // Changed to accepted
        ]);
    }

    protected function create(array $data)
    {
        // Debug: Log the registration attempt
        \Log::info('Creating user with data:', $data);

        try {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'username' => $this->generateUsername($data['name']), // Add username field
                'password' => Hash::make($data['password']),
                'active' => 1,
            ]);

            \Log::info('User created successfully with ID: ' . $user->id);
            return $user;
        } catch (\Exception $e) {
            Log::error('User creation failed: ' . $e->getMessage());
            throw $e;
        }
    }

    // Generate username from name
    private function generateUsername($name)
    {
        $username = strtolower(str_replace(' ', '', $name));
        $counter = 1;
        $originalUsername = $username;

        while (User::where('username', $username)->exists()) {
            $username = $originalUsername . $counter;
            $counter++;
        }

        return $username;
    }

    // Override registered method to handle redirection
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        // Manually log in the user
        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 201)
            : redirect($this->redirectPath());
    }

    public function showRegistrationForm()
    {
        return view('auth.register', ['isRegister' => true]);
    }
}
