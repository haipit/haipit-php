<?php

namespace Haipit\Client;

class Search
{

    /**
     * @param   array $parameters
     * @return  array|false
     */
    public function get($keywords = null, array $parameters = [])
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
