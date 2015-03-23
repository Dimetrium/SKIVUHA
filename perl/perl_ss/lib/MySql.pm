package MySql;
#use strict;
use warnings;
use DBI;
use Data::Dumper;

my $self;
my $dbc;

my $user = 'user1';
my $pass = 'tuser1';
my $host = 'localhost';
my $db_name = 'user1';
my $db_type = 'mysql';

sub new
{
    my $clas = shift;
    $self ||= bless {}, $clas;

    return $bdh if ( $dbc );

    my $db = "DBI:$db_type:$db_name:$host";
    $dbc = DBI->connect($db, $user, $pass);

    (!$dbc)
	&& ($error->set_error('db_error', 'Error connecting to database.'))
    && (return undef);

    return $self;
}



1;
