<?php

namespace App\Http\Controllers\Api\V1\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\CustomerFacade\PevCustomerFacade;
// use App\Facade\CustomerFacade\PevCustomerLangFacade;
use App\Http\Resources\CustomerResource\PevCustomerResource;
use App\Http\Resources\CustomerResource\PevCustomerResourceCollection;
use App\Http\Requests\CustomerRequest\PevCustomerRequestStore;
use App\Http\Requests\CustomerRequest\PevCustomerRequestUpdate;


class PevCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PevCustomerResourceCollection(PevCustomerFacade::findAll()->where('deleted', 0));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PevCustomerRequestStore $request)
    {
        $data = $request->validated();
        $resp = new PevCustomerResource(PevCustomerFacade::create($data));

        return [
            'status' => true,
            'msg' => 'Customer registrado Correctamente.',
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
        return new PevCustomerResource(PevCustomerFacade::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PevCustomerRequestUpdate $request, $id)
    {
        $data = $request->validated();
        $objeto = PevCustomerFacade::find($id);
        $resp = new PevCustomerResource(PevCustomerFacade::update($objeto, $data));

        return [
            'status' => true,
            'msg' => 'Customer actualizado Correctamente.',
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
        $objeto = PevCustomerFacade::find($id);
        $resp = new PevCustomerResource(PevCustomerFacade::delete($objeto));

        return [
            'status' => true,
            'msg' => 'Customer eliminada Correctamente.',
            'data' => $resp,
        ];
    }
}
