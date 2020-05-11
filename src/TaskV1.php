<?php


namespace Sadiq;

class TaskV1
{
    public $lowerLimit;
    public $upperLimit;
    public $divOne;
    public $divTwo;
    public $strOne;
    public $strTwo;
    public $strBoth;
    public $space;
    public $staticNumbers;
    public $strStatic;
    public $compareNumber;
    public $strCompare;
    public $isSpecial;


    public function __construct(
        $lowerLimit=1,
        $upperLimit=20,
        $divOne=3,
        $divTwo=5,
        $strOne='pa',
        $strTwo='pow',
        $strBoth='papow',
        $space=' ',
        $staticNumbers = false,
        $strStatic = false,
        $compareNumber = false,
        $strCompare = false
    ) {
        $this->lowerLimit = $lowerLimit;
        $this->upperLimit = $upperLimit;
        $this->divOne = $divOne;
        $this->divTwo = $divTwo;
        $this->strOne = $strOne;
        $this->strTwo = $strTwo;
        $this->strBoth = $strBoth;
        $this->space = $space;
        $this->staticNumbers = $staticNumbers;
        $this->strStatic = $strStatic;
        $this->compareNumber = $compareNumber;
        $this->strCompare = $strCompare;
    }

    public function setSpecial($isSpecial){
        if (!$this->isSpecial){
            $this->isSpecial = $isSpecial;
        }
    }

    public function arrayTask($i)
    {
        // If number is one of the numbers 1, 4, 9 print joff instead
        if (is_array($this->staticNumbers) && in_array($i, $this->staticNumbers)) {
            echo $this->strStatic;
            $this->setSpecial(true);
            return $this;
        }

        $this->setSpecial(false);
        return $this;
    }

    //
    public function compare($i)
    {
        if ($this->compareNumber && $i > $this->compareNumber) {
            echo $this->strCompare;
            $this->setSpecial(true);
            return $this;
        }
        $this->setSpecial(false);
        return $this;
    }

    public function divider($i, $div, $str){
        if ($div && $i % $div == 0) {
            echo $str;
            $this->setSpecial(true);
            return $this;
        }
        $this->setSpecial(false);
        return $this;
    }

    public function doTask()
    {
        for ($i = $this->lowerLimit; $i <= $this->upperLimit; $i++) {

            $this->isSpecial = false;

            $this->arrayTask($i);


            $this->compare($i);


            $this->divider($i, $this->divOne, $this->strOne);

            $this->divider($i, $this->divTwo, $this->strTwo);

            if (!$this->isSpecial) {
                echo $i;
            }

            if ($i != $this->upperLimit) {
                echo $this->space;
            }

            $this->isSpecial = false;
        }

        echo PHP_EOL;
    }
}


$taskV1 = new TaskV1();

$taskV1->doTask();

$taskV2 = new TaskV1(
    1,
    15,
    2,
    7,
    'hatee',
    'ho',
    'hateeho',
    '-'
);
$taskV2->doTask();

$taskV3 = new TaskV1(
    1,
    10,
    null,
    null,
    null,
    null,
    null,
    '-',
    [1,4,9],
    'joff',
    5,
    'tchoff'
);
$taskV3->doTask();
