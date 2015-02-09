<?php
function __autoload($class)
{
  require_once('lib/'.$class.'.php');
}

$gitar_ac = new Instrument('acoustic','gitar');
$gitar_el = new Instrument('electronic','gitar');
$gitar_bass = new Instrument('bass','gitar');
$drum = new Instrument('drum','drum');
$piano_el = new Instrument('electro','piano');
$piano_ac = new Instrument('fortopiano','piano');

$gitara = new Musician('Alex', $gitar_ac);
$gitara->addInstrument($gitar_el);
$bass = new Musician('Vova', $gitar_bass);
$piano = new Musician('Vasya', $piano_ac);
$piano->addInstrument($piano_el);
$drum = new Musician('Inokentyi', $drum);

$band = new Band('All stars', 'Pop');
$band->addMusician($gitara);
$band->addMusician($bass);
$piano->assignToBand($band);
$drum->assignToBand($band);


$name_of_band = $band->name;

var_dump($band);
include 'templates/index.php';
?>