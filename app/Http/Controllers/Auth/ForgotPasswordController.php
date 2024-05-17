<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    
 /**
     * @param \Illuminate\Http\Request $request
     * @param string $response
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function sendResetLinkResponse(Request $request, $response)
    {
        Session::flash('sticky_success', 'Password reset link has been sent to your email.');
        return back()->withInput()->with('sticky_success', 'Password reset link has been sent to your email.');
    }


    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }
}
