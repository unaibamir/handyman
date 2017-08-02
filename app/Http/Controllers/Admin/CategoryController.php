<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Session;
use App\Category;
use App\Provider;
use App\Client;
use CountryState;
use Input;
use Image;
use File;
use Validator;

class CategoryController extends Controller
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
        $data = array();
        $categories = Category::paginate(10);
        $data['categories']    =  $categories;

        return view('admin.category.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array();
        $data['icons'] = smk_font_awesome();

        return view('admin.category.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slug = str_slug($request->name);
        if ( Category::where('slug', '=', $slug )->exists() ) {
            $request->session()->flash('error', '<strong>Snap!</strong> This category already exists!');
            return redirect()->route('admin.category.create');
        }

        $validator = Validator::make($request->all(), [
            'name'          =>  'required|max:191',
            'description'   =>  'required',
        ]);

        if ( $validator->fails() ) {
            return redirect( route('admin.category.create') )
                ->withErrors($validator)
                ->withInput();
        }

        $category = new Category;
        $category->name = $request->name;
        $category->slug = $slug;
        $category->description = $request->description;


        $category->status = $request->status;

        if( $request->icon_type == 'font' ) {
            $category->icon = $request->icon_font;
            $category->icon_type = 1;
        }

        if( $request->icon_type == 'image' ) {
            if($request->hasFile('icon_image')) {
                $time = time();

                $icon_image = $request->file('icon_image');
                $ext = $icon_image->getClientOriginalExtension();
                $filename = $time.'-'.$slug;

                $img = Image::make($icon_image);

                $img->fit(100, 100)->save( public_path('/media/cat/'.$filename.'-100x100.'.$ext) , 60);
                $category->icon = asset('/media/cat/'.$filename.'-100x100.'.$ext);
                $category->icon_type = 0;
            }
        }

        $category->save();

        $request->session()->flash('success', 'Category has been added successfully!');

        return redirect()->route('admin.category.index');

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

        $category = Category::find($id);
        if (empty($category)) {
            return redirect()->route('admin.category.index');
        }
        $data = array();
        $data['category'] = $category;
        $data['icons'] = smk_font_awesome();
        return view('admin.category.edit')->with($data);
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
        $category = Category::find($id);

        $slug = str_slug($request->name);

        $new_slug = check_slug_exists('categories', 'slug', $category->slug, $slug);


        if (empty($category)) {
            return redirect()->route('admin.category.index');
        }

        $validator = Validator::make($request->all(), [
            'name'          =>  'required|max:191',
            'description'   =>  'required'
        ]);

        if ( $validator->fails() ) {
            return redirect( route('admin.category.edit', $id) )
                ->withErrors($validator)
                ->withInput();
        }

        $category->name = $request->name;
        $category->slug = $slug;
        $category->description = $request->description;


        $category->status = $request->status;

        if( $request->icon_type == 'font' ) {
            $category->icon = $request->icon_font;
            $category->icon_type = 1;
        }

        if( $request->icon_type == 'image' ) {
            if($request->hasFile('icon_image')) {
                $time = time();

                $icon_image = $request->file('icon_image');
                $ext = $icon_image->getClientOriginalExtension();
                $filename = $time.'-'.$slug;

                if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png') {
                    File::delete(public_path($client->icon_type));
                }


                $img = Image::make($icon_image);

                $img->fit(100, 100)->save( public_path('/media/cat/'.$filename.'-100x100.'.$ext) , 60);
                $category->icon = asset('/media/cat/'.$filename.'-100x100.'.$ext);
                $category->icon_type = 0;
            }
        }

        $category->save();

        $request->session()->flash('success', 'Category has been updated successfully!');

        return redirect()->route('admin.category.index');

        dd($request);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * @return JSON response
     */
    public function delete($id) {
        $provider = Category::find($id);
        $provider->delete();
        Session::flash('success', 'Category has been deleted!');

        return redirect()->route('admin.category.index');
    }

    /**
     * Category Deactivate Function
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * */
    public function getCategoryDeactivate($id) {
        $client = Category::findOrFail($id);
        $client->status = 0;
        $client->save();

        Session::flash('success', 'Category has been deactivated!');
        return redirect()->route('admin.category.index');
    }

    /**
     * Category Approve Function
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * */
    public function getCategoryActivate($id) {
        $client = Category::findOrFail($id);
        $client->status = 1;
        $client->save();

        Session::flash('success', 'Category has been activated!');
        return redirect()->route('admin.category.index');
    }
}
