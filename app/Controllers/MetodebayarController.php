<?php

namespace App\Controllers;
use Agoenxz21\Datatables\Datatable;
use App\Controllers\BaseController;
use App\Models\MetodebayarModel;
use CodeIgniter\Email\Email;
use CodeIgniter\Exceptions\PageNotFoundException;


use function PHPUnit\Framework\returnSelf;

class MetodebayarController extends BaseController
{
    
    public function index()
    {
        return view('Metodebayar/table');       
    }
    public function all(){
        $mm = new MetodebayarModel();
        $mm->select(['id', 'metodebayar']);
        
        return (new Datatable ($mm))
                ->setFieldFilter(['metodebayar'])
                ->draw();
    }
    public function show($id){
        $r = (new MetodebayarModel())->where('id', $id)->first();
        if ($r == null) throw PageNotFoundException::forPageNotFound();

        return $this->response->setJSON($r);
    }
    public function store(){
        $mm = new MetodebayarModel();

        $id =  $mm -> insert([
            'metodebayar'       => $this->request->getVar('metodebayar'),
        ]);
        return $this->response->setJSON(['id' => $id])
        ->setStatusCode(intval($id)> 0 ? 200 : 406);  
    }
    public function update(){
        $mm = new MetodebayarModel();
        $id = (int)$this->request->getVar('id');
        
        if($mm->find($id) == null)
        throw PageNotFoundException::forPageNotFound();
        
        $hasil = $mm->update($id,[
            'metodebayar'       => $this->request->getVar('metodebayar'),
        ]);
        return $this->response->setJSON(['result'=>$hasil]);
    }
    public function delete(){
        $mm = new MetodebayarModel();
        $id = $this->request->getVar('id');
        $hasil = $mm->delete($id);
        return $this->response->setJSON(['result' => $hasil]);
    }    
}