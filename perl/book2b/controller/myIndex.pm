#!/usr/bin/perl 

package myIndex;
use strict;
use model::myData;



sub new
{
  my $class = ref($_[0])||$_[0];
  return bless {}, $class;
}

sub run
{
	my $obj =  new myData;
	$obj->set('index', 'null');
}


1;