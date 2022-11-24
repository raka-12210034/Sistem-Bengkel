<?php

namespace App\Controllers;

use App\Controllers\BaseController;
namespace App\Controllers;
use Agoenxz21\Datatables\Datatable;
use App\Models\KaryawanModel;
use CodeIgniter\Email\Email;
use CodeIgniter\Exceptions\PageNotFoundException;
use Config\Email as ConfigEmail;


class KaryawanController extends BaseController
{
    public function login(){
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('sandi');

        $karyawan = (new KaryawanModel())->where('email', $email)->first();

        if($karyawan == null){
            return $this->response->setJSON(['message'=>'Daftar dulu Email nye :)'])
                        ->setStatusCode(404);
        }

        $cekPaswword = password_verify($password, $karyawan['sandi']);
        if($cekPaswword == false){
            return $this->response->setJSON(['message'=>'Email same Passowrd nda cocok '])
                        ->setStatusCode(403);
        }

        $this->session->set('karyawan', $karyawan);
        return $this->response->setJSON(['message'=>"Walee Masok {$karyawan['nama_lengkap']}"])
                    ->setStatusCode(200);
    }

    public function viewLogin(){
        return view('login');
    }

    public function lupaPassword(){
        $_email = $this->request->getPost('email');
        $password = $this->request->getPost('sandi');

        $karyawan = (new KaryawanModel())->where('email', $_email)->first();

        if($karyawan == null){
            return $this->response->setJSON(['message'=>'Email tadak terdaftar'])
                        ->setStatusCode(404);
        }

        $sandibaru =substr( md5( date('Y-m-dH:i:s')),5,5 );
        $karyawan['sandi'] = password_hash($sandibaru,PASSWORD_BCRYPT);
        $r = (new KaryawanModel())->update($karyawan['id'], $karyawan);

        if($r == false ){
            return $this->response->setJSON(['message'=>'Gagal ngubah sandi '])
                        ->setStatusCode(502);
        }

        $email = new Email(new ConfigEmail());
        $email->setFrom('rakarss11@gmail.com', 'Sistem Arsip Digital');
        $email->setTo($karyawan['email']);
        $email->setSubject('Resest sandi karyawan');
        $email->setMessage("Halo {$karyawan['nama']} telah meminta reset baru. Reset baru kamu adalah <b>$sandibaru</b>");
        $r = $email->send();

        if($r == true){
            return $this->response->setJSON(['message'=>"Sandi baru sudah dikirim ke alamat email $_email"])
                                  ->setStatusCode(200);
        }else{
            return $this->response->setJSON(['message'=>"Maaf ada kesalahan pengiriman email $_email"])
                                 ->setStatusCode(500);
        }
    }

    public function viewLupaPassword(){
        return view('lupa_password');
    }

    public function logout(){
        $this->session->destroy();
        return redirect()->to('login');
    }

    public function index()
    {
        return view('backend/Karyawan/table');       
    }
    public function all(){
        $mm = new KaryawanModel();
        $mm->select(['id', 'nama_lengkap', 'email','nohp','alamat','kota','sandi','token_reset','level']);
        
        return (new Datatable ($mm))
                ->setFieldFilter(['nama_lengkap', 'email','nohp','alamat','kota','sandi','token_reset','level'])
                ->draw();
    }
    public function show($id){
        $r = (new KaryawanModel())->where('id', $id)->first();
        if ($r == null) throw PageNotFoundException::forPageNotFound();

        return $this->response->setJSON($r);
    }
    public function store(){
        $mm = new KaryawanModel();

        $id =  $mm -> insert([
            'nama_lengkap'       => $this->request->getVar('nama_lengkap'),
            'email'    => $this->request->getVar('email'),
            'nohp'    => $this->request->getVar('nohp'),
            'alamat'    => $this->request->getVar('alamat'),
            'kota'    => $this->request->getVar('kota'),
            'sandi'    => $this->request->getVar('sandi'),
            'token_reset'    => $this->request->getVar('token_reset'),
            'level'    => $this->request->getVar('level'),
        ]);
        return $this->response->setJSON(['id' => $id])
        ->setStatusCode(intval($id)> 0 ? 200 : 406);  
    }
    public function update(){
        $mm = new KaryawanModel();
        $id = (int)$this->request->getVar('id');
        
        if($mm->find($id) == null)
        throw PageNotFoundException::forPageNotFound();
        
        $hasil = $mm->update($id,[
            'nama_lengkap'       => $this->request->getVar('nama_lengkap'),
            'email'    => $this->request->getVar('email'),
            'nohp'    => $this->request->getVar('nohp'),
            'alamat'    => $this->request->getVar('alamat'),
            'kota'    => $this->request->getVar('kota'),
            'sandi'    => $this->request->getVar('sandi'),
            'token_reset'    => $this->request->getVar('token_reset'),
            'level'    => $this->request->getVar('level'),
        ]);
        return $this->response->setJSON(['result'=>$hasil]);
    }
    public function delete(){
        $mm = new KaryawanModel();
        $id = $this->request->getVar('id');
        $hasil = $mm->delete($id);
        return $this->response->setJSON(['result' => $hasil]);
    }    
}
