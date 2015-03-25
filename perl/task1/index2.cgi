#!/usr/bin/perl 
use warnings;
use strict;
use CGI qw(:cgi-bin :escapeHTML :unescapeHTML);
use CGI::Carp qw( fatalsToBrowser );
use lib::packages::router;
#use lib::packages::views::Viewer;
our %ENV;
my $url = $ENV { 'REQUEST_URI' };
my $router = new router;

print "Content-type:text/html\n\n";

$router->start( $url );
#$viewer = new Viewer;
#$viewer->setTemplate( "start.html" );
#my %test = ( 'LOGIN' => 'testLogin!!' );
#$viewer->replaceValues( %test );  


1;
