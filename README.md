# monitoring
`OPSGENIE_API_KEY` env var should be defined, otherwise 'Could not authenticate' error occurrs (safe fail, no exceptions)

Usage:
```php
<?php

require_once __DIR__ . '/vendor/autoload.php';

$ops = new \Monitoring\Alert\Opsgenie();
$desc = <<< MSG
<strong>Alert H1</strong>
<a href="https://www.example.com">Click</a> here
Simple Text is also fine 
you can do some line brakes.
Like
this.
MSG;

var_dump($ops->raise("Alert subject", $desc)); 

```
