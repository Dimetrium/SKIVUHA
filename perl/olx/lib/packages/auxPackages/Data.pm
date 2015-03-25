#!/usr/bin/perl
#user10
package Data;
use strict;
use CGI qw(:cgi-bin :escape HTML :unescape HTML);
use CGI::Carp qw(fatalsToBrowser);
CGI::ReadParse();
our %in;
$| = 1;
my ($q);
my ($empty) = 1;
my ($template);
my ($methodHTML);
my (%arrayErrors);
my (%arrayValue);
my (%listFriends);
$q = CGI->new;
	sub new
	{
		my($proto) = shift;
		my($class) = ref($proto)||$proto;
		my($self) ||= bless{}, $class;
		return $self;
	}
			
	
	sub setArrayErrors
	{
		my($self, %arrays) = @_;
		%arrayErrors = %arrays;
		$empty = 0;
	}
	
	sub getArrayErrors
	{
		my($self) = @_;
		return %arrayErrors;
		#print "Content-type: text/html\n\n"; 	
		#print %arrayErrors;
	}
	
	sub settemplate
	{
		my($self, $templateFile) = @_;
		$template = $templateFile;
	}
	
	sub gettemplate
	{
		my($self) = @_;
		return $template;
	}
	
	sub setArrayValue
	{
		my ($self, %array) = @_;
		%arrayValue = %array;
	}
	
	sub getArrayValue
	{
		return %arrayValue;
	}
	

       sub setMethod
	{
		my($self, $method) = @_;
		$methodHTML = $method;
	}
	
	sub getMethod
	{
		return $methodHTML;
	}

   sub setListFriends
   {
    	my($self, %friends ) = @_;
        # print %friends;
         %listFriends = %friends; 
   }

   sub getListFriends
   {
       return %listFriends;
   
   }



1;
