#!/usr/bin/perl
#user7
package Html;
use strict;
sub new
{
    my($proto) = shift;
    my($class) = ref($proto)||$proto;
    my($self) ||= bless{}, $class;
    return $self;
}


sub getLink()
{
    my ( $self, %arrValue ) = @_;
    my  $link = ""; 
    while ( my ($key, $value) = each( %arrValue ) )
    {
        $link .= "<a href='$key'>$value</a><br>"; 
    }
    return $link;
}





1;
