<?php
namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

/**
 * Class AutorestestController
 * @package App\Http\Controllers\Admins
 */
    class ProfileController extends Controller
    {
        public function updateProfile(Request $request){
            $validation = Validator::make($request->all(), 
                [
                    'text' => 'required|max:280',
                    'title' => 'required|max:50'
                ],
                [
                    'text.required' => 'El :attribute es necesario.',
                    'text.max' => 'El :attribute no puede superar los 280 caracteres.',
                    'title.required' => 'El :attribute es necesario.',
                    'title.max' => 'El :attribute no puede superar los 50 caracteres.',
                ]
            );
        

            if($validation->fails()){
                return back()->withErrors($validation->errors());
            }

            $id = $request->get('id');
            $title = $request->get('title');
            $text = $request->get('text');

            Posts::find($id)->update(['title' => $title]+['text' => $text]);

            return redirect()->back()->with('success','Su publicación fue editada correctamente.');
        }
        public function getProfile($id){
            $posts = DB::table('posts as p')
                ->select('p.*','u.name')
                ->join('users as u','u.id','p.idUser')
                ->orderBy('created_at','desc')
                ->where('p.idUser','=',$id)
                ->get();
            return view('profile')->with(compact('posts'));
        }
    }

?>