<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Auth;
use App\User;
use App\Models\Role;

class UserController extends Controller
{
    public function index()
    {
      $users = User::paginate(6);
      return view('dashboard.user.index', compact('users'));
    } //index view

    public function store(Request $request)
    {
      $user = new User();
      $user->first_name   = $request->first_name;
      $user->last_name    = $request->last_name;
      $user->email        = $request->email;
      $user->password     = bcrypt($request->password);
      $user->last_updated = Auth::user()->id;
      $user->save();

      $user = User::Where('email', $request->email)->first();
      $user->assignRole($request->role);

      return redirect()
        ->route('user.index');
    }// new user

    public function update(Request $request, $id)
    {
      $user = User::find($id);
      $user->first_name   = $request->first_name;
      $user->last_name    = $request->last_name;
      $user->email        = $request->email;
      $user->last_updated = Auth::user()->id;
      $user->syncRoles($request->role);
      $user->save();

      return redirect()
        ->route('user.index');
    }//updated a user

    public function delete($id)
    {
      $user = User::find($id);
      $user->delete();

      return redirect()
        ->route('user.index');
    } //delete user

    public function changePassword($id)
    {
      return view ('dashboard.user.change_password');
    }

    public function changedPassword(Request $request, $id)
    {
      $user = User::find($id);

      $validator = Validator::make($request->all(), [
        'currentPassword' => 'required',
        'newPassword' => 'required|string|min:6|confirmed',
      ]);

      if ($validator->fails()) {
        return redirect()->route('change.password', $user->id)->withErrors($validator);
      }

      $currentPassword = $user->password;

      $checked = Hash::check($request->currentPassword, $currentPassword);

      if ($checked == false)
      {
        return redirect()->route('change.password', $user->id)->with('error-checked', 'La password corrente è errata');
      }

      $user->password = bcrypt($request->newPassword);
      $user->save();

      return redirect()
        ->route('escort.index');
    }
}
