<?php
namespace Modules\Admin\Http\Controllers;

class AdminController extends BaseAdminController {
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        return view('admin::index');
    }
}
