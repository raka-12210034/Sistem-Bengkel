<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangjasapemeriksaanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'barangjasapemeriksaan';
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

    static function view(){
        return (new BarangjasapemeriksaanModel())
        ->join('pemeriksaan', 'pemeriksaan.id=pemeriksaan_id')
        ->join('barangjasa', 'barangjasa.id=barangjasa_id')
        ->select('barangjasapemeriksaan.*,pemeriksaan.tgl,barangjasa.nama,');
    }
}
