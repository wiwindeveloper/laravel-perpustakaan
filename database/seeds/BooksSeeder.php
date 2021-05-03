<?php

use Illuminate\Database\Seeder;
use App\Author;
use App\Book;
use App\BorrowLlog;
use App\User;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Sample penulis
        $author1 = Author::create(['name'=>'Mohammad Fauzil Adhim']);
        $author2 = Author::create(['name'=>'Salim A. Fillah']);
        $author3 = Author::create(['name'=>'Aam Amirudin']);

        //Sample penulis
        $book1 = Book::create(['title'=>'Kupinang Engkau dengan Hamdalah', 'amount'=>'3', 'author_id'=>$author1->id]);
        $book2 = Book::create(['title'=>'Jalan cinta para pejuang', 'amount'=>'2', 'author_id'=>$author2->id]);
        $book3 = Book::create(['title'=>'Membingkai Surga dalam Rumah Tangga', 'amount'=>'4', 'author_id'=>$author3->id]);
        $book4 = Book::create(['title'=>'Cinta & Seks Rumah Tangga Muslim', 'amount'=>'3', 'author_id'=>$author3->id]);

        //Sample peminjaman buku
        $member = User::where('email', 'member@gmail.com')->first();
        BorrowLlog::create(['user_id' => $member->id, 'book_id' => $book1->id, 'is_returned' => 0]);
        BorrowLlog::create(['user_id' => $member->id, 'book_id' => $book2->id, 'is_returned' => 0]);
        BorrowLlog::create(['user_id' => $member->id, 'book_id' => $book3->id, 'is_returned' => 1]);
    }
}
