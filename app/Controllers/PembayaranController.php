<?php

namespace App\Controllers;
use Agoenxz21\Datatables\Datatable;
use App\Controllers\BaseController;
use App\Models\PembayaranModel;
use CodeIgniter\Email\Email;
use CodeIgniter\Exceptions\PageNotFoundException;


use function PHPUnit\Framework\returnSelf;

class PembayaranController extends BaseController
{
    
    public function index()
    {
        return view('backend/Pembayaran/table');       
    }
    public function all(){
        $kgm = PembayaranModel::view();
         
        return (new Datatable($kgm))
        ->setFieldFilter([ 'tgl', 'tgl_byr' , 'metodebayar','dibayaroleh','catatan','nama_lengkap','total_bayar'])
        ->draw();
    }
    public function show($id){
        $r = (new PembayaranModel())->where('id', $id)->first();
        if ($r == null) throw PageNotFoundException::forPageNotFound();

        return $this->response->setJSON($r);
    }
    public function store(){
        $mm = new PembayaranModel();

        $id =  $mm -> insert([
            'pemeriksaan_id'       => $this->request->getVar('pemeriksaan_id'),
            'tgl_byr'       => $this->request->getVar('tgl_byr'),
            'metodebayar_id'    => $this->request->getVar('metodebayar_id'),
            'dibayaroleh'    => $this->request->getVar('dibayaroleh'),
            'catatan'    => $this->request->getVar('catatan'),
            'karyawan_id'    => $this->request->getVar('karyawan_id'),
            'total_bayar'    => $this->request->getVar('total_bayar'),
        ]);
        return $this->response->setJSON(['id' => $id])
        ->setStatusCode(intval($id)> 0 ? 200 : 406);  
    }
    public function update(){
        $mm = new PembayaranModel();
        $id = (int)$this->request->getVar('id');
        
        if($mm->find($id) == null)
        throw PageNotFoundException::forPageNotFound();
        
        $hasil = $mm->update($id,[
            'pemeriksaan_id'       => $this->request->getVar('pemeriksaan_id'),
            'tgl_byr'       => $this->request->getVar('tgl_byr'),
            'metodebayar_id'    => $this->request->getVar('metodebayar_id'),
            'dibayaroleh'    => $this->request->getVar('dibayaroleh'),
            'catatan'    => $this->request->getVar('catatan'),
            'karyawan_id'    => $this->request->getVar('karyawan_id'),
            'total_bayar'    => $this->request->getVar('total_bayar'),
        ]);
        return $this->response->setJSON(['result'=>$hasil]);
    }
    public function delete(){
        $mm = new PembayaranModel();
        $id = $this->request->getVar('id');
        $hasil = $mm->delete($id);
        return $this->response->setJSON(['result' => $hasil]);
    }    
}