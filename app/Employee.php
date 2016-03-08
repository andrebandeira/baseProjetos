<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Employee extends Model {

    protected $fillable = array('id', 'name', 'email', 'contact_number', 'position');

    public static function getEmployee() {
        $qry = "  SELECT *
                  FROM employees";

        return self::executeQuery($qry);
    }



}
