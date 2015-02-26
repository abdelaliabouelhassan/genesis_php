<?php
/**
 * Retrieval request by Date Range
 *
 * @package Genesis
 * @subpackage Request
 */

namespace Genesis\API\Request\FraudRelated\Retrieval;

class DateRange extends \Genesis\API\Request
{
    protected $start_date;
    protected $end_date;
    protected $page;

    public function __construct()
    {
        $this->initConfiguration();
        $this->setRequiredFields();

        $this->setApiConfig('url', $this->buildRequestURL('gateway', 'retrieval_requests/by_date', false));
    }

    protected function populateStructure()
    {
        $treeStructure = array (
            'retrieval_request_request' => array (
                'start_date'    => $this->start_date,
                'end_date'      => $this->end_date,
                'page'          => $this->page,
            )
        );

        $this->treeStructure = \Genesis\Utils\Common::createArrayObject($treeStructure);
    }

    private function initConfiguration()
    {
        $config = array (
            'url'       => '',
            'port'      => 443,
            'type'      => 'POST',
            'format'    => 'xml',
            'protocol'  => 'https',
        );

        $this->config = \Genesis\Utils\Common::createArrayObject($config);
    }
    private function setRequiredFields()
    {
        $requiredFields = array (
            'start_date',
        );

        $this->requiredFields = \Genesis\Utils\Common::createArrayObject($requiredFields);
    }

}

