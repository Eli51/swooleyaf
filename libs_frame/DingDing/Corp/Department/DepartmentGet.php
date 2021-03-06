<?php
/**
 * Created by PhpStorm.
 * User: 姜伟
 * Date: 19-2-5
 * Time: 下午2:35
 */
namespace DingDing\Corp\Department;

use Constant\ErrorCode;
use DingDing\TalkBaseCorp;
use DingDing\TalkTraitCorp;
use Exception\DingDing\TalkException;

/**
 * 获取部门详情
 * @package DingDing\Corp\Department
 */
class DepartmentGet extends TalkBaseCorp
{
    use TalkTraitCorp;

    /**
     * 语言
     * @var string
     */
    private $lang = '';
    /**
     * 部门id
     * @var int
     */
    private $id = 0;

    public function __construct(string $corpId, string $agentTag)
    {
        parent::__construct();
        $this->_corpId = $corpId;
        $this->_agentTag = $agentTag;
        $this->reqData['lang'] = 'zh_CN';
    }

    private function __clone()
    {
    }

    /**
     * @param int $id
     * @throws \Exception\DingDing\TalkException
     */
    public function setId(int $id)
    {
        if ($id > 0) {
            $this->reqData['id'] = $id;
        } else {
            throw new TalkException('部门id不合法', ErrorCode::DING_TALK_PARAM_ERROR);
        }
    }

    public function getDetail() : array
    {
        if (!isset($this->reqData['id'])) {
            throw new TalkException('部门id不能为空', ErrorCode::DING_TALK_PARAM_ERROR);
        }

        $this->reqData['access_token'] = $this->getAccessToken($this->_tokenType, $this->_corpId, $this->_agentTag);
        $this->curlConfigs[CURLOPT_URL] = $this->serviceDomain . '/department/get?' . http_build_query($this->reqData);
        return $this->sendRequest('GET');
    }
}
