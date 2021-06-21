<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use CodeIgniter\I18n\Time;

class User extends BaseController
{
  protected $userModel;

  public function __construct()
  {
    $this->userModel = new UsersModel();
  }

  public function index()
  {
    $uri = $this->uri->getSegment(1);
    $email = session()->get('email');

    $user = $this->userModel->where(['email' => $email])->first();

    $data = [
      'title' => 'User',
      'user' => $user,
      'uri' => $uri
    ];

    return view('user/index', $data);
  }

  public function edit()
  {
    $uri = $this->uri->getSegment(1);
    $gender = ['Pria', 'Wanita'];
    $email = session()->get('email');
    $user = $this->userModel->where(['email' => $email])->first();

    $data = [
      'title' => 'Edit Profile',
      'gender' => $gender,
      'user' => $user,
      'uri' => $uri,
      'validation' => \Config\Services::validation()
    ];


    return view('user/edit', $data);
  }

  public function update()
  {
    if (!$this->validate([
      'fullname' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Nama lengkap wajib diisi.'
        ]
      ],
      'birthday' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Tanggal lahir wajib diisi.'
        ]
      ]
    ])) {
      return redirect()->to('user/edit')->withInput();
    }

    $birthday = Time::parse($this->request->getVar('birthday'));

    $fullname = htmlspecialchars($this->request->getVar('fullname'));
    $birthday = $birthday->getTimestamp();
    $gender = $this->request->getVar('gender');

    $this->userModel->set('fullname', $fullname);
    $this->userModel->set('birthday', $birthday);
    $this->userModel->set('gender', $gender);
    $this->userModel->where('email', session()->get('email'));
    $this->userModel->update();

    session()->setFlashdata('pesanSuccess', 'Data berhasil diperbarui.');

    return redirect()->to('/user');
  }

  public function changepassword()
  {
    $uri = $this->uri->getSegment(2);

    $data = [
      'title' => 'Ubah Password',
      'uri' => $uri,
      'validation' => \Config\Services::validation()
    ];

    return view('user/changepassword', $data);
  }

  public function changePass()
  {
    if (!$this->validate([
      'oldpass' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Password lama wajib diisi.'
        ]
      ],
      'password1' => [
        'rules' => 'required|min_length[3]|max_length[16]|matches[password2]',
        'errors' => [
          'required' => 'Password baru wajib diisi.',
          'min_length' => 'Password harus lebih dari 2 karakter.',
          'max_length' => 'Password tidak boleh lebih dari 16 karakter.',
          'matches' => 'Password tidak sama.'
        ]
      ],
      'password2' => [
        'rules' => 'required|matches[password1]',
        'errors' => [
          'required' => 'Password baru wajib diisi.',
          'matches' => 'Password tidak sama.'
        ]
      ]
    ])) {
      return redirect()->to('/user/changepassword')->withInput();
    }

    $email = session()->get('email');
    $user = $this->userModel->where(['email' => $email])->first();
    $oldPass = $this->request->getVar('oldpass');
    $newPass = $this->request->getVar('password1');

    if (!password_verify($oldPass, $user['password_hash'])) {
      session()->setFlashdata('pesanError', 'Password salah.');

      return redirect()->to('/user/changepassword');
    } else {
      if ($oldPass == $newPass) {
        session()->setFlashdata('pesanError', 'Password lama tidak boleh sama dengan Password baru.');

        return redirect()->to('/user/changepassword');
      } else {
        $password_hash = password_hash($newPass, PASSWORD_DEFAULT);

        $this->userModel->set('password_hash', $password_hash);
        $this->userModel->where('email', $email);
        $this->userModel->update();

        session()->setFlashdata('pesanSuccess', 'Password berhasil diubah.');

        return redirect()->to('/user');
      }
    }
  }
}
