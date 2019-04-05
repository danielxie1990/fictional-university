# fictional-university
This is a learning recording of wordpress theme development form udemy course

The local wordpress development tool I choosed is xampp
https://www.apachefriends.org/




-----------------------------------------------------------
10. The Famous "Loop" in WordPress

functions

#have_posts()
#the_post()
#the_title()
#the_content()

#get_permalink(), need to echo, since It only returns a value of retrived link

How do we keep the link while we at the index.php page, and remove the link, when we are at the single detailed post page?

#using single.php to control the single post(only the post not the page)
#homepage will still be powered by index.php

depending on the current url, wordpress will keep looking out different file names in our theme folder, if the single.php file not existed, 
wordpress will use index.php as an universal default

#page.php to control the single page

---------------------------------------------------------------