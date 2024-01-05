<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Tasks;
use App\Models\User;
use App\Models\Groups;

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
								if ($request !== '') {
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

				public function addGroup(Request $request){

					
						$member1 = User::where('user_email', '=', $request->member1)->get();
						$member2 = User::where('user_email', '=',$request->member2)->get();

						if($member1->isEmpty()||$member2->isEmpty()){
						return redirect()->back()->with('addGroupError','Please insert existed user');
						}

						if($member1[0]->id === auth()->user()->id || $member2[0]->id ===auth()->user()->id){
						return redirect()->back()->with('addGroupError','Please do not insert same email');
						}

						if(!$member1->isEmpty()||!$member2->isEmpty()){
						$create = Groups::firstOrCreate([
							'user_id' => auth()->user()->id,
							'group_name'	=> $request->group_name,
							'group_description'	=>$request->group_description,
							'member1_id' => $member1[0]->id,
							'member2_id'=>$member2[0]->id
					]);
					}
					else{
						return redirect()->back()->with('addGroupError','Please Fill in all Information');
					}

					return redirect('/grouptask');	
				}
}