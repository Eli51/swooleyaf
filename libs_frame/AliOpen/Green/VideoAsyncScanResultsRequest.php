<?php
namespace AliOpen\Green;

use AliOpen\Core\RoaAcsRequest;

class VideoAsyncScanResultsRequest extends RoaAcsRequest
{
    private $clientInfo;

    public function __construct()
    {
        parent::__construct('Green', '2018-05-09', 'VideoAsyncScanResults', 'green', 'openAPI');
        $this->setUriPattern('/green/video/results');
        $this->setMethod('POST');
    }

    public function getClientInfo()
    {
        return $this->clientInfo;
    }

    public function setClientInfo($clientInfo)
    {
        $this->clientInfo = $clientInfo;
        $this->queryParameters['ClientInfo'] = $clientInfo;
    }
}
