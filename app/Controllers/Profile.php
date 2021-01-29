<?php

namespace App\Controllers;

use App\Models\ProfileModel;

class Profile extends BaseController
{
  public function index()
  {
    $profile = new ProfileModel();
    $profile->findAll();
    $data = [];
    return view('admin/dashboard/profile');
  }

  public function show()
  {
    $id = user_id();
    $profile = new ProfileModel();
    $data = [
      'profile_data' => $profile->find($id),
    ];
    if ($data['profile_data']) {
      session()->setFlashData('page', 'profile');
      session()->setFlashData('section', 'show_profile');
      return view('profile/show_profile', $data);
    } else {
      session()->setFlashData('test_err', 'Profile not found');
      return redirect()->to(base_url(route_to('dashboard')));
    }
  }

  public function create()
  {
    $id = user_id();
    $profile = new ProfileModel();
    $data = [
      'id' => $id,
    ];
    if (!$profile->find($id)) {
      session()->setFlashData('page', 'profile');
      session()->setFlashData('section', 'create_profile');
      return view('profile/create_profile', $data);
    } else {
      session()->setFlashData('test_err', 'Profile already exists');
      return redirect()->to(base_url(route_to('dashboard')));
    }
  }

  public function store()
  {
    $id = user_id();

    $data = [
      'id' => $id,
      'name' => $this->request->getPost('name'),
      'age' => $this->request->getPost('age'),
      'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
      'no_hp' => $this->request->getPost('no_hp'),
      'bio' => $this->request->getPost('bio')
    ];
    $profile = new ProfileModel();
    if (!$profile->find($id)) {
      $profile->insert($data);
      session()->setFlashData('test', 'Profile created');
      return redirect()->to(base_url(route_to('dashboard')));
    } else {
      session()->setFlashData('test_err', 'Profile already exists');
      return redirect()->to(base_url(route_to('dashboard')));
    }
  }


  public function edit()
  {
    $id = user_id();
    $profile = new ProfileModel();
    $data = [
      'profile_data' => $profile->find($id),
    ];
    if ($data['profile_data']) {
      session()->setFlashData('page', 'profile');
      session()->setFlashData('section', 'edit_profile');
      return view('profile/edit_profile', $data);
    } else {
      session()->setFlashData('test_err', 'Profile not found');
      return redirect()->to(base_url(route_to('dashboard')));
    }
  }

  public function update()
  {
    $id = user_id();
    if (!$this->validate([
      'name' => 'required',
      'age' => 'required',
      'jenis_kelamin' => 'required',
      'no_hp' => 'required',
    ])) {
      $profile = new ProfileModel();
      $data = [
        'profile_data' => $profile->find($id),
        'errors' => $this->validator->getErrors(),
      ];
      return view('profile/edit_profile', $data);
    }
    $data = [
      'name' => $this->request->getPost('name'),
      'age' => $this->request->getPost('age'),
      'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
      'no_hp' => $this->request->getPost('no_hp'),
      'bio' => $this->request->getPost('bio')
    ];
    $profile = new ProfileModel();
    if ($profile->update($id, $data)) {
      session()->setFlashData('test', 'Update Profile Successful');
      return redirect()->to(base_url(route_to('dashboard')));
    } else {
      session()->setFlashData('test_err', 'Update Profile Failed');
      return redirect()->to(base_url(route_to('dashboard')));
    }
  }
}
