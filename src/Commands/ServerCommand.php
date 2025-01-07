<?php

namespace Commands;

class ServerCommand
{
    public function start($port = 8000): void
    {
        $publicPath = __DIR__ . '/../../public';
        echo "Starting server on http://localhost:{$port}\n";
        passthru("php -S localhost:{$port} -t {$publicPath}");
    }
}
