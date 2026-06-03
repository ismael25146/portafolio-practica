<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        $profile = Profile::first();
        return view('admin.profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $profile = Profile::first();

        $profile->name       = $request->name;
        $profile->title      = $request->title;
        $profile->phone      = $request->phone;
        $profile->email      = $request->email;
        $profile->address    = $request->address;
        $profile->birth_date = $request->birth_date;
        $profile->about      = $request->about;

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('profile', 'public');
            $profile->photo = $path;
        }

        $profile->save();

        return redirect()->route('admin.profile.edit')->with('success', '¡Perfil actualizado correctamente!');
    }
}