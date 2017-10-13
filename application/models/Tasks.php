<?php
/**
 * Model of the Tasks table.
 * User: vincentlee
 * Date: 2017-10-12
 * Time: 8:51 PM
 */

class Tasks extends CSV_Model
{
    public function __construct()
    {
        parent::__construct(APPPATH . '../data/tasks.csv', 'id');
    }
}