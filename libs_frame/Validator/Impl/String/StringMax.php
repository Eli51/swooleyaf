<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-3-26
 * Time: 1:09
 */
namespace Validator\Impl\String;

use Constant\Project;
use Validator\BaseValidator;
use Validator\ValidatorService;

class StringMax extends BaseValidator implements ValidatorService
{
    public function __construct()
    {
        parent::__construct();
        $this->validatorType = Project::VALIDATOR_STRING_TYPE_MAX;
    }

    private function __clone()
    {
    }

    public function validator($data, $compareData) : string
    {
        if ($data === null) {
            return '';
        }

        $trueData = $this->verifyStringData($data);
        if ($trueData === null) {
            return '必须是字符串';
        } elseif (preg_match('/^(0|[1-9]\d*)$/', $compareData) > 0) {
            $maxLength = (int)$compareData;
            if (mb_strlen($trueData) > $maxLength) {
                return '长度不能大于' . $maxLength . '个字';
            } else {
                return '';
            }
        } else {
            return '规则不合法';
        }
    }
}
