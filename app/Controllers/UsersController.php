<?php

namespace App\Controllers;
use App\Models\UsersModel;


class UsersController extends BaseController
{
    public function session(){
        return \Config\Services::session();
   }
    public function users(){
        return new UsersModel();
    }
    public function store() // Will store the user info
    {
        $validation = \Config\Services::validation();

       $data_list = [ 'fullname' =>  $this->request->getVar('fullname'),
        'address' =>  $this->request->getVar('address'),
        'email' =>  $this->request->getVar('email')
        ];

        if($validation->run($data_list, 'users_errors')){
          
            $data = [
                'name' => $data_list['fullname'],
                'address' => $data_list['address'],
                'email' => $data_list['email'],
            ];
            
            $this->users()->save($data);
            $this->session()->setFlashdata('success', 'User created successfully');
            return redirect()->to('/users/list');
        }else{
            
            $errors = $validation->getErrors();
            $data = [
                "users" => $this->users()->findAll(),
                'validation' => $errors
            ];
            $this->session()->setFlashdata('error', 'Something went wrong');
            return view('users_list', $data);
        }
    }

    public function users_list() // Retrieve the all users
    {
    
        $data = [
            "users" => $this->users()->findAll()
        ];
      
        return view('users_list', $data);
    }
    public function users_edit($id) // Retrieve the specific user
    {
     
      $data  = $this->users()->find($id);

      return view('edit', $data);
    }
    public function users_update($id)  // Update the user
    {

        $fullname =  $this->request->getVar('fullname');
        $address =  $this->request->getVar('address');
        $email =  $this->request->getVar('email');

        $data_list = [
            'id' => $id,
            'name' => $fullname,
            'address' => $address,
            'email' => $email
        ];

        if($this->users()->save($data_list)){
            $this->session()->setFlashdata('success', 'User updated successfully');
        }else{
            $this->session()->setFlashdata('error', 'Something went wrong');
        }
  
       return redirect()->to('/users/list');
      }

      public function users_delete($id)  // Delete the user
      {
       if($this->users()->delete($id)){
            $this->session()->setFlashdata('success', 'User deleted successfully');
       }else{

       }
  
       return redirect()->to('/users/list');
      }
}
