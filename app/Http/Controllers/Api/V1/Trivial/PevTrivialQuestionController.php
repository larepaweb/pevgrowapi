<?php

namespace App\Http\Controllers\Api\V1\Trivial;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\TrivialFacade\PevTrivialQuestionFacade;
use App\Http\Resources\TrivialResource\PevTrivialQuestionResource;
use App\Http\Resources\TrivialResource\PevTrivialQuestionResourceCollection;
use App\Http\Resources\TrivialResource\PevTrivialQuestionOneResource;
use App\Http\Resources\TrivialResource\PevTrivialQuestionOneResourceCollection;

class PevTrivialQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PevTrivialQuestionResourceCollection(PevTrivialQuestionFacade::findAll()->where('deleted', 0));

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
        $resp = new PevTrivialQuestionResource(PevTrivialQuestionFacade::create($data));

        return [
            'status' => true,
            'msg' => 'TrivialQuestion registrado Correctamente.',
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
        return new PevTrivialQuestionOneResource(PevTrivialQuestionFacade::find($id));
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
        $objeto = PevTrivialQuestionFacade::find($id);
        $resp = new PevTrivialQuestionResource(PevTrivialQuestionFacade::update($objeto, $data));

        return [
            'status' => true,
            'msg' => 'TrivialQuestion actualizado Correctamente.',
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
        $objeto = PevTrivialQuestionFacade::find($id);
        $resp = new PevTrivialQuestionResource(PevTrivialQuestionFacade::delete($objeto));

        return [
            'status' => true,
            'msg' => 'TrivialQuestion eliminada Correctamente.',
            'data' => $resp,
        ];
    }
}
