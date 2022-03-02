<?php

namespace App\Http\Controllers\Api\V1\Faqs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\FaqFacade\PevFaqCategoryFacade;
use App\Facade\FaqFacade\PevFaqCategoryLangFacade;
use App\Http\Resources\FaqResource\PevFaqCategoryResource;
use App\Http\Resources\FaqResource\PevFaqCategoryResourceCollection;
use App\Http\Resources\FaqResource\PevFaqCategoryOneResource;
use App\Http\Resources\FaqResource\PevFaqCategoryOneResourceCollection;
use App\Http\Requests\FaqRequest\StorePevFaqCategoryRequest;
use App\Http\Requests\FaqRequest\UpdatePevFaqCategoryRequest;

class PevFaqCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PevFaqCategoryResourceCollection(PevFaqCategoryFacade::findAll()->where('deleted', 0));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePevFaqCategoryRequest $request)
    {
        $data = $request->validated();
        $resp = new PevFaqCategoryResource(PevFaqCategoryFacade::create($data));

        return [
            'status' => true,
            'msg' => 'FAQ Category registrado Correctamente.',
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
        $consulta = PevFaqCategoryFacade::find($id);
        return new PevFaqCategoryOneResource($consulta);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePevFaqCategoryRequest $request, $id)
    {
        $data = $request->validated();
        $objeto = PevFaqCategoryFacade::find($id);
        if($data['reordenamiento'] == true){
            dd("aqui puede ir el reordenamiento.");
        }else {
            $resp = new PevFaqCategoryResource(PevFaqCategoryFacade::update($objeto, $data));
        }
        
        

        return [
            'status' => true,
            'msg' => 'FAQ Category actualizado Correctamente.',
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
        $objeto = PevFaqCategoryFacade::find($id);
        $resp = new PevFaqCategoryResource(PevFaqCategoryFacade::delete($objeto));

        return [
            'status' => true,
            'msg' => 'FAQ Category eliminada Correctamente.',
            'data' => $resp,
        ];
    }
}
