<?php

namespace App\Controllers;
use Agoenxz21\Datatables\Datatable;
use App\Controllers\BaseController;
use App\Models\WarnaKendaraanModel;
use CodeIgniter\Exceptions\PageNotFoundException;

use function PHPUnit\Framework\returnSelf;

class WarnaKendaraanController extends BaseController
{
    
    public function index()
    {
        return view('WarnaKendaraan/table');       
    }
    public function all(){
        $mm = new WarnaKendaraanModel();
        $mm->select(['id', 'warna']);
        
        return (new Datatable ($mm))
                ->setFieldFilter(['warna'])
                ->draw();
    }
    public function show($id){
        $r = (new WarnaKendaraanModel())->where('id', $id)->first();
        if ($r == null) throw PageNotFoundException::forPageNotFound();

        return $this->response->setJSON($r);
    }
    public function store(){
        $mm = new WarnaKendaraanModel();

        $id =  $mm -> insert([
            'warna'       => $this->request->getVar('warna'),
        ]);
        return $this->response->setJSON(['id' => $id])
        ->setStatusCode(intval($id)> 0 ? 200 : 406);  
    }
    public function update(){
        $mm = new WarnaKendaraanModel();
        $id = (int)$this->request->getVar('id');
        
        if($mm->find($id) == null)
        throw PageNotFoundException::forPageNotFound();
        
        $hasil = $mm->update($id,[
            'warna'       => $this->request->getVar('warna'),
        ]);
        return $this->response->setJSON(['result'=>$hasil]);
    }
    public function delete(){
        $mm = new WarnaKendaraanModel();
        $id = $this->request->getVar('id');
        $hasil = $mm->delete($id);
        return $this->response->setJSON(['result' => $hasil]);
    }    
}