<?php

$post = new Model;

$obj = new View;

var_dump($post->getEmail());

$obj->setKey('%TITLE%','My mail form');
$obj->setKey('%NAME%', $post->name);
$obj->setKey('%EMAIL%', $post->email);
$obj->setKey('%MASSAGE%', $post->massage);
$obj->setKey('%DROPDOWN%', $post->dropdown);
$obj->setKey('%AGENT%', $_SERVER[HTTP_USER_AGENT]);
$obj->setKey('%IP%', $_SERVER[REMOTE_ADDR]);

$obj->setShablon('templates/index.html');
$obj->chengeShablonKey();

echo $obj->shablon;

?>