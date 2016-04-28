<?php

/************************
 * Created by PhpStorm.
 * User: Taban
 * Date: 9/4/15
 * Time: 8:19 PM
 *************************/

require("Interfaces/Messaging.Interface.php");

class Messaging implements Messaging_Interface
{
    private $id;
    private $sendDate;
    private $receivedDate;
    private $mContent = " ";

    public function getId()
    {
        return $this->id;
    }

    public function setId($_id)
    {
        if (is_int($_id) && !is_null($_id)) {
            $this->id = $_id;
        } else {
            throw new Exception("Type int expected and not null, found:  " . $_id);
        }
    }

    public function getSendDate()
    {
        return $this->sendDate;
    }

    public function setSendDate($date)
    {
        if (!is_null($date)) {
            $this->sendDate = $date;
        } else {
            throw new Exception("Type date expected and not null, found:  " . $date);
        }
    }

    public function setReceiveDate($date)
    {
        if (!is_null($date)) {
            $this->receivedDate = $date;
        } else {
            throw new Exception("Type date expected and not null, found: " . $date);
        }
    }

    public function getReceiveDate()
    {
        return $this->receivedDate;
    }

    public function setContent($messageContent)
    {
        if (is_string($messageContent) && !is_null($messageContent)) {
            $this->mContent = $messageContent;
        } else {
            throw new Exception("Type string expected and not null, found: " . $messageContent);
        }
    }

    public function getContent()
    {
        return $this->mContent;
    }

}