package errors;
use strict;
use warnings;
use Data::Dumper; 
use CGI qw(:cgi-bin:escapeHTML:unescapeHTML:standart);  
use CGI::Carp qw(fatalsToBrowser);

our %errors={};


sub new
{
    my($proto)=shift;
    my($class)=ref($proto) || $proto;
    my $self ||= bless{}, $class;
    return $self;
}

sub set_error
{
	my ($self,$key,$val) = @_;
	$errors{$key}=$val;
    return 1;    
}

sub get_error()
{
	return \%errors;
}


1;
