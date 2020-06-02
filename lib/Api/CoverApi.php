<?php
/**
 * CoverApi
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
 * This service provides covers for library materials indexed by isbn, issn, faust, pid. The service is provided by [Danskernes Digitale Bibliotek](https://www.danskernesdigitalebibliotek.dk/) ### Authentication notes Authentication is done via OAuth2 against auth.dbc.dk. To obtain a valid token follow instructions in [1.2. Password Grant](https://github.com/DBCDK/hejmdal/blob/master/docs/oauth2.md#12-password-grant). To use the \"Authorize\" option in this tool use your 'client_id' and 'client_secret' and fill in '@' for both username and password. ### Implementation notes Currently the API is not fully implemented. The following features are missing: * Generic Covers: parameter is currently ignored. Service doesn't yet provide generic covers.
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

namespace CoverService\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use CoverService\ApiException;
use CoverService\Configuration;
use CoverService\HeaderSelector;
use CoverService\ObjectSerializer;

/**
 * CoverApi Class Doc Comment
 *
 * @category Class
 * @package  CoverService
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class CoverApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation getCoverCollection
     *
     * Search multiple covers
     *
     * @param  string $type The type of the identifier, i.e. &#x27;isbn&#x27;, &#x27;faust&#x27;, &#x27;pid&#x27; or &#x27;issn&#x27; (required)
     * @param  string[] $identifiers A list of identifiers of {type}. Maximum number os identifiers per reqeust is 200 (required)
     * @param  string[] $sizes A list of image sizes (Cloudinary transformations) for the cover(s) you want to receive. (optional)
     *
     * @throws \CoverService\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \CoverService\Model\Cover[]
     */
    public function getCoverCollection($type, $identifiers, $sizes = null)
    {
        list($response) = $this->getCoverCollectionWithHttpInfo($type, $identifiers, $sizes);
        return $response;
    }

    /**
     * Operation getCoverCollectionWithHttpInfo
     *
     * Search multiple covers
     *
     * @param  string $type The type of the identifier, i.e. &#x27;isbn&#x27;, &#x27;faust&#x27;, &#x27;pid&#x27; or &#x27;issn&#x27; (required)
     * @param  string[] $identifiers A list of identifiers of {type}. Maximum number os identifiers per reqeust is 200 (required)
     * @param  string[] $sizes A list of image sizes (Cloudinary transformations) for the cover(s) you want to receive. (optional)
     *
     * @throws \CoverService\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \CoverService\Model\Cover[], HTTP status code, HTTP response headers (array of strings)
     */
    public function getCoverCollectionWithHttpInfo($type, $identifiers, $sizes = null)
    {
        $returnType = '\CoverService\Model\Cover[]';
        $request = $this->getCoverCollectionRequest($type, $identifiers, $sizes);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\CoverService\Model\Cover[]',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getCoverCollectionAsync
     *
     * Search multiple covers
     *
     * @param  string $type The type of the identifier, i.e. &#x27;isbn&#x27;, &#x27;faust&#x27;, &#x27;pid&#x27; or &#x27;issn&#x27; (required)
     * @param  string[] $identifiers A list of identifiers of {type}. Maximum number os identifiers per reqeust is 200 (required)
     * @param  string[] $sizes A list of image sizes (Cloudinary transformations) for the cover(s) you want to receive. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getCoverCollectionAsync($type, $identifiers, $sizes = null)
    {
        return $this->getCoverCollectionAsyncWithHttpInfo($type, $identifiers, $sizes)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getCoverCollectionAsyncWithHttpInfo
     *
     * Search multiple covers
     *
     * @param  string $type The type of the identifier, i.e. &#x27;isbn&#x27;, &#x27;faust&#x27;, &#x27;pid&#x27; or &#x27;issn&#x27; (required)
     * @param  string[] $identifiers A list of identifiers of {type}. Maximum number os identifiers per reqeust is 200 (required)
     * @param  string[] $sizes A list of image sizes (Cloudinary transformations) for the cover(s) you want to receive. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getCoverCollectionAsyncWithHttpInfo($type, $identifiers, $sizes = null)
    {
        $returnType = '\CoverService\Model\Cover[]';
        $request = $this->getCoverCollectionRequest($type, $identifiers, $sizes);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getCoverCollection'
     *
     * @param  string $type The type of the identifier, i.e. &#x27;isbn&#x27;, &#x27;faust&#x27;, &#x27;pid&#x27; or &#x27;issn&#x27; (required)
     * @param  string[] $identifiers A list of identifiers of {type}. Maximum number os identifiers per reqeust is 200 (required)
     * @param  string[] $sizes A list of image sizes (Cloudinary transformations) for the cover(s) you want to receive. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getCoverCollectionRequest($type, $identifiers, $sizes = null)
    {
        // verify the required parameter 'type' is set
        if ($type === null || (is_array($type) && count($type) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $type when calling getCoverCollection'
            );
        }
        // verify the required parameter 'identifiers' is set
        if ($identifiers === null || (is_array($identifiers) && count($identifiers) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $identifiers when calling getCoverCollection'
            );
        }

        $resourcePath = '/api/v2/covers';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($type !== null) {
            $queryParams['type'] = ObjectSerializer::toQueryValue($type);
        }
        // query params
        if (is_array($identifiers)) {
            $identifiers = ObjectSerializer::serializeCollection($identifiers, 'csv', true);
        }
        if ($identifiers !== null) {
            $queryParams['identifiers'] = ObjectSerializer::toQueryValue($identifiers);
        }
        // query params
        if (is_array($sizes)) {
            $sizes = ObjectSerializer::serializeCollection($sizes, 'csv', true);
        }
        if ($sizes !== null) {
            $queryParams['sizes'] = ObjectSerializer::toQueryValue($sizes);
        }


        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires OAuth (access token)
        if ($this->config->getAccessToken() !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}
