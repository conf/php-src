--TEST--
SOAP 1.2: T45 echoNestedStruct
--SKIPIF--
<?php require_once('skipif.inc'); ?>
--FILE--
<?php
$HTTP_RAW_POST_DATA = <<<EOF
<?xml version="1.0"?>
<env:Envelope xmlns:env="http://www.w3.org/2003/05/soap-envelope"
              xmlns:xsd="http://www.w3.org/2001/XMLSchema"
              xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
  <env:Body>
    <test:echoNestedStruct xmlns:test="http://example.org/ts-tests"
       env:encodingStyle="http://www.w3.org/2003/05/soap-encoding">
      <inputStruct xsi:type="ns1:SOAPStructStruct"
                   xmlns:ns1="http://example.org/ts-tests/xsd">
        <varInt xsi:type="xsd:int">42</varInt>
        <varFloat xsi:type="xsd:float">0.005</varFloat>
        <varString xsi:type="xsd:string">hello world</varString>
        <varStruct xsi:type="ns1:SOAPStruct">
          <varInt xsi:type="xsd:int">99</varInt>
          <varFloat xsi:type="xsd:float">4.0699e-12</varFloat>
          <varString xsi:type="xsd:string">nested struct</varString>
        </varStruct>
      </inputStruct>
    </test:echoNestedStruct>
  </env:Body>
</env:Envelope>
EOF;
include "soap12-test.inc";
?>
--EXPECT--
<?xml version="1.0" encoding="UTF-8"?>
<env:Envelope xmlns:env="http://www.w3.org/2003/05/soap-envelope" xmlns:ns1="http://example.org/ts-tests" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:ns2="http://example.org/ts-tests/xsd" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:enc="http://www.w3.org/2003/05/soap-encoding"><env:Body xmlns:rpc="http://www.w3.org/2003/05/soap-rpc"><ns1:echoNestedStructResponse env:encodingStyle="http://www.w3.org/2003/05/soap-encoding"><rpc:result>return</rpc:result><return xsi:type="ns2:SOAPStructStruct"><varString xsi:type="xsd:string">hello world</varString><varInt xsi:type="xsd:int">42</varInt><varFloat xsi:type="xsd:float">0.005</varFloat><varStruct xsi:type="ns2:SOAPStruct"><varString xsi:type="xsd:string">nested struct</varString><varInt xsi:type="xsd:int">99</varInt><varFloat xsi:type="xsd:float">4.0699E-12</varFloat></varStruct></return></ns1:echoNestedStructResponse></env:Body></env:Envelope>
ok
