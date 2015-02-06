<?php
function add(iDataWork $obj, $key, $val)
{
	return $obj->add($key, $val);
}
function read(iDataWork $obj, $key)
{
	return $obj->read($key);
}
function remove(iDataWork $obj, $key)
{
	return $obj->remove($key);
}
?>