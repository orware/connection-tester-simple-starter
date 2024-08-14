<?php
    ### Monospace font formatting if executed via web:

    if (empty($argv)) {
        echo "<pre>\n";
    }

    ### Load Config:

    $time_start = microtime(true);

        // Loading configuration
        require './config.php';

    $time_end = microtime(true);
    $time = ($time_end - $time_start) * 1000;

    echo "Loaded config in $time milliseconds\n\n";

    ### Connect to the database:

    $iteration = 0;
    $iteration_limit = (int) $config['ITERATION_LIMIT'];
    $loop = true;

    while($loop) {

        $iteration++;

        $time_start = microtime(true);

            // Creating MySQL Connection:
            $mysqli = mysqli_init();
            if ((bool) $config['USE_SSL']) {
                $mysqli->ssl_set(NULL, NULL, $config['CA_ROOT_PATH'], NULL, NULL);
            }
            $mysqli->real_connect($config['HOST'], $config['USERNAME'], $config['PASSWORD'], $config['DATABASE'], (int) $config['PORT']);
            $mysqli->close();

        $time_end = microtime(true);
        $time = ($time_end - $time_start) * 1000;

        echo "Connected to database ({$config['HOST']}) in $time milliseconds\n";

        if ($iteration_limit !== 0 && $iteration >= $iteration_limit) {
            break;
        }
    }

    ### Monospace font formatting if executed via web:

    if (empty($argv)) {
        echo "</pre>\n";
    }