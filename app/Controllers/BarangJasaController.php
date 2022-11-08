<?php

namespace App\Controllers;
use Agoenxz21\Datatables\Datatable;
use App\Controllers\BaseController;
use App\Models\BarangJasaModel;
use CodeIgniter\Email\Email;
use CodeIgniter\Exceptions\PageNotFoundException;


use function PHPUnit\Framework\returnSelf;

class BarangjasaController extends BaseController
{
    
    public function index()
    {
        return view('barangjasa/table');       
    }
    public function all(){
        $mm = new BarangJasaModel();
        $mm->select(['id', 'nama']);
         
        return (new Datatable($mm))
        ->setFieldFilter([ 'nama'])
        ->draw();
    }
    public function show($id){
        $r = (new BarangJasaModel())->where('id', $id)->first();
        if ($r == null) throw PageNotFoundException::forPageNotFound();

        return $this->response->setJSON($r);
    }
    public function store(){
        $mm = new BarangJasaModel();

        $id =  $mm -> insert([
            'nama'       => $this->request->getVar('nama'),
        ]);
        return $this->response->setJSON(['id' => $id])
        ->setStatusCode(intval($id)> 0 ? 200 : 406);  
    }
    public function update(){
        $mm = new BarangJasaModel();
        $id = (int)$this->request->getVar('id');
        
        if($mm->find($id) == null)
        throw PageNotFoundException::forPageNotFound();
        
        $hasil = $mm->update($id,[
            'nama'       => $this->request->getVar('nama'),
        ]);
        return $this->response->setJSON(['result'=>$hasil]);
    }
    public function delete(){
        $mm = new BarangJasaModel();
        $id = $this->request->getVar('id');
        $hasil = $mm->delete($id);
        return $this->response->setJSON(['result' => $hasil]);
    }    
}