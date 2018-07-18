<?php

namespace Haipit\Client;

/**
 * Class News
 */
class News extends Client
{

    /**
     * Get list of last news or single news by ID
     *
     * @param   null|string $id
     * @param   array $parameters
     * @return  array|false
     */
    public function get($id = null, array $parameters = [])
    {
        $endpoint = '/news';

        if (null !== $id) {
            $endpoint .= '/' . $id;
        }

        if (!empty($parameters) && \is_array($parameters)) {
            $endpoint .= $this->compileURL($parameters);
        }

        return $this->doRequest('get', $endpoint);
    }

    /**
     * Get random news from database
     *
     * @param   array $parameters
     * @return  array|false
     */
    public function random(array $parameters = [])
    {
        $endpoint = '/news/random';

        if (!empty($parameters) && \is_array($parameters)) {
            $endpoint .= $this->compileURL($parameters);
        }

        return $this->doRequest('get', $endpoint);
    }

}
