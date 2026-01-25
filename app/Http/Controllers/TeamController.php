<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamRequest;
use App\Models\JobTitle;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $members = TeamMember::with('jobTitle')->get();
        $titles = JobTitle::all();

        return view('admin.team.index', compact('members', 'titles'));
    }

    public function store(TeamRequest $request)
    {
        try {

            $member = new TeamMember;

            $member = $this->formData($member, $request);
            $member->save();


            return back()->with('success', 'Team member added successfully');
        } catch (\Exception $e) {
            server_logs($e);
            return back()->with('error', 'Something went wrong');
        }
    }

    public function delete($id)
    {
        $member = TeamMember::findOrFail($id);
        $member->delete();

        return back()->with('success', 'Record deleted');
    }

    public function edit($id)
    {
        $member = TeamMember::findOrFail($id);
        $titles = JobTitle::all();
        $members = TeamMember::with('jobTitle')->get();

        return view('admin.team.index', compact('member', 'titles', 'members'));
    }
    public function update(TeamRequest $request, $id)
    {
        try {
            $member = TeamMember::findOrFail($id);

            $member = $this->formData($member, $request);
            $member->save();

            return redirect()
                ->route('admin.team')
                ->with('success', 'Team member updated successfully');
        } catch (\Exception $e) {
            server_logs($e);
            return back()->with('error', 'Update failed');
        }
    }

    private function formData($member, $request)
    {
        $member->name = $request->name;
        $member->job_title_id = $request->job_title_id;
        $member->is_leader = $request->is_leader ? 1: 0;

        if ($request->hasFile('image')) {
            $member->image_path = uploadPhoto($request->file('image'));
        }

        return $member;
    }

    public function teamList()
    {
        $leaders = TeamMember::with('jobTitle')
            ->where('is_leader', 1)
            ->orderBy('id')
            ->get();

        $members = TeamMember::with('jobTitle')
            ->where('is_leader', 0)
            ->orderBy('id')
            ->get();

        return view('frontend.team.ajax_list', compact('leaders', 'members'));
    }

}
