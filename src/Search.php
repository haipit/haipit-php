<?php

namespace Haipit\Client;

/**
 * Class Search
 * @package Haipit\Client
 */
class Search extends Client
{

    /**
     * @param   array $parameters
     * @return  array|false
     */
    public function get(array $parameters = [])
    {
        // Add the default platform
        $parameters['platform'] = 'haipit-php';

        $endpoint = '/find';

        if (!empty($parameters) && \is_array($parameters)) {
            $endpoint .= $this->compileURL($parameters);
        }

        return $this->doRequest('get', $endpoint);
    }

}
