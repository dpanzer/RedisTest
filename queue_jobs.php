<?php

require_once 'vendor/autoload.php';

Resque::setBackend(getenv("REDIS_HOST") . ":" . getenv("REDIS_PORT"));

$numJobs = 1000;

$sleepTime = $argc > 1 ? intval($argv[1]) : 5;

mkdir("output", 0777);

for ($i = 0; $i < $numJobs; $i++) {
    Resque::enqueue(
        "redis_test_jobs",
        "RedisTestJob",
        [
            'job_id' => $i,
            'sleep_time' => $sleepTime
        ]
    );
}

echo "Finished queueing {$numJobs} jobs\n";