<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller {

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function showFibonacci(Request $request)
    {
    	if ($request->input('count') !== null) {
    		$count = (int) $request->input('count');
    	} else {
    		$count = 20;
    	}
		$arNums = $this->fibonacci($count);
        return view('fibonacci', ['arNums' => $arNums]);
    }

    protected function fibonacci($n)
    {
    	if ($n === 1) {
    		return ['0'];
    	} elseif ($n === 2) {
    		return ['0, ', '1'];
    	} else {
	    	$n = $n - 3;
			$a = 0;
			$b = 1;
			$r = 0;
			$numbers = ["0, ", "1, "];
			for ($i = 0; $i <= $n; $i++) {
			    $r = $a + $b;
			    $a = $b;
			    $b = $r;
			    if ($i == $n) {
			        $numbers[] = $r;
			    } else {
			        $numbers[] = $r.', ';
			    }
			}
			return $numbers;
		}
    }
}