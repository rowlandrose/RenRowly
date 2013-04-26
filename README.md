
RenRowly
========

A Minimal PHP Framework for Getting Things Done
-----------------------------------------------

Step by Step Instructions to Get Started:

- Install to your root directory
- Fill in server.php with your information
- Create pages

Concepts:

A 'view' can be one of three things:

- PAGE: a php file that renders all the html needed for a single page load
- SNIPPET: a php file that renders all the html needed for a SECTION of a page (or even just returns some data)
- API: a php file that is meant to read the query string return data in a format such as xml, json, or haml.

A 'controller' is a class that receives data from a model and loads one or more views with formatted data

A 'model' is a class that returns data from a source such as an api or database