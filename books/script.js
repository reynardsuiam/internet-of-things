$(document).ready(function() {
    // Array of diverse topics to cycle through on each click
    const topics = ['fiction', 'science', 'history', 'mystery', 'technology', 'philosophy', 'art', 'fantasy'];
    let topicIndex = 0;
    let pageNumber = 1;

    $('#load-books-btn').click(function() {
        // Show loading text
        $('#loading').removeClass('hidden');
        $('#book-list').empty(); // Clear existing list

        // Get current topic
        let currentTopic = topics[topicIndex];

        // jQuery AJAX GET Request using dynamic topic and page
        $.ajax({
            url: `https://openlibrary.org/search.json?q=${currentTopic}&limit=5&page=${pageNumber}`,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                // Hide loading text
                $('#loading').addClass('hidden');

                if (response.docs && response.docs.length > 0) {
                    // Loop through books array and append to web page
                    $.each(response.docs, function(index, book) {
                        var authorName = book.author_name ? book.author_name.join(', ') : 'Unknown Author';
                        
                        $('#book-list').append(
                            '<li>' +
                                '<strong>' + book.title + '</strong>' +
                                '<span>By: ' + authorName + '</span>' +
                            '</li>'
                        );
                    });

                    // Cycle to the next topic for the next click
                    topicIndex = (topicIndex + 1) % topics.length;
                    
                    // Increment page every full cycle of topics
                    if (topicIndex === 0) {
                        pageNumber++;
                    }
                } else {
                    $('#book-list').append('<li>No books found.</li>');
                }
            },
            error: function(xhr, status, error) {
                $('#loading').addClass('hidden');
                alert('Failed to load books. Error: ' + error);
            }
        });
    });
});