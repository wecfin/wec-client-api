<?php
namespace Wec\Client\Contact\Repo;

class ContactRepoBase extends \Wec\Client\Base\Repo\RepoBase
{
    protected function validateTelephonePattern($telephone): void
    {
        $telRegex = "/^([0-9]{3,4}-)?[0-9]{7,8}$/";

        if (!preg_match($telRegex, $telephone)) {
            throw new \Exception('telephone number pattern error');
        }
    }

    protected function validateMobilePhonePattern($mobilephone): void
    {
        $mobileRegex = "/^1[3-8]{1}[0-9]{9}$/";

        if (!preg_match($mobileRegex, $mobilephone)) {
            throw new \Exception('mobilephone number pattern error');
        }
    }

    protected function validateMailPattern($mail): void
    {
        $mailRegex = "/\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/";

        if (!preg_match($mailRegex, $mail)) {
            throw new \Exception('mail pattern error');
        }
    }
}
