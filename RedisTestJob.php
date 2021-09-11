<?php

class RedisTestJob {
    public function perform() {
        $jobId = $this->args['job_id'];
        echo "Job {$jobId} going to sleep for 5\n";
        sleep(5);
        echo "Job {$jobId} woke up\n";
    }
}