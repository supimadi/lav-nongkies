<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{

    private $DEFAULT_ROUTE_NAME = "users-index";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {

        if(!$req->ajax()) {
            return view("users.index");
        }

        $users = User::where("is_admin", "=", "0")->get(["id", "name", "email"]);
        $dataTables = DataTables::of($users)
            ->addIndexColumn()
            ->addColumn('action', function($row) {
                return '<a href="'.route("users-edit", ["id" => $row->id]).'">Edit</a>';
            })
            ->rawColumns(['action'])
            ->make(true);

        return $dataTables;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("users.create", [
            "user" => new User()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $req->validate([
            "name" => ['required', 'string', 'max:100'],
            "email" => ['required', 'email'],
            "password" => ['required'],
        ]);

        User::create([
            "name" => $req->name,
            "email" => $req->email,
            "password" => Hash::make($req->password),
        ]);

        return redirect()->route($this->DEFAULT_ROUTE_NAME);
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
        return view("users.create", [
            "user" => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $req->validate([
            "name" => ['required', 'string', 'max:100'],
            "email" => ['required', 'email'],
        ]);
        
        $user = User::find($id);

        $user->name = $req->name;
        $user->email = $req->email;

        $user->save();

        return redirect()->route($this->DEFAULT_ROUTE_NAME);
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
        
        return redirect()->route($this->DEFAULT_ROUTE_NAME);
    }
}
