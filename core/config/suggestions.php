<?php

$config = [
    [
        "id" => 'suggestion-plugin-major-error-%s',
        "pattern" => '/Could not load \'plugins[\/\\\\]([^\.]+)\.jar\' in folder \'[^\']+\'/',
        "answer" => 'Remove or use another version of the plugin %s, because it throws major errors.',
    ],
    [
        "id" => 'suggestion-plugin-major-error-%s',
        "pattern" => '/Error occurred while enabling (\w+) [^\(]+\(Is it up to date\?\)/',
        "answer" => 'Remove or use another version of the plugin %s, because it throws major errors.',
    ],
    [
        "id" => 'suggestion-plugin-minor-error-%s',
        "pattern" => '/Could not pass event \w+ to (\w+) .*/',
        "answer" => 'Use another version of the plugin %s, because it throws minor errors.',
    ],
    [
        "id" => 'suggestion-plugin-dependency-%1$s-%2$s',
        "pattern" => '/Could not load \'plugins[\/\\\\]((?!\.jar).*)\.jar\' in folder \'[^\']+\'\norg\.bukkit\.plugin\.UnknownDependencyException\: (\w+)/',
        "answer" => 'Install the plugin %2$s, because it is required by the plugin %1$s.',
        "remove" => [
            'suggestion-plugin-major-error-%1$s',
            'suggestion-plugin-minor-error-%1$s'
        ]
    ],
    [
        "id" => 'suggestion-fml-confirm',
        "pattern" => '/Run the command \/fml confirm or or \/fml cancel to proceed\./',
        "answer" => 'Run the command /fml confirm or or /fml cancel to proceed.',
    ],
    [
        "id" => 'suggestion-world-invalid-playerdir',
        "pattern" => '/\*\*\*\* DETECTED OLD PLAYER DIRECTORY IN THE WORLD SAVE/',
        "answer" => 'Remove the directory \'world/players\'.'
    ],
    [
        "id" => 'suggestion-authme-shutdown',
        "pattern" => '/\[AuthMe\] THE SERVER IS GOING TO SHUT DOWN AS DEFINED IN THE CONFIGURATION\!/',
        "answer" => 'Remove or use another version of the plugin AuthMe, because it fails to load and therefore shuts the server down.'
    ]
];