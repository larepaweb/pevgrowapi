<?php

namespace App\Http\Controllers\Api\V1\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\CMSFacade\PevCMSFacade;
use App\Http\Resources\CMSResource\PevCMSResource;
use App\Http\Resources\CMSResource\PevCMSResourceCollection;
use App\Http\Resources\CMSResource\PevCmsOneResource;
use App\Http\Resources\CMSResource\PevCmsOneResourceCollection;
use App\Http\Requests\CMSRequest\StorePevCMSRequest;
use App\Http\Requests\CMSRequest\UpdatePevCMSRequest;

class PevCMSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PevCMSResourceCollection(PevCMSFacade::findAll()->where('deleted', 0));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePevCMSRequest $request)
    {
        $data = $request->validated();
        $resp = new PevCMSResource(PevCMSFacade::create($data));

        return [
            'status' => true,
            'msg' => 'CMS registrado Correctamente.',
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
        return new PevCmsOneResource(PevCMSFacade::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePevCMSRequest $request, $id)
    {
        $data = $request->validated();
        $objeto = PevCMSFacade::find($id);
        $resp = new PevCMSResource(PevCMSFacade::update($objeto, $data));

        return [
            'status' => true,
            'msg' => 'CMS actualizado Correctamente.',
            'data' => $resp,
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
        $objeto = PevCMSFacade::find($id);
        $resp = new PevCMSResource(PevCMSFacade::delete($objeto));

        return [
            'status' => true,
            'msg' => 'CMS eliminada Correctamente.',
            'data' => $resp,
        ];
    }
}
