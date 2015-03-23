# user 1
# Zakordonets Sergey 
package Messages;
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

sub sendMessage
{
    my ($self, $user_id, $sender_id, $place, $title, $message) = @_;
    my $req = "INSERT INTO ".$tablePrefix."messages 
        (user_id, sender_id, place, title, message) 
        VALUES 
        ('$user_id', '$sender_id', '$place', '$title', '$message')";
    my $result = $int->do($req);
    if ( $result )
    {
        return 1;
    } 
    else
    {
        $error->set_error('message_error', 'Faild to send message');
        return undef; 
    }
}

sub getMessage
{
    my ($self, $message_id, $user_id) = @_;
    my @result = ();
    my $res = $int->prepare("SELECT * FROM ".$tablePrefix."messages WHERE message_id=? AND user_id=?");
    my $state = $int->execute($message_id, $user_id);
    if ( $state == 1 )
    {
        return $int->getHash();
    } 
    else
    {
        $error->set_error('message_error', 'Message dose not exist!');
        return undef;
    }
}

sub getMessages
{
    my ($self, $self_id, $user_id, $place) = @_;
    my @result = ();
    my $res = $int->prepare("SELECT * FROM ".$tablePrefix."messages WHERE user_id=? AND place=?");
    my $state = $int->execute($user_id, $place);
    if ( $state > 0 )
    {
        return $int->getHash();
    } 
    else
    {
        $error->set_error('message_error', 'Message box is empty!');
        return undef;
    }
}

sub delMessage
{
    my ($self, $user_id, $message_id) = @_;
    my $req = "DELETE FROM ".$tablePrefix."messages WHERE user_id='$user_id' AND message_id='$message_id' LIMIT 1";
    my $responce = $int->do($req);
    if ( !$responce )
    {
        $error->set_error('message_error','Cannot delete message!');
        return undef;
    } 
    return 1;
}


1;
