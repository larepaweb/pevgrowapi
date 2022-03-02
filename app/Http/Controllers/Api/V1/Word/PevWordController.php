<?php

namespace App\Http\Controllers\Api\V1\Word;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\WordFacade\PevWordFacade;
use App\Http\Resources\WordResource\PevWordResource;
use App\Http\Resources\WordResource\PevWordResourceCollection;
use App\Http\Resources\WordResource\PevWordOneResource;
use App\Http\Resources\WordResource\PevWordOneResourceCollection;
// s

class PevWordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PevWordResourceCollection(PevWordFacade::findAll()->where('deleted', 0));
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
        $resp = new PevWordResource(PevWordFacade::create($data));

        return [
            'status' => true,
            'msg' => 'Word registrado Correctamente.',
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
        return new PevWordOneResource(PevWordFacade::find($id));
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
        $objeto = PevWordFacade::find($id);
        $resp = new PevWordResource(PevWordFacade::update($objeto, $data));

        return [
            'status' => true,
            'msg' => 'Word actualizado Correctamente.',
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
        $objeto = PevWordFacade::find($id);
        $resp = new PevWordResource(PevWordFacade::delete($objeto));

        return [
            'status' => true,
            'msg' => 'Word eliminada Correctamente.',
            'data' => $resp,
        ];
    }
}
