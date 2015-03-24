#!/usr/bin/perl

use strict;
use warnings;
use Data::Dumper;
use Models::dbi2;

my($dbObj, $query, $cnt, @result);
$query = 'select * from users';

sub main
{
  
(($dbObj = Models::dbi2->new())&&
 ($dbObj->connect())&&
 ($dbObj->setQuery($query))&&
 ($dbObj->execute())&&
 ($cnt = $dbObj->getRowsCnt())&&
 (@result = $dbObj->getResult())&&
 ($dbObj->DESTROY))||
 ($dbObj->DESTROY);
 
  print Dumper @result;
  print Dumper $cnt;

}
main();
