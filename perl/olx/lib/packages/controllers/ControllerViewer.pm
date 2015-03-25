#!/usr/bin/perl 
#user12
package ControllerViewer;
use warnings;
use strict;
use lib::packages::auxPackages::Data;
use lib::packages::auxPackages::Html;
use lib::packages::viewers::Viewer;
my $defaultPage = "/templates/start.html";
sub new	
{
    my ( $proto ) = shift;
    my ( $class ) = ref( $proto ) || $proto;
    my ( $self ) = {};
    bless ( $self, $class );
    return $self;
}

sub index()
{
    my $viewer = new Viewer;
    $viewer->viewPage( 'index.html' );
}

sub start()
{
    my $viewer = new Viewer;
    my $data = new Data;
    my $html = new Html;
    my %dataUser = $data->getArrayValue();

    if ( my %listFriends = $data->getListFriends() )
    {
        my $linksOnFriends = $html->getLink( %listFriends );
        $dataUser{'listFriends'} = $linksOnFriends;
    }
    my $template = $data->gettemplate();
    $viewer->setTemplate( $template );
    $viewer->replaceValues( %dataUser );
}

sub startRegistration
{
    my $viewer = new Viewer;
    $viewer->viewPage( 'registration_first.html' );
}

1;
