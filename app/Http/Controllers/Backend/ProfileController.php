<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;
class ProfileController extends Controller
{
    public function index(){

        return view('admin/profile/index');
    }


    public function update(Request $request)
    {
       // dd($request->all());

       $request->validate([
        'name' => ['required','max:120'],
        'email' => ['required','email','unique:users,email,' . Auth::user()->id],
        'image' => ['image','max:2048'],
       ]);

       $user = Auth::user();

       if($request->hasFile('image')){
            //Verifica se existe a imagem se existe apagar ela.
            
        if(File::exists(public_path( $user->image))) {
            File::delete(public_path( $user->image));
        }

         $image = $request->image;
         $imageName = rand().'-painel-'.$image->getClientOriginalExtension();

         $image->move(public_path('uploads'), $imageName);
        //  $user->image = $imageName;
        //Caminho da pasta de imagem
        $path = "/uploads/" . $imageName;
          $user->image = $path;

       }

       $user->name = $request->name;
       $user->email = $request->email;

       $user->save();

       toastr()->success('Dados atualizados com sucesso.');
       return redirect()->back();
    }

    public function updatepassword(Request $request){
           $request->validate([
            'current_password' => ['required','current_password'],
            'password' => ['required','confirmed','confirmed','min:3'],          
           ]);

           $request->user()->update([
            'password' => bcrypt($request->password),

           ]);

         //  return redirect()->back()->with('senhas', 'Senha atualizada com sucesso');
         toastr()->success('Senha atualizada com sucesso');
           return redirect()->back();

    }   
}
