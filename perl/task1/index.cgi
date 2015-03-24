#!/usr/bin/perl

use CGI qw/:standard/; 

sub router
{
	my $path = $ENV{'REQUEST_URI'};
	return $path;
}

sub main
{
my @sname=split /\//, $ENV{'REQUEST_URI'} ;;
print                              
 header(-charset=>'UTF-8'), 
 start_html('Гостевая книга'),     
          p, $sname[4] , p;                               
    


print end_html;                
}
main();