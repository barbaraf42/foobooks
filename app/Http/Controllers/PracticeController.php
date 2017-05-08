<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class PracticeController extends Controller
{


    public function practice4() {

        $book = new Book();
        $books = $book->where('title', 'LIKE', '%Harry Potter%')->get();

        if($books->isEmpty()) {
            dump('No matches found');
        }
        else {
            foreach($books as $book) {
                dump($book->title);
            }
        }
    }


    public function practice3() {

        # Instantiate a new Book Model object
        $book = new Book();

        # Set the parameters
        # Note how each parameter corresponds to a field in the table
        $book->title = "Harry Potter and the Sorcerer's Stone";
        $book->author = 'J.K. Rowling';
        $book->published = 1997;
        $book->cover = 'http://prodimage.images-bn.com/pimages/9780590353427_p0_v1_s484x700.jpg';
        $book->purchase_link = 'http://www.barnesandnoble.com/w/harry-potter-and-the-sorcerers-stone-j-k-rowling/1100036321?ean=9780590353427';

        # Invoke the Eloquent `save` method to generate a new row in the
        # `books` table, with the above data
        $book->save();

        dump('Added: '.$book->title);
    }



    public function exampleX() {
        $random = new \Rych\Random\Random();
        return $random->getRandomString(8);
    }



    /**
	*
	*/
    public function practice2() {
        dump(config('app'));
    }



    /**
	*
	*/
    public function practice1() {
        dump('This is the first example.');
    }



    /**
    * ANY (GET/POST/PUT/DELETE)
    * /practice/{n?}
    *
    * This method accepts all requests to /practice/ and
    * invokes the appropriate method.
    *
    * http://foobooks.loc/practice/1 => Invokes practice1
    * http://foobooks.loc/practice/5 => Invokes practice5
    * http://foobooks.loc/practice/999 => Practice route [practice999] not defined
	*/
    public function index($n) {
        $method = 'practice'.$n;
        if(method_exists($this, $method))
            return $this->$method();
        else
            dd("Practice route [{$n}] not defined");
    }






}
