<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class ProviderLoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:provider', ['except' => ['logout']]);
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('auth.provider-login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function login(Request $request)
    {

        $this->validate($request, [
            'login'   => 'required|min:4|string',
            'password' => 'required|min:4'
        ]);



        // Attempt to log the provider in
        /*if (Auth::guard('provider')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // if successful, then redirect to their intended location
            return redirect()->intended(route('provider.dashboard'));
        }*/

        if (Auth::guard('provider')->attempt( $this->credentials($request), $request->has('remember') )) {
            // if successful, then redirect to their intended location
            return redirect()->intended(route('provider.dashboard'));
        }

        // if unsuccessful, then redirect back to the login with the form data
        /*return redirect()->back()->withInput($request->only('login', 'remember'));*/
        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::guard('provider')->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect('/');
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        /*return $request->only($this->username(), 'password');*/
        $field = filter_var($request->input($this->username()), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $request->merge([$field => $request->input($this->username())]);

        return $request->only($field, 'password');
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        /*return 'email';*/
        return 'login';
    }

    /**
     * Get the failed login response instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        $errors = [$this->username() => trans('auth.failed')];

        if ($request->expectsJson()) {
            return response()->json($errors, 422);
        }

        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors($errors);
    }
}
