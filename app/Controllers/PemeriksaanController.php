<?php

namespace App\Controllers;
use Agoenxz21\Datatables\Datatable;
use App\Controllers\BaseController;
use App\Models\PemeriksaanModel;
use CodeIgniter\Email\Email;
use CodeIgniter\Exceptions\PageNotFoundException;


use function PHPUnit\Framework\returnSelf;

class PemeriksaanController extends BaseController
{
    
    public function index()
    {
        return view('pemeriksaan/table');       
    }
    public function all(){
        $mm = PemeriksaanModel::view();
        
        return (new Datatable ($mm))
                ->setFieldFilter([ 'status'])
                ->draw();
    }
    public function show($id){
        $r = (new PemeriksaanModel())->where('id', $id)->first();
        if ($r == null) throw PageNotFoundException::forPageNotFound();

        return $this->response->setJSON($r);
    }
    public function store(){
        $mm = new PemeriksaanModel();

        $id =  $mm -> insert([
            'tgl'       => $this->request->getVar('tgl'),
            'kendaraan_id'       => $this->request->getVar('kendaraan_id'),
            'statuspemeriksaan_id'       => $this->request->getVar('statuspemeriksaan_id'),
        ]);
        return $this->response->setJSON(['id' => $id])
        ->setStatusCode(intval($id)> 0 ? 200 : 406);  
    }
    public function update(){
        $mm = new PemeriksaanModel();
        $id = (int)$this->request->getVar('id');
        
        if($mm->find($id) == null)
        throw PageNotFoundException::forPageNotFound();
        
        $hasil = $mm->update($id,[
            'tgl'       => $this->request->getVar('tgl'),
            'kendaraan_id'       => $this->request->getVar('kendaraan_id'),
            'statuspemeriksaan_id'       => $this->request->getVar('statuspemeriksaan_id'),
        ]);
        return $this->response->setJSON(['result'=>$hasil]);
    }
    public function delete(){
        $mm = new PemeriksaanModel();
        $id = $this->request->getVar('id');
        $hasil = $mm->delete($id);
        return $this->response->setJSON(['result' => $hasil]);
    }    
}