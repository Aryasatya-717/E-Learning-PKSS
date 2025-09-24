<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Departemen;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit', [
            'user' => Auth::user()
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
        ]);

        $user->fill($validated);
        $user->save();

        return redirect()->route('profile.edit')->with('status', 'profile-updated');
    }

    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('profile.edit')->with('status', 'password-updated');
    }

    public function updatePhoto(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'photo' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ]);

        if ($user->profile_photo_path) {
            Storage::disk('public')->delete($user->profile_photo_path);
        }

        $path = $request->file('photo')->store('profile-photos', 'public');

        $user->forceFill([
            'profile_photo_path' => $path,
        ])->save();

        return redirect()->route('profile.edit')->with('status', 'photo-updated');
    }

    public function destroyPhoto()
    {
        $user = Auth::user();

        if (!$user->profile_photo_path) {
            return redirect()->route('profile.edit');
        }

        Storage::disk('public')->delete($user->profile_photo_path);

        $user->forceFill([
            'profile_photo_path' => null,
        ])->save();

        return redirect()->route('profile.edit')->with('status', 'photo-deleted');
    }

    public function show($id)
    {
        $pegawai = User::with(['departemen', 'hasilUjian.ujian'])->findOrFail($id);

        return view('admin.pegawai.show', compact('pegawai'));
    }

    public function editKaryawan($id)
    {
        $pegawai = User::findOrFail($id);
        $departemens = Departemen::all();

        return view('admin.pegawai.editkaryawan', compact('pegawai', 'departemens'));
    }

    public function updateKaryawan(Request $request, $id)
    {
        $pegawai = User::findOrFail($id);

        $validated = $request->validate([
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($pegawai->id),
            ],
            'unit_kerja' => ['nullable', 'string', 'max:255'],
            'departemen_id' => ['required', 'exists:departemens,id'],
        ]);

        $pegawai->update($validated);

        return redirect()->route('pegawai.show', $pegawai->id)
            ->with('status', 'profile-updated-by-admin');
    }

    public function destroy($id)
    {
        $pegawai = User::findOrFail($id);

        if ($pegawai->id === auth()->id()) {
            return redirect()->route('admin.nilai')
                ->with('error', 'Anda tidak dapat menghapus akun Anda sendiri.');
        }

        if ($pegawai->profile_photo_path) {
            Storage::disk('public')->delete($pegawai->profile_photo_path);
        }

        $pegawai->delete();

        return redirect()->route('admin.nilai')
            ->with('success', 'Pegawai berhasil dihapus.');
    }
}
