#!/usr/bin/perl 

package myGenre;
use strict;
use model::mySQL;



sub new
{
  my $class = ref($_[0])||$_[0];  
  return bless {}, $class;
}



sub getGenres
{
	my $selQuery = 'SELECT * FROM genre';
	my $obj = mySQL->new();
	$obj->connectToDB();
	$obj->selectFunc($selQuery);
    my @Result = @{$obj->GetRows()};	
	return \@Result;
}



1;