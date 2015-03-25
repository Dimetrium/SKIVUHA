#!/usr/bin/perl -w
#user12
package router;
use warnings;
use strict;
use Data::Dumper;
#use lib::packages::controllers::ControllerAuth;
use lib::packages::controllers::ControllerViewer;
my $pathToPackage = './lib/packages/controllers/';

my $self;
sub new	
{
  my $class = ref($_[0])||$_[0];
  $self ||= bless({},$class);
  return $self;
}

sub start
{
    my ( $self, $var ) = @_;
    my @url = split /\//, $var;
    my @partsUrl;
    #print @url;
    for ( my $i = 2; $i <= $#url; $i++ )
    {
        push @partsUrl , $url[$i];
    }

    my $sizeArr = $#partsUrl + 1;
    if ( $sizeArr == 1 )
    {  
        #	my $controller = new ControllerAuth;
        my $controllerViewer = new ControllerViewer;
        #	$controller->index();
        $controllerViewer->index();
    }
    elsif ( $sizeArr == 2)
    {
        my $userRequest = $partsUrl[1];  
        if ( $userRequest == 'registration' )
        {
            my $controllerViewer = new ControllerViewer;
            $controllerViewer->startRegistration();
        }
    }   
    else
    {
        my	$file = $pathToPackage.'Controller'.$partsUrl[1].'.pm';
        if ( -e $file  )
        {  
            my	$packageName = 'Controller'.$partsUrl[1]; 
            my	$method = $partsUrl[2];
            require $pathToPackage.$packageName.'.pm';
            my	$controller = new $packageName;
            if ( $controller->can( $method ) )
            {
                if ( $partsUrl[3] )
                {
                    my $parametr = $partsUrl[3];  
                    $controller->$method( $parametr );
                }
                else 
                {
                    $controller->$method;
                }
                my $controllerViewer = new ControllerViewer;
                $controllerViewer->start();
            }
            else
            {
                print "undefined method";
            }
        } 
    }
}



1;
