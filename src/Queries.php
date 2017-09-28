<?php namespace HaipIT;

/**
 * Class Queries
 * @package DrMVC\App\Models
 */
class Queries extends Client
{
    public function get($id = null, $parameters = array())
    {
        $endpoint = '/queries';

        if (!empty($id))
            $endpoint .= '/' . $id;

        if (!empty($parameters) && is_array($parameters))
            $endpoint .= $this->compileURL($parameters);

        return $this->doRequest('get', $endpoint);
    }
}
