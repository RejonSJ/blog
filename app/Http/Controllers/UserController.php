<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

/**
 * Class AutorestestController
 * @package App\Http\Controllers\Admins
 */
    class UserController extends Controller
    {
        public function updateName(Request $request){
            $validation = Validator::make($request->all(), 
                [
                    'name' => 'required|max:255',
                ],
                [
                    'name.required' => 'El :attribute es necesario.',
                    'name.max' => 'El :attribute no puede superar los 255 caracteres.',
                ]
            );
        

            if($validation->fails()){
                return back()->withErrors($validation->errors());
            }

            $id = $request->get('id');
            $name = $request->get('name');

            User::find($id)->update(['name' => $name]);

            return redirect()->back()->with('success','Su nombre fue actualizado correctamente.');
        }
        public function updatePassword(Request $request){
            $validation = Validator::make($request->all(), 
                [
                    'password' => 'required|min:8',
                ],
                [
                    'password.min' => 'El :attribute debe ser de al menos 8 caracteres.',
                ]
            );
        

            if($validation->fails()){
                return back()->withErrors($validation->errors());
            }

            $id = $request->get('id');
            $password = $request->get('password');
            $oldPassword = $request->get('oldPassword');

            $user = DB::table('users as u')
                ->where('id','=',$id)
                ->first();

            if(Hash::check($oldPassword,$user->password)) {
                User::find($id)->update(['passwords' => Hash::make($password)]);

                return redirect()->back()->with('success','Su contraseña fue actualizada correctamente.');
            } else {
                return redirect()->back()->with('error','Su contraseña actual es incorrecta');
            }
        }
    }

?>