<?php

namespace Training\Bundle\SampleBundle\Tests\Behat\Context;

use Behat\Symfony2Extension\Context\KernelAwareContext;
use Behat\Symfony2Extension\Context\KernelDictionary;
use Oro\Bundle\TestFrameworkBundle\Behat\Context\OroFeatureContext;
use Oro\Bundle\TestFrameworkBundle\Behat\Element\OroPageObjectAware;
use Oro\Bundle\TestFrameworkBundle\Tests\Behat\Context\PageObjectDictionary;
use Training\Bundle\SampleBundle\Tests\Behat\Elements\LoginForm;

class CustomFeatureContext extends OroFeatureContext implements OroPageObjectAware, KernelAwareContext
{
    use PageObjectDictionary, KernelDictionary;

    /**
     * @Then the message is gone after a while
     */
    public function theMessageIsGoneAfterAWhile(): void
    {
        $this->getSession()->getDriver()->wait(20000, "0 == $('#flash-messages').children().length");
    }

    /**
     * @Then /^I see form contains (\d+) fields$/
     *
     * @param int $number
     */
    public function iSeeFormContainsFields(int $number)
    {
        /** @var LoginForm $form */
        $form = $this->createElement('Login Form Wrapper');
        $inputsCount = $form->getFieldsCount();
        self::assertEquals($number, $inputsCount);
    }
}
