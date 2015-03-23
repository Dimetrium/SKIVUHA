package mySwitch;
use strict;
use Switch;
use view::View;


sub new
{
  my $class = ref($_[0])||$_[0];
  return bless {}, $class;
}

sub SwitchCase
{
  my($self, $a, $b) = @_;
  my $val;
  my $obj;
  my $view;
	
	#compare page value with the case
	if ($a eq "book"){$val = "book";}
	if ($a eq "genre"){$val = "genre";}
	if ($a eq "author"){$val = "author";}
  
  #select case based on the page value
	switch ($val)
	{
		case "book"	
		{ 		
			use controller::myBook;
			$obj = new myBook; 
			#$obj->run($a, $b);
		}
		case "genre"	
		{ 
			 use controller::myGenre;
			 $obj = new myGenre;
			#$obj->run($a, $b);
		}
		case "author"	
		{ 
			 use controller::myAuthor;
			 $obj = new myAuthor;
			#$obj->run($a, $b);
		}
		else 
		{ 
			use controller::myIndex;			
			$obj = new myIndex;
			$obj->run();
			$view = new View;
			$view->htmlReplace();
		}
	}

}


1;
