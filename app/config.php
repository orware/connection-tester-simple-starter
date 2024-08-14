<?php

$config = [
    'HOST' => ($_ENV['DATABASE_HOST'] ?? '127.0.0.1'),
    'USERNAME' => ($_ENV['DATABASE_USERNAME'] ?? 'root'),
    'PASSWORD' => ($_ENV['DATABASE_PASSWORD'] ?? ''),
    'DATABASE' => ($_ENV['DATABASE_NAME'] ?? ''),
    'PORT' => (int)($_ENV['DATABASE_PORT'] ?? 3306),
    'USE_SSL' => (int)(bool)($_ENV['DATABASE_USE_SSL'] ?? 1),
    // You may need to adjust this value to another value described in our Docs:
    // https://docs.planetscale.com/concepts/secure-connections#ca-root-configuration
    'CA_ROOT_PATH' => ($_ENV['DATABASE_CA_ROOT_PATH'] ?? './isrgrootx1.pem'),
    // Number of times to connect/disconnect (use 0 for continuous collection):
    'ITERATION_LIMIT' => ($_ENV['ITERATION_LIMIT'] ?? 10),
];