#!/usr/bin/perl 

package myData;
use strict;

my $self;
my $pageName;
my $pageID;

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


1;