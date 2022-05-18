<?php
namespace Modules\Member\Http\Controllers;

class MemberController extends BaseMemberController {
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        return view('member::index');
    }
}
