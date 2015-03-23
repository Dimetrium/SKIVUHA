#!/usr/bin/perl 

package genre;
use strict;


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
	if($b =~ /^[+-]?\d+$/)
    {	
	  $obj->set('genre', $b);	
	}
	else
	{
	  $obj->set('error');
	  $obj->setError('ID is not valid')
	}
	
}



1;