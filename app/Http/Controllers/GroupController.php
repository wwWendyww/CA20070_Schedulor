<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Groups;
use App\Models\GroupTasks;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;




class GroupController extends Controller
{
				public function viewGroup(Request $request)
				{
								if ($request->search !== null) {
												$data = GroupTasks::where('group_id', '=', $request->group)
																->where('grouptask_name', 'like', '%'.$request->search.'%')
																->get();
												$group = DB::table('groups')
																->join('users as u', 'u.id', '=', 'groups.user_id')
																->join('users as u1', 'u1.id', '=', 'groups.member1_id')
																->join('users as u2', 'u2.id', '=', 'groups.member2_id')
																->select('u.user_name as user_name', 'groups.user_id', 'u1.user_name as member1_name', 'groups.member1_id', 'u2.user_name as member2_name', 'groups.member2_id')
																->get();
								} else {
												$data = GroupTasks::where('group_id', '=', $request->group)->get();
												$group = DB::table('groups')
																->join('users as u', 'u.id', '=', 'groups.user_id')
																->join('users as u1', 'u1.id', '=', 'groups.member1_id')
																->join('users as u2', 'u2.id', '=', 'groups.member2_id')
																->select('u.user_name as user_name', 'groups.user_id', 'u1.user_name as member1_name', 'groups.member1_id', 'u2.user_name as member2_name', 'groups.member2_id')
																->get();
								}
								if($group->isEmpty()){
									
									return redirect('/task')->with('GroupError', 'Group Not Found');
								}


								$grouped = $data->groupBy('grouptask_duedate');
								return view('groupTask', ['data' => $grouped, 'group' => $group, 'group_id' => $request->group]);
				}

				public function addGroup(Request $request)
				{
								$member1 = User::where('user_email', '=', $request->member1)->get();
								$member2 = User::where('user_email', '=', $request->member2)->get();

								if ($member1->isEmpty() || $member2->isEmpty()) {
												return redirect()
																->back()
																->with('addGroupError', 'Please insert existed user');
								}

								if ($member1[0]->id === auth()->user()->id || $member2[0]->id === auth()->user()->id) {
												return redirect()
																->back()
																->with('addGroupError', 'Please do not insert same email');
								}

								if (!$member1->isEmpty() || !$member2->isEmpty()) {
												$create = Groups::firstOrCreate([
																'user_id' => auth()->user()->id,
																'group_name' => $request->group_name,
																'group_description' => $request->group_description,
																'member1_id' => $member1[0]->id,
																'member2_id' => $member2[0]->id,
												]);
												$currentid = Groups::orderByDesc('group_id')->first()->get();
								} else {
												return redirect()
																->back()
																->with('addGroupError', 'Please Fill in all Information');
								}

								return redirect()->back()->with('success','Group is added');
				}
				public function deleteGroup($id)
				{
								$delete = Groups::where('group_id', '=', $id);
								$delete->delete();
								return redirect('/task')->with('g_success', 'Group is Deleted');
				}
}