# Laravel Logstash

[![Build Status](https://travis-ci.com/HealthEngineAU/laravel-logstash.svg?branch=master)](https://travis-ci.com/HealthEngineAU/laravel-logstash)
[![Coverage Status](https://coveralls.io/repos/github/HealthEngineAU/laravel-logstash/badge.svg?branch=master)](https://coveralls.io/github/HealthEngineAU/laravel-logstash?branch=master)

This is a custom package designed for Laravel. It provides a logging stack pre-configured to format for Logstash and
adds multiple useful Monolog processors.

It includes the following processors to enrich logs with extra data:

- [MemoryPeakUsageProcessor](https://github.com/Seldaek/monolog/blob/master/src/Monolog/Processor/MemoryPeakUsageProcessor.php)
  which adds the peak memory usage using the `memory_get_peak_usage()` PHP function,
- [MemoryUsageProcessor](https://github.com/Seldaek/monolog/blob/master/src/Monolog/Processor/MemoryUsageProcessor.php)
  which adds the current memory usage using the `memory_get_usage()` PHP function,
- [UidProcessor](https://github.com/Seldaek/monolog/blob/master/src/Monolog/Processor/UidProcessor.php) which adds a
  unique ID to each instance of the logger class - useful to track all logs across a
  single request,
- [WebProcessor](https://github.com/Seldaek/monolog/blob/master/src/Monolog/Processor/WebProcessor.php) which adds the
  current request URI, request method and client IP to a log record,
- [CustomProcessor]()

## Usage

To convert datetime casts from Carbon instances to Chronos instances in an Eloquent model, all you need to do is `use`
this trait in the model. An example is shown below:

```php
use HealthEngine\Laravel\Extension\HasChronosTimestamps;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasChronosTimestamps;

    protected $dates = [
        'seen_at',
    ];

    protected $casts = [
        'processed_at' => 'datetime',
    ];
}
```

## License

Laravel Logstash is licensed under the MIT license.
