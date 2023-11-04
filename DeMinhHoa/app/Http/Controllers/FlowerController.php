<?php

namespace App\Http\Controllers;

use App\Models\Flower;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class FlowerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (!Session::has("success") && !Session::has("warning") && !Session::has("error"))
            Session::flash('infor', 'Show all flower');
        $elements = Flower::orderBy('updated_at', 'desc')->paginate(10);
        return view('Flower.index', compact('elements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        if (!Session::has("success") && !Session::has("warning") && !Session::has("error"))
            Session::flash('infor', 'Create new flower');
        $regionNames = DB::table('regions_name')->pluck('name');
        return view('Flower.add', compact('regionNames'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validate = Validator::make($request->all(), [
            "name" => "required",
            "description" => "required",
            "region" => "required",
            "cover_image" => "required|image",
        ], [
            'name.required' => 'Please add name of flower',
            'description.required' => 'Please add description of flower',
            'region.required' => 'Please choose region of flower',
            'cover_image.required' => 'Please add image of flower',
            'cover_image.image' => 'Please add image of flower! You have selected a file that is not an image',
        ]);
        if ($validate->fails()) {
            return redirect()->back()->with('warning', $validate->errors()->first())->withErrors($validate);
        }
        if ($request->hasFile('cover_image')) {
            $coverImage = $request->file('cover_image');
            $coverImageName = $coverImage->getClientOriginalName();
            $path = $coverImage->storeAs('img', $coverImageName, 'public');
            $coverImagePath = asset('storage/' . $path);
            $request->merge(['image_url' => $coverImagePath]);
        }
        if (Flower::create([
            'name' => $request->name,
            'description' => $request->description,
            'image_url' => $request->image_url,
        ])) {
            foreach ($request->region as $region) { {
                    if (!Region::create([
                        'flower_id' => Flower::orderBy('created_at', 'desc')->first()->id,
                        'region_name' => $region,
                    ]))
                        return redirect()->route('flowers.create')->with('error', "Failed to create new flower");
                }
            }
            return redirect()->route('flowers.index')->with('success', "Create successsfully");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Flower $flower)
    {
        //
        if (!Session::has("success") && !Session::has("warning") && !Session::has("error"))
            Session::flash('infor', 'Show new flower');
        return view('Flower.show', compact('flower'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Flower $flower)
    {
        //
        if (!Session::has("success") && !Session::has("warning") && !Session::has("error"))
            Session::flash('infor', 'Edit new flower');
        $regionNames = DB::table('regions_name')->pluck('name');
        return view('Flower.update', compact('regionNames', 'flower'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Flower $flower)
    {
        //
        $arrayRegion = [];
        $arrayNewRegion = [];
        $validate = Validator::make($request->all(), [
            "name" => "required",
            "description" => "required",
            "region" => "required",
        ], [
            'name.required' => 'Please add name of flower',
            'description.required' => 'Please add description of flower',
            'region.required' => 'Please choose region of flower',
        ]);
        if ($validate->fails()) {
            return redirect()->back()->with('warning', $validate->errors()->first())->withErrors($validate);
        }
        if ($request->hasFile('cover_image')) {
            $coverImage = $request->file('cover_image');
            $coverImageName = $coverImage->getClientOriginalName();
            $path = $coverImage->storeAs('img', $coverImageName, 'public');
            $coverImagePath = asset('storage/' . $path);
            $request->merge(['image_url' => $coverImagePath]);
        } else {
            $request->merge(['image_url' => $flower->image_url]);
        }
        if ($flower->update([
            'name' => $request->name,
            'description' => $request->description,
            'image_url' => $request->image_url,
        ])) {
            // có hai cách sửa , 1 là sửa lại , 2 là xóa hết đi tạo lại.
            foreach ($flower->regions as $region) {
                $arrayRegion[] = $region->region_name;
            }
            foreach ($request->region as $region) {
                $arrayNewRegion[] = $region;
            }
            $deleteRegions= collect(array_diff($arrayRegion, $arrayNewRegion));
            foreach($deleteRegions as $deleteRegion){
                if(!Region::query()->where('flower_id',$flower->id)->where('region_name',$deleteRegion)->delete()){
                    return redirect()->route('flowers.edit',['flower'=>$flower])->with('error', "Failed to update new flower");
                }
            }
            foreach ($request->region as $region) { {
                    if (!collect($arrayRegion)->contains($region)) {
                        if (!Region::create([
                            'flower_id' => $flower->id,
                            'region_name' => $region,
                        ]))
                            return redirect()->route('flowers.edit',['flower'=>$flower])->with('error', "Failed to update new flower");
                    }
                }
            }
            return redirect()->route('flowers.show', ['flower' => $flower])->with('success', "Update successsfully");
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Flower $flower)
    {
        //
        if ($flower->delete()) {
            return redirect()->route('flowers.index')->with('success', "Delete flower-id: $flower->id successfully");
        }
    }
}
