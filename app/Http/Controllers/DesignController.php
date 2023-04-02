<?php

namespace App\Http\Controllers;

use App\Models\Design;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DesignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $designs = Design::latest()->get();

        foreach($designs as $design)
        {
            $design->variants = explode(',', $design->variants);
            $design->sizes = explode(',', $design->sizes);
        }
        return view('pages.inventory.index', ['designs'=>$designs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        $validator = Validator::make($request->all(), [
            'code' => 'required|unique:designs',
            'cat' => 'required',
            'img' => 'required'
        ]);

        if($validator->fails()){
            return $validator->errors()->all();
        }

        DB::transaction(function () use($request){
            $file = $request->img;
            $filepath = $request->code.'/'.$file->getClientOriginalName();
            Storage::disk('public')->put('design_catalog/'.$filepath, $file->getContent());

            Design::create([
                'code' => $request->code,
                'category' => $request->cat,
                'variants' => $request->var,
                'sizes' => $request->size,
                'img_url' => $filepath
            ]);
        });

        return "Design cataloged successfully!";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Design  $design
     * @return \Illuminate\Http\Response
     */
    public function show(Design $design)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Design  $design
     * @return \Illuminate\Http\Response
     */
    public function edit(Design $design)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Design  $design
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Design $design)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Design  $design
     * @return \Illuminate\Http\Response
     */
    public function destroy(Design $design)
    {
        //
    }
}
