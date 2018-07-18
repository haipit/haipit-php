<?php

namespace Haipit\Client;

/**
 * Class Queries
 */
class Queries extends Client
{

    public function get($id = null, array $parameters = [])
    {
        $endpoint = '/queries';

        if (!empty($id)) {
            $endpoint .= '/' . $id;
        }

        if (!empty($parameters) && \is_array($parameters)) {
            $endpoint .= $this->compileURL($parameters);
        }

        return $this->doRequest('get', $endpoint);
    }

}
