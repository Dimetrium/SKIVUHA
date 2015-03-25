#!/usr/bin/perl 
#user12
package Viewer;
use warnings;
use strict;
local $\ = '';
my $template;
my $defaultPage = 'templates/start_first.html'; 
my $pathToTemplate = 'templates/';  

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

sub viewPage
{
 my($self, $fileName) = @_;
 $fileName = $pathToTemplate.$fileName;
 local $/ = undef;
 open my $fh, "< $fileName";
 my $html = <$fh>;
 close $fh;
 print $html;
}

1;
