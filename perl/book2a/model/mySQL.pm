package mySQL;
use strict;
use DBI;

#connection settings
my $host = ""; 
my $user = "user8"; 
my $pass = "tuser8"; 
my $db = "user8"; 

#request variables 
my $self;
my $dbh;
my $rowsCnt;
my  @rowsData;

sub new
{
  my $class = ref($_[0])||$_[0];
  $self ||= bless {}, $class;
  return $self;
}

sub connectToDB
{
$dbh = DBI->connect("DBI:mysql:$db:$host",
$user,$pass);
return ! ! $dbh;
}

  sub processQuery 
 {
  my($self, $selQuery) = @_;
  
  my $sth = $dbh->prepare($selQuery);
  $rowsCnt = $sth->execute;
  return ($sth, $rowsCnt);
}

sub defaultFunc
{
  @rowsData = ();
  my($self, $selQuery) = @_;
  my($sth, $rowsCnt) = $self->processQuery($selQuery); 
  return 1;
  }
  
 sub selectFunc
{ 
   my($self, $selQuery) = @_;
   
   @rowsData = ();
   my($sth, $rowsCnt) = $self->processQuery($selQuery); 
   $rowsCnt = 0 if ($rowsCnt eq '0e0'); 
   while (my $ref = $sth->fetchrow_hashref) 
	  {	
		push @rowsData,$ref;
	  } 
   $sth->finish;
   return 1;
}


 sub selectAllFunc
{ 
   my($self, $selQuery) = @_;
   
   @rowsData = ();
   my($sth, $rowsCnt) = $self->processQuery($selQuery); 
   $rowsCnt = 0 if ($rowsCnt eq '0e0'); 
   while (my $ref = $sth->fetchrow_hashref) 
	  {	
		push @rowsData,$ref;
	  } 
   $sth->finish;
   return 1;
}

sub GetRows
{
 
  return \@rowsData;
}




1;