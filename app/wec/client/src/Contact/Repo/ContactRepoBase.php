<?php
namespace Wec\Client\Contact\Repo;

use Wec\Client\Contact\Dto\ContactDto;

class ContactRepoBase extends \Wec\Client\Base\Repo\RepoBase
{
    protected function validate(ContactDto $contact): void
    {
        if ($tel = $contact->tel) {
            $this->validateTelephonePattern($tel);
        }

        if ($mobile = $contact->mobile) {
            $this->validateMobilePhonePattern($mobile);
        }

        if ($email = $contact->email) {
            $this->validateMailPattern($email);
        }
    }

    protected function validateTelephonePattern($telephone): void
    {
        $telRegex = "/^([0-9]{3,4}-?)?[0-9]{7,8}$/";

        if (!preg_match($telRegex, $telephone)) {
            throw new \Exception('telephone number pattern error');
        }
    }

    protected function validateMobilePhonePattern($mobilephone): void
    {
        $mobileRegex = "/^(\+[0-9]{1,4}-?)?1[3-8]{1}[0-9]{9}$/";

        if (!preg_match($mobileRegex, $mobilephone)) {
            throw new \Exception('mobilephone number pattern error');
        }
    }

    protected function validateMailPattern($email): void
    {
        $mailRegex = "/\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/";

        if (!preg_match($mailRegex, $email)) {
            throw new \Exception('email pattern error');
        }
    }
}
