#!/usr/bin/perl 

package myAuthor;
use strict;
use model::mySQL;

sub new
{
  my $class = ref($_[0])||$_[0];  
  return bless {}, $class;
}

sub getAuthors
{
	my $selQuery = 'SELECT * FROM authors';
	my $obj = mySQL->new();
	$obj->connectToDB();
	$obj->selectFunc($selQuery);
    my @Result = @{$obj->GetRows()};
	return \@Result;
}



1;