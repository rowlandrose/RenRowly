
RenRowly
========

A Minimal PHP Framework and Blog/Portfolio CMS for Getting Things Done
----------------------------------------------------------------------

Step by Step Instructions to Get Started:

- Install to:
	- Your web root folder
	- Or any folder (or folder within a folder) within
- Fill in server.php with your information
- Check out [http://www.rowlandrose.com/experiments/renrowly](http://www.rowlandrose.com/experiments/renrowly) to see this framework in action.
- In order to get the example working on your machine, run this SQL code on your server (ex. in phpMyAdmin) into your MySQL database:

```

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `blog_posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `title_url` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `datetime` datetime NOT NULL,
  `last_updated` datetime NOT NULL,
  `year` int(10) unsigned NOT NULL,
  `month` int(10) unsigned NOT NULL,
  `day` int(10) unsigned NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

CREATE TABLE IF NOT EXISTS `playground_links` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(200) NOT NULL,
  `image_url` varchar(200) NOT NULL,
  `title` varchar(100) NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `view_order` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `view_order` (`view_order`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `portfolio_url` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `link` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

```

Requirements:

- PHP 5.3+

- * NOTE * The .htaccess file in this framework does not work well on GoDaddy shared hosting because they require you to use fastcgi (as of July 22nd, 2013). If you are looking for a good shared hosting solution, check out [A Small Orange](http://asmallorange.com/).

Concepts:

A 'view' can be one of three things:

- PAGE: a php file that renders all the html needed for a single page load
- SNIPPET: a php file that renders all the html needed for a SECTION of a page (or even just returns some data)
- API: a php file that is meant to read the query string return data in a format such as xml, json, or haml.

A 'controller' is a class that receives data from a model and loads one or more views with formatted data

A 'model' is a class that returns data from a source such as an api or database

Update Log:

-	V 2.0 - July 22, 2013

	RenRowly is now a blog / portfolio CMS. It's focus is on simplicity. It's target audience is PHP developers who want
	a basic OOP MVC framework to start from.

	A demo of the framework can be seen here: [http://www.rowlandrose.com/experiments/renrowly](http://www.rowlandrose.com/experiments/renrowly).

	Now easy to integrate with [Disqus](http://disqus.com/).

-	V 1.0.2 - May 7, 2013

	Now listing requirements in README
	
	Can now be installed on the web root folder or any inner folder.

-	V 1.0.1 - April 29, 2013

	Added htaccess file.

-	V 1.0 - April 26, 2013

	First release.