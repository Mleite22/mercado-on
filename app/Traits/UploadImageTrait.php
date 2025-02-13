<?php
namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

trait UploadImageTrait
{
    public function uploadImage(Request $request, $inputName, $path)
    {
        if ($request->hasFile($inputName)) {

            $image = $request->{$inputName};
            $extension = $image->getClientOriginalExtension();
            $day = date("d");
            $month = date("m");
            $year = date("Y");
            $imageName = 'media_' . uniqid() . '-mldsigne-' . $day . '-' . $month . '-' . $year . '-.' . $extension;
            $image->move(public_path($path), $imageName);
            //Caminho da pasta de imagens
            
            return $path .'/'. $imageName;
        }
    }

    public function updateImage(Request $request, $inputName, $path, $oldPath = null)
    {
        if ($request->hasFile($inputName)) {

            //Se existe uma foto na pasta, deleta e substitui
            if (File::exists(public_path($oldPath))) {
                File::delete(public_path($oldPath));
            }

            $image = $request->{$inputName};
            $extension = $image->getClientOriginalExtension();
            $day = date("d");
            $month = date("m");
            $year = date("Y");
            $imageName = 'media_' . uniqid() . '-mldsigne-' . $day . '-' . $month . '-' . $year . '-.' . $extension;
            $image->move(public_path($path), $imageName);
            //Caminho da pasta de imagens
            
            return $path .'/'. $imageName;
        }
    }
    public function deleteImage(string $path){
        if (File::exists(public_path($path))) {
            File::delete(public_path($path));
        }
    }
}