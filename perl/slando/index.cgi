#!/usr/bin/perl

use warnings;
use strict;
use Data::Dumper;
# текущяя дериктория
use constant TDIR=>'/home/alexandr/www/html/perl2/perl/olx/'; 
#use lib TDIR;
use lib '/usr/home/user2/public_html/perl/slando/';
#use  Controller::CtrlPage::test;
use vars (@INC);
sub AUTOLOAD
{
    print '<hr />';
    print Dumper \@_;
    #print $AUTOLOAD;
    print 'tess';
}





sub router
{
    #возвращает массив путей
    #
    


    #s/$ENV{'REQUEST_URI'}/\/(w+)\//print $1/ge;
    #print  s/t1est2t1est/1(w+)1/$1/ge;
     
    #print Dumper \@rout;

    #print '<hr/>';
    #my $test='testsashatest';
    #$test=~s/test//;
    #print $test;
    my @sname=split /\//, $ENV{'SCRIPT_NAME'} ;

    my $test= $ENV{'REQUEST_URI'} ;
    for(@sname)
    {   
        $test=~s/$_\///;
        #print $_ ;
    }
    my @rout = split /\//, $test;
    print Dumper \@rout;


}

#
#
#
#
sub main
{


    print "Content-type: text/html; encoding='utf-8'\n\n";
    print '<pre>', Dumper(\%ENV) , '</pre> <hr />'; 

    router();
    #mee();
    my $url1='CtrlPage';
    my $url2='test';
    local  $me='Controller::CtrlPage::test';
    unshift @INC, $me; 
    #use  Controller::CtrlPage::test;
    #use autouse "Controller::".$url1.'::'.$url2.'' =>  "Controller::CtrlPage::test::go"; #"Controller::CtrlPage::test";
    #use autouse $me  =>  "Controller::CtrlPage::test::go";
    Controller::CtrlPage::test::go();
}


main();
