# wp-bench

For testing response speed based on different PHP/Stack/WordPress 
configurations for wordpress.

Check out my [blog post for the full write up][blog-link]. 

## Tested Scenarios

* php 7.2
* php 7.2 with opcache
* php 7.2 with opcache and varnish
* php 7.2 with opcache, w3totalcache and varnish
* php 7.3
* php 7.3 with opcache
* php 7.3 with opcache and varnish
* php 7.3 with opcache, w3totalcache and varnish
* php 7.4
* php 7.4 with opcache
* php 7.4 with opcache and varnish
* php 7.4 with opcache, w3totalcache and varnish

## Results

![php][php]
fig 1. WordPress PHP Response Times, including PHP with OpCache enabled.

![php with cache][php-with-cache]
fig 2. WordPress PHP Response Times using different caching mechanisms.

![php with cache and max response time][php-with-cache-with-max]
fig 3. WordPress PHP Response Times using different caching mechanisms, 
including the Maximum response time observed.

![php with all variants under test][php-all-variants]
fig 4. WordPress PHP Response Times across all different variants tested.

## WordPress Site Details

These are purposely dumb values, as this benchmark is expected to be run 
locally or in a closed environment. 

Just to warn you, I literally Googled for, and used the worlds number one most 
used password.

| key         | value                  |
|-------------|------------------------|
| DB_NAME     | `secret_db`            |
| DB_USER     | `secret_user`          |
| DB_PASSWORD | `secret_user_password` |
| DB_HOST     | `mariadb`              |
| email       | `tester@example.com`   |
| user        | `tester`               |
| password    | `123456`               |

## Running

To run the benchmark, make sure you:

* Are running on linux 
* Have bash installed
* Have installed [Hey](https://github.com/rakyll/hey)
 
Then run `./bench.sh` in this repo's root directory.

### Charting

Good luck compiling all the data into one excel file for charting, I manually 
did this and it was tedious as hell... 

If you have an automated way to do this, would definitely love a PR to make it
easier for adding new versions of PHP if this benchmark is valuable to people.


[blog-link]: https://blog.mykro.co.nz/
[php]: ./output/response-times-php.png "PHP and PHP with OpCache Enabled"
[php-with-cache]: ./output/response-times-php-with-cache.png "PHP with Caching"
[php-with-cache-with-max]: ./output/response-times-php-with-cache-max.png "PHP With Caching, including Max Response Time"
[php-all-variants]: ./output/response-times-all.png "PHP All Variants tested"
