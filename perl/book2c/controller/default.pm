#!/usr/bin/perl 

package default;
use strict;
use model::myData;


my $view;

sub new
{
  my $class = ref($_[0])||$_[0];
  return bless {}, $class;
}

sub run
{
    my($self, $a, $b) = @_;
	my $obj =  new myData;
	$obj->set('index', 'null');
}


1;