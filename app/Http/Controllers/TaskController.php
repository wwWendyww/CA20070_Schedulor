<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Tasks;
use App\Models\User;
use App\Models\Groups;
/* BCS3453 [PROJECT]-SEMESTER 2324/1
Student ID: CA20070
Student Name: Wendy Loh Li Wen
	 */
class TaskController extends Controller
{
				public function taskList(Request $request)
				{
					$group = Groups::where('user_id', '=', auth()->user()->id)->get();
							if($group->isEmpty()){
					$group = Groups::where('member1_id', '=', auth()->user()->id)->get();
							}
							if($group->isEmpty()){
					$group = Groups::where('member2_id', '=', auth()->user()->id)->get();
							} 	
								if ($request->search !== null) {
												$data = DB::table('tasks')
																->select('*')
																->where('user_id', auth()->user()->id)
																->where('task_name', 'like', '%' . $request->search . '%')
																->orderBy('task_duedate')
																->orderBy('task_duetime', 'ASC')
																->get();
								} else {
												$data = DB::table('tasks')
																->select('*')
																->where('user_id', auth()->user()->id)
																->orderBy('task_duedate')
																->orderBy('task_duetime', 'ASC')
																->get();
								}

								$grouped = $data->groupBy('task_duedate');

								if ($grouped->isEmpty()) {
									$grouped = [];
								}

                                if($group->isEmpty()) {
                                    $group = [];
                                }
                                
								return view('task', ['data' => $grouped, 'taskgroup' => $group]);
				}

				public function createTask(Request $request)
				{
								Tasks::firstOrCreate([
												'user_id' => Auth()->user()->id,
												'category' => $request->category,
												'priority' => $request->priority,
												'task_name' => $request->task_name,
												'task_remarks' => $request->task_remarks,
												'task_duedate' => $request->duedate,
												'task_duetime' => $request->duedate,
								]);
								return redirect('/task')->with('success', 'Task is Added');
				}

				public function deleteTask($id)
				{
								$deleteTask = Tasks::where('task_id', '=', $id);
								$deleteTask->delete();
								return redirect('/task')->with('success', 'Task is Deleted');
				}

				
}