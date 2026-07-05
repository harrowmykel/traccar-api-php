<?php

namespace PiccmaQ\TraccarApi\Requests;

use PiccmaQ\TraccarApi\Models\UserModel;
use PiccmaQ\TraccarApi\Responses\Response as ApiResponse;

/**
 * Request builder for the Users resource.
 *
 * Provides access to all `/users` endpoints of the Traccar API, covering
 * user listing, creation, retrieval, updating, deletion, and TOTP secret
 * generation.
 *
 * @see https://www.traccar.org/api-reference/#tag/Users
 */
class UserRequest extends Request
{
    /**
     * Fetch a list of Users.
     *
     * `GET /users`
     *
     * Returns all users visible to the authenticated user. Regular users can
     * only see themselves; administrators can see all users.
     *
     * @param array{userId?: int} $query Optional query parameters:
     *   - `userId` – Return information about the specified user (admin only).
     *
     * @return ApiResponse Response whose structured body is a {@see UserModel}[].
     */
    public function list(array $query = []): ApiResponse
    {
        return $this->expectModel(UserModel::class, true)->requestGet('/users', $query);
    }

    /**
     * Create a User.
     *
     * `POST /users`
     *
     * @param array{
     *     name:        string,
     *     email:       string,
     *     password:    string,
     *     readonly?:   bool,
     *     admin?:      bool,
     *     map?:        string,
     *     latitude?:   float,
     *     longitude?:  float,
     *     zoom?:       int,
     *     phone?:      string,
     *     limitCommands?: bool,
     *     deviceLimit?:   int,
     *     userLimit?:     int,
     *     disabled?:      bool,
     *     expirationTime?: string,
     *     attributes?: array<string, mixed>,
     * } $data User data. `name`, `email`, and `password` are required.
     *
     * @return ApiResponse Response whose structured body is the created {@see UserModel}.
     */
    public function create(array $data): ApiResponse
    {
        return $this->expectModel(UserModel::class)->requestPost('/users', $data);
    }

    /**
     * Generate a TOTP secret for the current user.
     *
     * `POST /users/totp`
     *
     * Creates a new Time-based One-Time Password (TOTP) secret associated with
     * the authenticated user's account. Returns the secret key that should be
     * registered in the user's authenticator application.
     *
     * @return ApiResponse Response body contains the generated TOTP secret string.
     */
    public function totp(): ApiResponse
    {
        return $this->requestPost('/users/totp');
    }

    /**
     * Fetch a User.
     *
     * `GET /users/{id}`
     *
     * @param int $id The unique user identifier.
     *
     * @return ApiResponse Response whose structured body is the matching {@see UserModel}.
     */
    public function get(int $id): ApiResponse
    {
        return $this->expectModel(UserModel::class)->requestGet('/users/' . $id);
    }

    /**
     * Update a User.
     *
     * `PUT /users/{id}`
     *
     * @param int                  $id   The unique user identifier.
     * @param array<string, mixed> $data User fields to update.
     *
     * @return ApiResponse Response whose structured body is the updated {@see UserModel}.
     */
    public function update(int $id, array $data): ApiResponse
    {
        return $this->expectModel(UserModel::class)->requestPut('/users/' . $id, $data);
    }

    /**
     * Delete a User.
     *
     * `DELETE /users/{id}`
     *
     * @param int $id The unique user identifier to delete.
     *
     * @return ApiResponse Empty 204 response on success.
     */
    public function delete(int $id): ApiResponse
    {
        return $this->requestDelete('/users/' . $id);
    }
}
