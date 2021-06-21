<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use CodeIgniter\I18n\Time;

class Auth extends BaseController
{
  protected $userModel;

  public function __construct()
  {
    $this->userModel = new UsersModel();
  }
  public function index()
  {
    $data = [
      'title' => 'Login',
      'validation' => \Config\Services::validation()
    ];

    return view('auth/index', $data);
  }

  public function login()
  {
    if (!$this->validate([
      'email' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Email / Username wajib diisi.',
        ]
      ],
      'password' => [
        'rules' => 'required',
        'errors ' => [
          'required' => 'Password wajib diisi.'
        ]
      ]
    ])) {
      return redirect()->to('/')->withInput();
    }

    $email = $this->request->getVar('email');
    $password = $this->request->getVar('password');

    $user = $this->userModel->where(['email' => $email])->first();
    if ($user) {
      if ($user['is_active'] == 1) {
        if (password_verify($password, $user['password_hash'])) {
          $data = [
            'email' => $user['email'],
            'role_id' => $user['role_id']
          ];

          session()->set($data);

          return redirect()->to('/user');
        } else {
          session()->setFlashdata('pesanError', 'Password salah.');
          return redirect()->to('/')->withInput();
        }
      } else {
        session()->setFlashdata('pesanError', 'Email belum diaktivasi.');
        return redirect()->to('/')->withInput();
      }
    } else {
      session()->setFlashdata('pesanError', 'Email belum terdaftar.');
      return redirect()->to('/')->withInput();
    }
  }

  public function registration()
  {
    $gender = ['Pria', 'Wanita'];
    $data = [
      'title' => 'Registration',
      'validation' => \Config\Services::validation(),
      'gender' => $gender
    ];

    return view('auth/registration', $data);
  }

  public function regist()
  {
    if (!$this->validate([
      'fullname' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Nama lengkap wajib diisi.'
        ]
      ],
      'email' => [
        'rules' => 'required|is_unique[users.email]|valid_email',
        'errors' => [
          'required' => 'Email wajib diisi.',
          'is_unique' => 'Email sudah terdaftar.',
          'valid_email' => 'Email yang digunakan harus valid.'
        ]
      ],
      'password1' => [
        'rules' => 'required|min_length[3]|max_length[16]|matches[password2]',
        'errors' => [
          'required' => 'Password wajib diisi.',
          'min_length' => 'Password harus lebih dari 3 karakter.',
          'max_length' => 'Password harus kurang dari 16 karakter.',
          'matches' => 'Password tidak sama.'
        ]
      ],
      'password2' => [
        'rules' => 'required|matches[password1]',
        'errors' => [
          'required' => 'Konfirmasi password wajib diisi.',
          'matches' => 'Password tidak sama.'
        ]
      ],
      'birthday' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Tanggal lahir wajib diisi.'
        ]
      ]
    ])) {
      return redirect()->to('/registration')->withInput();
    }

    $birthday = Time::parse($this->request->getVar('birthday'));

    $this->userModel->save([
      'email' => htmlspecialchars($this->request->getVar('email')),
      'fullname' => htmlspecialchars($this->request->getVar('fullname')),
      'password_hash' => password_hash($this->request->getVar('password1'), PASSWORD_DEFAULT),
      'birthday' => $birthday->getTimestamp(),
      'gender' => $this->request->getVar('gender'),
      'role_id' => 2,
      'is_active' => 1
    ]);

    session()->setFlashdata('pesanSuccess', 'Akun berhasil dibuat. Silahkan login.');

    return redirect()->to('/auth');
  }

  public function logout()
  {
    $data = ['email', 'role_id'];

    session()->remove($data);

    session()->setFlashdata('pesanSuccess', 'Akun anda berhasil logout.');

    return redirect()->to('/');
  }
}
