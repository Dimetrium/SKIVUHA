#!/usr/bin/perl 

package myDef;
use strict;
use model::mySQL;



sub new
{
  my $class = ref($_[0])||$_[0];
  return bless {}, $class;
}

#function used to select quires 
sub mySelect
{
	my($self, $selQuery) = @_;
	my $obj = mySQL->new();
	$obj->connectToDB();
	$obj->selectFunc($selQuery);
    my @Result = @{$obj->GetRows()};
	return \@Result;
}

#function used to select quires 
sub mySelectAll
{
	my($self, $selQuery) = @_;
	my $obj = mySQL->new();
	$obj->connectToDB();
	$obj->selectAllFunc($selQuery);
    my @Result = @{$obj->GetRows()};
	return \@Result;
}


1;