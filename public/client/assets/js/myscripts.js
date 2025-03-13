$(document).ready(function() {
    // Get current URL path
    var path = window.location.pathname;
    var page = path.split("/").pop();
    
    // Set default active (Home)
    if (page == '' || page == 'index.php') {
        $('.main-menu ul li:first-child').addClass('active');
    }
    
    // Set active class based on current page
    $('.main-menu ul li a').each(function() {
        var href = $(this).attr('href');
        if (href && href !== '#') {
            // Remove leading slash and .php extension for comparison
            var linkPage = href.split("/").pop().replace('.php', '');
            if (page.replace('.php', '') === linkPage) {
                $(this).parent('li').addClass('active');
            }
        }
    });

    // Handle Leadership menu item separately
    $('.main-menu ul li a[href="#leadership"]').parent('li').click(function(e) {
        e.preventDefault();
        $('.main-menu ul li').removeClass('active');
        $(this).addClass('active');
    });
});
