<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\GroupTasks;
use App\Models\Groups;
use Illuminate\Support\Facades\Route;

class GroupTasksController extends Controller
{
				public function viewGroup(Request $request)
				{
								if ($request->search !== '') {
												$data = GroupTasks::where('group_id', '=', $request->group)
																->where('grouptask_name', '=', $request->search)
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

								$grouped = $data->groupBy('grouptask_duedate');

								return view('groupTask', ['data' => $grouped, 'group' => $group, 'group_id' => $request->group]);
				}
				public function addGroupTask(Request $request, $id)
				{
					
								$group_id = $id;
								GroupTasks::firstOrCreate([
												'group_id' => $group_id,
												'grouptask_name' => $request->grouptask_name,
												'grouptask_duedate' => $request->duedate,
												'grouptask_duetime' => $request->duedate,
												'priority' => $request->priority,
								]);
								return redirect()
												->back()
												->with('success', 'Task is listed!');
				}

				public function deleteGroupTask($id)
				{
								$delete = GroupTasks::where('grouptask_id', '=', $id);
								$delete->delete();
								return redirect('/grouptask')->with('success', 'Task is Deleted');
				}

				public function deleteGroup($id){
					$delete = Groups::where('group_id', '=', $id);
					$delete->delete();
					return redirect('/task')->with('g_success', 'Group is Deleted');
				}
}
