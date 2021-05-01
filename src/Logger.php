<?php

namespace NetSuite;

class Logger implements LoggerInterface
{
    private $path;

    public function __construct($path = null)
    {
        $this->path = $path ?: __DIR__.'/../logs';
    }

    /**
     * Set the log file directory on this object.
     *
     * @param string $logPath
     * @return void
     */
    public function setLogPath(string $logPath): void
    {
        $this->path = $logPath;
    }

    /**
     * Log the last soap call as request and response XML files.
     *
     * @param \SoapClient $client
     * @param string $operation
     */
    public function logSoapCall(\SoapClient $client, string $operation): void
    {
        if (file_exists($this->path)) {
            $fileName = "ryanwinchester-netsuite-php-" . date("Ymd.His") . "-" . $operation;
            $logFile = $this->path ."/". $fileName;

            // REQUEST
            $request = $logFile . "-request.xml";
            $Handle = fopen($request, 'w');
            $Data = $client->__getLastRequest();
            $Data = cleanUpNamespaces($Data);

            $xml = simplexml_load_string($Data, 'SimpleXMLElement', LIBXML_NOCDATA);

            $privateFieldXpaths = [
                '//password',
                '//password2',
                '//currentPassword',
                '//newPassword',
                '//newPassword2',
                '//ccNumber',
                '//ccSecurityCode',
                '//socialSecurityNumber',
            ];

            $privateFields = $xml->xpath(implode(" | ", $privateFieldXpaths));

            foreach ($privateFields as &$field) {
                $field[0] = "[Content Removed for Security Reasons]";
            }

            $stringCustomFields = $xml->xpath("//customField[@xsitype='StringCustomFieldRef']");

            foreach ($stringCustomFields as $field) {
                $field->value = "[Content Removed for Security Reasons]";
            }

            $xml_string = str_replace('xsitype', 'xsi:type', $xml->asXML());

            fwrite($Handle, $xml_string);
            fclose($Handle);

            // RESPONSE
            $response = $logFile . "-response.xml";
            $Handle = fopen($response, 'w');
            $Data = $client->__getLastResponse();

            fwrite($Handle, $Data);
            fclose($Handle);
        }
    }
}
