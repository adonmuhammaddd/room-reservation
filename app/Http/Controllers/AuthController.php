<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Mail\SendMail;
use App\UserModel;
use File;

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
        $credentials = request(['username', 'password']);

        if (! $token = auth()->attempt($credentials))
        {
            return response()->json(['error' => 'Unauthorized'], 401); 
        }
        $user = DB::table('tbl_user')->where('username', $request->username)->first();

        // if ($user->roleId > 40)
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

        return $this->respondWithToken($token, $result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
