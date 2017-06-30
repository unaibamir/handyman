<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

use App\Client;
use App\Provider;
use CountryState;
use Input;
use Image;
use function route;
use Validator;

class ClientController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::paginate(10);

        $data = array();
        $data['clients']    =  $clients;


        return view('admin.client.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = CountryState::getStates('US');


        $data = array();
        $data['states']     =  $states;
        return view('admin.client.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ( Client::where('email', '=', Input::get('email'))->exists() ) {
            $request->session()->flash('error', '<strong>Snap!</strong> This client already exists!');
            return redirect()->route('admin.client.create');
        }
        $validator = Validator::make($request->all(), [
            'fname'     =>  'required|max:191',
            'lname'     =>  'required|max:191',
            'username'  =>  'required|unique:clients,username|min:4',
            'email'     =>  'required|email|unique:clients,email',
            'password'  =>  'required|min:6|alpha_dash',
            'location'  =>  'required'
        ]);

        if ( $validator->fails() ) {
            return redirect( route('admin.client.create') )
                ->withErrors($validator)
                ->withInput();
        }

        $client = new Client;
        $client->fname      =   $request->fname;
        $client->lname      =   $request->lname;
        $client->username   =   $request->username;
        $client->password   =   bcrypt($request->password);
        $client->email      =   $request->email;
        $client->bio        =   $request->bio;
        $client->address    =   $request->address;
        $client->phone      =   $request->phone;
        $client->city       =   $request->city;
        $client->state      =   $request->state;
        $client->country    =   $request->country;
        $client->postcode   =   $request->postcode;
        $client->location   =   $request->location;
        $client->latitude   =   $request->latitude;
        $client->longitude  =   $request->longitude;

        $client->save();

        $request->session()->flash('success', '<strong>Well done!</strong> You have successfully added client!');

        return redirect()->route('admin.client.index');

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
        dd($id);
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
    public function destroy($id, Request $request)
    {
        $client = Client::findOrFail($id);
        $client ->delete();

        Session::flash('success', 'Client has been deleted!');

        if( $request->action ) {
            return response()->json(array(
                'status'    =>  202,
                'data'      =>  [
                    'msg'   =>  'Client has been deleted successfully!',
                    'route' =>  route('admin.client.index')
                ]
            ));
        }

    }


    /**
     * Client Filter Function
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * */
    public function filter_client( Request $request ) {
        // TODO
        return view('admin.client.index');
    }

    /**
     * Client Approve Function
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * */
    public function getApprove($id) {
        //dd($id);
        $client = Client::findOrFail($id);
        $client->is_active = 1;
        $client->save();

        Session::flash('success', 'Client has been activated!');
        return redirect()->route('admin.client.index');
    }

    /**
     * Client Disapprove Function
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * */
    public function getDisApprove($id) {
        $client = Client::findOrFail($id);
        $client->is_active = 0;
        $client->save();

        Session::flash('success', 'Client has been deactivated!');
        return redirect()->route('admin.client.index');
    }
}
