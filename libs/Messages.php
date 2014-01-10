<?php

class Messages {

    var $msgId;
    var $msgTypes = array('help', 'info', 'warning', 'success', 'error');
    var $msgClass = 'messages';
    var $msgWrapper = "<center><div class='%s %s'><a href='#' class='closeMessage'></a>\n%s</div>\n</center>";
    var $msgBefore = '<p>';
    var $msgAfter = "</p>\n";

    public function __construct() {

        // Generate a unique ID for this user and session
        $this->msgId = md5(uniqid());

        // Create the session array if it doesnt already exist
        if (!array_key_exists('flash_messages', $_SESSION))
            $_SESSION['flash_messages'] = array();
    }

    public function add($type, $message, $redirect_to = null) {

        if (!isset($_SESSION['flash_messages']))
            return false;

        if (!isset($type) || !isset($message[0]))
            return false;

        if (strlen(trim($type)) == 1) {
            $type = str_replace(array('h', 'i', 'w', 'e', 's'), array('help', 'info', 'warning', 'error', 'success'), $type);
        } elseif ($type == 'information') {
            $type = 'info';
        }

        if (!in_array($type, $this->msgTypes))
            die('"' . strip_tags($type) . '" is not a valid message type!');

        if (!array_key_exists($type, $_SESSION['flash_messages']))
            $_SESSION['flash_messages'][$type] = array();

        $_SESSION['flash_messages'][$type][] = $message;

        if (!is_null($redirect_to)) {
            header("Location: $redirect_to");
            exit();
        }

        return true;
    }

    public function display($type = 'all', $print = true) {
        $messages = '';
        $data = '';

        if (!isset($_SESSION['flash_messages']))
            return false;

        if ($type == 'g' || $type == 'growl') {
            $this->displayGrowlMessages();
            return true;
        }

        if (in_array($type, $this->msgTypes)) {
            foreach ($_SESSION['flash_messages'][$type] as $msg) {
                $messages .= $this->msgBefore . $msg . $this->msgAfter;
            }

            $data .= sprintf($this->msgWrapper, $this->msgClass, $type, $messages);

            $this->clear($type);
        } elseif ($type == 'all') {
            foreach ($_SESSION['flash_messages'] as $type => $msgArray) {
                $messages = '';
                foreach ($msgArray as $msg) {
                    $messages .= $this->msgBefore . $msg . $this->msgAfter;
                }
                $data .= sprintf($this->msgWrapper, $this->msgClass, $type, $messages);
            }

            $this->clear();
        } else {
            return false;
        }

        if ($print) {
            echo $data;
        } else {
            return $data;
        }
    }

    public function hasErrors() {
        return empty($_SESSION['flash_messages']['error']) ? false : true;
    }

    public function hasMessages($type = null) {
        if (!is_null($type)) {
            if (!empty($_SESSION['flash_messages'][$type]))
                return $_SESSION['flash_messages'][$type];
        } else {
            foreach ($this->msgTypes as $type) {
                if (!empty($_SESSION['flash_messages']))
                    return true;
            }
        }
        return false;
    }

    public function clear($type = 'all') {
        if ($type == 'all') {
            unset($_SESSION['flash_messages']);
        } else {
            unset($_SESSION['flash_messages'][$type]);
        }
        return true;
    }

    public function __toString() {
        return $this->hasMessages();
    }

    public function __destruct() {
        //$this->clear();
    }

}

?>