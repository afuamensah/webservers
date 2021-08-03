$(document).ready(function(){
	var getSortedBooksArray = function() {
        var books = [];
        var bookString = localStorage.E16books || "";
        
        if (bookString.length > 0) {
            // split string on first delimiter. Then, loop array, split
            // strings on second delimiter, and store array in tasks array
            var interim = bookString.split( "|" );
            for (var i = 0; i < interim.length - 1; i++) {
                books.push( interim[i].split( "~~" ));
            }
            
            // sort array of arrays by due date
            books.sort(function(arr1, arr2) {
                var a = new Date(arr1[1]); // 2nd element of first array
                var b = new Date(arr2[1]); // 2nd element of second array

                if ( a < b ) { return -1; }
                else if ( a > b ) { return 1; }
                else { return 0; }
            });
        }
        return books;
    };
    
    var displayBookList = function(books) {
        if ( books === undefined ) {
            books = getSortedBooksArray();
        }
        var bookString = books.reduce( function( prev, current ) {
            return prev + current[1] + " - " + current[0] + "\n";
        }, ""); // pass initial value for prev parameter

        // display tasks string and set focus on task text box
        $("#book_list").val( bookString );
        $("#book").focus();
    };

    $("#add_book").click(function() { 
        var book = $("#book").val();
        var dueDate = $("#date_goal").val();
        
        if (book === "" || dueDate === "") {
            alert("Please enter a book and due date.");
            $("#book").focus();
        } else {  
            // retrieve tasks and create array for new task
            var bookString = localStorage.E16books || "";
            var newBook = [book, dueDate];

            // add new task to end of task string in local storage
            localStorage.E16books = bookString + newBook.join( "~~" ) + "|";

            // clear task text boxes and re-display tasks
            $("#book").val("");
            $("#date_goal").val("");
            displayBookList();
        }
    });

    
    $("#filter").click(function() { 
        var search = prompt("Enter text to filter books by, or leave blank to see all books.");

        if (search === "") {
            displayBookList();
        }

        else {
            var books = getSortedBooksArray();
            search = search.toLowerCase();
            var isFound = false;

            var searchBooks = function(current) {
                var date = current[1].toLowerCase();
                var text = current[0].toLowerCase();
                if (date.includes(search) || text.includes(search)) {
                    isFound = true;
                    return isFound;
                }
            }

            var filtered = books.filter(searchBooks);
                        
            displayBookList(filtered);
        }
        });
    
    $("#clear_books").click(function() {
        localStorage.removeItem("E16books");
        $("#book_list").val("");
        $("#book").focus();
    }); 
    
    $("#due_date").datepicker({
        
    });
    
    // display tasks on initial load
    displayBookList();	         
        });