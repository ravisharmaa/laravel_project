<?php
/**
 * Created by PhpStorm.
 * User: Pradip
 * Date: 6/7/2017
 * Time: 10:51 PM
 */

namespace App\Repositories;
use App\Model\UserProfile;
use App\User;
use Carbon\Carbon;

class UserProfileRepository
{
    private $user_profile;
    private $user;

    public function __construct(User $userModel, UserProfile $userProfile)
    {
        $this->user_profile = $userProfile;
        $this->user= $userModel;
    }

    public function usersWithProfile()
    {
        $userWithProfile = $this->user->select(
            'users.id',
            'users.name',
            'users.email',
            'users_profile.user_id',
            'users_profile.firstname',
            'users_profile.lastname',
            'users_profile.user_image',
            'users_profile.phone_number',
            'users_profile.address'
        )->leftJoin('users_profile','users_profile.user_id','=','users.id')->get();
        return $userWithProfile;
    }

    public function create(array $data, $imageName)
    {
        $user = $this->user->create([
            'name'=>str_slug($data['name']),
            'email'=>$data['email'],
            'password'=>$data['password']
        ]);

        $this->user_profile->create([
            'user_id'       =>    $user->id,
            'firstname'       =>  $data['firstname'],
            'lastname'        =>  $data['lastname'],
            'address'         =>  $data['address'],
            'phone_number'    =>  $data['phone_number'],
            'user_image'      => $imageName,
            'last_login'      =>  Carbon::now()
        ]);
        return $user;

    }


    public function update($data,$id,$image)
    {
        $user = $this->findByUserId($id);
            if($user->users_profile!=null) {
                $user->users_profile->firstname = $data['firstname'];
                $user->users_profile->lastname = $data['lastname'];
                $user->users_profile->address = $data['address'];
                $user->users_profile->phone_number = $data['phone_number'];
                $user->users_profile->user_image = ($image == null ? $user->users_profile->user_image : $image);
                $user->users_profile->save();
                $user->name = $data['name'];
                $user->email = $data['email'];
                $user->save();
                return $user;
            }
        return 'not-allowed';

    }

    public function findByUserId($id)
    {
        return $this->user->find($id);
    }

    public function delete($id)
    {
        $user_profile= $this->findByUserId($id);
        $user_profile->delete();
        return $user_profile;
    }

}