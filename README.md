# URL slug generator for non-english 
It's a function for creating clean URL slugs for non-english(unicode) chars that tested and works!

# INSTALLATION

Just Simply copy and put the function `get_slug` In your project.

# EXAMPLES

    echo get_slug('عنوان ٘پ٬ست آزمایشی--!@#$%^&*()`');
    // عنوان-پست-آزمایشی


    echo get_slug('طراحی رسپانسیو(واکنشگرا) + Media query');
    // طراحی-رسپانسیو-واکنشگرا-media-query


    //Removes short words 
    echo get_slug('اشتراک در موضوع!', true);
    //اشتراک-موضوع




