#!/usr/bin/perl 

package libs;
use strict;
use model::myAuthor;
use model::myGenre;
use model::myBooks;
use Data::Dumper;
use model::myData;

my $authorsHTML;
my $genresHTML;
my $booksHTML;


sub new
{
  my $class = ref($_[0])||$_[0];  
  return bless {}, $class;
}


#prepare authors list
sub authorsList
{
	my $obj =  new myAuthor;
	my @authorsArr = @{$obj->getAuthors};
	
	foreach my $arr (@authorsArr)
	{
		my $text = "<a href=index.cgi?page=author&id=".$arr->{'atr_id'}." class=nav_link>".$arr->{'author'}."</a><br />\n";
	   	$authorsHTML = $authorsHTML . $text;  
	}
	return $authorsHTML;
}


#prepare genre list
sub genresList
{
	my $obj =  new myGenre;
	my @genresArr = @{$obj->getGenres};
	
	foreach my $arr (@genresArr)
	{
		my $text = "<a href=index.cgi?page=genre&id=".$arr->{'gr_id'}." class=nav_link>".$arr->{'genre'}."</a><br /> \n";
	   	$genresHTML = $genresHTML . $text;  
	}
	return $genresHTML;
}


#prepare default books list
sub booksIndex
{
    my $obj =  new myBooks;
	my @booksArr = @{$obj->getBooks};
	foreach my $arr (@booksArr)
	{
		my $text = "<div class=post><p class =post_adds><strong>Book Name:</strong> <a href=index.cgi?page=book&id=".$arr->{'bk_id'}." style='font-weight: bold; font-size: 12px; text-decoration: none;'>".$arr->{'nazvanie'}."</a></p>
                       <p class = post_adds><strong>Book Description:</strong> ".$arr->{'opisanie'}."</p>                       
					   <p class = post_adds><strong>Book Authors:</strong> ".$arr->{'author'}."</p>
                       <p class = post_adds><strong>Book Genres:</strong> ".$arr->{'genre'}."</p>
					   <p class = post_adds><strong>Price:</strong> ".$arr->{'cena'}."</p>
                    </div>";
	   	$booksHTML = $booksHTML . $text; 
        	
	}
	return $booksHTML;	
}

sub booksArrayProcess
{
	my($self, $myArr) = @_;
	$booksHTML = '';
	foreach my $arr (@$myArr)
	{
		my $text = "<div class=post><p class =post_adds><strong>Book Name:</strong> <a href=index.cgi?page=book&id=".$arr->{'bk_id'}." style='font-weight: bold; font-size: 12px; text-decoration: none;'>".$arr->{'nazvanie'}."</a></p>
                       <p class = post_adds><strong>Book Description:</strong> ".$arr->{'opisanie'}."</p>                       
					   <p class = post_adds><strong>Price:</strong> ".$arr->{'cena'}."</p>
                    </div>";
	   	$booksHTML = $booksHTML . $text; 
     	
	}
}

sub booksBookArrayProcess
{
	my($self, $myArr) = @_;
	$booksHTML = '';
	foreach my $arr (@$myArr)
	{
		my $text = "<div class=post><p class =post_adds><strong>Book Name:</strong> <a href=index.cgi?page=book&id=".$arr->{'bk_id'}." style='font-weight: bold; font-size: 12px; text-decoration: none;'>".$arr->{'nazvanie'}."</a></p>
                       <p class = post_adds><strong>Book Description:</strong> ".$arr->{'opisanie'}."</p>  
						<p class = post_adds><strong>Book Authors:</strong> ".$arr->{'author'}."</p>
                       <p class = post_adds><strong>Book Genres:</strong> ".$arr->{'genre'}."</p>					   
					   <p class = post_adds><strong>Price:</strong> ".$arr->{'cena'}."</p>
                    </div>";
	   	$booksHTML = $booksHTML . $text; 
     	
	}
}



#prepare books list by genre ID
sub booksGenre
{
	my($self) = @_;
	my $myobj = new myData;
	my $ID = $myobj->getPageID;
    my $obj =  new myBooks;
	my @booksArr = @{$obj->getBooksByGenreID($ID)};
	$self->booksArrayProcess(\@booksArr);
	return $booksHTML;	
}

#prepare books list by author ID
sub booksAuthor
{
	my($self) = @_;
	my $myobj = new myData;
	my $ID = $myobj->getPageID;
    my $obj =  new myBooks;
	my @booksArr = @{$obj->getBooksByAuthorID($ID)};
	$self->booksArrayProcess(\@booksArr);
	return $booksHTML;	
}

#prepare books list by book ID
sub booksBook
{
	my($self) = @_;
	my $myobj = new myData;
	my $ID = $myobj->getPageID;
    my $obj =  new myBooks;
	my @booksArr = @{$obj->getBooksByBookID($ID)};
	$self->booksBookArrayProcess(\@booksArr);
	return $booksHTML;	
}


#prepare authors list
sub error
{
	my $obj =  new myData;
	my $error = $obj->getError();
	return $error;
}

1;