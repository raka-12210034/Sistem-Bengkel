<?php

namespace App\Controllers;
use Agoenxz21\Datatables\Datatable;
use App\Controllers\BaseController;
use App\Models\BarangjasapemeriksaanModel;
use CodeIgniter\Email\Email;
use CodeIgniter\Exceptions\PageNotFoundException;


use function PHPUnit\Framework\returnSelf;

class BarangjasapemeriksaanController extends BaseController
{
    
    public function index()
    {
        return view('Barangjasapemeriksaan/table');       
    }
    public function all(){
        $kgm = BarangjasapemeriksaanModel::view();
         
        return (new Datatable($kgm))
        ->setFieldFilter([ 'tgl' , 'nama', 'qty', 'harga_satuan'])
        ->draw();
    }
    public function show($id){
        $r = (new BarangjasapemeriksaanModel())->where('id', $id)->first();
        if ($r == null) throw PageNotFoundException::forPageNotFound();

        return $this->response->setJSON($r);
    }
    public function store(){
        $mm = new BarangjasapemeriksaanModel();

        $id =  $mm -> insert([
            'pemeriksaan_id'       => $this->request->getVar('pemeriksaan_id'),
            'barangjasa_id'    => $this->request->getVar('barangjasa_id'),
            'qty'    => $this->request->getVar('qty'),
            'harga_satuan'    => $this->request->getVar('harga_satuan'),
        ]);
        return $this->response->setJSON(['id' => $id])
        ->setStatusCode(intval($id)> 0 ? 200 : 406);  
    }
    public function update(){
        $mm = new BarangjasapemeriksaanModel();
        $id = (int)$this->request->getVar('id');
        
        if($mm->find($id) == null)
        throw PageNotFoundException::forPageNotFound();
        
        $hasil = $mm->update($id,[
            'pemeriksaan_id'       => $this->request->getVar('pemeriksaan_id'),
            'barangjasa_id'    => $this->request->getVar('barangjasa_id'),
            'qty'    => $this->request->getVar('qty'),
            'harga_satuan'    => $this->request->getVar('harga_satuan'),
        ]);
        return $this->response->setJSON(['result'=>$hasil]);
    }
    public function delete(){
        $mm = new BarangjasapemeriksaanModel();
        $id = $this->request->getVar('id');
        $hasil = $mm->delete($id);
        return $this->response->setJSON(['result' => $hasil]);
    }    
}