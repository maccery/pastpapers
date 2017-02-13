<?php

return [
    'confirm_at' => 3,
    'reject_at' => -3,
    'voting_power' => [
        // These are in buckets: pick bucket with the smallest key greater than points
        -1000 => 0,
        0 => 1,
        50 => 10,
        100 => 20,
        500 => 100,
    ],
];