<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
* Message:: a class for writing feedback message information to the session
*
* Copyright 2006 Vijay Mahrra & Sheikh Ahmed <webmaster@designbyfail.com>
*
* See the enclosed file COPYING for license information (LGPL).  If you
* did not receive this file, see http://www.fsf.org/copyleft/lgpl.html.
*
* @author  Vijay Mahrra & Sheikh Ahmed <webmaster@designbyfail.com>
* @url http://www.designbyfail.com/
* @version 1.0
*/

class Messages
{
    var $_ci;
    var $_types = array('success', 'error', 'warning', 'message');
	var $msg_box;

    function Messages($params = array())
    {
        $this->_ci =& get_instance();
        $this->_ci->load->library('session');
        // check if theres already messages, if not, initialise the messages array in the session
        $messages = $this->_ci->session->userdata('messages');
        if (empty($messages)) {
            $this->clear();
        }
    }

    // clear all messages
    function clear()
    {
        $messages = array();
        foreach ($this->_types as $type) {
            $messages[$type] = array();
        }
        $this->_ci->session->set_userdata('messages', $messages);
    }

    // add a message, default type is message
    function add($message, $type = 'message')
    {
        $messages = $this->_ci->session->userdata('messages');
        // handle PEAR errors gracefully
        if (is_a($message, 'PEAR_Error')) {
            $message = $message->getMessage();
            $type = 'error';
        } else if (!in_array($type, $this->_types)) {
            // set the type to message if the user specified a type that's unknown
            $type = 'message';
        }
        // don't repeat messages!
        if (!in_array($message, $messages[$type]) && is_string($message)) {
            $messages[$type][] = $message;
        }
        $messages = $this->_ci->session->set_userdata('messages', $messages);
    }

    // return messages of given type or all types, return false if none
    function sum($type = null)
    {
        $messages = $this->_ci->session->userdata('messages');
        if (!empty($type)) {
            $i = count($messages[$type]);
            return $i;
        }
        $i = 0;
        foreach ($this->_types as $type) {
            $i += count($messages[$type]);
        }
        return $i;
    }

    // return messages of given type or all types, return false if none, clearing stack
    function get($type = null)
    {
        $messages = $this->_ci->session->userdata('messages');
        if (!empty($type)) {
            if (count($messages[$type]) == 0) {
                return false;
            }
            return $messages[$type];
        }
        // return false if there actually are no messages in the session
        $i = 0;
        foreach ($this->_types as $type) {
            $i += count($messages[$type]);
        }
        if ($i == 0) {
            return false;
        }

        // order return by order of type array above
        // i.e. success, error, warning and then informational messages last
        foreach ($this->_types as $type) {
            $return[$type] = $messages[$type];
        }
        $this->clear();
        return $return;
    }
	function msg_box()
	{
		$messages = $this->get();
		
		if (is_array($messages)):
			$this->msg_box .= '<div id="messages">';
	
			// display all messages
	
			foreach ($messages as $type => $msgs):
				if (count($msgs > 0)):
					foreach ($msgs as $message):
						$this->msg_box .='<span class="' .  $type .'">' . $message . '</span>';
				   endforeach;
			   endif;
			endforeach;
			$this->msg_box .= '<div STYLE="clear:left"></div>
			</div>';
	endif;
	return $this->msg_box;
	
	}
} 







/*


// NOTE: calling this function also clears the message stack!
$messages = $this->messages->get(); 
if (is_array($messages)):
    foreach ($messages as $type => $msgs):
        if (count($msgs > 0)):
            foreach ($msgs as $message):
                echo ('<span class="' .  $type .'">' . $message . '</span>');
           endforeach;
       endif;
    endforeach;
endif;
/ an error
$this->messages->add('You did not  tell us your name!', 'error');

// display an informational message
$this->messages->add('You last logged in 6 May 1976.', 'message');

// set a message about a users authentication status
if ($authenticated) {
$this->messages->add('You are now logged in!', 'success');
} else {
$this->messages->add('You are not logged in.', 'warning');
} 

*/