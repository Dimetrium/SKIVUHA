#!/usr/bin/perl
package Pack::viewCntr;

use warnings;
use strict;
local $\ = '';
my $template;
my $defaultPage = 'template/index.html'; 
my $pathToTemplate = 'template/';  

sub new	
{
    my ( $proto ) = shift;
    my ( $class ) = ref( $proto ) || $proto;
    my ( $self ) = {};
    bless ( $self, $class );
    return $self;
}

sub setTemplate
{
    my ( $self, $var ) = @_;
    $var = $pathToTemplate.$var;
    open ( FIL, $var );
    while ( <FIL> )
    {
        $template .=  $_; 
    }
}

sub replaceValues
{
    my ( $self, %var ) = @_;
    while ( ( my $key, my $value) = each %var  ) 
    {
        $template =~ s/%$key%/$value/;
    } 
    print  $template;
}

sub  viewPage
{
    my ( $self, $var ) = @_;
    $var = $pathToTemplate.$var;
    open ( FIL, $var );
    while ( <FIL> )
    {
        print $_;
    }
}
1;
