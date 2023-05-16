<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Library\FileHandler;
use App\Models\Bank;
use App\Models\BankAccount;
use App\Models\User;
use App\Models\Withdrawal;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $banks = Bank::all();


        return view('profile.edit', [
            'user' => $request->user(),
            'banks' => $banks
        ]);
    }

    public function updateBankAccount(Request $request) {
        $validated = $request->validate([
            'bank' => 'required|exists:banks,code',
            'account_number' => 'required|numeric',
            'account_name' => 'required|string'
        ]);

        $user = $request->user();
        $user->bankAccount()->delete();

        BankAccount::create([...$validated, 'user_id' => $user->id]);

        Alert::success("Bank Account Information Updated!");

        return back();

    }

    public function wallet(Request $request) {
        $user = $request->user()->load(['withdrawals']);

        
        return view('profile.wallet', [
            'user' => $user
        ]);
    }

    public function referrals(Request $request) {
        $user = $request->user();
        $user = User::with(['referrals.user'])->withSum('referrals', 'amount')->find($user->id);
        
        return view('profile.referrals', [
            'user' => $user
        ]);
    }
    /**
     * Update the user's profile information.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|string',
            'phone' => 'required|numeric',
            'image' => 'nullable|image',
            'facebook' => 'nullable|string|url',
            'twitter' => 'nullable|string|url',
            'instagram' => 'nullable|string|url',
            'tiktok' => 'nullable|string|url',
        ]);

        if($request->hasFile('image')){
            $request->user()->image = FileHandler::upload($request->file('image'));
        }

        $request->user()->fill($validated);

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
