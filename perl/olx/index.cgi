#!/usr/bin/perl -w

use warnings;
use strict;
use Data::Dumper;
use CGI qw(:cgi-bin :escapeHTML :unescapeHTML);
use CGI::Carp qw( fatalsToBrowser );
use lib::packages::router;
use lib::packages::viewers::Viewer;
#our %ENV;
my $url = $ENV { 'REQUEST_URI' };
my $router = new router;

#print qq(Content-type: text/plain\n\n);
print "Content-type: text/html, encoding=utf-8\n\n";
#print Dumper($url);

$router->start( $url );
#$viewer = new Viewer;
#$viewer->setTemplate( "start.html" );
#my %test = ( 'LOGIN' => 'testLogin!!' );
#$viewer->replaceValues( %test );  


1;
