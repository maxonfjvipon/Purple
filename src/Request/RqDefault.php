<?php

namespace Maxonfjvipon\Purple\Request;

/**
 * Default request from globals.
 */
final class RqDefault extends RqWrap
{
    /**
     * Ctor.
     */
    public function __construct()
    {
        parent::__construct(
            new RequestOf(
                new RqLine(
                    $_SERVER[RequestLine::METHOD],
                    new RqUri([
                        RequestUri::PROTOCOL => $_SERVER[RequestUri::PROTOCOL] ?? 'http',
                        RequestUri::HOST => $_SERVER[RequestUri::HOST],
                        RequestUri::URI => $_SERVER[RequestUri::URI],
                        RequestUri::QUERY => $_SERVER[RequestUri::QUERY],
                    ]),
                    $_SERVER[RequestLine::PROTOCOL_VERSION]
                ),
                new RqHeaders([
                    RequestHeaders::HTTP_ACCEPT => $_SERVER[RequestHeaders::HTTP_ACCEPT],
                    RequestHeaders::HTTP_ACCEPT_CHARSET => $_SERVER[RequestHeaders::HTTP_ACCEPT_CHARSET] ?? 'iso-8859-1,*,utf-8',
                    RequestHeaders::HTTP_ACCEPT_ENCODING => $_SERVER[RequestHeaders::HTTP_ACCEPT_ENCODING],
                    RequestHeaders::HTTP_ACCEPT_LANGUAGE => $_SERVER[RequestHeaders::HTTP_ACCEPT_LANGUAGE],
                    RequestHeaders::HTTP_CONNECTION => $_SERVER[RequestHeaders::HTTP_CONNECTION],
                    RequestHeaders::HTTP_HOST => $_SERVER[RequestHeaders::HTTP_HOST],
                    RequestHeaders::HTTP_REFERER => $_SERVER[RequestHeaders::HTTP_REFERER] ?? '',
                    RequestHeaders::HTTP_USER_AGENT => $_SERVER[RequestHeaders::HTTP_USER_AGENT],
                ]),
                new RqBody($_REQUEST),
                new RqCookie($_COOKIE),
                new RqFiles($_FILES),
            )
        );
    }

}
