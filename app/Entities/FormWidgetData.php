<?php

namespace App\Entities;

class FormWidgetData
{
    /**
     * @var string
     */
    private string $pageUid;

    /**
     * @var string|null
     */
    private ?string $userName;

    /**
     * @var string|null
     */
    private ?string $message;


    /**
     * FormWidgetData constructor.
     * @param string $pageUid
     * @param string|null $userName
     * @param string|null $message
     */
    public function __construct(string $pageUid, ?string $userName, ?string $message)
    {
        $this->pageUid = $pageUid;
        $this->userName = $userName;
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getPageUid(): string
    {
        return $this->pageUid;
    }

    /**
     * @param string $pageUid
     */
    public function setPageUid(string $pageUid): void
    {
        $this->pageUid = $pageUid;
    }

    /**
     * @return string|null
     */
    public function getUserName(): ?string
    {
        return $this->userName;
    }

    /**
     * @param string|null $userName
     */
    public function setUserName(?string $userName): void
    {
        $this->userName = $userName;
    }

    /**
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @param string|null $message
     */
    public function setMessage(?string $message): void
    {
        $this->message = $message;
    }

}
