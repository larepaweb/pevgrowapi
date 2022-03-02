<?php

namespace App\Http\Controllers\Api\V1\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facade\CustomerFacade\PevCustomerGroupFacade;
use App\Facade\CustomerFacade\PevCustomerGroupLangFacade;
use App\Http\Resources\CustomerResource\PevCustomerGroupLangResource;
use App\Http\Resources\CustomerResource\PevCustomerGroupLangResourceCollection;
use App\Http\Requests\CustomerRequest\PevCustomerGroupLangRequestStore;
use App\Http\Requests\CustomerRequest\PevCustomerGroupLangRequestUpdate;

class PevCustomerGroupLangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $variable = $request->only('por_idioma');

        if(empty($variable['por_idioma'])){
            return new PevCustomerGroupLangResourceCollection(PevCustomerGroupLangFacade::findAll());
        }else {
            return new PevCustomerGroupLangResourceCollection(PevCustomerGroupLangFacade::forLangs($variable['por_idioma']));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PevCustomerGroupLangRequestStore $request)
    {
        $data = $request->validated();
        $cantidad[0] = sizeof($data['name']);
        //--------------------Etapa de creacio del customer con insercion en pev_faq_categories_table---------------------------------

        // $customer = PevCustomerGroupFacade::ultimo();//obtengo el ultimo registro de la tabla para incrementarlo
        // if(empty($customer)){//Verifico si la tabla esta vacia.
        //     $customer = PevCustomerGroupFacade::create(['position' => 1]);
        // }else {
        //     $customer = PevCustomerGroupFacade::create(['position' => $customer->id+1]);
        // }

        $customer = PevCustomerGroupFacade::create($data);
    //--------------------Etapa de creacio del customer con insercion en pev_faq_categories_table---------------------------------
    
    //------------Etapa de creacio del customerLang con insercion en pev_faq_category_langs_table---------------------------------
 
        
        $data['pev_customer_group_id'] = $customer->id;
       
        if($cantidad[0] > 1){//Verificacion del array si el array tiene solo un elemento llama a la funcion traducirGuardar() y si es mayor llama a insertByLangs()
            $resp = new PevCustomerGroupLangResourceCollection(PevCustomerGroupLangFacade::insertByLangs($data, $cantidad));
        }else {

            $data['name'] = $data['name'][0];//convierto este array en una variable string dentro de la clave name
            $resp = new PevCustomerGroupLangResourceCollection(PevCustomerGroupLangFacade::traducirGuardar($data));

        }

        
    //------------Etapa de creacio del customerLang con insercion en pev_faq_customer_langs_table---------------------------------
    
        return [
            'status' => true,
            'msg' => 'customer Lang, registrado Correctamente en todos los Idiomas.',
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
        return new PevCustomerGroupLangResource(PevCustomerGroupLangFacade::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PevCustomerGroupLangRequestUpdate $request, $id)
    {
        $data = $request->validated();
        $objeto = PevCustomerGroupLangFacade::find($id);
        $resp = new PevCustomerGroupLangResource(PevCustomerGroupLangFacade::update($objeto, $data));

        return [
            'status' => true,
            'msg' => 'Customer Lang actualizado Correctamente.',
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
        return ['status' => false, 'msg' => 'Funcionalidad no implementada'];
    }
}
