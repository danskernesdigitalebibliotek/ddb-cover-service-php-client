<?php
/**
 * ApiException
 * PHP version 5
 *
 * @category Class
 * @package  CoverService
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * DDB Cover Service
 *
 * This service provides covers for library materials indexed by isbn, issn, faust, pid. The service is provided by [Danskernes Digitale Bibliotek](https://www.danskernesdigitalebibliotek.dk/) ### Authentication notes Authentication is done via OAuth2 against auth.dbc.dk. To obtain a valid token follow instructions in [1.2. Password Grant](https://github.com/DBCDK/hejmdal/blob/master/docs/oauth2.md#12-password-grant). To use the \"Authorize\" option in this tool use your 'client_id' and 'client_secret' and fill in '@' for both username and password. ### Implementation notes Currently the API is not fully implemented. The following features are missing: * Generic Covers: parameter is currently ignored. Service doesn't yet provide generic covers. * Pagination: not implemented.
 *
 * OpenAPI spec version: 2.0
 *
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 3.0.20
 */
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace CoverService;

use \Exception;

/**
 * ApiException Class Doc Comment
 *
 * @category Class
 * @package  CoverService
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class ApiException extends Exception
{

    /**
     * The HTTP body of the server response either as Json or string.
     *
     * @var mixed
     */
    protected $responseBody;

    /**
     * The HTTP header of the server response.
     *
     * @var string[]|null
     */
    protected $responseHeaders;

    /**
     * The deserialized response object
     *
     * @var $responseObject;
     */
    protected $responseObject;

    /**
     * Constructor
     *
     * @param string        $message         Error message
     * @param int           $code            HTTP status code
     * @param string[]|null $responseHeaders HTTP response header
     * @param mixed         $responseBody    HTTP decoded body of the server response either as \stdClass or string
     */
    public function __construct($message = "", $code = 0, $responseHeaders = [], $responseBody = null)
    {
        parent::__construct($message, $code);
        $this->responseHeaders = $responseHeaders;
        $this->responseBody = $responseBody;
    }

    /**
     * Gets the HTTP response header
     *
     * @return string[]|null HTTP response header
     */
    public function getResponseHeaders()
    {
        return $this->responseHeaders;
    }

    /**
     * Gets the HTTP body of the server response either as Json or string
     *
     * @return mixed HTTP body of the server response either as \stdClass or string
     */
    public function getResponseBody()
    {
        return $this->responseBody;
    }

    /**
     * Sets the deseralized response object (during deserialization)
     *
     * @param mixed $obj Deserialized response object
     *
     * @return void
     */
    public function setResponseObject($obj)
    {
        $this->responseObject = $obj;
    }

    /**
     * Gets the deseralized response object (during deserialization)
     *
     * @return mixed the deserialized response object
     */
    public function getResponseObject()
    {
        return $this->responseObject;
    }
}
