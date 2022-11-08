<?php

namespace App\Controllers;

use Agoenxz21\Datatables\Datatable;
use App\Controllers\BaseController;
use App\Models\StatuspemeriksaanModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class StatuspemeriksaanController extends BaseController
{
    public function index()
    {
        return view('Statuspemeriksaan/table');       
    }
    public function all(){
        $mm = new StatuspemeriksaanModel();
        $mm->select(['id', 'status', 'urutan']);
        
        return (new Datatable ($mm))
                ->setFieldFilter(['status', 'urutan' ])
                ->draw();
    }
    public function show($id){
        $r = (new StatuspemeriksaanModel())->where('id', $id)->first();
        if ($r == null) throw PageNotFoundException::forPageNotFound();

        return $this->response->setJSON($r);
    }
    public function store(){
        $mm = new StatuspemeriksaanModel();

        $id =  $mm -> insert([
            'status'       => $this->request->getVar('status'),
            'urutan'    => $this->request->getVar('urutan'),
        ]);
        return $this->response->setJSON(['id' => $id])
        ->setStatusCode(intval($id)> 0 ? 200 : 406);  
    }
    public function update(){
        $mm = new StatuspemeriksaanModel();
        $id = (int)$this->request->getVar('id');
        
        if($mm->find($id) == null)
        throw PageNotFoundException::forPageNotFound();
        
        $hasil = $mm->update($id,[
            'status'       => $this->request->getVar('status'),
            'urutan'    => $this->request->getVar('urutan'),
        ]);
        return $this->response->setJSON(['result'=>$hasil]);
    }
    public function delete(){
        $mm = new StatuspemeriksaanModel();
        $id = $this->request->getVar('id');
        $hasil = $mm->delete($id);
        return $this->response->setJSON(['result' => $hasil]);
    }    
}
