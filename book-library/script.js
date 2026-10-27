$(document).ready(function () {

    $("#loadBooks").on("click", function () {

        const button = $(this);
        const bookList = $("#bookList");
        const status = $("#status");

        button.prop("disabled", true);
        status.text("Loading books...");
        bookList.empty();

        $.ajax({
            url: "get_books.php",
            type: "GET",
            dataType: "json",

            success: function (books) {

                if (!Array.isArray(books)) {
                    status.text("Invalid response from the server.");
                    return;
                }

                if (books.length === 0) {
                    status.text("No books found.");
                    return;
                }

                books.forEach(function (book) {

                    const card = $("<div>").addClass("book");

                    $("<h3>")
                        .text(book.title)
                        .appendTo(card);

                    $("<p>")
                        .text("Author: " + book.author)
                        .appendTo(card);

                    bookList.append(card);
                });

                status.text("Successfully loaded " +
                    books.length + " books.");

            },

            error: function (xhr, textStatus, errorThrown) {

                console.error(
                    "AJAX request failed:",
                    textStatus,
                    errorThrown
                );

                status.text(
                    "Unable to load books. Please try again."
                );
            },

            complete: function () {
                button.prop("disabled", false);
            }
        });

    });

});
