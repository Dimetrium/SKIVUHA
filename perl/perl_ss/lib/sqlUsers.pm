# user 1
# Zakordonets Sergey 
package Users;
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

sub regUser
{
    my ($self, $e_mail, $pass, $f_name, $l_name, $sex, $b_day, $age) = @_;
    my $prep = 'SELECT * FROM '.$tablePrefix.'users WHERE e_mail=?';
    $int->prepare($prep);
    my $state = $int->execute($e_mail);
    if ( $state != 1 )
    {
        my $req = "INSERT INTO ".$tablePrefix."users (e_mail, pass, f_name, l_name, sex, b_day, age) VALUES ('$e_mail', '$pass', '$f_name', '$l_name', '$sex', '$b_day', '$age')";
        return $int->do($req);
    } 
    else
    {
        $error->set_error('reg_error', 'User exists');
        return undef;
    }
}

sub loginUser
{
    my ($self, $e_mail, $pass) = @_;
    my @result = ();
    $int->prepare("SELECT * FROM ".$tablePrefix."users WHERE e_mail=? AND pass=?");
    my $state = $int->execute($e_mail, $pass);
    if ($state)
    {
        return $int->getHash();
    } 
    else
    {
        $error->set_error('login_error', 'Invalid login or password!');
        return undef;
    }
}

sub getUser 
{
    my ($self, $id) = @_;
    my $req = "SELECT * FROM ".$tablePrefix."users WHERE user_id=?";
    $int->prepare($req);
   my $state = $int->execute($id);
   if ( $state )
   {
        return $int->getHash();
   } 
   else
   {
       $error->set_error('user_error', 'User dose not exist!');
        return undef;
   }
}

sub searchUser
{
    my ($self, $l_name, $age_min, $age_max) = @_;
    my ($and, $p_l_name, $p_age_min, $p_age_max, @ex);
    $and = 0;
    if ( $l_name ne '' )
    {
        $p_l_name = "l_name=?";
        push @ex,$l_name;
        $and = 1;
    }
    else 
    {
        $p_l_name = '';
    }
    if ( $age_min ne ''  )
    {
        ($and==1) && ($p_age_min = "AND ") || ($p_age_min = '');

        $p_age_min .= "age >= ?";
        push @ex,$age_min;
        $and = 1;
    } 
    else 
    {
        $p_age_min = '';
    }
    if ( $age_max ne ''  )
    {
        ($and==1) && ($p_age_max = "AND ") || ($p_age_max = '');

        $p_age_max .= "age <= ?";
        push @ex,$age_max;
        $and = 1;
    } 
    else 
    {
        $p_age_max = '';
    }

    my $req = "SELECT * FROM ".$tablePrefix."users WHERE $p_l_name $p_age_min $p_age_max";
    $int->prepare($req);
    my $state = $int->execute(@ex);
    if ( $state )
    {
        return $int->getHash();
    } 
    else
    {
        $error->set_error('user_error', 'No users found!');
        return undef;
    }
}


1;
