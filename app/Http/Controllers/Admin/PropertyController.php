<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Property;
use Validator;
use Illuminate\Validation\Rule;
use App\Http\Requests\PropertyRequest;

class PropertyController extends Controller
{
    private $property;

    public function __construct(Property $property)
    {
        $this->property = $property;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = $this->property->oldest()->get();
        return view('admin.property.index', ['properties' => $properties]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.property.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PropertyRequest $request)
    {
        $data = array_map('array_filter', $request->only('name', 'order'));
        foreach ($data['name'] as $key => $value) {
            $row['name'] = $value;
            $row['order'] = $data['order'][$key] ?? 0;
            $this->property->create($row);
        }
        //$this->property->insert($datas);
        return redirect()->route('properties.index');
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
    public function edit(Property $property)
    {
        return view('admin/property/create', ['property' => $property]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {
        $request->validate([
            'name' => ['required', Rule::unique('properties')->ignore($property->id)],
            'order' => 'nullable|integer',
        ]);

        $property->update($request->all());
        return redirect()->route('properties.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        $property->delete(); //触发 deleted 事件，运行 detach 
        return response()->json('success', 200);
    }
}
