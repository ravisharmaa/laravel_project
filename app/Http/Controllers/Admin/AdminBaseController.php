<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class AdminBaseController extends AppBaseController
{

    public $view_path;

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $row = $this->getData();
        return view($this->view_path.'.index',compact('row'));
    }

    public function serveImage($filename, $imagePath)
    {
        $path = $this->getStoragePath($imagePath,$filename);
        if (!File::exists($path)) {
            abort(404);
        }
        $file = File::get($path);
        $type = File::mimeType($path);
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        return $response;
    }

    public function getStoragePath($location,$filename)
    {
        return storage_path('app\\'.$location .$filename);
    }
}
