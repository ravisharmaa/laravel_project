<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

class AppBaseController extends Controller
{

    public function sessionMessage($state)
    {
        switch ($state){
            case 'create':
                return Session::flash('message','You have successfully created a record');
                break;
            case 'edit':
                return Session::flash('message','You have successfully edited a record');
                break;
            case 'delete':
                return Session::flash('message','You have successfully deleted a record');
                break;
            case 'update':
                return Session::flash('message','You have successfully updated  a record');
                break;
            default:
                return Session::flash('message','Oops something has gone wrong');
        }
    }
}
