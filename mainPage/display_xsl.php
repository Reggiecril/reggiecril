<a href="./xml/1.xml">XML</a>
<a href="./xml/1.xsl">XSL</a>
<?php 
//Create a DomDocument object

  $xml = new DOMDocument;

  // Load the XML source

  $xml -> load('./xml/1.xml');


//Similar with XSL

  $xsl = new DOMDocument;

  $xsl -> load('./xml/1.xsl');

  // Create and Configure the transformer

  $proc = new XSLTProcessor;

  // attach the xsl rules

  $proc -> importStyleSheet($xsl);

  //Output

  echo $proc -> transformToXML($xml);


?>