
RenRowly
========

A Minimal PHP Framework for Getting Things Done
-----------------------------------------------

Step by Step Instructions to Get Started:

- Install to:
	- Your web root folder
	- Or any folder (or folder within a folder) within
- Fill in server.php with your information
- Create pages

Requirements:

- PHP 5.3+

Concepts:

A 'view' can be one of three things:

- PAGE: a php file that renders all the html needed for a single page load
- SNIPPET: a php file that renders all the html needed for a SECTION of a page (or even just returns some data)
- API: a php file that is meant to read the query string return data in a format such as xml, json, or haml.

A 'controller' is a class that receives data from a model and loads one or more views with formatted data

A 'model' is a class that returns data from a source such as an api or database

Update Log:

- V 1.0.2 - May 7, 2013
  Now listing requirements in README
  Can now be installed on the web root folder or any inner folder.

- V 1.0.1 - April 29, 2013
  Added htaccess file.

- V 1.0 - April 26, 2013
  First release.