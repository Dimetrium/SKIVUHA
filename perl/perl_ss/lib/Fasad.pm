# user 1
# Zakordonets Sergey 
package Fasad;
use strict;
use warnings;
my $self;

use lib::errors;
my $error = errors->new;
use lib::sqlUsers;
my $user = Users->new;
use lib::sqlMessages;
my $messages = Messages->new;
use lib::sqlFriends;
my $friends = Friends->new;

use Data::Dumper;

sub new 
{
    my $proto = shift;
    my $close = ref $proto || $proto;
    $self ||= bless{},$close;
    return $self;
}

sub regUser
{
    my ($self, @params) = @_;
    return $user->regUser(@params);
}

sub loginUser
{
    my ($self, @params) = @_;
    return $user->loginUser(@params);
}

sub getUser
{
    my ($self, @params) = @_;
    return $user->getUser(@params);
}

sub searchUser
{
    my ($self, @params) = @_;
    return $user->searchUser(@params);
}

sub sendMessage
{
    my ($self, @params) = @_;
    my $isInFr = $friends->getFriend(@params);
    if ( $isInFr || $params[0] == $params[0] )
    {
         return $messages->sendMessage(@params);
    } 
    else
    {
        $error->set_error('message_error','User is not in friends');
        return undef;
    }
}

sub getMessage
{
    my ($self, @params) = @_;
    return $messages->getMessage(@params);
}

sub getMessages
{
    my ($self, @params) = @_;
    my $isInFr = $friends->getFriend(@params);
    if ( $isInFr || $params[0] == $params[0] )
    {
         return $messages->getMessages(@params);
    } 
    else
    {
        $error->set_error('message_error','User is not in friends');
        return undef;
    }
}

sub delMessage
{
    my ($self, @params) = @_;
    return $messages->delMessage(@params);
}

sub getFriends
{
    my ($self, @params) = @_;    
    my @frArr = $friends->getFriends(@params);
    my $count = @frArr;
    my @result = ();
    for ( my $i = 0 ; $i < $count ; $i++ )
    {
        my @aa = $self->getUser($frArr[$i]->{'friend_id'});
        push @result,@aa;
    } 
    return @result;
}

sub addFriend
{
    my ($self, @params) = @_;
    return $friends->addFriend(@params);
}

sub unFriend
{
    my ($self, @params) = @_;
    return $friends->unFriend(@params);
}

1;
