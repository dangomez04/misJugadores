<?php

namespace App\Models;

use CodeIgniter\Model;

class PlayerModel extends Model
{
    protected $table = 'jugadores';
    protected $allowedFields = ['nombre', 'liga', 'imagen'];

    public function getPlayers($slug = false)
    {
        if ($slug === false) {
            $sql = $this->select('jugadores.*,liga.*');
            $sql = $this->join('liga','jugadores.liga=liga.idLiga');
            $sql = $this->findAll();
            return $sql;
            }
            $sql = $this->select('jugadores.*,liga.*');
            $sql = $this->join('liga','jugadores.liga=liga.idLiga');
            $sql = $this->where(['slug' => $slug]);
            $sql = $this->first();
            return $sql;
    }

}

class ligaModel extends Model
{
    protected $table = 'liga';
    public function getLigas($slug = false)
    {
        {
            if ($slug === false) {
                return $this->findAll();
            }
    
            return $this->where(['slug' => $slug])->first();
        }
    }
    
}