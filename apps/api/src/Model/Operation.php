<?php

namespace App\Model;


/**
 * Class Operation
 * @package App\Model
 */
class Operation
{
    const ADD = 'add';
    const SUBTRACT = 'subtract';
    const MULTIPLY = 'multiply';
    const DIVIDE = 'divide';
    const POWER = 'power';
    const ROOT = 'root';
    const FACTORIAL = 'factorial';
    const PERCENT = 'percent';

    /**
     * @return array
     */
    public static function toArray() : array
    {
        $reflectionClass = new \ReflectionClass(self::class);
        return $reflectionClass->getConstants();
    }

    /**
     * @param array $arguments
     * @param string $type
     * @return mixed
     * @throws \Exception
     */
    public function calculate(array $arguments, string $type)
    {
        $classPath = $this->getClassIfExist($type);
        return (new $classPath())->execute($arguments);
    }

    /**
     * @param array $arguments
     * @param string $type
     * @return mixed
     * @throws \Exception
     */
    public function validate(array $arguments, string $type)
    {
        $classPath = $this->getClassIfExist($type);
        return (new $classPath())->validate($arguments);
    }

    /**
     * @param string $type
     * @return string
     * @throws \Exception
     */
    private function getClassIfExist(string $type)
    {
        $className = ucfirst($type) . 'Operation';
        $classPath = 'App\\Model\\Operation\\'.$className;
        if(class_exists($classPath)) {
            return $classPath;
        }
        throw new \Exception('Operation class not found');
    }
}
