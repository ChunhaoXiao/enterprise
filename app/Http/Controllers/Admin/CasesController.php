<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CaseRequest;
use App\Models\Cases;
use App\Services\UploadService;
class CasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $case;

    public function __construct(Cases $case)
    {
        $this->case = $case;
    }

    public function index()
    {
        $datas = $this->case->latest()->get();
        return view('admin.case.index', ['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.case.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CaseRequest $request)
    {
        $data = $request->all();
        $data['pictures'] = UploadService::uploadAll($data['pictures'], 'case');
        $this->case->create($data);
        return redirect()->route('cases.index');
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
    public function edit(Cases $case)
    {
        return view('admin.case.create', ['case' => $case]);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CaseRequest $request, Cases $case)
    {
        $data = $request->all();
        $pictures = $data['oldpictures']?? [];
        if(!empty($data['pictures']))
        {
            $newpictures = UploadService::uploadAll($data['pictures'], 'case');
            $pictures = array_merge($pictures, $newpictures);
        }

        $data['pictures'] = $pictures;
        $case->update($data);
        return redirect()->route('cases.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cases $case)
    {
        $case->delete();
        return response()->json('success', 200);
    }
}
