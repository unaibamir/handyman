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
use File;
use Validator;

class ProviderController extends Controller
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
        $providers = Provider::paginate(10);

        $data = array();
        $data['providers']    =  $providers;

        return view('admin.provider.index')->with($data);
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
        return view('admin.provider.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd( getGoogleGeocode($request->location) );
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
        $provider = Provider::find($id);
        if (empty($provider)) {
            return redirect()->route('admin.provider.index');
        }
        //dd($provider);

        $states = CountryState::getStates('US');

        $data['provider']     =   $provider;
        $data['states']     =   $states;
        return view('admin.provider.edit')->with($data);
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
     * @return JSON response
     */
    public function destroy($id)
    {
        $provider = Provider::find($id);
        $provider->delete();
        Session::flash('success', 'Provider has been deleted!');

        if ($request->action) {
            return response()->json(array(
                'status' => 202,
                'data' => [
                    'msg' => 'Provider has been deleted successfully!',
                    'route' => route('admin.handyman.index')
                ]
            ));
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * @return JSON response
     */
    public function delete($id) {
        $provider = Provider::find($id);
        $provider->delete();
        Session::flash('success', 'Provider has been deleted!');

        return redirect()->route('admin.handyman.index');
    }

    /**
     * Provider Filter Function
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * */
    public function getFilterProvider( Request $request ) {

        $data = array();

        $q = Provider::query();

        if($request->has('provider_name')) {
            $q->where('username', 'like', $request->provider_name.'%');
        }
        if($request->has('provider_email')) {
            $q->where('email', '=', $request->provider_email);
        }
        if($request->has('is_approved')) {
            $q->where('is_approved', '=', $request->is_approved);
        }

        $providers              =   $q->paginate(10);
        $data['providers']      =   $providers;
        $data['request']        =   $request;

        /*dd($data['clients']);*/
        return view('admin.provider.index')->with($data);

    }

    /**
     * Provider Activate Function
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * */
    public function getProviderActivate($id) {
        //dd($id);
        $provider = Provider::findOrFail($id);
        $provider->is_active = 1;
        $provider->save();

        Session::flash('success', 'Provider has been activated!');
        return redirect()->route('admin.handyman.index');
    }

    /**
     * Provider Deactivate Function
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * */
    public function getProviderDeactivate($id) {
        $provider = Provider::findOrFail($id);
        $provider->is_active = 0;
        $provider->save();

        Session::flash('success', 'Provider has been deactivated!');
        return redirect()->route('admin.handyman.index');
    }

    /**
     * Provider Approve Function
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * */
    public function getProviderApprove($id) {
        $provider = Provider::findOrFail($id);
        $provider->is_approved = 1;
        $provider->save();

        Session::flash('success', 'Provider has been Approved!');
        return redirect()->route('admin.handyman.index');
    }
}
