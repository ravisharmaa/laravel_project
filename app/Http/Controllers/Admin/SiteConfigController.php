<?php
/**
 * Created by PhpStorm.
 * User: Pradip
 * Date: 5/29/2017
 * Time: 7:35 AM
 */

namespace App\Http\Controllers\Admin;
use App\Http\Requests\SiteConfigRequest;
use App\Repositories\SiteConfigRepository;
use Illuminate\Http\Request;

class SiteConfigController extends AdminBaseController
{
    private $view_path = 'admin.site-configs';
    private $siteConfig;

    public function __construct(SiteConfigRepository $configRepository)
    {
        parent::__construct();
        $this->siteConfig = $configRepository;
    }

    public function index()
    {
        $site_configs = $this->siteConfig->select(['id','key','value','status']);
        return view($this->view_path.'.index',compact('site_configs'));
    }

    public function create()
    {
        return view($this->view_path.'.create');
    }

    public function save(SiteConfigRequest $request)
    {
        $this->siteConfig->create($request->only(['key','value','status']));
        return redirect()->route('admin.site-configs.index')->with($this->sessionMessage('create'));
    }

    public function changeStatus(Request $request)
    {
       $site_config = $this->siteConfig->findById($request->get('id'));

       if($site_config->status==1){
          $site_config->status = 0;
      } else {
          $site_config->status = 1;
      }
          $site_config->save();
      return response()->json(json_encode([
          'success'=>true,
          'status'=>$site_config->status
      ]));
    }

    public function delete($id)
    {
        $this->siteConfig->delete($id);
        //return redirect()->route('admin.site-configs.index')->with('message','You have successfully deleted a record');
        return redirect()->route('admin.site-configs.index')->with($this->sessionMessage('delete'));
    }

    public function edit($id)
    {
        $site_config = $this->siteConfig->findById($id);
        return view('admin.site-configs.edit',compact('site_config'));
    }

    public function update(Request $request, $id)
    {
        $this->siteConfig->update($id, $request->only(['key','value','status']));
        return redirect()->route('admin.site-configs.index')->with($this->sessionMessage('update'));
    }



}