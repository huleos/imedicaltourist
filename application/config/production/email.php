<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
/*
| -------------------------------------------------------------------
| EMAIL CONFING
| -------------------------------------------------------------------
| Configuration of outgoing mail server.
| */
$config['protocol'] = 'sendmail';
$config['mailpath'] = '/usr/sbin/sendmail';
$config['charset'] = 'utf-8';
$config['mailtype'] = 'html';
$config['wordwrap'] = TRUE;
$config['crlf'] = '\n';
$config['newline'] = "\r\n";
/* End of file email.php */
/* Location: ./system/application/config/email.php */