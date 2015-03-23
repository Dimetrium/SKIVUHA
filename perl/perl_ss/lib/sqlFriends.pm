# user 1
# Zakordonets Sergey 
package Friends;
use strict;
use warnings;
use lib::sqlInterface;
my $int = Interface->new;
use lib::errors;
my $error = errors->new;
use Data::Dumper;
my $tablePrefix = 'perl_ss_';

sub new 
{
my $proto = shift;
my $close = ref $proto || $proto;
my $self ||= bless{},$close;
return $self;
}

sub addFriend
{
    my ($self, $user_id, $sender_id) = @_;
    my $me = $self->getFriend($user_id , $sender_id);
    unless ( defined $me )
    {
        my $req = "INSERT INTO ".$tablePrefix."friends 
        (user_id, friend_id) 
        VALUES 
        ('$user_id', '$sender_id')";
        my $result = $int->do($req);
        if ( $result )
        {
            my $fr = $self->getFriend($sender_id , $user_id);
            if ( defined $fr ) 
            {
                acceptFriend($user_id, $sender_id);
            }
            return 1;
        } 
        else
        {
            $error->set_error('friend_error!', 'Faild to add friend!!');
            return undef; 
        }
    } 
    else 
    {
        $error->set_error('friend_error', 'You already invited this user!');
        return undef;
    }
}

sub getFriends
{
    my ($self, $user_id, $limit) = @_;
    my @result = ();
    if ( $limit eq '' ) 
    {
        $limit = 1;
    }
    my $res = $int->prepare("SELECT * FROM ".$tablePrefix."friends WHERE user_id=? LIMIT ?");
    my $state = $int->execute($user_id, $limit);
    if ( $state > 0 )
    {
        return $int->getHash();
    } 
    else
    {
        $error->set_error('friend_error', 'You heve no friends!');
        return undef;
    }

}
 
sub getFriend
{
    my ($self, $user_id, $friend_id) = @_;
    my @result = ();
    my $res = $int->prepare("SELECT * FROM ".$tablePrefix."friends WHERE user_id=? AND friend_id=?");
    my $state = $int->execute($user_id, $friend_id);
    if ( $state == 1 )
    {
        return $int->getHash();
    } 
    else
    {
        $error->set_error('friend_error', 'User not in the friend list!');
        return undef;
    }
}

sub acceptFriend
{
    my ($user, $friend) = @_;
    my $req = "UPDATE ".$tablePrefix."friends SET status=1 WHERE (user_id='$user' AND friend_id='$friend') OR  (user_id='$friend' AND friend_id='$user') LIMIT 2";
    my $responce = $int->do($req);
    if ( !$responce )
    {
        $error->set_error('friend_error','Faild to add friend!');
        return undef;
    } 
    return 1;
}

sub unFriend
{
    my ($self, $id) = @_;
    my $req = "DELETE FROM ".$tablePrefix."friends WHERE user_id='$id' OR friend_id='$id' LIMIT 2";
    my $responce = $int->do($req);
    if ( !$responce )
    {
        $error->set_error('friend_error','Faild to delete user from friends');
        return undef;
    } 
    return 1;
}

1;
