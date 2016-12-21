remindme
========

About
-----

Sometimes, you want to remember things that you give, cooked, lent to someone else. Remindme will be your assistant in that task. A simple form with 4 questions, and that's it.


Install
-------

1. Clone this project
2. `cd remindme && composer install`
3. `php bin/console doctrine:schema:create`
4. [Prepare Symfony](http://symfony.com/doc/current/setup/web_server_configuration.html)

That's it.

Where are my datas?
-------------------

We are using an SQLite database.

TODO
----

- Better README / install doc
- Setting up user resetting password action
- Datas' import / export
- Words autocompletion
