<?php

namespace App\Classes\BaseRepositorio;

abstract class BaseRepositorioClass
{
    abstract public function getModel();

    public function find($id)
    {
        return $this->getModel()->where('id', $id)->first();
    }

    public function findAll()
    {
        // dd('Estamos en el base repo...');
        // dd($this->getModel()->orderBy('id', 'desc')->paginate(15));
        return $this->getModel()->orderBy('id', 'desc')->get();
    }

    public function findAllPage()
    {
       
        return $this->getModel()->orderBy('id', 'desc')->paginate(100);
    }

    public function findAllPageFilter()
    {
       
        return $this->getModel()->where('deleted', 0)->orderBy('id', 'asc')->paginate(100);
    }

    public function desactivarlang($data, $campo)
    {
        $objeto = $this->getModel()->where($campo, $data)->get();
        return $objeto->toQuery()->update([
            'active_lang' => '0',
        ]);
    }

    public function create($data)
    {
        return $this->getModel()->create($data);
    }

    public function update($objeto, $data)
    {
        $objeto->fill($data);
        $objeto->save();

        return $objeto;
    }

    public function delete($objeto)
    {
        $objeto->fill(['deleted' => '1']);
        $objeto->save();

        return $objeto;
    }

    public function forLangs($lang_id)
    {
        return $this->getModel()->where('pev_lang_id', $lang_id)->orderBy('id', 'desc')->get();
    }
    

    public function onlyActive()
    {
        return $this->getModel()->where('deleted', 1)->orderBy('id', 'desc')->get();
    }

    public function onlyDeleted()
    {
        return $this->getModel()->where('deleted', 0)->orderBy('id', 'desc')->get();
    }

    public function ultimo()
    {
        $resp = $this->getModel()->get()->last();
        return $resp; 
    }

    public function findMoreLang($id, $lang_id)
    {
        $resp = $this->getModel()->where('id', $id)->first();
        $resp['por_idioma'] = $lang_id;
        return $resp;
    }

    //++++++++++++++++++++++++FUNCIONES DE VALIDACION DE SQL+++++++++++++++++++++++++++++=

    public function ValidarSQL($data)//filtra los registros con deleted = 1
    {
        if($data['deleted'] == 1)
        {
            return [
                'status' => false,
                'msg' => 'Registro no encontrado.',
            ];
        }else {
            $resp = null;
        }
        return $resp; 
    }

    public function maketree($campo, $parent_id)
    {
        $data = $this->getModel()->where($campo, $parent_id)->orderBy('id', 'desc')->get();

        //$cant = sizeof($data);

        // for ($i=0; $i < $cant; $i++) { 
            
        //     $data[$i]['children'] = $this->getModel()->where($campo, $data[$i]['id'])->orderBy('id', 'desc')->get();
        // }
        return $data;
    }
}
