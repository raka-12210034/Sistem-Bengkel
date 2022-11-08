<?php

namespace App\Controllers;
use Agoenxz21\Datatables\Datatable;
use App\Controllers\BaseController;
use App\Models\UnitsatuanModel;
use CodeIgniter\Exceptions\PageNotFoundException;

use function PHPUnit\Framework\returnSelf;

class UnitsatuanController extends BaseController
{
    
    public function index()
    {
        return view('Unitsatuan/table');       
    }
    public function all(){
        $mm = new UnitsatuanModel();
        $mm->select(['id', 'satuan']);
        
        return (new Datatable ($mm))
                ->setFieldFilter(['satuan'])
                ->draw();
    }
    public function show($id){
        $r = (new UnitsatuanModel())->where('id', $id)->first();
        if ($r == null) throw PageNotFoundException::forPageNotFound();

        return $this->response->setJSON($r);
    }
    public function store(){
        $mm = new UnitsatuanModel();

        $id =  $mm -> insert([
            'satuan'       => $this->request->getVar('satuan'),
        ]);
        return $this->response->setJSON(['id' => $id])
        ->setStatusCode(intval($id)> 0 ? 200 : 406);  
    }
    public function update(){
        $mm = new UnitsatuanModel();
        $id = (int)$this->request->getVar('id');
        
        if($mm->find($id) == null)
        throw PageNotFoundException::forPageNotFound();
        
        $hasil = $mm->update($id,[
            'satuan'       => $this->request->getVar('satuan'),
        ]);
        return $this->response->setJSON(['result'=>$hasil]);
    }
    public function delete(){
        $mm = new UnitsatuanModel();
        $id = $this->request->getVar('id');
        $hasil = $mm->delete($id);
        return $this->response->setJSON(['result' => $hasil]);
    }    
}