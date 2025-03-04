<?php
/**
 * AnalysisApi
 * PHP version 5
 *
 * @category Class
 * @package  idcheckio
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * IdCheck.IO API
 *
 * Check identity documents
 *
 * OpenAPI spec version: 0.0
 *
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 *
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace idcheckio\api;

use idcheckio\ApiClient;
use idcheckio\ApiException;
use idcheckio\model\ImageRequest;
use idcheckio\model\MrzRequest;
use idcheckio\model\ReportResponse;
use idcheckio\model\ResultResponse;
use idcheckio\model\TaskResponse;
use idcheckio\model\ErrorResponse;

/**
 * AnalysisApi Class Doc Comment
 *
 * @category Class
 * @package  idcheckio
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class AnalysisApi
{
    /**
     * API Client
     *
     * @var ApiClient instance of the ApiClient
     */
    protected $apiClient;

    /**
     * Constructor
     *
     * @param ApiClient|null $apiClient The api client to use
     */
    public function __construct(ApiClient $apiClient = null)
    {
        if ($apiClient === null) {
            $apiClient = new ApiClient();
        }

        $this->apiClient = $apiClient;
    }

    /**
     * Get API client
     *
     * @return ApiClient get the API client
     */
    public function getApiClient()
    {
        return $this->apiClient;
    }

    /**
     * Set the API client
     *
     * @param ApiClient $apiClient set the API client
     *
     * @return AnalysisApi
     */
    public function setApiClient(ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
        return $this;
    }

    /**
     * Operation getReport
     *
     * HTTP GET report (demo)
     *
     * @param string $analysis_ref_uid Report analysisRefUid (required)
     * @param string $accept_language Accept language header (optional)
     * @throws ApiException on non-2xx response
     * @return ReportResponse
     */
    public function getReport($analysis_ref_uid, $accept_language = null)
    {
        [$response] = $this->getReportWithHttpInfo($analysis_ref_uid, $accept_language);
        return $response;
    }

    /**
     * Operation getReportWithHttpInfo
     *
     * HTTP GET report (demo)
     *
     * @param string $analysis_ref_uid Report analysisRefUid (required)
     * @param string $accept_language Accept language header (optional)
     * @return array of \idcheckio\model\ReportResponse, HTTP status code, HTTP response headers (array of strings)
     *@throws ApiException on non-2xx response
     */
    public function getReportWithHttpInfo($analysis_ref_uid, $accept_language = null)
    {
        // verify the required parameter 'analysis_ref_uid' is set
        if ($analysis_ref_uid === null) {
            throw new \InvalidArgumentException('Missing the required parameter $analysis_ref_uid when calling getReport');
        }
        // parse inputs
        $resourcePath = "/v0/pdfreport/{analysisRefUid}";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json; charset=utf-8']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType([]);

        // header params
        if ($accept_language !== null) {
            $headerParams['Accept-Language'] = $this->apiClient->getSerializer()->toHeaderValue($accept_language);
        }
        // path params
        if ($analysis_ref_uid !== null) {
            $resourcePath = str_replace(
                "{" . "analysisRefUid" . "}",
                $this->apiClient->getSerializer()->toPathValue($analysis_ref_uid),
                $resourcePath
            );
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);


        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // this endpoint requires HTTP basic authentication
        if (strlen($this->apiClient->getConfig()->getUsername()) !== 0 or strlen($this->apiClient->getConfig()->getPassword()) !== 0) {
            $headerParams['Authorization'] = 'Basic ' . base64_encode($this->apiClient->getConfig()->getUsername() . ":" . $this->apiClient->getConfig()->getPassword());
        }
        // make the API Call
        try {
            [$response, $statusCode, $httpHeader] = $this->apiClient->callApi(
                $resourcePath,
                'GET',
                $queryParams,
                $httpBody,
                $headerParams,
                ReportResponse::class,
                '/v0/pdfreport/{analysisRefUid}'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, ReportResponse::class, $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), ReportResponse::class, $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 400:
                case 401:
                case 403:
                case 404:
                case 500:
                case 503:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), ErrorResponse::class, $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation getResult
     *
     * HTTP GET result
     *
     * @param string $analysis_ref_uid Result analysisRefUid (required)
     * @param string $accept_language Accept language header (optional)
     * @param bool $recto_image_cropped True to obtain recto image cropped if applicable (optional, default to false)
     * @param bool $face_image_cropped True to obtain face image cropped if applicable (optional, default to false)
     * @param bool $signature_image_cropped True to obtain signature image cropped if applicable (optional, default to false)
     * @return ResultResponse
     *@throws ApiException on non-2xx response
     */
    public function getResult($analysis_ref_uid, $accept_language = null, $recto_image_cropped = null, $face_image_cropped = null, $signature_image_cropped = null)
    {
        [$response] = $this->getResultWithHttpInfo($analysis_ref_uid, $accept_language, $recto_image_cropped, $face_image_cropped, $signature_image_cropped);
        return $response;
    }

    /**
     * Operation getResultWithHttpInfo
     *
     * HTTP GET result
     *
     * @param string $analysis_ref_uid Result analysisRefUid (required)
     * @param string $accept_language Accept language header (optional)
     * @param bool $recto_image_cropped True to obtain recto image cropped if applicable (optional, default to false)
     * @param bool $face_image_cropped True to obtain face image cropped if applicable (optional, default to false)
     * @param bool $signature_image_cropped True to obtain signature image cropped if applicable (optional, default to false)
     * @return array of \idcheckio\model\ResultResponse, HTTP status code, HTTP response headers (array of strings)
     *@throws ApiException on non-2xx response
     */
    public function getResultWithHttpInfo($analysis_ref_uid, $accept_language = null, $recto_image_cropped = null, $face_image_cropped = null, $signature_image_cropped = null)
    {
        // verify the required parameter 'analysis_ref_uid' is set
        if ($analysis_ref_uid === null) {
            throw new \InvalidArgumentException('Missing the required parameter $analysis_ref_uid when calling getResult');
        }
        // parse inputs
        $resourcePath = "/v0/result/{analysisRefUid}";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json; charset=utf-8']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType([]);

        // query params
        if ($recto_image_cropped !== null) {
            $queryParams['rectoImageCropped'] = $this->apiClient->getSerializer()->toQueryValue($recto_image_cropped);
        }
        // query params
        if ($face_image_cropped !== null) {
            $queryParams['faceImageCropped'] = $this->apiClient->getSerializer()->toQueryValue($face_image_cropped);
        }
        // query params
        if ($signature_image_cropped !== null) {
            $queryParams['signatureImageCropped'] = $this->apiClient->getSerializer()->toQueryValue($signature_image_cropped);
        }
        // header params
        if ($accept_language !== null) {
            $headerParams['Accept-Language'] = $this->apiClient->getSerializer()->toHeaderValue($accept_language);
        }
        // path params
        if ($analysis_ref_uid !== null) {
            $resourcePath = str_replace(
                "{" . "analysisRefUid" . "}",
                $this->apiClient->getSerializer()->toPathValue($analysis_ref_uid),
                $resourcePath
            );
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);


        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // this endpoint requires HTTP basic authentication
        if (strlen($this->apiClient->getConfig()->getUsername()) !== 0 or strlen($this->apiClient->getConfig()->getPassword()) !== 0) {
            $headerParams['Authorization'] = 'Basic ' . base64_encode($this->apiClient->getConfig()->getUsername() . ":" . $this->apiClient->getConfig()->getPassword());
        }
        // make the API Call
        try {
            [$response, $statusCode, $httpHeader] = $this->apiClient->callApi(
                $resourcePath,
                'GET',
                $queryParams,
                $httpBody,
                $headerParams,
                ResultResponse::class,
                '/v0/result/{analysisRefUid}'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, ResultResponse::class, $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), ResultResponse::class, $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 400:
                case 401:
                case 403:
                case 404:
                case 500:
                case 503:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), ErrorResponse::class, $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation getTask
     *
     * HTTP GET task
     *
     * @param string $analysis_ref_uid Task analysisRefUid (required)
     * @param string $accept_language Accept language header (optional)
     * @param int $wait specify a maximum wait time in milliseconds (optional)
     * @return TaskResponse
     *@throws ApiException on non-2xx response
     */
    public function getTask($analysis_ref_uid, $accept_language = null, $wait = null)
    {
        [$response] = $this->getTaskWithHttpInfo($analysis_ref_uid, $accept_language, $wait);
        return $response;
    }

    /**
     * Operation getTaskWithHttpInfo
     *
     * HTTP GET task
     *
     * @param string $analysis_ref_uid Task analysisRefUid (required)
     * @param string $accept_language Accept language header (optional)
     * @param int $wait specify a maximum wait time in milliseconds (optional)
     * @return array of \idcheckio\model\TaskResponse, HTTP status code, HTTP response headers (array of strings)
     *@throws ApiException on non-2xx response
     */
    public function getTaskWithHttpInfo($analysis_ref_uid, $accept_language = null, $wait = null)
    {
        // verify the required parameter 'analysis_ref_uid' is set
        if ($analysis_ref_uid === null) {
            throw new \InvalidArgumentException('Missing the required parameter $analysis_ref_uid when calling getTask');
        }
        // parse inputs
        $resourcePath = "/v0/task/{analysisRefUid}";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json; charset=utf-8']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType([]);

        // query params
        if ($wait !== null) {
            $queryParams['wait'] = $this->apiClient->getSerializer()->toQueryValue($wait);
        }
        // header params
        if ($accept_language !== null) {
            $headerParams['Accept-Language'] = $this->apiClient->getSerializer()->toHeaderValue($accept_language);
        }
        // path params
        if ($analysis_ref_uid !== null) {
            $resourcePath = str_replace(
                "{" . "analysisRefUid" . "}",
                $this->apiClient->getSerializer()->toPathValue($analysis_ref_uid),
                $resourcePath
            );
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);


        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // this endpoint requires HTTP basic authentication
        if (strlen($this->apiClient->getConfig()->getUsername()) !== 0 or strlen($this->apiClient->getConfig()->getPassword()) !== 0) {
            $headerParams['Authorization'] = 'Basic ' . base64_encode($this->apiClient->getConfig()->getUsername() . ":" . $this->apiClient->getConfig()->getPassword());
        }
        // make the API Call
        try {
            [$response, $statusCode, $httpHeader] = $this->apiClient->callApi(
                $resourcePath,
                'GET',
                $queryParams,
                $httpBody,
                $headerParams,
                TaskResponse::class,
                '/v0/task/{analysisRefUid}'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, TaskResponse::class, $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                case 303:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), TaskResponse::class, $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 400:
                case 401:
                case 403:
                case 404:
                case 500:
                case 503:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), ErrorResponse::class, $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation postImage
     *
     * HTTP POST task image
     *
     * @param ImageRequest $body Image request (required)
     * @param bool $async_mode true to activate asynchrone mode (optional)
     * @param string $accept_language Accept language header (optional)
     * @return ResultResponse
     *@throws ApiException on non-2xx response
     */
    public function postImage($body, $async_mode = null, $accept_language = null)
    {
        [$response] = $this->postImageWithHttpInfo($body, $async_mode, $accept_language);
        return $response;
    }

    /**
     * Operation postImageWithHttpInfo
     *
     * HTTP POST task image
     *
     * @param ImageRequest $body Image request (required)
     * @param bool $async_mode true to activate asynchrone mode (optional)
     * @param string $accept_language Accept language header (optional)
     * @return array of \idcheckio\model\ResultResponse, HTTP status code, HTTP response headers (array of strings)
     *@throws ApiException on non-2xx response
     */
    public function postImageWithHttpInfo($body, $async_mode = null, $accept_language = null)
    {
        // verify the required parameter 'body' is set
        if ($body === null) {
            throw new \InvalidArgumentException('Missing the required parameter $body when calling postImage');
        }
        // parse inputs
        $resourcePath = "/v0/task/image";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json; charset=utf-8']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(['application/json']);

        // query params
        if ($async_mode !== null) {
            $queryParams['asyncMode'] = $this->apiClient->getSerializer()->toQueryValue($async_mode);
        }
        // header params
        if ($accept_language !== null) {
            $headerParams['Accept-Language'] = $this->apiClient->getSerializer()->toHeaderValue($accept_language);
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // this endpoint requires HTTP basic authentication
        if (strlen($this->apiClient->getConfig()->getUsername()) !== 0 or strlen($this->apiClient->getConfig()->getPassword()) !== 0) {
            $headerParams['Authorization'] = 'Basic ' . base64_encode($this->apiClient->getConfig()->getUsername() . ":" . $this->apiClient->getConfig()->getPassword());
        }
        // make the API Call
        try {
            [$response, $statusCode, $httpHeader] = $this->apiClient->callApi(
                $resourcePath,
                'POST',
                $queryParams,
                $httpBody,
                $headerParams,
                ResultResponse::class,
                '/v0/task/image'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, ResultResponse::class, $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), ResultResponse::class, $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 202:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), TaskResponse::class, $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 400:
                case 401:
                case 403:
                case 404:
                case 500:
                case 503:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), ErrorResponse::class, $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation postMrz
     *
     * HTTP POST task mrz
     *
     * @param MrzRequest $body Mrz request (required)
     * @param bool $async_mode true to activate asynchrone mode (optional)
     * @param string $accept_language Accept language header (optional)
     * @return ResultResponse
     *@throws ApiException on non-2xx response
     */
    public function postMrz($body, $async_mode = null, $accept_language = null)
    {
        [$response] = $this->postMrzWithHttpInfo($body, $async_mode, $accept_language);
        return $response;
    }

    /**
     * Operation postMrzWithHttpInfo
     *
     * HTTP POST task mrz
     *
     * @param MrzRequest $body Mrz request (required)
     * @param bool $async_mode true to activate asynchrone mode (optional)
     * @param string $accept_language Accept language header (optional)
     * @return array of \idcheckio\model\ResultResponse, HTTP status code, HTTP response headers (array of strings)
     *@throws ApiException on non-2xx response
     */
    public function postMrzWithHttpInfo($body, $async_mode = null, $accept_language = null)
    {
        // verify the required parameter 'body' is set
        if ($body === null) {
            throw new \InvalidArgumentException('Missing the required parameter $body when calling postMrz');
        }
        // parse inputs
        $resourcePath = "/v0/task/mrz";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json; charset=utf-8']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(['application/json']);

        // query params
        if ($async_mode !== null) {
            $queryParams['asyncMode'] = $this->apiClient->getSerializer()->toQueryValue($async_mode);
        }
        // header params
        if ($accept_language !== null) {
            $headerParams['Accept-Language'] = $this->apiClient->getSerializer()->toHeaderValue($accept_language);
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // this endpoint requires HTTP basic authentication
        if (strlen($this->apiClient->getConfig()->getUsername()) !== 0 or strlen($this->apiClient->getConfig()->getPassword()) !== 0) {
            $headerParams['Authorization'] = 'Basic ' . base64_encode($this->apiClient->getConfig()->getUsername() . ":" . $this->apiClient->getConfig()->getPassword());
        }
        // make the API Call
        try {
            [$response, $statusCode, $httpHeader] = $this->apiClient->callApi(
                $resourcePath,
                'POST',
                $queryParams,
                $httpBody,
                $headerParams,
                ResultResponse::class,
                '/v0/task/mrz'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, ResultResponse::class, $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), ResultResponse::class, $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 202:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), TaskResponse::class, $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 400:
                case 401:
                case 403:
                case 404:
                case 500:
                case 503:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), ErrorResponse::class, $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }
}
