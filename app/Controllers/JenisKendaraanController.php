<?php

namespace App\Controllers;
use Agoenxz21\Datatables\Datatable;
use App\Controllers\BaseController;
use App\Models\JenisKendaraanModel;
use CodeIgniter\Exceptions\PageNotFoundException;

use function PHPUnit\Framework\returnSelf;

class JenisKendaraanController extends BaseController
{
    
    public function index()
    {
        return view('JenisKendaraan/table');       
    }
    public function all(){
        $mm = new JenisKendaraanModel();
        $mm->select(['id', 'jenis']);
        
        return (new Datatable ($mm))
                ->setFieldFilter(['jenis'])
                ->draw();
    }
    public function show($id){
        $r = (new JenisKendaraanModel())->where('id', $id)->first();
        if ($r == null) throw PageNotFoundException::forPageNotFound();

        return $this->response->setJSON($r);
    }
    public function store(){
        $mm = new JenisKendaraanModel();

        $id =  $mm -> insert([
            'jenis'       => $this->request->getVar('jenis'),
        ]);
        return $this->response->setJSON(['id' => $id])
        ->setStatusCode(intval($id)> 0 ? 200 : 406);  
    }
    public function update(){
        $mm = new JenisKendaraanModel();
        $id = (int)$this->request->getVar('id');
        
        if($mm->find($id) == null)
        throw PageNotFoundException::forPageNotFound();
        
        $hasil = $mm->update($id,[
            'jenis'       => $this->request->getVar('jenis'),
        ]);
        return $this->response->setJSON(['result'=>$hasil]);
    }
    public function delete(){
        $mm = new JenisKendaraanModel();
        $id = $this->request->getVar('id');
        $hasil = $mm->delete($id);
        return $this->response->setJSON(['result' => $hasil]);
    }    
}