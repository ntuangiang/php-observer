<?php


namespace IoC;


abstract class AbstractObserver
{
    /**
     * @var AbstractSubject|null
     */
    protected $subject = null;

    public function __construct(AbstractSubject $subject = null)
    {
        $this->subject = $subject;
        $this->subject->attach($this);
    }

    abstract function update(AbstractSubject $subject = null);
}