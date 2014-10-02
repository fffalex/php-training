<?php
require 'User.php';

/*
 * Simply a task
 */
class Task
{
    
    function __construct($taskId, $description, TaskHandler $taskHandler) {
        $this->taskId = $taskId;
        $this->description = $description;
        $this->status = "New";
        
        //Add the task recently created to the TaskHandler's "unassignedList"
        $taskHandler->newTask($this);
    }

    private $taskId;
    private $description;
    private $status;
    
}


/*
 * Manages a list of tasks in state: new, assigned and released
 */
class TaskHandler
{
    public $achieveList = [];
    public $unassignedList= [];
    public $assignedList = [];
    
    
    /*
     * When a task is recently created, it is added to "unassignedList" 
     */
    function newTask($task)
    {
        $this->unassignedList[] = $task;
    }
    /*
     * It move the task to "AssignedList" and removes it from "unassignedList"
     */
    function moveToAssignedTask (Task $task)
    {
        if ($task->status == 'Assigned')
        {
            $this->assignedList = $task;
            $index = array_search($task, $this->unassignedList);
            unset ($this->unassignedList[$index]);    
        }
    }
    
    /*
     * Really??!!! You just must read the name to know what it does
     */
    function moveToAchieveTask (Task $task)
    {
        if ($task->status == 'Released')
            $this->achieveList = $task;
            
            $index = array_search($task, $this->assignedList);
            unset ($this->assignedList[$index]);
    }
    
    ///GEEETTEEEERRSSSSs
    
    function getAchieveList()
    {
        return $this->achieveList;
    }
    
    function getUnassignedList()
    {
       return $this->unassignedList; 
    }
    
    function  getAssignedList()
    {
        return$this->assignedList;
    }
   
}