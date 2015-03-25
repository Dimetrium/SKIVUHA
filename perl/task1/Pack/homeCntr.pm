package Pack::homeCntr;

use strict;
use warnings;

sub new
{
  my $class = ref($_[0])||$_[0];
  return bless({},$class);
}

sub indexAction
{
	my $a = 5;
	return $a;
}
1;