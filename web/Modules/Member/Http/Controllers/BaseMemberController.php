<?php
namespace Modules\Member\Http\Controllers;

use App\Http\Controllers\Controller;

class BaseMemberController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        // $this->middleware('auth');
    }
}
