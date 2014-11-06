<?php
require 'Task.php';

/*
 * User that can take tasks and do magic
 */
class User
{
    function __construct($userId, $name) {
        $this->userId = $userId;
        $this->name = $name;
    }

    private $userId;
    private $name;
    private $userTasksList = [];
    
    /*
     * User takes a unassigned Task from one TaskHandler and add it to his Task List
     */
    function takeTask(Task $task, TaskHandler $taskHandler)
    {
        if (isset($taskHandler->unassignedList[$task]))
            {
                //Add task to User's List
                $this->userTasksList[] = $task;
                $task->status = 'Assigned';
                
                //Report to TaskHandler that the task is assigned 
                $taskHandler->moveToAssignedTask($task);
            
            }else{
                echo 'Cannot assign task';
            }
    }
    
    /*
     * Change Task's status to started
     */
    function startTask(Task $task)
    {
        if ($this->itsMine($task)){
            $task->status = 'In Progress';
        }
    }
    
    /*
     * Change Task's status to finished
     */
    function finishTask (Task $task)
    {
        if ($this->itsMine($task)){
            $task->status = 'Developed';
        }
    }
    
    /*
     * It Erases the task from the User's List  and add it to its Task Handler as "released"
     */
    function achieveTask (Task $task, TaskHandler $taskHandler)
    {
        if ($this->itsMine($task)){
            
            $task->status = 'Released';
            
            //Indicate to move the TaskHandler's task from "assigned" to "released"
            $taskHandler->moveToAchieveTask($task);
            
            //Delete the task from the User's List
            $index = array_search($task, $this->userTasksList);
            unset ($this->userTasksList[$index]);
            
        }
    }
    
    /*
     * Check if the task is assigned to THIS User
     */
    function itsMine($task)
    {
        if (isset($this->userTasksList[$task]))
        {
            return true;
        }else{
            return false;
        }
        
    }
    
    
}

