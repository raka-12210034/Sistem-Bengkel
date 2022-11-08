<?php

namespace App\Controllers;
use Agoenxz21\Datatables\Datatable;
use App\Controllers\BaseController;
use App\Models\PelangganModel;
use CodeIgniter\Email\Email;
use CodeIgniter\Exceptions\PageNotFoundException;


use function PHPUnit\Framework\returnSelf;

class PelangganController extends BaseController
{
    
    public function index()
    {
        return view('Pelanggan/table');       
    }
    public function all(){
        $mm = new PelangganModel();
        $mm->select(['id', 'nama_depan']);
        
        return (new Datatable ($mm))
                ->setFieldFilter(['nama_depan'])
                ->draw();
    }
    public function show($id){
        $r = (new PelangganModel())->where('id', $id)->first();
        if ($r == null) throw PageNotFoundException::forPageNotFound();

        return $this->response->setJSON($r);
    }
    public function store(){
        $mm = new PelangganModel();

        $id =  $mm -> insert([
            'nama_depan'       => $this->request->getVar('nama_depan'),
        ]);
        return $this->response->setJSON(['id' => $id])
        ->setStatusCode(intval($id)> 0 ? 200 : 406);  
    }
    public function update(){
        $mm = new PelangganModel();
        $id = (int)$this->request->getVar('id');
        
        if($mm->find($id) == null)
        throw PageNotFoundException::forPageNotFound();
        
        $hasil = $mm->update($id,[
            'nama_depan'       => $this->request->getVar('nama_depan'),
        ]);
        return $this->response->setJSON(['result'=>$hasil]);
    }
    public function delete(){
        $mm = new PelangganModel();
        $id = $this->request->getVar('id');
        $hasil = $mm->delete($id);
        return $this->response->setJSON(['result' => $hasil]);
    }    
}