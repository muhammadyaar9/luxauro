<?php

namespace App\Http\Controllers\Admin\Goldevine;

use App\Http\Controllers\Controller;
use App\Models\Admin\Goldevine\Project;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class GoldevineMageController extends Controller
{
    public function projectsuspended(Request $request)
    {
        $status = Project::find($request->suspended_id);
        $status->status = 'Active';
        $status->save();
        return redirect()->back()->with('success', 'Project Activated Successfully');
    }

    public function projectactive(Request $request)
    {
        $status = Project::find($request->active_id);
        $status->status = 'Suspended';
        $status->save();
        return redirect()->back()->with('success', 'Project Suspended Successfully');
    }

    public function projectdetail($id)
    {
        $project = Project::find($id);
        return view('frontend.goldevine.project.detail', compact('project'));
    }
}
