<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    /**
     * Inicia uma transação
     */    
    public function beginTransaction(){
        DB::beginTransaction();
    }
    
    /**
     * Commita uma transação
     */    
    public function commit(){
        DB::commit();
    }    
    
    /**
     * Roolback uma transação
     */    
    public function rollback(){
        DB::rollback();
    } 
}
