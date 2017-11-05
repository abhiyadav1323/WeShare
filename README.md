## WeShare
A file sharing system that can be used over IIT Guwahati's network.

## Installing / Getting started

* Clone the repository by typing the following command in the shell.
```shell
git clone https://github.com/abhiyadav1323/WeShare.git
```

## Requirements
* Apache2 server
* PHP5
* MySQL
* phpMyAdmin
* Create 3 tables in MySql with their corresponding schema.
  * upload: SCHEMA(id, username, fname, type, password)
  * upload1: SCHEMA(id, fname, type, password, time)
  * users: SCHEMA(id, name, username, email, password, cpassword)

## Features
* Login based website.
* Storage for registered users.
* List of uploaded files maintained for every registered user.
* Can download, delete files from the list.
* File/Folder sharing available without login for one time users.
* Instant sharable link generated for uploaded files.
* Link expiry.
* User has choice to make any file public or private.
* Compression of files so that user has to download less data.
* Password protection also available.
* Short link generation for every file you upload.

## Licensing

The MIT License (MIT)

Copyright (c) 2015 Abhishek Yadav

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
