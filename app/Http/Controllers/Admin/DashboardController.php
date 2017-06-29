<?php
/**
 * Created by PhpStorm.
 * User: Pradip
 * Date: 5/29/2017
 * Time: 7:35 AM
 */

namespace App\Http\Controllers\Admin;


class DashboardController extends AdminBaseController
{
    public $view_path = 'admin.dashboard';

    public function index()
    {
        return view($this->view_path.'.index');
    }
}