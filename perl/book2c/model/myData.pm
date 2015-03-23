#!/usr/bin/perl 

package myData;
use strict;

my $self;
my $pageName;
my $pageID;
my $errorName;

sub new
{
  my $class = ref($_[0])||$_[0];
  $self ||= bless {}, $class;
  return $self;
}

sub getPageName
{
  return $pageName;	
}

sub getPageID
{
  return $pageID;	
}

sub set
{
   my($self, $a, $b) = @_;
   $pageName = $a;
   $pageID = $b; 
}

#sets error message
sub setError
{
	 my($self, $a) = @_;
	 $errorName =  $a;
}

#returns an error message
sub getError
{
    return $errorName;
}

1;