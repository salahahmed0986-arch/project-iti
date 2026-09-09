<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        $user->fill([
            'name' => $request->name,
            'email' => $request->email,

            'interests' => $request->interests
                ? array_map('trim', explode(',', $request->interests))
                : [],

            'favorite_topics' => $request->favorite_topics
                ? array_map('trim', explode(',', $request->favorite_topics))
                : [],

            'preferred_categories' => $request->preferred_categories
                ? array_map('trim', explode(',', $request->preferred_categories))
                : [],

            'skills' => $request->skills
                ? array_map('trim', explode(',', $request->skills))
                : [],

            'learning_goals' => $request->learning_goals,
        ]);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

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