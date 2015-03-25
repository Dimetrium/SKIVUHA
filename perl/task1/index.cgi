#!/usr/bin/perl
use strict;
use warnings;
use Pack::homeCntr;
use Pack::viewCntr;
use CGI qw(:cgi-bin :escapeHTML :unescapeHTML);
use CGI::Carp qw( fatalsToBrowser );

print qq(Content-type: text/plain\n\n);
print "hi\n";

my $_controller;
my $_action;
my $_params;
my $self;

sub instance
{
  my $class = ref($_[0])||$_[0];
  $self ||= bless({},$class);
  return $self;
}




sub main
{
my $request = $ENV{'REQUEST_URI'};
my @split = split /\//, $request;
 $_controller = $split[3] ? $split[3] . 'Cntr' : 'homeCntr';
 $_action = $split[4] ? $split[4] . 'Action' : 'indexAction';
 
#if ($split[5])
#{
#  my @key = ();
#  my @val = ();
#  my $cnt = @split;
#
# for(my $i = 5; $i < $cnt; $i++) 
# {}
#    if($i%2 ==0)
#    {
#      $val = $split[$i];
#    }}
#    else
#    {
#      $key[] = $split[$i];
#    }
#  }
#  
print $_action;
print $_controller;
}
main();

route
{
	$_controller = 'Pack::' . $_controller;
	my $controller = $_controller->new();
	my $method = $controller->$_action();
	print $method;
	my $view = Pack::homeCntr->new();
	$view->setTemplate( "index.html" );
	#$view->replaceValues( '%moe%' );
	$view->viewPage( 'index.html' );  
}
route();


