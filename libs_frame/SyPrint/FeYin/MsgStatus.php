<?php
/**
 * Created by PhpStorm.
 * User: 姜伟
 * Date: 2019/1/11 0011
 * Time: 8:14
 */
namespace SyPrint\FeYin;

use Constant\ErrorCode;
use Exception\SyPrint\FeYinException;
use SyPrint\PrintBaseFeYin;
use SyPrint\PrintUtilBase;
use SyPrint\PrintUtilFeYin;
use Tool\Tool;

class MsgStatus extends PrintBaseFeYin
{
    /**
     * 应用ID
     * @var string
     */
    private $appid = '';
    /**
     * 消息ID
     * @var string
     */
    private $msg_no = '';

    public function __construct(string $appId)
    {
        parent::__construct();
        $this->appid = $appId;
    }

    private function __clone()
    {
    }

    /**
     * @param string $msgNo
     * @throws \Exception\SyPrint\FeYinException
     */
    public function setMsgNo(string $msgNo)
    {
        if (ctype_alnum($msgNo)) {
            $this->msg_no = $msgNo;
        } else {
            throw new FeYinException('消息ID不合法', ErrorCode::PRINT_PARAM_ERROR);
        }
    }

    public function getDetail() : array
    {
        if (strlen($this->msg_no) == 0) {
            throw new FeYinException('消息ID不能为空', ErrorCode::PRINT_PARAM_ERROR);
        }

        $resArr = [
            'code' => 0,
        ];

        $this->curlConfigs[CURLOPT_URL] = $this->serviceDomain . '/msg/' . $this->msg_no . '/status?access_token=' . PrintUtilFeYin::getAccessToken($this->appid);
        $sendRes = PrintUtilBase::sendGetReq($this->curlConfigs);
        $sendData = Tool::jsonDecode($sendRes);
        if (isset($sendData['msg_no'])) {
            $resArr['data'] = $sendData;
        } else {
            $resArr['code'] = ErrorCode::PRINT_GET_ERROR;
            $resArr['message'] = $sendData['errmsg'];
        }

        return $resArr;
    }
}
