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
}
