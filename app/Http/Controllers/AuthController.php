<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Mail\SendMail;
use App\UserModel;
use File;
use Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwtmiddleware', ['except' => ['index', 'login']]);
    }
    
    public function index()
    {
        $title = 'Gakkum - Login';

        return view('welcome', compact('title'));
    }

    public function login(Request $request)
    {
        // dd(array($request->all()));
        // $credentials = request(['username', 'password']);
        if (Auth::attempt($request->only('username', 'password'))){
            if (Auth::user()->roleId != 40)
            {
                return redirect('/room/index');
            }
            else
            {
                return redirect('/booking/index');
            }
        }
        else
        {
            return redirect('/');
        }
        // if (! $token = auth()->attempt($credentials))
        // {
        //     return response()->json(['error' => 'Unauthorized'], 401); 
        // }

        // $user = DB::table('tbl_user')->where('username', $request->username)->first();

        // if ($user->roleId == 10)
        // {
        //     $result = DB::table('tbl_user')
        //             ->select('tbl_user.id', 'tbl_user.nama', 'tbl_user.NIP', 'tbl_user.email', 'tbl_user.username', 'tbl_user.foto', 'tbl_user.roleId', 'tbl_user.roleName')
        //             ->where('username', $request->username)
        //             ->first();
        // }
        // else
        // {
        //     $result = DB::table('tbl_user')
        //             ->join('tbl_satker', 'tbl_user.satkerId', '=', 'tbl_satker.id')
        //             ->select('tbl_user.id', 'tbl_user.nama', 'tbl_user.NIP', 'tbl_user.satkerId', 'tbl_user.email', 'tbl_user.username', 'tbl_user.foto', 'tbl_user.roleId', 'tbl_user.roleName', 'tbl_satker.namaSatker')
        //             ->where('username', $request->username)
        //             ->first();
        // }

        // return $this->respondWithToken($token, $result);
    }

    public function create(Request $request)
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    protected function respondWithToken($token, $result)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
        redirect('/booking/get-data');
    }
}
