#!/usr/bin/perl 

package myBooks;
use strict;
use model::mySQL;


sub new
{
  my $class = ref($_[0])||$_[0];  
  return bless {}, $class;
}

sub getBooks
{
	my $selQuery = 'select b.bk_id, b.nazvanie, b.opisanie, b.cena, GROUP_CONCAT(DISTINCT g.genre) as genre,
GROUP_CONCAT(DISTINCT a.author) as author
from books b, genre g, authors a,
book_genre bg, book_author ba
where
bg.bk_id_bookGenre = b.bk_id
and ba.bk_id_bookAuthor = b.bk_id
and g.gr_id = bg.gr_id_bookGenre
and a.atr_id = ba.atr_id_bookAuthor
GROUP BY b.nazvanie;';
	my $obj = mySQL->new();
	$obj->connectToDB();
	$obj->selectFunc($selQuery);
    my @Result = @{$obj->GetRows()};
	return \@Result;
}

sub getBooksByGenreID
{
	 my($self, $pageID) = @_;
	my $selQuery = 'SELECT * FROM books INNER JOIN book_genre ON books.bk_id=book_genre.bk_id_bookGenre INNER JOIN genre ON book_genre.gr_id_bookGenre=genre.gr_id WHERE gr_id='.$pageID.'';
	my $obj = mySQL->new();
	$obj->connectToDB();
	$obj->selectFunc($selQuery);
    my @Result = @{$obj->GetRows()};
	return \@Result;
}

sub getBooksByAuthorID
{
	 my($self, $pageID) = @_;
	my $selQuery = 'SELECT * FROM books INNER JOIN book_author ON books.bk_id=book_author.bk_id_bookAuthor INNER JOIN authors ON book_author.atr_id_bookAuthor=authors.atr_id WHERE atr_id='.$pageID.'';
	my $obj = mySQL->new();
	$obj->connectToDB();
	$obj->selectFunc($selQuery);
    my @Result = @{$obj->GetRows()};
	return \@Result;
}

sub getBooksByBookID
{
	 my($self, $pageID) = @_;
	my $selQuery = 'select b.bk_id, b.nazvanie, b.opisanie, b.cena, GROUP_CONCAT(DISTINCT g.genre) as genre,
GROUP_CONCAT(DISTINCT a.author) as author
from books b, genre g, authors a,
book_genre bg, book_author ba
where
bg.bk_id_bookGenre = b.bk_id
and ba.bk_id_bookAuthor = b.bk_id
and g.gr_id = bg.gr_id_bookGenre
and a.atr_id = ba.atr_id_bookAuthor
and b.bk_id='.$pageID.'
GROUP BY b.nazvanie;';
	my $obj = mySQL->new();
	$obj->connectToDB();
	$obj->selectFunc($selQuery);
    my @Result = @{$obj->GetRows()};
	return \@Result;
}


1;