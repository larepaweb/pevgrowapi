<?php

namespace App\Http\Controllers\Api\V1\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\CustomerFacade\PevCustomerGroupFacade;
// use App\Facade\CustomerFacade\PevCustomerGroupLangFacade;
use App\Http\Resources\CustomerResource\PevCustomerGroupResource;
use App\Http\Resources\CustomerResource\PevCustomerGroupResourceCollection;
use App\Http\Resources\CustomerResource\PevCustomerGroupOneResource;
use App\Http\Resources\CustomerResource\PevCustomerGroupOneResourceCollection;
use App\Http\Requests\CustomerRequest\PevCustomerGroupRequestStore;
use App\Http\Requests\CustomerRequest\PevCustomerGroupRequestUpdate;

class PevCustomerGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PevCustomerGroupResourceCollection(PevCustomerGroupFacade::findAll()->where('deleted', 0));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PevCustomerGroupRequestStore $request)
    {
        $data = $request->validated();
        $resp = new PevCustomerGroupResource(PevCustomerGroupFacade::create($data));

        return [
            'status' => true,
            'msg' => 'CustomerGroup registrado Correctamente.',
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
        return new PevCustomerGroupOneResource(PevCustomerGroupFacade::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PevCustomerGroupRequestUpdate $request, $id)
    {
        $data = $request->validated();
        $objeto = PevCustomerGroupFacade::find($id);
        $resp = new PevCustomerGroupResource(PevCustomerGroupFacade::update($objeto, $data));

        return [
            'status' => true,
            'msg' => 'CustomerGroup actualizado Correctamente.',
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
        $objeto = PevCustomerGroupFacade::find($id);
        $resp = new PevCustomerGroupResource(PevCustomerGroupFacade::delete($objeto));

        return [
            'status' => true,
            'msg' => 'CustomerGroup eliminada Correctamente.',
            'data' => $resp,
        ];
    }
}
