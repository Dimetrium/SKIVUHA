# user 1
# Zakordonets Sergey 
package Interface;
use strict;
use warnings;
use DBI;
use Data::Dumper;
#use lib::MySql;
use lib::errors;
my $error = errors->new;

my ($self, $dbh, $sth);

my $user = 'user1';
my $pass = 'tuser1';
my $host = 'localhost';
my $db_name = 'user1';
my $db_type = 'mysql';

my ($connect) = sub {

    my ($self) = @_;
    if ( !$dbh )
    {
        my $db = "dbi:$db_type:database=$db_name;host=$host;";
        $dbh = DBI->connect($db, $user, $pass);
    }
    (!$dbh)
    && ($error->set_error('db_error', 'Error connecting to database.'))
    && (return undef);
    return $dbh;
};

sub new 
{
    my $proto = shift;
    my $close = ref $proto || $proto;
    $self ||= bless{},$close;
    return $self;
}

sub do
{
    my ($self, $req) = @_;
    if (!$dbh && !$self->$connect())
    {
        return undef;
    }
    return $dbh->do($req);
}
 
sub prepare
{
    my ($self, $prep) = @_;
    if (!$dbh && !$self->$connect())
    {
        return undef;
    }
    $sth = $dbh->prepare($prep);
    return $sth;
}

sub execute
{
    my ($self, @exec) = @_;
    if ($sth)
    {
        my ($rv) = $sth->execute(@exec);
        return $rv;
    }
    return undef;
}

sub getHash
{
    my ($self, $res) = @_;
    my @result;
    while ( my $arr = $sth->fetchrow_hashref() )
    {
        push @result,$arr
    }
    $sth->finish;
    return @result;

}
1;
