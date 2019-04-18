<?php
namespace Kaweb\Honeycomb\Categories;
use Kaweb\Honeycomb\Helpers\RequestHelper;
use Kaweb\Honeycomb\Models\Companies;
use Kaweb\Honeycomb\Models\Companies;

class CompaniesEndpoints extends restfulEndpoints
{
    /**
     * @var RequestHelper
     */
    protected $requestHelper;

    /**
     * @var Object
     */
    protected $object;

    /**
     * @var Version
     */
    protected $version = '1';

    /**
     * AgentEndpoint constructor.
     * @param RequestHelper $requestHelper
     */
    public function __construct(RequestHelper $requestHelper)
    {
        $this->requestHelper = $requestHelper;
    }
    /**
     *
     * @param CompaniesModel $data
     * @return array
     */
    public function create(CompaniesModel $data)
    {
        return $this->requestHelper->post('/companies', $data->toArray());
    }

    /**
     *
     * @param string $id
     * @return array
     */
    public function get($id=false, $params = [])
    {
        return $this->requestHelper->get('/companies', array_merge(($id ? [$id] : []), $params));
    }


}
