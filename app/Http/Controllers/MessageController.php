<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        if(!$req->ajax()) {
            return view("messages.index");
        }
        
        $messages = Message::all();
        $data_tables = DataTables::of($messages)
            ->addIndexColumn()
            ->addColumn('action', function($row) {
                return '<a href="'.route("message.destroy", ["id" => $row->id]).'">Delete</a>';
            })
            ->editColumn('message', function($m) {
                return Str::limit($m->message, 20);
            })
            ->editColumn('name', function($m) {
                return '<a href="'.route("messages.show", $m->id).'">'.$m->name.'</a>';
            })
            ->rawColumns(['action', 'name'])
            ->make(true);

        return $data_tables;
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
            "messages" => ['required'],
        ]);

        Message::create([
            "name" => $req->name,
            "email" => $req->email,
            "message" => $req->messages,
        ]);

        return redirect("/");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = Message::find($id);
        return view("messages.show", [
            "message" => $message
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Message::find($id)->delete();
        return redirect()->route("messages.index");
    }
}
