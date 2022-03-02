<?php

namespace App\Classes\FilesClass;

use App\Models\FileModels\PevMedia;
use App\Models\FileModels\PevImageSize;
use Illuminate\Support\Facades\Http;
use App\Classes\BaseRepositorio\BaseRepositorioClass;

class PevMediaClass extends BaseRepositorioClass
{
    public function getModel()
    {
        return new PevMedia;
    }

    public function uploadImage($pev_image_zone_id)
    {

        $sizes = PevImageSize::where('pev_image_zone_id', $pev_image_zone_id)->get();
       if(empty($sizes)){
           $status = false;
           return [
               'status' => $status,
               'data' => "Zona no encontrada"
           ];
       }else {
           $status = true;
       }
        $size_array[] = "";

        $cantidad = sizeof($sizes);

       for ($i=0; $i < $cantidad; $i++) { 
           $size_array[$i] = [
                'path' => $sizes[$i]->ImageZone->folder."".$sizes[$i]->folder,
                'width' => $sizes[$i]->width,
                'height' => $sizes[$i]->height,
           ];
       }

        return [
            
            'data' => $size_array,
            'status' => $status,
        
        ];

        // $path = $folder_first->ImageZone->folder.$folder_first->folder;

        // $data['path'] = $path;
        // $data['url'] = $data['nombre_imagen'];
        // return $data;
        // $response = Http::attach(
        //     'attachment', file_get_contents($data['upload']), $data['nombre_imagen']
        // )->post('http://localhost/Proyectos/pevgrow-imagen/public/api/v1/image_upload', [
        //     'nombre_imagen' => $data['nombre_imagen'],
        //     'path' => $path,
        //     'width' => $folder_first->width,
        //     'height' => $folder_first->height,
        // ]);

        // $response = Http::withHeaders([
        //     'Content-Type' => 'multipart/form-data',
           
        // ])->post('http://localhost/Proyectos/pevgrow-imagen/public/api/v1/image_upload', [
        //     'upload' => $file,
        //     'nombre_imagen' => $data['nombre_imagen'],
        //     'path' => $path,
        //     'width' => $folder_first->width,
        //     'height' => $folder_first->height,
        // ]);

        // $response = Http::asForm()->post('http://localhost/Proyectos/pevgrow-imagen/public/api/v1/image_upload', [
        //     'upload' => $file,
        //     'nombre_imagen' => $data['nombre_imagen'],
        //     'path' => $path,
        //     'width' => $folder_first->width,
        //     'height' => $folder_first->height,
        // ]);
        // dd($response->json());
    }
}