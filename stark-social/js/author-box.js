document.addEventListener('DOMContentLoaded', function() {
    // Fetch the author ID passed from PHP
    var authorId = document.body.getAttribute('data-author-id');

    // Author box and links
    var authorBox = document.querySelector('.aioseo-author-bio-compact');
    var bioLink = document.querySelector('.author-bio-link a:first-child');
    var svgLink = document.querySelector('.author-bio-link a:nth-child(2)');

    // Ensure elements are present before proceeding
    if (!authorBox) return;

    // Apply changes based on the author ID
    if (authorId === '1') {
        // Hide the author box for Stark Social Media
        authorBox.style.display = 'none';
    } else if (authorId === '2') {
        // Change links for Nathan Imhoff
        if (bioLink && svgLink) {
            bioLink.href = '/about/nathan-imhoff';
            bioLink.title = 'See Nathan Imhoff Full Bio';
            svgLink.href = '/about/nathan-imhoff';
            svgLink.title = 'See Nathan Imhoff Full Bio';

            var archiveLink = document.createElement('a');
            archiveLink.href = '/author/nateimhoff/';
            archiveLink.title = 'View Nathan Imhoff Blog Archive';
            archiveLink.textContent = 'View Author Bio';
            archiveLink.style.marginLeft = '10px';
            bioLink.parentNode.insertBefore(archiveLink, bioLink.nextSibling);
        }
    } else if (authorId === '3') {
        // Change links for Deanna Miller
        if (bioLink && svgLink) {
            bioLink.href = '/about/deanna-l-miller';
            bioLink.title = 'See Deanna Miller Full Bio';
            svgLink.href = '/about/deanna-l-miller';
            svgLink.title = 'See Deanna Miller Full Bio';

            var archiveLink = document.createElement('a');
            archiveLink.href = '/author/deannaleigh/';
            archiveLink.title = 'View Deanna Miller Blog Archive';
            archiveLink.textContent = 'View Author Bio';
            archiveLink.style.marginLeft = '10px';
            bioLink.parentNode.insertBefore(archiveLink, bioLink.nextSibling);
        }
    }
});
