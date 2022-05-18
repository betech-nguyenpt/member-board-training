<?php
namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;

class BaseAdminController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        // $this->middleware('auth');
    }
}
