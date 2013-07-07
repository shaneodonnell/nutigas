nutigas
=======

## Network Utilities in Google App Script

This is a series of quick and dirty network utilities that allow you to get additiional information
about an IP address from a Google Spreadsheet.

Each utility is in its own directory and has two components:

* a function in Google App Script
* a PHP script

For convenience, an "everything" directory that contains all of the utilities and corresponding scripts is provided.

### Reverse DNS

This PHP script is really just a server-side reverse DNS lookup that spits back the DNS name.  You can download this and host it on your own server, or you can hit our test instance at <http://nutigas.netai.net/ptr.php>.  Please note that this is a test instance and is not supported for production use nor heavy request loads.  In fact, if you make too many requests, you'll get blacklisted.  How many is too many?  Enough that our free hosting provider notices.


