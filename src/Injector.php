<?php

namespace BangNokia\ServeLiveReload;

use BangNokia\ServeLiveReload\Commands\ServeWebSocketsCommand;

class Injector
{
    /**
     * Append script to html
     * I dont care it doesn't place before </body> tag or not.
     *
     * @param string $content
     *
     * @return string
     */
    public function injectScripts($content)
    {
        $script = (string)view('serve_livereload::script', [
            'host' => '127.0.0.1',
            'port' => ServeWebSocketsCommand::port(),
        ]);

        $content = str_replace('<head>', '<head>' . $script, $content);

        return $content;
    }
}
