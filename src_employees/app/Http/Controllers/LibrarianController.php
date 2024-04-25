<?php

namespace App\Http\Controllers;

use App\Models\BooksOnLease;
use DateTime;
use Illuminate\Http\JsonResponse;

class LibrarianController extends Controller
{
    public function booksInLease():JsonResponse
    {
        $books = BooksOnLease::all();

        $currentDate = DateTime::createFromFormat("Y-m-d h:i:s", '2023-10-10 12:20:04');

        $booksReturned = []; // вовремя возвращенные книги
        $booksNeedToReturned = []; // книги, которые нужно вернуть
        $booksNeedToReturnedImmediately = []; // книги, которые нужно вернуть срочно
        $booksOverdue = []; // просроченные книги
        $booksOverdueButReturned = []; // просроченные, но возвращенные книги

        foreach ($books AS $book) {
            // дата возврата планируемая
            $leasingDateExpected = DateTime::createFromFormat('Y-m-d h:i:s', $book->expected_date_of_return);
            // дата возврата фактическая
            $leasingDateActual = null;

            $dayDiffExpected = -1;
            $returnedBook = false;
            if ($leasingDateExpected != null) { // есть дата возврата
                $dayDiffExpected = $leasingDateExpected->diff($currentDate)->format('%a');
                // Вычислим, прошла ли планируемая дата возврата
                if ($leasingDateExpected < $currentDate) {
                    $dayDiffExpected = -$dayDiffExpected;
                }
                $book->days = (int)$dayDiffExpected;
            }
            if ($book->actual_date_of_return != null) {
                $returnedBook = true;
                $leasingDateActual = DateTime::createFromFormat('Y-m-d h:i:s', $book->actual_date_of_return);
            }

            if ($returnedBook) {
                if ($leasingDateActual > $leasingDateExpected) {
                    $book->days = $leasingDateActual->diff($leasingDateExpected)->format('%a');
                    $booksOverdueButReturned[] = $book;
                } else {
                    $booksReturned[] = $book;
                }
            } else if ($dayDiffExpected < 0) {
                $booksOverdue[] = $book;
            } else if ($dayDiffExpected <= 3) {
                $booksNeedToReturnedImmediately[] = $book;
            } else {
                $booksNeedToReturned[] = $book;
            }
        }

        return response()->json([
            'booksAll' => $books,
            'booksReturned' => $booksReturned,
            'booksNeedToReturned' => $booksNeedToReturned,
            'booksNeedToReturnedImmediately' => $booksNeedToReturnedImmediately,
            'booksOverdue' => $booksOverdue,
            'booksOverdueButReturned' => $booksOverdueButReturned,
        ]);
    }
}
