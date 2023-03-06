<?php

namespace App\Models;
use Illuminate\Support\Facades\File;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    public function upload($id, $slug, $imagen, $nombre)
    {
        $image_64 = $imagen;//base64 encoded data
        $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1]; // .jpg .png .pdf
        $replace = substr($image_64, 0, strpos($image_64, ',')+1); 
        //buscar subcadena para reemplazar aquí, por ejemplo: data:image/png;base64,
        $imagen = str_replace($replace, '', $image_64); 
        $imagen = str_replace(' ', '+', $imagen); 
        $imagen = base64_decode($imagen);

        $filename = "eliminar." . $extension;
        $filenamePNG = $id . "-" . $slug . ".png";
        file_put_contents('media/'.$nombre.'/'.$filename, $imagen);
        imagepng(imagecreatefromstring(file_get_contents(public_path('media/'.$nombre.'/' . $filename))), public_path('media/'.$nombre.'/' . $filenamePNG));
        File::delete(File::glob(public_path('media/'.$nombre.'/eliminar.*')));
    }

    public function updati($id, $slug, $imagen, $nombre)
    {
        File::delete(File::glob(public_path('media/'.$nombre.'/' . $id . '-*')));
        $this->upload($id, $slug, $imagen, $nombre);
    }

    public function rename($id, $slug_antiguo, $slug, $nombre) {
        FILE::move(public_path('media/'.$nombre.'/' . $id . '-' . $slug_antiguo . '.png'), public_path('media/'.$nombre.'/' . $id . '-' . $slug . '.png'));
    }

    public function deleti($id, $nombre)
    {
        File::delete(File::glob(public_path('media/'.$nombre.'/' . $id . '-*')));
    }
}
