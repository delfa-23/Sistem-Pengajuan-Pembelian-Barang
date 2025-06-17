<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\facades\Storage;

class UserController extends Controller
{
    public function edit()
    {
            $user = Auth::user();
            return view('profile.edit', compact('user'));
        }

    public function update(Request $request)
    {
        if (Auth::user()->role !== 'admin' && !Auth::user()->hasVerifiedEmail()) {
            return back()->with('error', 'Silakan verifikasi email terlebih dahulu sebelum mengubah profil.');
        }


        $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg',
        ]);

        $user = Auth::user();
        $user->name = $request->name;

        if ($request->hasFile('photo')) {
        $file = $request->file('photo');
        $filename = 'profile_' . $user->id . '_' . time() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('public/profile', $filename);
        $user->photo_url = 'storage/profile/' . $filename;

        \App\Models\Gallery::create([
            'images' => 'profile/' . $filename,
            'title' => 'Foto Profil',
            'user_id' => $user->id,
        ]);
    }

        $user->save();

        if ($user->role == 'manajer') {
    return redirect()->route('dashboard.manajer')->with('success', 'Profil berhasil diperbarui');
    } elseif ($user->role == 'admin') {
        return redirect()->route('admin.dashboard')->with('success', 'Profil berhasil diperbarui');
    }

return redirect()->route('dashboard.karyawan')->with('success', 'Profil berhasil diperbarui');

    }
    // UserController.php

public function editPassword()
{
    return view('profile.edit-password');
}

public function updatePassword(Request $request)
{
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|min:3|confirmed',
    ]);

    $user = Auth::user();

    if (!Hash::check($request->current_password, $user->password)) {
        return back()->withErrors(['current_password' => 'Password saat ini salah.']);
    }

    $user->password = Hash::make($request->new_password);
    $user->save();

    return redirect()->route('profile.edit')->with('success', 'Password berhasil diperbarui.');
}


}

