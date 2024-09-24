<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;


class ProfileController extends Controller
{
    //Ver perfil do ususario
    public function index()
    {
        return view('admin/profile/index');
    }

    //Atualizar profile com foto
    public function update(Request $request)
    {
        //Validação
        // dd($request->all());
        $request->validate([
            'name' => ['required', 'max:100'],
            'email' => ['required', 'email', 'unique:users,email,' . Auth::user()->id],
            'image' => ['image', 'max:2048'],

        ]);
        //Atualizar
        $user = Auth::user(); // Adiciona uma dica de tipo
        /** @var \App\Models\User $user */
        
        if($request->hasFile('image')){

            //Se existe uma foto na pasta, deleta e substitui
            if(File::exists(public_path( $user->image))){
                File::delete(public_path( $user->image));

            }

            $image = $request->image;
            $imageName = rand() . '-mldesigner-' . $image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);
            //Caminho da pasta de imagens
            $path = "/uploads/" . $imageName;
            $user->image = $path;
        }

        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        flash()->success('Perfil atualizado com sucesso!');
        //return redirect()->back()->with('success', 'Perfil atualizado com sucesso!');
        return redirect()->back();
    }

    public function updatePassword(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'min:8', 'confirmed'],
        ]);
        // Atualização
        $request->user()->update([
            'password' => bcrypt($request->password),
        ]);
        flash()->success('Senha atualizada com sucesso!');
        //return redirect()->back()->with('successSenha', 'Senha atualizada com sucesso!');
        return redirect()->back();
        
    }
}
