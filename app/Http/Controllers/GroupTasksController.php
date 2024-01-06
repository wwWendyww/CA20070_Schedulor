<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\GroupTasks;
use App\Models\Groups;
use Illuminate\Support\Facades\Route;

class GroupTasksController extends Controller
{
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
				public function deleteGroupTask(Request $request, $id)
				{
								$group_id = $request->input('group');

								$delete = GroupTasks::where('grouptask_id', '=', $id);
								$group_id = $delete->first()->group_id;
								$delete->delete();

								return redirect('/grouptask?group=' . $group_id)->with('success', 'Task is Deleted');
				}
}
