<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LogoutController extends Controller
{


    public function admin()
    {
        Auth::guard('admin')->logout();

        return $this->redirect();
    }


    public function subadmin()
    {
        Auth::guard('subadmin')->logout();

        return $this->redirect();
    }

    public function account()
    {
        Auth::guard('account')->logout();

        return $this->redirect();
    }

    private function redirect()
    {

        return redirect()->route('auth.login')->with('success', ['Sessão encerrada com sucesso!']);;
    }

}
