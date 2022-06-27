<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagination = 5;
        $user = User::when($request->keyword, function($query) use ($request){
            $query
            ->where('nama','like',"%{$request->keyword}%")
            ->orWhere('username','like',"%{$request->keyword}%")
            ->orWhere('email','like',"%{$request->keyword}%")
            ->orWhere('tgl_lahir','like',"%{$request->keyword}%")
            ->orWhere('tempat_lahir','like',"%{$request->keyword}%")
            ->orWhere('alamat','like',"%{$request->keyword}}%");
        })->orderBy('id')->paginate($pagination);

        $user->appends($request->only('keyword'));
        return view('user.userIndex',compact('user'))
            ->with('i',($request->input('page',1)-1)*$pagination);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.userCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'required',
            'nama' => 'required',
            'username'=> 'required|string|max:20|unique:users',
            'password' => 'min:8|confirmed|nullable',
            'email' => 'required|email|unique:users',
            'tgl_lahir' => 'required|date',
            'tempat_lahir' => 'string|required',
            'jenis_kelamin' => 'required|string',
            'alamat' => 'required',
        ]);

        $user = new User;
        $user -> nama = $request->nama;
        $user -> username = $request->username;
        $user -> password = Hash::make($request->password);
        $user -> email = $request->email;
        $user -> tgl_lahir = $request->tgl_lahir;
        $user -> tempat_lahir = $request->tempat_lahir;
        $user -> jenis_kelamin = $request->jenis_kelamin;
        $user -> alamat = $request->alamat;

        if ($request->file('foto')) {
            $image_name = $request->file('foto')->store('user','public');
        }
        $user -> foto = $image_name;
        $user->save();

        Alert::success('Success','User Baru Berhasil Ditambahkan');
        return redirect()->route('user.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('user.userDetail',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('user.userEdit',compact('user'));
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
        // dd($request->all());
        $request->validate([
            'nama' => 'required',
            'username'=> 'required|string|max:20|unique:users,username,'.$id,
            'password' => 'min:8|confirmed|nullable',
            'email' => 'required|email|unique:users,email,'.$id,
            'tgl_lahir' => 'required|date',
            'tempat_lahir' => 'string|required',
            'jenis_kelamin' => 'required|string',
            'alamat' => 'required',
        ]);

        $user = User::findOrFail($id);

        if ($request->hasFile('foto')) {
            if ($user->foto && file_exists(storage_path('app/public/'.$user->foto))) {
                Storage::delete('public/'.$user->foto);
            }
            $image_name = $request->file('foto')->store('user','public');
            $user->foto = $image_name;
        }
        $user -> nama = $request->nama;
        $user -> username = $request->username;

        if (!$request->password && !$request->password_confirmation) {

        } else {
            $user->password = Hash::make($request->password);
        }

        $user -> email = $request->email;
        $user -> tgl_lahir = $request->tgl_lahir;
        $user -> tempat_lahir = $request->tempat_lahir;
        $user -> jenis_kelamin = $request->jenis_kelamin;
        $user -> alamat = $request->alamat;
        $user -> save();

        Alert::success('Success','User Berhasil Diupdate');
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        Alert::success('Success','User Berhasil Dihapus');
        return redirect()->route('user.index');
    }
}
