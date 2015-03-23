package mySwitch;
use strict;
use Switch;
use view::View;

my $view;

sub new
{
  my $class = ref($_[0])||$_[0];
  return bless {}, $class;
}


sub SwitchCase
{
  my($self, $a, $b) = @_;
  if($a eq "") 
  {
	$a = 'default';
  }
  
  require "controller/$a.pm";
  my $obj = new $a;
  $obj->run($a, $b);


  
  $view = new View;
  $view->htmlReplace();
 
}
1;
