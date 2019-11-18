<?php

namespace App\Utilities;

use App\Entity\Language;
use App\Entity\Member;
use Symfony\Contracts\Translation\TranslatorInterface;

trait TranslatorTrait
{
    /** @var TranslatorInterface */
    private $translator;

    /**
     * @Required
     *
     * @param TranslatorInterface $translator
     */
    public function setTranslator(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    /**
     * @return TranslatorInterface
     */
    protected function getTranslator()
    {
        return $this->translator;
    }

    /**
     * Make sure to sent the email notification in the preferred language of the user.
     *
     * @param Member $receiver
     */
    protected function setTranslatorLocale(Member $receiver)
    {
        $language = $receiver->getPreferredLanguage();
        $this->translator->setLocale($language->getShortcode());
    }
}
