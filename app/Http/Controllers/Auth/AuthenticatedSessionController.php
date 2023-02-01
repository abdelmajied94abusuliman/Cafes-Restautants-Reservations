<?php

namespace App\Http\Controllers\Auth;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Category;

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
        $check_Session = Session::get('Reservatio_last_name');

        if ( $check_Session == ""){
            return redirect('/admin');
        } else {
            $category_id = Session::get('Reservatio_category_id');
            // $categories = Category::get()->where('id' , $category_id );
            // , ['categories'=>$categories , ]
            return redirect("/formPartTwo/$category_id/createPartTwo");
        }

    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/landingPage');
    }
}
