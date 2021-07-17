<?php
namespace School\Validator;

use Countable;
use Iterator;

class ValidatorCollection implements Iterator,  Countable
{
    private array $validators = [];
    private int $index = 0;
    private int $count = 0;

    public function addValidator(ValidatorInterface $validator): void
    {
        $this->validators[] = $validator;
    }

    public function removeValidator(ValidatorInterface $validator): void
    {

        foreach ($this->validators as $index => $validatorFound)
        {
            if($validatorFound === $validator){
                unset($this->validators[$index]);
                break;
            }
        }
    }

    public function current()
    {
        return $this->validators[$this->index];
    }

    public function next()
    {
        return $this->index++;
    }

    public function key()
    {
        return $this->index;
    }

    public function valid(): bool
    {
        return isset($this->validators[$this->key()]);
    }

    public function rewind(): int
    {
        return $this->index = 0;
    }

    public function count()
    {
        foreach ($this->validators as $validator){
            $this->count++;
        }

        return $this->count();
    }
}