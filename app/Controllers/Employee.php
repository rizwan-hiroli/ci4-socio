<?php 
namespace App\Controllers;
use App\Models\EmployeeModel;
use CodeIgniter\Controller;
 
class Employee extends Controller
{
    /**
     * Default method of controller, we are using for listing all records
     */
    public function index(){
        $empModel = new EmployeeModel();
        $returnData['employee'] = $empModel->orderBy('id', 'DESC')->findAll();
        return view('employee/listing', $returnData);
    }
 
    /**
     * To call the form/view of add new record
     */
    public function add(){
        return view('employee/add');
    }
  
 
    /**
     * This function is used to store form data into the database
     */
    public function save() {

        helper(['form', 'url']);

		$error = $this->validate([
			'emp_code'	=>	'required'
		]);

		if(!$error)
		{
			$data['error'] = $this->validator;
        	return view('employee/add', $data);
		}

        $empModel = new EmployeeModel();
        $insertData = [
            'emp_code' => $this->request->getVar('emp_code'),
            'emp_fname' => $this->request->getVar('emp_fname'),
            'emp_lname' => $this->request->getVar('emp_lname'),
            'emp_email' => $this->request->getVar('emp_email'),
            'emp_phone'  => $this->request->getVar('emp_phone'),
            'emp_phone'  => $this->request->getVar('emp_phone'),
            'password'  => $this->request->getVar('password'),
        ];
        $empModel->insert($insertData);
        return $this->response->redirect(site_url('/employee'));
    }
 
 
    /**
     * This function is used to delete a record form from the database
     */
    public function delete($id = null){
        $empModel = new EmployeeModel();
        $empModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('/employee'));
    }   
 
    /**
     * This function is used to load the edit view of a particular record
     */
    public function edit($id = null){
        $empModel = new EmployeeModel();
        $data['employee'] = $empModel->where('id', $id)->first();
        return view('employee/edit', $data);
    }
 
    /**
     * This function is used to update the data of a particular record
     */
    public function update(){
        $empModel = new EmployeeModel();
        $id = $this->request->getVar('id');
        
        helper(['form', 'url']);

		$error = $this->validate([
			'emp_code'	=>	'required'
		]);

		if(!$error)
		{
			$data['employee'] = $empModel->where('id', $id)->first();
        	$data['error'] = $this->validator;
        	return view('employee/edit', $data);
		}

        $updateData = [
           'emp_code' => $this->request->getVar('emp_code'),
           'emp_fname' => $this->request->getVar('emp_fname'),
           'emp_lname' => $this->request->getVar('emp_lname'),
           'emp_email' => $this->request->getVar('emp_email'),
           'emp_phone'  => $this->request->getVar('emp_phone'),
           'emp_phone'  => $this->request->getVar('emp_phone'),
           'password'  => $this->request->getVar('password'),
        ];
        $empModel->update($id, $updateData);

        return $this->response->redirect(site_url('/employee'));
        
    }
  
}