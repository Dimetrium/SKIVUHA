#!/usr/bin/perl 

package libs;
use strict;
use model::myAuthor;
use model::myGenre;

my $authorsHTML;
my $genresHTML;


sub new
{
  my $class = ref($_[0])||$_[0];  
  return bless {}, $class;
}



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




1;