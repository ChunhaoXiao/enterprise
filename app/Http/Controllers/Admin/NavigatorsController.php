<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Navigator;
use App\Http\Requests\NavigatorRequest;

class NavigatorsController extends Controller
{

    private $navigator;

    public function __construct(Navigator $navigator)
    {
        $this->navigator = $navigator;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $navigators = $this->navigator->orderBy('order_num')->get();
        return view('admin.navigators.index', ['navigators' => $navigators]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.navigators.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NavigatorRequest $request)
    {
        $this->navigator->create($request->all());
        return redirect()->route('navigators.index');
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
    public function edit(Navigator $navigator)
    {
        return view('admin.navigators.create', ['navigator' => $navigator]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NavigatorRequest $request, Navigator $navigator)
    {
        $navigator->update($request->all());
        return redirect()->route('navigators.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Navigator $navigator)
    {
        $navigator->delete();
        return response()->json('success', 201);
    }
}
