--TEST--
stream_get_meta_data() on a udp socket
--FILE--
<?php

$tcp_socket = stream_socket_server('tcp://127.0.0.1:31337');
var_dump(stream_get_meta_data($tcp_socket));
fclose($tcp_socket);

?>
--EXPECT--
array(7) {
  ["stream_type"]=>
  string(10) "tcp_socket"
  ["mode"]=>
  string(2) "r+"
  ["unread_bytes"]=>
  int(0)
  ["seekable"]=>
  bool(false)
  ["timed_out"]=>
  bool(false)
  ["blocked"]=>
  bool(true)
  ["eof"]=>
  bool(false)
}
