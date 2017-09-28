<?php namespace HaipIT;

/**
 * Class Sources
 * @package DrMVC\App\Models
 */
class Sources extends Client
{
    public function get($id = null, $parameters = array())
    {
        $endpoint = '/sources';

        if (!empty($id))
            $endpoint .= '/' . $id;

        if (!empty($parameters) && is_array($parameters))
            $endpoint .= $this->compileURL($parameters);

        return $this->doRequest('get', $endpoint);
    }
}