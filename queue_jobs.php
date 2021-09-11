<?php

Resque::setBackend(getenv("REDIS_HOST") . ":" . getenv("REDIS_PORT"));

$numJobs = 1000;

for ($i = 0; $i < $numJobs; $i++) {
    Resque::enqueue("redis_test_jobs", "RedisTestJob", ['job_id' => $i]);
}

echo "Finished queueing {$numJobs} jobs\n";