<?php

namespace PiccmaQ\TraccarApi\Requests;

use PiccmaQ\TraccarApi\Models\NotificationModel;
use PiccmaQ\TraccarApi\Models\NotificationNotificatorModel;
use PiccmaQ\TraccarApi\Models\NotificationTypeModel;
use PiccmaQ\TraccarApi\Responses\Response as ApiResponse;

/**
 * Request builder for the Notifications resource.
 *
 * Provides access to all `/notifications` endpoints of the Traccar API.
 * Notifications define the rules under which users are alerted for device
 * events (alarms, geofence transitions, etc.) via various notificators
 * (email, SMS, push, webhooks, etc.).
 *
 * @see https://www.traccar.org/api-reference/#tag/Notifications
 */
class NotificationRequest extends Request
{
    /**
     * Fetch a list of Notifications.
     *
     * `GET /notifications`
     *
     * Returns all notification rules visible to the authenticated user.
     *
     * @param array{
     *     all?:    bool,
     *     userId?: int,
     * } $query Optional query parameters:
     *   - `all`    – Return all notifications (admin only).
     *   - `userId` – Return notifications belonging to the given user.
     *
     * @return ApiResponse Response whose structured body is a {@see NotificationModel}[].
     */
    public function list(array $query = []): ApiResponse
    {
        return $this->expectModel(NotificationModel::class, true)->requestGet('/notifications', $query);
    }

    /**
     * Create a Notification.
     *
     * `POST /notifications`
     *
     * @param array{
     *     type:          string,
     *     always?:       bool,
     *     web?:          bool,
     *     mail?:         bool,
     *     sms?:          bool,
     *     calendarId?:   int,
     *     attributes?:   array<string, mixed>,
     *     notificators?: string,
     * } $data Notification data. `type` is required.
     *
     * @return ApiResponse Response whose structured body is the created {@see NotificationModel}.
     */
    public function create(array $data): ApiResponse
    {
        return $this->expectModel(NotificationModel::class)->requestPost('/notifications', $data);
    }

    /**
     * Fetch a Notification.
     *
     * `GET /notifications/{id}`
     *
     * @param int $id The unique notification identifier.
     *
     * @return ApiResponse Response whose structured body is the matching {@see NotificationModel}.
     */
    public function get(int $id): ApiResponse
    {
        return $this->expectModel(NotificationModel::class)->requestGet('/notifications/' . $id);
    }

    /**
     * Update a Notification.
     *
     * `PUT /notifications/{id}`
     *
     * @param int                  $id   The unique notification identifier.
     * @param array<string, mixed> $data Notification fields to update.
     *
     * @return ApiResponse Response whose structured body is the updated {@see NotificationModel}.
     */
    public function update(int $id, array $data): ApiResponse
    {
        return $this->expectModel(NotificationModel::class)->requestPut('/notifications/' . $id, $data);
    }

    /**
     * Delete a Notification.
     *
     * `DELETE /notifications/{id}`
     *
     * @param int $id The unique notification identifier to delete.
     *
     * @return ApiResponse Empty 204 response on success.
     */
    public function delete(int $id): ApiResponse
    {
        return $this->requestDelete('/notifications/' . $id);
    }

    /**
     * Fetch a list of available Notification types.
     *
     * `GET /notifications/types`
     *
     * Returns all event types that can trigger a notification (e.g. `alarm`,
     * `geofenceEnter`, `deviceOnline`, etc.).
     *
     * @return ApiResponse Response whose structured body is a {@see NotificationTypeModel}[].
     */
    public function types(): ApiResponse
    {
        return $this->expectModel(NotificationTypeModel::class, true)->requestGet('/notifications/types');
    }

    /**
     * Fetch a list of available Notificators.
     *
     * `GET /notifications/notificators`
     *
     * Returns all delivery channels configured on the server (e.g. `mail`,
     * `sms`, `firebase`, `webhook`, etc.).
     *
     * @return ApiResponse Response whose structured body is a {@see NotificationNotificatorModel}[].
     */
    public function notificators(): ApiResponse
    {
        return $this->expectModel(NotificationNotificatorModel::class, true)->requestGet('/notifications/notificators');
    }

    /**
     * Send a test notification to the current user via Email and SMS.
     *
     * `POST /notifications/test`
     *
     * Triggers an immediate test notification to the authenticated user using
     * all default notificators (email and SMS). Useful for verifying delivery
     * channel configuration.
     *
     * @param array<string, mixed> $data Optional additional data for the test notification.
     *
     * @return ApiResponse Empty 204 response on success.
     */
    public function test(array $data = []): ApiResponse
    {
        return $this->requestPost('/notifications/test', $data);
    }

    /**
     * Send a test notification to the current user using a specific notificator.
     *
     * `POST /notifications/test/{notificator}`
     *
     * @param string               $notificator The notificator identifier (e.g. `'mail'`, `'firebase'`).
     * @param array<string, mixed> $data        Optional additional data for the test notification.
     *
     * @return ApiResponse Empty 204 response on success.
     */
    public function testByNotificator(string $notificator, array $data = []): ApiResponse
    {
        return $this->requestPost('/notifications/test/' . $notificator, $data);
    }

    /**
     * Send a custom notification to selected users using a specific notificator.
     *
     * `POST /notifications/send/{notificator}`
     *
     * Allows administrators to push a custom notification to one or more users
     * through the specified delivery channel.
     *
     * @param string               $notificator The notificator identifier (e.g. `'mail'`, `'sms'`).
     * @param array<string, mixed> $data        Notification payload (recipients, message, etc.).
     *
     * @return ApiResponse Empty 204 response on success.
     */
    public function send(string $notificator, array $data = []): ApiResponse
    {
        return $this->requestPost('/notifications/send/' . $notificator, $data);
    }
}
