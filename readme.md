# Politically Barrie

This is the website I developed for [Politically Barrie](http://www.politicallybarrie.ca/). It's designed to use basic YAML files for easy editing of information without and interface. The purpose of this website is:

1. Show elected local officials for civic engagement.
2. Show candidates in a current election with key data for civic decision-making.
3. Show that past election data.
4. Show local groups or other local data, just for fun.

It's designed to be able to be moulded to any kind of system. That is, the offices are not hard coded it but simply read from the YAML file.

Currently, there is no automation. Template is from [HTML5UP](https://html5up.net/). It's simple and local and designed to be easy for me to make changes without wrecking everying in a WYSIWYG interface.

# Installation

You probably need PHP5+, I guess? Maybe lower. You need YAML support, however. Simply copy the files to your folder. It's designed to be on a domain root (or subdomain root), not in any subfolder.

You will want to edit `src/cofig.php`.

The `.htaccess` is used for fancy URIs. All requests are captured by `index.php` in the root and routed to `src/request.php`.