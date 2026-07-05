<?php

namespace PiccmaQ\TraccarApi\Requests;

use PiccmaQ\TraccarApi\Responses\Response as ApiResponse;

/**
 * Request builder for the Password resource.
 *
 * Provides access to the `/password` endpoints of the Traccar API for
 * self-service password reset. The flow consists of two steps: first request
 * a reset email, then set a new password using the token received in that email.
 *
 * @see https://www.traccar.org/api-reference/#tag/Password
 */
class PasswordRequest extends Request
{
    /**
     * Send a password reset email.
     *
     * `POST /password/reset`
     *
     * Sends an email containing a password reset link to the address associated
     * with the specified account. The server must have outbound email configured.
     *
     * @param array{email: string} $data The email address of the account to reset.
     *
     * @return ApiResponse Empty 204 response on success.
     */
    public function reset(array $data): ApiResponse
    {
        return $this->requestPost('/password/reset', $data);
    }

    /**
     * Set a new password using a reset token.
     *
     * `POST /password/set`
     *
     * Completes the password reset flow by accepting the token from the reset
     * email together with the desired new password.
     *
     * @param string $token The one-time password reset token received via email.
     * @param array{password: string} $data New password data. `password` is required.
     *
     * @return ApiResponse Empty 204 response on success.
     */
    public function set(string $token, array $data): ApiResponse
    {
        return $this->requestPost('/password/set', array_merge($data, ['token' => $token]));
    }
}
