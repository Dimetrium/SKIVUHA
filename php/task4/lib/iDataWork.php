<?php
interface iDataWork
{
  public function add($key, $val);
  public function read($key);
  public function remove($key);
}