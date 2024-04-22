<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Http; 
use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Obtiene el usuario autenticado
        $user = Auth::user();

        // Verifica si el usuario es un "treballador"
        if ($user->tipus === 'treballador') {
            $this->sendTelegramMessageToCapDepartament('ha iniciat sessió.');
        }

        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    { 
        // Obtiene el usuario autenticado
        $user = Auth::user();

        // Verifica si el usuario es un "treballador"
        if ($user->tipus === 'treballador') {
            $this->sendTelegramMessageToCapDepartament('ha tancat sessió.');
        }

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    /**
     * Envía un mensaje de Telegram a todos los "cap_departament"
     */
    protected function sendTelegramMessageToCapDepartament($action): void
    {
        // Obtiene todos los usuarios "cap_departament"
        $capDepartamentUsers = User::where('tipus', 'cap_departament')->get();

        foreach ($capDepartamentUsers as $capDepartamentUser) {
            $message = "L'usuari {$capDepartamentUser->name} {$action}";
            
            Http::post('https://api.telegram.org/bot7187996017:AAHf-4wiUlPdm6FC9sdx4fbYYE8WuNOXKS0/sendMessage', [
                'chat_id' => 6892689742, // Id de mi telegram privado. $capDepartamentUser->telegram_chat_id si cada usuario tuviese su propio telgram registrado.
                'text' => $message,
            ]);
        }
    }
}
