<?php namespace HaipIT;

/**
 * Class News
 * @package DrMVC\App\Models
 */
class News extends Client
{
    public function get($id = null, $parameters = array())
    {
        $endpoint = '/news';

        if (!empty($id))
            $endpoint .= '/' . $id;

        if (!empty($parameters) && is_array($parameters))
            $endpoint .= $this->compileURL($parameters);

        return $this->doRequest('get', $endpoint);
    }

    public function random($parameters = array())
    {
        $endpoint = '/news/random';

        if (!empty($parameters) && is_array($parameters))
            $endpoint .= $this->compileURL($parameters);

        return $this->doRequest('get', $endpoint);
    }

    public function find($parameters)
    {
        // Add the default platform
        $parameters['platform'] = 'haipit-php';

        $endpoint = '/find';

        if (!empty($parameters) && is_array($parameters))
            $endpoint .= $this->compileURL($parameters);

        $result = $this->doRequest('get', $endpoint);

        return $result;
    }
}