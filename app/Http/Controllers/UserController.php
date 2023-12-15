<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Food;


class UserController extends Controller
{
    /**
     * Check if current user is admin.
     *
     * @return Boolean true/false
     */
    public function GetIsAdmin()
    {
        return Auth::id() && Auth::user()->usertype == "1" ? true : false;
    }

    /**
     * Display a listing of the user entry.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::id() ? Auth::user() : null;
        $isAdmin = $this->GetIsAdmin();
        $data = $isAdmin === true ? user::all() : null;
        return view("admin.pages.user", compact("data", "isAdmin", "user"));
    }

    /**
     * Remove the specified user entry from storage.
     *
     * @param  $user->id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user)
    {
        $isAdmin = $this->GetIsAdmin();
        if ($isAdmin === true) {
            $data = user::findOrFail($user);
            $data->delete();
            return redirect()->back();
        }
        return redirect()->route('user.index')->with('msg', 'User deleted successfully');
    }
    public function getArray()
    {
        $fooddata = food::all();
        $data = [
            'message' => 'Hello, this is a simple array from the UserController to get food item!',
            'values' => $fooddata,
        ];

        return response()->json($data);
    }

}
