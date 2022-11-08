<?php

namespace App\Controllers;
use Agoenxz21\Datatables\Datatable;
use App\Controllers\BaseController;
use App\Models\KendaraanModel;
use CodeIgniter\Email\Email;
use CodeIgniter\Exceptions\PageNotFoundException;


use function PHPUnit\Framework\returnSelf;

class KendaraanController extends BaseController
{
    
    public function index()
    {
        return view('Kendaraan/table');       
    }
    public function all(){
        $kgm = KendaraanModel::view();
         
        return (new Datatable($kgm))
        ->setFieldFilter([ 'nama_depan' , 'jenis'])
        ->draw();
    }
    public function show($id){
        $r = (new KendaraanModel())->where('id', $id)->first();
        if ($r == null) throw PageNotFoundException::forPageNotFound();

        return $this->response->setJSON($r);
    }
    public function store(){
        $mm = new KendaraanModel();

        $id =  $mm -> insert([
            'pelanggan_id'       => $this->request->getVar('pelanggan_id'),
            'jeniskendaraan_id'    => $this->request->getVar('jeniskendaraan_id'),
        ]);
        return $this->response->setJSON(['id' => $id])
        ->setStatusCode(intval($id)> 0 ? 200 : 406);  
    }
    public function update(){
        $mm = new KendaraanModel();
        $id = (int)$this->request->getVar('id');
        
        if($mm->find($id) == null)
        throw PageNotFoundException::forPageNotFound();
        
        $hasil = $mm->update($id,[
            'pelanggan_id'       => $this->request->getVar('pelanggan_id'),
            'jeniskendaraan_id'    => $this->request->getVar('jeniskendaraan_id'),
        ]);
        return $this->response->setJSON(['result'=>$hasil]);
    }
    public function delete(){
        $mm = new KendaraanModel();
        $id = $this->request->getVar('id');
        $hasil = $mm->delete($id);
        return $this->response->setJSON(['result' => $hasil]);
    }    
}