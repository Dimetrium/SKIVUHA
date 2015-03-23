package View;
use Data::Dumper;
use strict;
use model::myData;
use view::libs;

sub new
{
  my $class = ref($_[0])||$_[0];  
  return bless {}, $class;
}


sub htmlReplace
{
   my $obj = new myData;
   my $page = $obj->getPageName;
   my $file = "resources/html/".$page.".html";
   open my $fh, '<', $file or die "error opening $file: $!";
   my $data = do { local $/; <$fh> }; 

   my $libObj =  new libs;  
   $data =~ s/%www_(\w+)/$libObj->$1()/ge;
   print $data;
}


1;