<?php
/**
 * Created by PhpStorm.
 * User: vincentlee
 * Date: 2017-11-03
 * Time: 2:54 PM
 */

if (! class_exists('PHPUnit_Framework_TestCase')) {
    class_alias('PHPUnit\Framework\TestCase', 'PHPUnit_Framework_TestCase');
}

 class TaskTest extends PHPUnit_Framework_TestCase
 {
     private $CI;
     private $task;

     public function setUp()
     {
         // Load CI instance normally
         $this->CI   = &get_instance();
         $this->task = new Task;
     }

     public function testSetId()
     {
         $this->task->Id = -1;
         $this->assertEquals(false, $this->task->Id);
         
         $this->task->Id = 2;
         $this->assertEquals(true, $this->task->id);
     }

     public function testSetTask()
     {
         $this->task->Task = "Do laundry";
         $this->assertEquals('Do laundry', $this->task->task);
     }

     public function testSetPriority()
     {
         $this->task->Priority = "A random string to test priority";
         $this->assertEquals(false, $this->task->priority);

         $this->task->Priority = -23;
         $this->assertEquals(false, $this->task->priority);

         $this->task->Priority = 1000;
         $this->assertEquals(false, $this->task->priority);

         $this->task->Priority = 3;
         $this->assertEquals(true, $this->task->priority);
     }

     public function testSetSize()
     {
         $this->task->Size = "A random string to test size";
         $this->assertEquals(false, $this->task->size);

         $this->task->Size = -5;
         $this->assertEquals(false, $this->task->size);

         $this->task->Size = 10;
         $this->assertEquals(false, $this->task->size);

         $this->task->Size = 3;
         $this->assertEquals(true, $this->task->size);
     }

     public function testSetGroup()
     {
         $this->task->Group = "A random string to test group";
         $this->assertEquals(false, $this->task->group);

         $this->task->Group = -45;
         $this->assertEquals(false, $this->task->group);

         $this->task->Group = 45;
         $this->assertEquals(false, $this->task->group);

         $this->task->Group = 4;
         $this->assertEquals(true, $this->task->group);
     }

     public function testSetDeadline()
     {
         $this->task->Deadline = "";
         $this->assertEquals("", $this->task->deadline);

         $this->task->Deadline = "Deadline is on Friday";
         $this->assertEquals("Deadline is on Friday", $this->task->deadline);
     }

     public function testSetStatus()
     {
         $this->task->Status = "";
         $this->assertEquals("", $this->task->status);

         $this->task->Status = "Status is Good";
         $this->assertEquals("Status is Good", $this->task->status);
     }

     public function testSetFlag()
     {
         $this->task->Flag = "";
         $this->assertEquals("", $this->task->flag);

         $this->task->Status = "American Flag";
         $this->assertEquals("American Flag", $this->task->status);
     }
 }