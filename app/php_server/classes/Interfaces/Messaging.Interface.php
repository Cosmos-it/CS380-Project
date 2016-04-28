<?php
/**
 * Created by PhpStorm.
 * User: Taban
 * Date: 9/23/15
 * Time: 8:59 PM
 */

/************************
 * Created by PhpStorm.
 * User: Taban
 * Date: 9/4/15
 * Time: 8:19 PM
 *************************/
interface Messaging_Interface
{

    public function setId($_id);

    public function getId();

    public function setSendDate($date);

    public function getSendDate();

    public function setReceiveDate($date);

    public function getReceiveDate();

    public function setContent($messageContent);

    public function getContent();
}