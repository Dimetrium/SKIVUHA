package Db;
use strict;
use warnings;
use DBI;
use Data::Dumper;

my $self;

my $db = 'DBI:mysql:user1:localhost';
my $tablePrefix = 'perl_ss_';
my $user = 'user1';
my $pass = 'tuser1';
$db = DBI->connect($db, $user, $pass);

sub new 
{
my $proto = shift;
my $close = ref $proto || $proto;
$self ||= bless{},$close;
return $self;
}

sub regUser
{
    my ($self, $user_id, $e_mail, $pass, $f_name, $l_name, $sex, $b_day) = @_;
    my $res = $db->prepare('
        INSERT INTO '.$tablePrefix.'users 
        (user_id, e_mail, pass, f_name, l_name, sex, b_day) 
        VALUES 
        ($user_id, $e_mail, $pass, $f_name, $l_name, $sex, $b_day)
        ');
}

sub selectUser
{
    my ($self, $id) = @_;
    my $res = $db->prepare('SELECT * FROM '.$tablePrefix.'users WHERE user_id=?');
    $res->execute($id);
    return $res->fetchrow_hashref();
}

sub selectMessages
{
    my ($self, $id) = @_;
    my $res = $db->prepare('SELECT * FROM '.$tablePrefix.'messages WHERE user_id=?');
    $res->execute($id);
    my @resp = ();
    while ( my $arr = $res->fetchrow_hashref() )
    {
        push @resp,$arr;
    }
    #$res->finish;
    return @resp;
}

sub selectFriends
{
    my ($self, $id) = @_;
    my $res = $db->prepare('SELECT * FROM '.$tablePrefix.'friends WHERE user_id=?');
    $res->execute($id);
    my @resp = ();
    while ( my $arr = $res->fetchrow_hashref() )
    {
        push @resp,$arr;
    }
    #$res->finish;
    return @resp;
}

sub selectMessage
{
    my ($self, $user_id, $message_id) = @_;
    my $res = $db->prepare('SELECT * FROM '.$tablePrefix.'messages WHERE user_id=? AND message_id=?');
    $res->execute($user_id, $message_id);
    my @resp = ();
    while ( my $arr = $res->fetchrow_hashref() )
    {
        push @resp,$arr;
    }
    #$res->finish;
    return @resp;
}

sub sendMessage
{
    my ($self, $user_id, $sender_id, $place, $title, $message_id) = @_;
    my $res = $db->prepare('INSERT INTO '.$tablePrefix.'messages (user_id,sender_id,place,title,message) VALUES (?,?,?,?,?)');
    $res->execute($user_id, $sender_id, $place, $title, $message_id);
    if ( $res )
    {
        return 1;
    }
    else
    {
        return undef;
    }
}



1;



=pod


package Db;
use strict;
use warnings;
use DBI;
use Data::Dumper;

my $self;
my $db = 'DBI:mysql:user1:localhost';
my $tablePrefix = 'perl_ss_';
my $user = 'user1';
my $pass = 'tuser1';
$db = DBI->connect($db, $user, $pass);

sub new 
{
my $proto = shift;
my $close = ref $proto || $proto;
$self ||= bless{},$close;
return $self;
}

sub regUser
{
    my ($self, $user_id, $e_mail, $pass, $f_name, $l_name, $sex, $b_day) = @_;
    my $res = $db->prepare('INSERT INTO '.$tablePrefix.'users (user_id, e_mail, pass, f_name, l_name, sex, b_day) VALUES ($user_id, $e_mail, $pass, $f_name, $l_name, $sex, $b_day)');
}

sub selectUser
{
    my ($self, $id) = @_;
    my $res = $db->prepare('SELECT * FROM '.$tablePrefix.'users WHERE user_id=?');
    $res->execute($id);
    return $res->fetchrow_hashref();
}

sub selectMessages
{
    my ($self, $id) = @_;
    my $res = $db->prepare('SELECT * FROM '.$tablePrefix.'messages WHERE user_id=?');
    $res->execute($id);
    my @resp = ();
    while ( my $arr = $res->fetchrow_hashref() )
    {
        push @resp,$arr;
    }
    #$res->finish;
    return @resp;
}

sub selectFriends
{
    my ($self, $id) = @_;
    my $res = $db->prepare('SELECT * FROM '.$tablePrefix.'friends WHERE user_id=?');
    $res->execute($id);
    my @resp = ();
    while ( my $arr = $res->fetchrow_hashref() )
    {
        push @resp,$arr;
    }
    #$res->finish;
    return @resp;
}

sub selectMessage
{
    my ($self, $user_id, $message_id) = @_;
    my $res = $db->prepare('SELECT * FROM '.$tablePrefix.'messages WHERE user_id=? AND message_id=?');
    $res->execute($user_id, $message_id);
    my @resp = ();
    while ( my $arr = $res->fetchrow_hashref() )
    {
        push @resp,$arr;
    }
    #$res->finish;
    return @resp;
}

sub sendMessage
{
    my ($self, $user_id, $sender_id, $place, $title, $message_id) = @_;
    my $res = $db->prepare('INSERT INTO '.$tablePrefix.'messages (user_id,sender_id,place,title,message) VALUES (?,?,?,?,?)');
    $res->execute($user_id, $sender_id, $place, $title, $message_id);
    if ( $res )
    {
        return 1;
    }
    else
    {
        return undef;
    }
}



1;



=cut
