document.addEventListener('DOMContentLoaded', function() {
    // Function to truncate text to a specific number of words
    function truncateText(text, wordLimit) {
        let words = text.split(' ');
        if (words.length > wordLimit) {
            return words.slice(0, wordLimit).join(' ') + '...';
        }
        return text;
    }

    // Query all elements containing excerpts for podcast post type
    let excerpts = document.querySelectorAll('.podcast .excerpt'); // Change this selector to match your excerpt elements

    excerpts.forEach(function(excerpt) {
        let originalText = excerpt.textContent.trim();
        let truncatedText = truncateText(originalText, 50); // Set excerpt length to 50 words
        excerpt.textContent = truncatedText;
    });
});