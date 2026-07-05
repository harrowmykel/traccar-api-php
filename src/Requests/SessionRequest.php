<?php

namespace PiccmaQ\TraccarApi\Requests;

use PiccmaQ\TraccarApi\Models\UserModel;
use PiccmaQ\TraccarApi\Responses\Response as ApiResponse;

/**
 * Request builder for the Session resource.
 *
 * Manages authentication sessions and session tokens against the Traccar API.
 * Supports cookie-based login/logout, token generation and revocation,
 * admin impersonation, and OpenID Connect flows.
 *
 * @see https://www.traccar.org/api-reference/#tag/Session
 */
class SessionRequest extends Request
{
    /**
     * Fetch Session information.
     *
     * `GET /session`
     *
     * Returns information about the currently authenticated user. Optionally
     * accepts a `token` query parameter to authenticate via a pre-issued token
     * instead of the session cookie.
     *
     * @param array{token?: string} $query Optional query parameters:
     *   - `token` – Authenticate with a pre-issued API token instead of a cookie.
     *
     * @return ApiResponse Response whose structured body is the authenticated {@see UserModel}.
     */
    public function info(array $query = []): ApiResponse
    {
        return $this->expectModel(UserModel::class)->requestGet('/session', $query);
    }

    /**
     * Create a new Session.
     *
     * `POST /session`
     *
     * Authenticates with email and password using form encoding and establishes
     * a server-side session. The session cookie returned in the response is
     * automatically managed by the HTTP client.
     *
     * @param string $email    User's email address.
     * @param string $password User's password.
     *
     * @return ApiResponse Response whose structured body is the authenticated {@see UserModel}.
     */
    public function create(string $email, string $password): ApiResponse
    {
        return $this->expectModel(UserModel::class)->requestPostForm('/session', [
            'email' => $email,
            'password' => $password,
        ]);
    }

    /**
     * Close the Session.
     *
     * `DELETE /session`
     *
     * Invalidates the current server-side session and clears the session cookie.
     *
     * @return ApiResponse Empty 204 response on success.
     */
    public function close(): ApiResponse
    {
        return $this->requestDelete('/session');
    }

    /**
     * Open a Session as another User (admin impersonation).
     *
     * `GET /session/{userId}`
     *
     * Allows an administrator to impersonate another user by switching the active
     * session to that user's account without requiring their password.
     *
     * @param int $id The ID of the user to impersonate.
     *
     * @return ApiResponse Response whose structured body is the impersonated {@see UserModel}.
     */
    public function impersonate(int $id): ApiResponse
    {
        return $this->expectModel(UserModel::class)->requestGet('/session/' . $id);
    }

    /**
     * Generate a Session Token.
     *
     * `POST /session/token`
     *
     * Generates a long-lived API bearer token for the current user. The token
     * can optionally have an expiration date in ISO 8601 format.
     *
     * @param string|null $expiration Optional ISO 8601 expiration date-time
     *                                (e.g. `'2026-12-31T23:59:59Z'`). When
     *                                omitted the token does not expire.
     *
     * @return ApiResponse Response body contains the raw token string.
     */
    public function generateToken(?string $expiration = null): ApiResponse
    {
        $data = [];
        if ($expiration !== null) {
            $data['expiration'] = $expiration;
        }

        return $this->requestPostForm('/session/token', $data);
    }

    /**
     * Revoke a Session Token.
     *
     * `POST /session/token/revoke`
     *
     * Invalidates the specified API token so it can no longer be used for
     * authentication.
     *
     * @param string $token The token string to revoke.
     *
     * @return ApiResponse Empty 204 response on success.
     */
    public function revokeToken(string $token): ApiResponse
    {
        return $this->requestPostForm('/session/token/revoke', ['token' => $token]);
    }

    /**
     * Begin OpenID Connect authentication.
     *
     * `GET /session/openid/auth`
     *
     * Initiates the OpenID Connect authorization flow by redirecting the client
     * to the configured identity provider. Requires OpenID Connect to be enabled
     * in the server configuration.
     *
     * @return ApiResponse Redirect response to the identity provider.
     */
    public function openidAuth(): ApiResponse
    {
        return $this->requestGet('/session/openid/auth');
    }

    /**
     * OpenID Connect callback.
     *
     * `GET /session/openid/callback`
     *
     * Handles the redirect from the identity provider after a successful OpenID
     * Connect login. Exchanges the authorization code for a session.
     *
     * @return ApiResponse Response containing the established session information.
     */
    public function openidCallback(): ApiResponse
    {
        return $this->requestGet('/session/openid/callback');
    }
}
