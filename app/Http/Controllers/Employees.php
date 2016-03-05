<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class Employees extends Controller {

    public function teste(Array $request) {
        $x = $_GET;
        $a = '1';
        return 'epa';
    }

    public function teste2(Array $request) {
        $a = '2';
        return 'uhhu';
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        try {
            return Employee::getEmployee();
        } catch (\Exception $e) {
            return 'Erro';
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Array $request) {
        try {
            $this->beginTransaction();
            $employee = new Employee;

            $employee->name = $request['name'];
            $employee->email = $request['email'];
            $employee->contact_number = $request['contact_number'];
            $employee->position = $request['position'];
            $employee->save();
            
            $this->commit();
        } catch (\Exception $e) {
            $this->rollback();
            return $e->getMessage();
        }

        return 'Employee record successfully created with id ' . $employee->id;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        return Employee::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Array $request) {
        $employee = Employee::find($id);

        $employee->name = $request->input('name');
        $employee->email = $request->input('email');
        $employee->contact_number = $request->input('contact_number');
        $employee->position = $request->input('position');
        $employee->save();

        return "Sucess updating user #" . $employee->id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request) {
        $employee = Employee::find($request->input('id'));

        $employee->delete();

        return "Employee record successfully deleted #" . $request->input('id');
    }

}
