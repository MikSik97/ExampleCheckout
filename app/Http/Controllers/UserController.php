<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_address = new Address();
        $new_address->city = $request->fields['city'];
        $new_address->street = $request->fields['street'];
        $new_address->post_code = $request->fields['postalCode'];
        $new_address->country = $request->fields['country'];
        $new_address->save();

        $new_user = new User();
        $not_unique = DB::table('users')->where('email',$request->fields['email'])->first();
        if(!$not_unique) {
            $new_user->email = $request->fields['email'];
            $new_user->name = $request->fields['name'];
            $new_user->surname = $request->fields['surname'];
            $new_user->password = $request->fields['password'];
            $new_user->address_id = $new_address->id;
            $new_user->phone_number = $request->fields['phone'];
            $new_user->save();
        }
        return [$new_user->id, $new_address->id];
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
}
