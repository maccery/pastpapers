<?php

return [
    'confirm_at' => 15,
    'reject_at' => -15,
    'voting_power' => [
        // These are in buckets: pick bucket with the smallest key greater than points
        -100000 => 0,
        -1 => 1,
        50 => 10,
        100 => 20,
        500 => 100,
    ],
];