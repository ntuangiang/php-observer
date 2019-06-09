<?php


namespace IoC;


abstract class AbstractSubject
{
    /**
     * @var array|null
     */
    private $observers = null;

    public function __construct()
    {
        $this->observers = array();
    }

    /**
     * @param AbstractObserver $observer
     */
    public function attach(AbstractObserver $observer)
    {
        $this->observers[] = $observer;
    }

    /**
     * @param AbstractObserver $observer
     */
    public function detach(AbstractObserver $observer)
    {
        foreach ($this->observers as $key => $value) {
            if ($value == $observer) {
                unset($this->observers[$key]);
            }
        }
    }

    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }
}