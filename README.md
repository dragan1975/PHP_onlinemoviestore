# PHP_onlinemoviestore
This is one of the major projects on my profile.
It is a free template that I have developed into a funcional web app.
The app contains only partial separation of concernce since it is not fully MVC based.
The routing is done from index.php file at the root of the application(lines 55 to 65). 
config.php file contains the database data and a basic autoloder.
the views are put into the modules folder. 
the admin part is in the admin folder.
All classes are at the same place, classes folder.
I have worked out my version of a simple active record (ActiveRecord.php class)pattern for basic CRUD operations (no concens were paid to the safety aspect since this is just a development, example site). 
Class Database is a singleton class for ensuring that there exists just one idnstance of database connection (that is a major bottlneck of php apps).
There is a fully functional Session class that takes care of authentication of users.
Since the app is not so large, i have not used namespaces in order to keep it simple.
