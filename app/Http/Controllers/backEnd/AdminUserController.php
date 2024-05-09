<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\authLogin\UserInformations;
use Illuminate\Support\Arr;
use Nette\Utils\Arrays;

use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller

{
    public $listUser = null;

    function __construct()
    {
        $this->listUser = User::all();
    }
    public function index()
    {

        $titlePass = "Danh sách tài khoản";

        return view(
            'backEnd/user/list',
            [
                'titlePass' => $titlePass,
                'listUser' => $this->listUser,
            ]
        );
    }

    public function store()
    {

        $titlePass = "Danh sách tài khoản";


        return view(
            'backEnd/user/list',
            [
                'titlePass' => $titlePass,
                'listUser' => $this->listUser,
            ]
        );
    }

    public function create(Request $request)
    {
        $request->merge(['password' => Hash::make($request->password)]);
        try {
            $user_informations = User::create($request->all());
            $cerate = new UserInformations;
            $cerate->users_id =  $user_informations->id;

            $cerate->save();
        } catch (\Throwable $th) {
            //throw $th;

        }
        return redirect('admin/account/list');
    }

    public function destroy($id)
    {

        User::where('id', $id)->delete();
        return redirect('admin/account/list');

    }

}
