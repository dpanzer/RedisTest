<?php

class RedisTestJob {
    public function perform() {
        $jobId = $this->args['job_id'];
        $sleepTime = $this->args['sleep_time'];

        echo "Job {$jobId} going to sleep for {$sleepTime}\n";
        sleep($sleepTime);
        echo "Job {$jobId} woke up\n";

        touch("output/{$jobId}.txt");
    }
}