<?php
/**
 * Created by PhpStorm.
 * User: vincentlee
 * Date: 2017-11-03
 * Time: 2:54 PM
 */

 class TaskTest extends PHPUnit_Framework_TestCase
 {
     private $CI;

     public function setUp()
     {
         // Load CI instance normally
         $this->CI = &get_instance();
     }

     public function testGetPost()
     {
         $_SERVER['REQUEST_METHOD'] = 'GET';
         $_GET['foo'] = 'bar';
         $this->assertEquals('bar', $this->CI->input->get_post('foo'));
     }
 }