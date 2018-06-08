<?php

namespace App\Http\Controllers;

use App\Models\TwoFa;
use Auth;
use Illuminate\Http\Request;

class TwoFactorController extends Controller
{
    public function authenticated()
    {
        $user = Auth::user();
        $user->token_2fa_expiry = \Carbon\Carbon::now();
        $user->save();
        return redirect('/admin');
    }
}
    