<?php

namespace Haipit\Client;

/**
 * Class Sources
 */
class Sources extends Client
{

    public function get($id = null, array $parameters = [])
    {
        $endpoint = '/sources';

        if (!empty($id)) {
            $endpoint .= '/' . $id;
        }

        if (!empty($parameters) && \is_array($parameters)) {
            $endpoint .= $this->compileURL($parameters);
        }

        return $this->doRequest('get', $endpoint);
    }

}
