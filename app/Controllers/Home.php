<?php

namespace App\Controllers;
use App\Models\ligaModel;
use App\Models\PlayerModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Home extends BaseController
{
    public function index(): string
    {
        $model = model(PlayerModel::class);
        $modelLiga = model(ligaModel::class);
        $data = [
          'jugadores' => $model->getPlayers(),
          'ligas' => $modelLiga->getLigas(),
      ];
          return view('header')
            . view('index',$data);
    }

    public function create(){
        helper('form');

        $nombre = $this->request->getPost('nombre');
        $nivel = $this->request->getPost('nivel');

        $model = model(PlayerModel::class);
        $model->save([
            'nombre' => $nombre,
            'liga' => $nivel,
            'imagen' => "prueba.jpg",
        ]);
        return redirect()->to('./');

       
    }



    public function delete($id){

        if($id == null){
            throw new PageNotFoundException('Cannot delete the item');
        }

        $model = model(playerModel::class);
        if($model->where('id',$id)->find()){
            $model->where('id',$id)->delete();
        }else{
            throw new PageNotFoundException('Selected item does not exist in database'); 
        }

       return redirect()->to('./');

    }
}
