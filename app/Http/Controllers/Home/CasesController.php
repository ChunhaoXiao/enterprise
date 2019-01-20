<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cases;
class CasesController extends Controller
{
	private $case;

	public function __construct(Cases $case)
	{
		$this->case = $case;
	}

    public function index(){
        $cases = $this->case->oldest()->paginate(20);
        return view('home.case.index')->with('cases', $cases);
    }

    public function show(Cases $case)
    {
    	return view('home.case.show', ['case' => $case]);
    }
}
