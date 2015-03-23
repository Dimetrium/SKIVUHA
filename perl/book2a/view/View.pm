package View;
use Data::Dumper;


my $booksHTML;
my $authorsHTML;
my $genresHTML;

sub new
{
  my $class = ref($_[0])||$_[0];
  return bless {}, $class;
}


#prepare values to replace
sub htmlReplace
{
	 my($self, $booksArr, $genreArr, $authorsArr) = @_;	
  
	 $self->booksArrayView(\@$booksArr);
	 $self->genresArrayView(\@$genreArr);
	 $self->authorsArrayView(\@$authorsArr);
	 my $file = "resources/html/index.html";
	 open my $fh, '<', $file or die "error opening $file: $!";
     my $data = do { local $/; <$fh> };


	$data =~ s/%GENRE%/$genresHTML/g;
	$data =~ s/%BOOK%/$booksHTML/g;
	$data =~ s/%AUTHORS%/$authorsHTML/g;
	
	return $data;

}



#prepare book list
sub booksArrayView
{
	my($self, $booksArr) = @_;
	foreach $arr (@$booksArr)
	{
		my $text = "<div class=post><p class =post_adds><a href=index.cgi?page=book&id=".$arr->{'bk_id'}.">Book Name:".$arr->{'nazvanie'}."</a></p>
                       <p class = post_adds>Book Description:".$arr->{'opisanie'}."</p>
                       <p class = post_adds>Price: ".$arr->{'cena'}."</p>
                    </div>";
	   	$booksHTML = $booksHTML . $text;  
	}
}


# prepare genre list
sub genresArrayView
{
	my($self, $genresArr) = @_;
	foreach $arr (@$genresArr)
	{
		my $text = "<a href=index.cgi?page=genre&id=".$arr->{'gr_id'}." class=nav_link>".$arr->{'genre'}."</a><br /> \n";
	   	$genresHTML = $genresHTML . $text;  
	}
	

}


#prepare authors list
sub authorsArrayView
{
	my($self, $authorsArr) = @_;
	foreach $arr (@$authorsArr)
	{
		my $text = "<a href=index.cgi?page=author&id=".$arr->{'atr_id'}." class=nav_link>".$arr->{'author'}."</a><br />\n";
	   	$authorsHTML = $authorsHTML . $text;  
	}
}







1;