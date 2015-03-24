package Models::dbi2;

use strict;
use warnings;
use DBI;
use Data::Dumper;


my $dbh;
my $query;
my $sth;
my $cnt;
my @error;

sub new
{
  my $class = ref($_[0])||$_[0];
  return bless({},$class);
}

sub connect
{
  my $host = 'dbi:mysql:user2;localhost';
  my $user = 'user2';
  my $pass = 'tuser2';
  $dbh = DBI->connect($host, $user, $pass) or die('none');
  return 1;
}

sub getResult
{
  my @arr=();
  while(my $row = $sth->fetchrow_hashref())
  {
    push(@arr, $row);
  }
  return @arr;
}

sub setQuery
{
 my $query = $_[1];
 $sth = $dbh->prepare($query);
 return 1;
}

sub getRowsCnt
{
 return $cnt;
}

sub execute
{
  $cnt = $sth->execute();
  return 1;
}

sub DESTROY
{
  $dbh->disconnect();
}

1;
