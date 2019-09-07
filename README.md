# Diaared

This is an experimental Web Application which functions as a personal
journal.

#index.php

Handles all requests from the client and provides the basic
user interface.

#delete.php

Retrieves a post id from an AJAX POST request and deletes the
post associated with that id

#get_full_post.php

Retrieves a post id from an AJAX POST request and fetches all
the contents of the post(title, body, date, etc)

#retrieve.php

Retrieves all the posts from the database, using AJAX POST
to retrieve them in real time

#save.php

Takes all the required elements of a post from an AJAX POST
request and saves the post to the database.

#login.php

It is a basic interface for the user to login to the
web application

#login_post.php

Handles the login process by taking the user credentials
from the login form and building the session variables

#logout.php

Signs the user out of the web application and destroys
the session variables

#register.php

A page for users to register

#register_post.php

Handles user registration requests

#title.php

Retrieves the title of the diary the signed user has

#Version

This is version 1.2.3 stable

This includes some bug fixes

#Added Functionality

-Multiple users
-Choices of colors
-minor updates to user interface
-Added date display on entry viewer
-Records also the creation time of the entry





