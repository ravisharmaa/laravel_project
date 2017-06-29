<?php
/**
 * Created by PhpStorm.
 * User: Pradip
 * Date: 6/7/2017
 * Time: 10:48 PM
 */
namespace App\Http\Controllers\Admin;
use App\User;


use App\Repositories\UserProfileRepository;
use Illuminate\Http\Request;

class UserProfileController extends AdminBaseController
{
    private $view_path='admin.user-profile';
    private $user_profile;
    private $location  = 'user/images/';

    public function __construct(UserProfileRepository $userProfileRepository)
    {
        $this->user_profile = $userProfileRepository;
    }

    public function index()
    {
        $users = $this->user_profile->usersWithProfile();
        return view($this->view_path.'.index',compact('users'));
    }

    public function create()
    {
        return view($this->view_path.'.create');
    }

    public function save(Request $request)
    {
        $imageName = $this->imageSave($request);
        $this->user_profile->create($request->except('_token'),$imageName);
        return redirect()->route('admin.user-profile.index')->with($this->sessionMessage('create'));
    }

    public function retrieveImage($imageFile)
    {
        return parent::serveImage($imageFile, $this->location);
    }

    public function edit($id)
    {
       $user = $this->user_profile->findByUserId($id);
       return view($this->view_path.'.edit',compact('user'));
    }

    public function update(Request $request,$id)
    {
        $imageName = $this->imageSave($request);
        $user = $this->user_profile->update($request->except('_token','_method'),$id,$imageName);
            if($user=='not-allowed'){
                return redirect()->route('admin.user-profile.index')->with($this->sessionMessage('not-allowed'));
            }
        return redirect()->route('admin.user-profile.index')->with($this->sessionMessage('update'));

    }

    public function imageSave(Request $request)
    {
        $imageName = null;
        if($request->hasFile('user_image')){
            $image= $request->file('user_image');
            $user_name= str_slug($request->get('username'));
            $ext = $image->guessClientExtension();
            $image->storeAs('user/images','user_image_'.$user_name.'.'.$ext);
            $imageName = 'user_image_'.$user_name.'.'.$ext;
        }
        return $imageName;
    }

    public function delete($id)
    {
      $this->user_profile->delete($id);
      return redirect()->route('admin.user-profile.index')->with($this->sessionMessage('delete'));

    }




}