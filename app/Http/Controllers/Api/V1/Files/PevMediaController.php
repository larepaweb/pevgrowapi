<?php

namespace App\Http\Controllers\Api\V1\Files;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\FilesFacade\PevMediaFacade;
use App\Http\Resources\FileResource\PevMediaResource;
use App\Http\Resources\FileResource\PevMediaResourceCollection;
use App\Http\Requests\FileRequest\StorePevMediaRequest;
use App\Http\Requests\FileRequest\UpdatePevMediaRequest;

class PevMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PevMediaResourceCollection(PevMediaFacade::findAll()->where('deleted', 0));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePevMediaRequest $request)
    {
        $data = $request->all();
        $data['url'] = implode(",", $data['url']);
        // dd($data);
        // $file = request()->file('upload');
        // $zone = PevMediaZone::where()
        // $sizes = PevMediaFacade::uploadImage($data);
        // return $sizes;
        $resp = new PevMediaResource(PevMediaFacade::create($data));

        return [
            'status' => true,
            'msg' => 'Imagen Guardada en el servidor S3 Correctamente.',
            'data' => $resp,

        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new PevMediaResource(PevMediaFacade::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePevMediaRequest $request, $id)
    {
        $data = $request->validated();

        $data['url'] = implode(",", $data['url']);
        $objeto = PevMediaFacade::find($id);
        $resp = new PevMediaResource(PevMediaFacade::update($objeto, $data));

        return [
            'status' => true,
            'msg' => 'Imagen Actualizada Correctamente.',
            'data' => $resp, //->response()->setStatusCode(Response::HTTP_CREATED),
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $objeto = PevMediaFacade::find($id);
        $resp = new PevMediaResource(PevMediaFacade::delete($objeto));

        return [
            'status' => true,
            'msg' => 'Imagen eliminada Correctamente.',
            'data' => $resp,
        ];
    }

    public function pathSizes($pev_image_zone_id)
    {
        $data = PevMediaFacade::uploadImage($pev_image_zone_id);

        return [
            'status' => $data['status'],
            'data' => $data['data']
        ];
    }
}
