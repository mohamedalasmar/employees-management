<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    //
    public function changePassword(Request $request , $id){
        $user = User::findOrFail($id);
        $this->validate($request,[
            'password'=>'required|string|min:8|confirmed',
        ]);

        $user->update([
            'password'=>Hash::make($request->password)
        ]);

        return redirect()->route('users.index')->with('message','Password Updated Successfully');
    }
}
