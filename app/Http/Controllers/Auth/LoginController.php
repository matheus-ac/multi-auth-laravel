<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;


class LoginController extends Controller
{

    /**
     * Formulário de login
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function form()
    {
        return view('auth.login');
    }

    /**
     * Autenticação
     *
     * @param Request $request
     * @return bool|\Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $this->validator();
        $credentials = $request->only('email', 'password');


        if ($auth = $this->adminAuth($credentials)) {
            return $auth;
        }

        if ($auth = $this->subadminAuth($credentials)) {
            return $auth;
        }

        if ($auth = $this->accountAuth($credentials)) {
            return $auth;
        }

        // Credenciais inválidas
        return redirect()->back()
            ->withErrors('As credenciais informadas são inválidas. Verifique!');
    }

    /**
     * Validação
     */
    private function validator()
    {
        $this->validate(request(), [
            'email' => 'required',
            'password' => 'required',
        ]);
    }

    private function adminAuth(array $credentials)
    {
        $authorized = Auth::guard('admin')->attempt([
            'email'    => $credentials['email'],
            'password' => $credentials['password'],
        ], false);

        if (!$authorized) {
            return false;
        }

        return redirect()->route('admin.dashboard.index');
    }

    private function subadminAuth(array $credentials)
    {
        $authorized = Auth::guard('subadmin')->attempt([
            'email'    => $credentials['email'],
            'password' => $credentials['password'],
        ], false);

        if (!$authorized) {
            return false;
        }

        return redirect()->route('subadmin.dashboard.index');
    }

    private function accountAuth(array $credentials)
    {
        $authorized = Auth::guard('account')->attempt([
            'email'    => $credentials['email'],
            'password' => $credentials['password'],
        ], false);

        if (!$authorized) {
            return false;
        }

        return redirect()->route('account.dashboard.index');
    }
}
