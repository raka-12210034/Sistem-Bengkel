<?php

namespace App\Models;

use CodeIgniter\CodeIgniter;
use CodeIgniter\Model;

class PemeriksaanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pemeriksaan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    /**
     * @return Model
     */

    static function view(){
        return (new PemeriksaanModel())
        ->join('statuspemeriksaan', 'statuspemeriksaan.id=statuspemeriksaan_id')
        ->select('pemeriksaan.*, statuspemeriksaan.status,');
    }
}
