<?php

namespace Training\Bundle\SampleBundle\Tests\Behat\Elements;

use Oro\Bundle\TestFrameworkBundle\Behat\Element\Element;

class LoginForm extends Element
{
    /**
     * @return int
     */
    public function getFieldsCount(): int
    {
        $inputs = $this->findAll('css', 'input');
        return count($inputs);
    }
}
