<?php
namespace App\Http\Controllers;

use App\Models\Replies;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

/**
 * Class AutorestestController
 * @package App\Http\Controllers\Admins
 */
    class RepliesController extends Controller
    {
        public function createReply(Request $request){

            $validation = Validator::make($request->all(), 
                [
                    'text' => 'required|max:280',
                ],
                [
                    'text.required' => 'El :attribute es necesario.',
                    'text.max' => 'El :attribute no puede superar los 280 caracteres.',
                ]
            );
        

            if($validation->fails()){
                return back()->withErrors($validation->errors());
            }

            $text = $request->get('text');
            $idUser = $request->get('idUser');
            $idPost = $request->get('idPost');

            Replies::create(['text' => $text]+['idUser' => $idUser]+['idPost' => $idPost]);

            return redirect()->back()->with('success','Su comentario fue realizado correctamente.');
        }
        public function updateReply(Request $request){
            $validation = Validator::make($request->all(), 
                [
                    'text' => 'required|max:280',
                ],
                [
                    'text.required' => 'El :attribute es necesario.',
                    'text.max' => 'El :attribute no puede superar los 280 caracteres.',
                ]
            );
        

            if($validation->fails()){
                return back()->withErrors($validation->errors());
            }

            $id = $request->get('id');
            $text = $request->get('text');

            Replies::find($id)->update(['text' => $text]);

            return redirect()->back()->with('success','Su comentario fue editado correctamente.');
        }
        public function deleteReply($id){

            Replies::find($id)->delete();
    
            return redirect()->back()->with('success','Su comentario fue eliminado correctamente.');
        }
    }

?>