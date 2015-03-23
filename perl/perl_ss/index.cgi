#!/usr/bin/perl
use strict;
use warnings;
use config;
use Data::Dumper;
use lib::Db;
use lib::Fasad;
use CGI;
use CGI::Carp 'fatalsToBrowser';
use lib::errors;

my $q = CGI->new;
print $q->header;
my $err = errors->new->get_error();
my $db = Db->new;
my $fas = Fasad->new;
=pod 
format ( place 1-wall 2-private )
$db->sendMessage('user_id', 'sender_id', 'place', 'title', 'message');
=cut
#my @user = $db->selectUser (1);
#my @messages = $db->selectMessages (5);
#my @message = $db->selectMessage(1,2);
#my @friends = $db->selectFriends (1);
#$user_id, $sender_id, $place, $title, $message_id


#$db->sendMessage('1', '4', '1', 'title', 'message');

#print $fas->regUser('agmail','pass','fname','lname','1','20001230', '35');
my @send_mess = $fas->sendMessage(5,31,0,'title','message');
my @get_mess = $fas->getMessage(1,1);
my @get_messages = $fas->getMessages(36,36,1);
$fas->delMessage(5,140);
my @log_user = $fas->loginUser('mail','pass');
my @get_user = $fas->getUser(36);
my @addFriend = $fas->addFriend(44,1);
my @get_friends = $fas->getFriends(1,5);
my @searchUser = $fas->searchUser('Pupkin',,);
#$fas->unFriend(1);

print '<pre>';
print '---'.Dumper(@get_friends).'---<hr>';
#print Dumper(@searchUser).'<hr>';
#print Dumper(@send_mess).'<hr>';
#print Dumper(@get_mess).'<hr>';
print Dumper(@get_messages).'<hr>';
#print Dumper(@log_user).'<hr>';
#print Dumper(@get_user).'<hr>';
print Dumper($err).'<hr>';
#print Dumper(@user).'<hr>';
#my $sss = \@messages;
#print Dumper($sss).'<hr>';
#print Dumper(@friends).'<hr>';
#print Dumper(@message).'<hr>';
print '</pre>';

1;
