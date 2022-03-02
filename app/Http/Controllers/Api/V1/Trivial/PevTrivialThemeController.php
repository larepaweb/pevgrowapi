<?php

namespace App\Http\Controllers\Api\V1\Trivial;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\TrivialFacade\PevTrivialThemeFacade;
use App\Http\Resources\TrivialResource\PevTrivialThemeResource;
use App\Http\Resources\TrivialResource\PevTrivialThemeResourceCollection;
use App\Http\Resources\TrivialResource\PevTrivialThemeOneResource;
use App\Http\Resources\TrivialResource\PevTrivialThemeOneResourceCollection;
use App\Http\Resources\TrivialResource\PevTrivialThemeOneForLangResource;
use App\Http\Resources\TrivialResource\PevTrivialThemeOneForLangResourceCollection;

class PevTrivialThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PevTrivialThemeResourceCollection(PevTrivialThemeFacade::findAll()->where('deleted', 0));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $resp = new PevTrivialThemeResource(PevTrivialThemeFacade::create($data));

        return [
            'status' => true,
            'msg' => 'TrivialTheme registrado Correctamente.',
            'data' => $resp,
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $data = $request->only('por_idioma');
        $lang_id = $data['por_idioma'];
        if(empty($lang_id)){
            return new PevTrivialThemeOneResource(PevTrivialThemeFacade::find($id));
        }else {
            return new PevTrivialThemeOneForLangResource(PevTrivialThemeFacade::findMoreLang($id, $lang_id ));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $objeto = PevTrivialThemeFacade::find($id);
        $resp = new PevTrivialThemeResource(PevTrivialThemeFacade::update($objeto, $data));

        return [
            'status' => true,
            'msg' => 'TrivialTheme actualizado Correctamente.',
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
        $objeto = PevTrivialThemeFacade::find($id);
        $resp = new PevTrivialThemeResource(PevTrivialThemeFacade::delete($objeto));

        return [
            'status' => true,
            'msg' => 'TrivialTheme eliminada Correctamente.',
            'data' => $resp,
        ];
    }
}
