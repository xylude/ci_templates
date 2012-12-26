ci_templates
============

Some Codeigniter templates for Netbeans that I use regularly. The CRUD controller template makes a few assumptions:

1. You're using the Codeignited framework (https://github.com/xylude/codeignited).
2. You're using DataMapper
3. The view file matches the name of the method in your controller, and the view's folder matches the name of the class.
4. That you plan to sanitize the GET/POST data in _create_or_update() to make sure that people can't update fields you don't want them to.
5. That you read the above ^^. Seriously _create_or_update() has a major security issue, if you use this - make sure to check the input data first.
