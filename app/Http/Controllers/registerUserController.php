<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class registerUserController extends Controller
{
    public function index ()
    {
        $user = User::all();
        return view('backend.register.index', compact('user'));
    }

    public function store (Request $request, $id=null)
    {
        try {
            if($id){
                $user = User::where('id', $id)->with([])->first();
                if(!$user){
                    return redirect()->back()->with([
                        'message'   => 'Tidak ada user dengan id tersebut',
                        'style'     => 'danger'
                    ]);
                }
                $user->name = $request->name;
                $user->user_role = $request->user_role ;
                $user->jenis_kelamin = $request->jenis_kelamin;
                $user->email = $request->email;
                $user->password_exist = $request->password_exist;
                $user->password = Hash::make($request->password_exist);
                $user->save();

                return redirect()->back()->with([
                    'message'   => 'Update user success',
                    'style'     => 'success'
                ]);
            }

            $user = new User();
            $user->name = $request->name;
            $user->user_role = $request->user_role ;
            $user->jenis_kelamin = $request->jenis_kelamin;
            $user->email = $request->email;
            $user->password = Hash::make('qwerty');
            $user->save();

            return redirect()->back()->with([
                'style' => 'success',
                'message' => "Data Successfully Added"
            ]);
        } catch (\Throwable $th) {
            $message = $th->getMessage();
            return redirect()->back()->with([
                'message'   => $message,
                'style'     => 'danger'
            ]);
        }
    }
    public function deleteUser($id)
    {
        try {
            $user = User::where('id', $id)->with([])->first();
            $user->delete();
            return redirect()->back()->with([
                'style' => 'success',
                'message' => "Delete user Successfully"
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with([
                'style' => 'success',
                'message' => "Delete user error :".$e->getMessage()
            ]);
        }
    }
}
