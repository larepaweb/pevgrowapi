<?php

namespace App\Http\Controllers\Api\V1\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\CustomerFacade\PevAddressFacade;
// use App\Facade\CustomerFacade\PevAddressLangFacade;
use App\Http\Resources\CustomerResource\PevAddressResource;
use App\Http\Resources\CustomerResource\PevAddressResourceCollection;
use App\Http\Requests\CustomerRequest\PevAddressRequestStore;
use App\Http\Requests\CustomerRequest\PevAddressRequestUpdate;

class PevAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PevAddressResourceCollection(PevAddressFacade::findAll()->where('deleted', 0));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PevAddressRequestStore $request)
    {
        $data = $request->validated();
        $resp = new PevAddressResource(PevAddressFacade::create($data));

        return [
            'status' => true,
            'msg' => 'Address registrado Correctamente.',
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
        return new PevAddressResource(PevAddressFacade::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PevAddressRequestUpdate $request, $id)
    {
        $data = $request->validated();
        $objeto = PevAddressFacade::find($id);
        $resp = new PevAddressResource(PevAddressFacade::update($objeto, $data));

        return [
            'status' => true,
            'msg' => 'Address actualizado Correctamente.',
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
        $objeto = PevAddressFacade::find($id);
        $resp = new PevAddressResource(PevAddressFacade::delete($objeto));

        return [
            'status' => true,
            'msg' => 'Address eliminada Correctamente.',
            'data' => $resp,
        ];
    }
}
