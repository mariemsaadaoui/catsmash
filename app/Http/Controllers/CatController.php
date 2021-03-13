<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Cat;
//use App\Http\Requests\CatRequest;

class CatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index1(Request $request)
    {
        $cats = Cat::all();
        return response()->json($cats);
    }

    public function index2(Request $request)
    {
        $cats = Cat::orderBy('votes', 'DESC')->paginate(3);
        return response()->json($cats);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$cats = Cat::all()->toArray();
        //return array_reverse($cats);
        //$cats = Cat::orderBy('created_at', 'desc')->get();
        //return response()->json($cats);
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
        $cat = Cat::find($id);
        return response()->json($cat);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $cat = Cat::find($id);
        $cat->votes = $cat->votes + 1;
        $cat->save();

        if($cat) {
            return response()->json($cat);
            //return $this->refresh();
        }
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

    private function refresh() {
        $cats = Cat::orderBy('votes', 'DESC')->paginate(3);
        return response()->json($cats);
    }

    public function insert() {
        $json = file_get_contents(storage_path('cats.json'));
	    $cats = json_decode($json,true);
	    foreach ($cats as $cat)  {
		    foreach ($cat as $key => $value) {
                $value = Arr::add($value, 'votes', 0);
                //dd($value);
			    $insertArr[Str::slug($key, '-')] = $value;
                //dd($insertArr[Str::slug($key, '-')]);
		    }
            $insertArr = array_map(function($tag) {
                return array(
                    'image_url' => $tag['url'],
                    'image_id' => $tag['id'],
                    'votes' => $tag['votes']
                );
            }, $insertArr);

        //dd($insertArr);
		DB::table('cats')->insert($insertArr);
	    }
	    dd("Finished adding data in examples table");
    }
}
