#!/usr/bin/perl -w

#use strict;
use CGI qw(:cgi-lib :escapeHTML :unescapeHTML);
use CGI::Carp qw(fatalsToBrowser); 
use CGI::Cookie; 
use Data::Dumper;
use File::Basename qw(dirname);
use lib dirname(__FILE__) . '/lib';
use controller::mySwitch;
#use CGI::Session;

$|=1; 
ReadParse(); 

print "Content-type: text/html; charset=utf-8\n\n";

# get the values from url
my $q = CGI->new();
my $a = $q->param('page');
my $b = $q->param('id');

$obj = new mySwitch;
$obj->SwitchCase($a, $b);

