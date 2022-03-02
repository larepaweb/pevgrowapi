<?php

namespace App\Http\Controllers\Api\V1\Faqs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\FaqFacade\PevFaqFacade;
use App\Facade\FaqFacade\PevFaqLangFacade;
use App\Http\Resources\FaqResource\PevFaqResource;
use App\Http\Resources\FaqResource\PevFaqResourceCollection;
use App\Http\Resources\FaqResource\PevFaqOneResource;
use App\Http\Resources\FaqResource\PevFaqOneResourceCollection;
use App\Http\Requests\FaqRequest\StorePevFaqRequest;
use App\Http\Requests\FaqRequest\UpdatePevFaqRequest;

class PevFaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PevFaqResourceCollection(PevFaqFacade::findAll()->where('deleted', 0));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePevFaqRequest $request)
    {
        $data = $request->validated();
        $resp = new PevFaqResource(PevFaqFacade::create($data));

        return [
            'status' => true,
            'msg' => 'FAQ registrado Correctamente.',
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
        $consulta = PevFaqFacade::find($id);
        return new PevFaqOneResource($consulta);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePevFaqRequest $request, $id)
    {
        $data = $request->validated();
        $objeto = PevFaqFacade::find($id);
        if($data['reordenamiento'] == true){
            dd("aqui puede ir el reordenamiento.");
        }else {
            $resp = new PevFaqResource(PevFaqFacade::update($objeto, $data));
        }
        

        return [
            'status' => true,
            'msg' => 'FAQ actualizado Correctamente.',
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
        $objeto = PevFaqFacade::find($id);
        $resp = new PevFaqResource(PevFaqFacade::delete($objeto));

        return [
            'status' => true,
            'msg' => 'FAQ  eliminada Correctamente.',
            'data' => $resp,
        ];
    }
}
