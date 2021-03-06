<?php
namespace AliOpen\Live;

use AliOpen\Core\RpcAcsRequest;

class MultipleStreamMixServiceAddRequest extends RpcAcsRequest
{
    private $appName;
    private $securityToken;
    private $domainName;
    private $mixStreamName;
    private $mixDomainName;
    private $ownerId;
    private $mixAppName;
    private $streamName;

    public function __construct()
    {
        parent::__construct('live', '2016-11-01', 'AddMultipleStreamMixService', 'live', 'openAPI');
        $this->setMethod('POST');
    }

    public function getAppName()
    {
        return $this->appName;
    }

    public function setAppName($appName)
    {
        $this->appName = $appName;
        $this->queryParameters['AppName'] = $appName;
    }

    public function getSecurityToken()
    {
        return $this->securityToken;
    }

    public function setSecurityToken($securityToken)
    {
        $this->securityToken = $securityToken;
        $this->queryParameters['SecurityToken'] = $securityToken;
    }

    public function getDomainName()
    {
        return $this->domainName;
    }

    public function setDomainName($domainName)
    {
        $this->domainName = $domainName;
        $this->queryParameters['DomainName'] = $domainName;
    }

    public function getMixStreamName()
    {
        return $this->mixStreamName;
    }

    public function setMixStreamName($mixStreamName)
    {
        $this->mixStreamName = $mixStreamName;
        $this->queryParameters['MixStreamName'] = $mixStreamName;
    }

    public function getMixDomainName()
    {
        return $this->mixDomainName;
    }

    public function setMixDomainName($mixDomainName)
    {
        $this->mixDomainName = $mixDomainName;
        $this->queryParameters['MixDomainName'] = $mixDomainName;
    }

    public function getOwnerId()
    {
        return $this->ownerId;
    }

    public function setOwnerId($ownerId)
    {
        $this->ownerId = $ownerId;
        $this->queryParameters['OwnerId'] = $ownerId;
    }

    public function getMixAppName()
    {
        return $this->mixAppName;
    }

    public function setMixAppName($mixAppName)
    {
        $this->mixAppName = $mixAppName;
        $this->queryParameters['MixAppName'] = $mixAppName;
    }

    public function getStreamName()
    {
        return $this->streamName;
    }

    public function setStreamName($streamName)
    {
        $this->streamName = $streamName;
        $this->queryParameters['StreamName'] = $streamName;
    }
}
