API Reference - Traccar    

*   Server
    *   getFetch Server information
    *   putUpdate Server information
    *   getReverse geocode coordinates
    *   getFetch available timezones
    *   postUpload a server file
    *   getTrigger garbage collection
    *   getFetch cache diagnostics
    *   postReboot the server process
*   Session
    *   getFetch Session information
    *   postCreate a new Session
    *   delClose the Session
    *   getOpen a Session as another User
    *   postGenerate Session Token
    *   postRevoke Session Token
    *   getBegin OpenID Connect authentication
    *   getOpenID Callback
*   Devices
    *   getFetch a list of Devices
    *   postCreate a Device
    *   getFetch a Device
    *   putUpdate a Device
    *   delDelete a Device
    *   putUpdate total distance and hours of the Device
    *   postUpload/Update Device image
*   Groups
    *   getFetch a list of Groups
    *   postCreate a Group
    *   getFetch a Group
    *   putUpdate a Group
    *   delDelete a Group
*   Share
    *   postShare device location
    *   postShare group devices
*   Users
    *   getFetch a list of Users
    *   postCreate a User
    *   postGenerate TOTP secret
    *   getFetch a User
    *   putUpdate a User
    *   delDelete a User
*   Permissions
    *   getFetch permission links between Objects
    *   postLink an Object to another Object
    *   delUnlink an Object from another Object
    *   postLink multiple Objects in a single request
    *   delUnlink multiple Objects in a single request
*   Positions
    *   getFetch a list of Positions
    *   delDeletes all the Positions of a device in the time span specified
    *   delDelete a Position
    *   getExport Positions as KML
    *   getExport Positions as CSV
    *   getExport Positions as GPX
*   Events
    *   getFetch an Event
*   Reports
    *   getFetch a combined route, Events and Positions report for the Devices or Groups
    *   getFetch a list of Positions within the time period for the Devices or Groups
    *   getDownload the route report as a spreadsheet or send it by email
    *   getFetch a list of Events within the time period for the Devices or Groups
    *   getDownload the events report as a spreadsheet or send it by email
    *   getFetch geofence enter/exit intervals within the time period for Devices or Groups
    *   getFetch a list of ReportSummary within the time period for the Devices or Groups
    *   getDownload the summary report as a spreadsheet or send it by email
    *   getFetch a list of ReportTrips within the time period for the Devices or Groups
    *   getDownload the trips report as a spreadsheet or send it by email
    *   getFetch a list of ReportStops within the time period for the Devices or Groups
    *   getDownload the stops report as a spreadsheet or send it by email
    *   getDownload the devices report as a spreadsheet or send it by email
*   Notifications
    *   getFetch a list of Notifications
    *   postCreate a Notification
    *   getFetch a Notification
    *   putUpdate a Notification
    *   delDelete a Notification
    *   getFetch a list of available Notification types
    *   getFetch a list of available Notificators
    *   postSend test notification to current user via Email and SMS
    *   postSend a test notification to the current User using the specified notificator
    *   postSend a custom notification to selected users using the specified notificator
*   Geofences
    *   getFetch a list of Geofences
    *   postCreate a Geofence
    *   getFetch a Geofence
    *   putUpdate a Geofence
    *   delDelete a Geofence
*   Commands
    *   getFetch a list of Saved Commands
    *   postCreate a Saved Command
    *   getFetch a Saved Command
    *   putUpdate a Saved Command
    *   delDelete a Saved Command
    *   getFetch a list of Saved Commands supported by Device at the moment
    *   postDispatch commands to device
    *   getFetch a list of available Commands for the Device or all possible Commands if Device ommited
*   Attributes
    *   getFetch a list of Attributes
    *   postCreate an Attribute
    *   postEvaluate a Computed Attribute against the latest Device Position
    *   getFetch an Attribute
    *   putUpdate an Attribute
    *   delDelete an Attribute
*   Drivers
    *   getFetch a list of Drivers
    *   postCreate a Driver
    *   getFetch a Driver
    *   putUpdate a Driver
    *   delDelete a Driver
*   Maintenance
    *   getFetch a list of Maintenance tasks
    *   postCreate a Maintenance task
    *   getFetch a Maintenance task
    *   putUpdate a Maintenance task
    *   delDelete a Maintenance task
*   Calendars
    *   getFetch a list of Calendars
    *   postCreate a Calendar
    *   getFetch a Calendar
    *   putUpdate a Calendar
    *   delDelete a Calendar
*   Statistics
    *   getFetch Server Statistics
*   Health
    *   getCheck server health
*   Orders
    *   getFetch a list of Orders
    *   postCreate an Order
    *   getFetch an Order
    *   putUpdate an Order
    *   delDelete an Order
*   Audit
    *   getFetch audit log Actions
*   Password
    *   postSend password reset email
    *   postSet a new password using a reset token
*   Stream
    *   getFetch the HLS playlist for a Device camera channel
    *   getFetch an HLS video segment for a Device camera channel

[![redocly logo](https://cdn.redoc.ly/redoc/logo-mini.svg)API docs by Redocly](https://redocly.com/redoc/)

# Traccar (6.14.5)

Download OpenAPI specification:[Download](https://www.traccar.org/api-reference/openapi.yaml)

Traccar Support: [support@traccar.org](mailto:support@traccar.org) URL: [https://www.traccar.org/](https://www.traccar.org/) License: [Apache 2.0](https://www.apache.org/licenses/LICENSE-2.0.html)

Traccar GPS tracking server API documentation. To use the API you need to have a server instance. For testing purposes you can use one of free [demo servers](https://www.traccar.org/demo-server/). For production use you can install your own server or get a [subscription service](https://www.traccar.org/product/tracking-server/).

## [](#tag/Server)Server

Server information

## [](#tag/Server/operation/getServer)Fetch Server information

### Responses

**200**

OK

**400**

Bad request

get/server

Demo Server 1

https://demo.traccar.org/api/server

Demo Server 2

https://demo2.traccar.org/api/server

Demo Server 3

https://demo3.traccar.org/api/server

Demo Server 4

https://demo4.traccar.org/api/server

Subscription Server

https://server.traccar.org/api/server

Other Server

http://{host}:{port}/api/server

### Response samples

*   200

Content type

application/json

Copy

Expand all Collapse all

`{  *   "id": 0,      *   "registration": true,      *   "readonly": true,      *   "deviceReadonly": true,      *   "limitCommands": true,      *   "map": "string",      *   "bingKey": "string",      *   "mapUrl": "string",      *   "poiLayer": "string",      *   "announcement": "string",      *   "latitude": 0,      *   "longitude": 0,      *   "zoom": 0,      *   "version": "string",      *   "forceSettings": true,      *   "coordinateFormat": "string",      *   "openIdEnabled": true,      *   "openIdForce": true,      *   "attributes": { }       }`

## [](#tag/Server/operation/putServer)Update Server information

##### Authorizations:

_BasicAuth__ApiKey_

##### Request Body schema: application/json

required

|     |     |
| --- | --- |
| id  | integer <int64><br><br>Unique server configuration identifier |
| registration | boolean<br><br>Whether new user registrations are allowed |
| readonly | boolean<br><br>When true only administrators can modify server-wide settings |
| deviceReadonly | boolean<br><br>Disallow device attribute changes for non-admins |
| limitCommands | boolean<br><br>Restrict command execution to supported protocol commands |
| map | string<br><br>Default map layer identifier |
| bingKey | string<br><br>Bing Maps API key used when Bing is selected as a provider |
| mapUrl | string<br><br>Custom tile server URL template if configured |
| poiLayer | string<br><br>External point-of-interest layer configuration |
| announcement | string<br><br>Message displayed to all users in the web application |
| latitude | number<br><br>Default map center latitude |
| longitude | number<br><br>Default map center longitude |
| zoom | integer<br><br>Default map zoom level |
| version | string<br><br>Traccar server version string |
| forceSettings | boolean<br><br>Forces users to use the server-wide settings instead of their own |
| coordinateFormat | string<br><br>Default coordinate format for displaying positions |
| openIdEnabled | boolean<br><br>Indicates whether OpenID authentication is available |
| openIdForce | boolean<br><br>Require OpenID authentication for all users when enabled |
| attributes | object<br><br>Additional server-level configuration values |

### Responses

**200**

OK

**400**

Bad request

**401**

Unauthorized

put/server

Demo Server 1

https://demo.traccar.org/api/server

Demo Server 2

https://demo2.traccar.org/api/server

Demo Server 3

https://demo3.traccar.org/api/server

Demo Server 4

https://demo4.traccar.org/api/server

Subscription Server

https://server.traccar.org/api/server

Other Server

http://{host}:{port}/api/server

### Request samples

*   Payload

Content type

application/json

Copy

Expand all Collapse all

`{  *   "id": 0,      *   "registration": true,      *   "readonly": true,      *   "deviceReadonly": true,      *   "limitCommands": true,      *   "map": "string",      *   "bingKey": "string",      *   "mapUrl": "string",      *   "poiLayer": "string",      *   "announcement": "string",      *   "latitude": 0,      *   "longitude": 0,      *   "zoom": 0,      *   "version": "string",      *   "forceSettings": true,      *   "coordinateFormat": "string",      *   "openIdEnabled": true,      *   "openIdForce": true,      *   "attributes": { }       }`

### Response samples

*   200

Content type

application/json

Copy

Expand all Collapse all

`{  *   "id": 0,      *   "registration": true,      *   "readonly": true,      *   "deviceReadonly": true,      *   "limitCommands": true,      *   "map": "string",      *   "bingKey": "string",      *   "mapUrl": "string",      *   "poiLayer": "string",      *   "announcement": "string",      *   "latitude": 0,      *   "longitude": 0,      *   "zoom": 0,      *   "version": "string",      *   "forceSettings": true,      *   "coordinateFormat": "string",      *   "openIdEnabled": true,      *   "openIdForce": true,      *   "attributes": { }       }`

## [](#tag/Server/operation/getServerGeocode)Reverse geocode coordinates

##### Authorizations:

_BasicAuth__ApiKey_

##### query Parameters

|     |     |
| --- | --- |
| latitude<br><br>required | number <double> |
| longitude<br><br>required | number <double> |

### Responses

**200**

OK

**401**

Unauthorized

**500**

Reverse geocoding is not enabled

get/server/geocode

Demo Server 1

https://demo.traccar.org/api/server/geocode

Demo Server 2

https://demo2.traccar.org/api/server/geocode

Demo Server 3

https://demo3.traccar.org/api/server/geocode

Demo Server 4

https://demo4.traccar.org/api/server/geocode

Subscription Server

https://server.traccar.org/api/server/geocode

Other Server

http://{host}:{port}/api/server/geocode

## [](#tag/Server/operation/getServerTimezones)Fetch available timezones

##### Authorizations:

_BasicAuth__ApiKey_

### Responses

**200**

OK

**401**

Unauthorized

get/server/timezones

Demo Server 1

https://demo.traccar.org/api/server/timezones

Demo Server 2

https://demo2.traccar.org/api/server/timezones

Demo Server 3

https://demo3.traccar.org/api/server/timezones

Demo Server 4

https://demo4.traccar.org/api/server/timezones

Subscription Server

https://server.traccar.org/api/server/timezones

Other Server

http://{host}:{port}/api/server/timezones

### Response samples

*   200

Content type

application/json

Copy

`[  *   "string"       ]`

## [](#tag/Server/operation/postServerFilePath)Upload a server file

##### Authorizations:

_BasicAuth__ApiKey_

##### path Parameters

|     |     |
| --- | --- |
| path<br><br>required | string |

##### Request Body schema: application/octet-stream

required

string <binary>

### Responses

**200**

OK

**400**

Bad request

post/server/file/{path}

Demo Server 1

https://demo.traccar.org/api/server/file/{path}

Demo Server 2

https://demo2.traccar.org/api/server/file/{path}

Demo Server 3

https://demo3.traccar.org/api/server/file/{path}

Demo Server 4

https://demo4.traccar.org/api/server/file/{path}

Subscription Server

https://server.traccar.org/api/server/file/{path}

Other Server

http://{host}:{port}/api/server/file/{path}

## [](#tag/Server/operation/getServerGc)Trigger garbage collection

##### Authorizations:

_BasicAuth__ApiKey_

### Responses

**200**

OK

**401**

Unauthorized

get/server/gc

Demo Server 1

https://demo.traccar.org/api/server/gc

Demo Server 2

https://demo2.traccar.org/api/server/gc

Demo Server 3

https://demo3.traccar.org/api/server/gc

Demo Server 4

https://demo4.traccar.org/api/server/gc

Subscription Server

https://server.traccar.org/api/server/gc

Other Server

http://{host}:{port}/api/server/gc

## [](#tag/Server/operation/getServerCache)Fetch cache diagnostics

##### Authorizations:

_BasicAuth__ApiKey_

### Responses

**200**

OK

**401**

Unauthorized

get/server/cache

Demo Server 1

https://demo.traccar.org/api/server/cache

Demo Server 2

https://demo2.traccar.org/api/server/cache

Demo Server 3

https://demo3.traccar.org/api/server/cache

Demo Server 4

https://demo4.traccar.org/api/server/cache

Subscription Server

https://server.traccar.org/api/server/cache

Other Server

http://{host}:{port}/api/server/cache

## [](#tag/Server/operation/postServerReboot)Reboot the server process

##### Authorizations:

_BasicAuth__ApiKey_

### Responses

**200**

OK

**400**

Bad request

**401**

Unauthorized

post/server/reboot

Demo Server 1

https://demo.traccar.org/api/server/reboot

Demo Server 2

https://demo2.traccar.org/api/server/reboot

Demo Server 3

https://demo3.traccar.org/api/server/reboot

Demo Server 4

https://demo4.traccar.org/api/server/reboot

Subscription Server

https://server.traccar.org/api/server/reboot

Other Server

http://{host}:{port}/api/server/reboot

## [](#tag/Session)Session

User session management

## [](#tag/Session/operation/getSession)Fetch Session information

##### query Parameters

|     |     |
| --- | --- |
| token | string |

### Responses

**200**

OK

**404**

Not found

get/session

Demo Server 1

https://demo.traccar.org/api/session

Demo Server 2

https://demo2.traccar.org/api/session

Demo Server 3

https://demo3.traccar.org/api/session

Demo Server 4

https://demo4.traccar.org/api/session

Subscription Server

https://server.traccar.org/api/session

Other Server

http://{host}:{port}/api/session

### Response samples

*   200

Content type

application/json

Copy

Expand all Collapse all

`{  *   "id": 0,      *   "name": "string",      *   "email": "string",      *   "phone": "string",      *   "readonly": true,      *   "administrator": true,      *   "map": "string",      *   "latitude": 0,      *   "longitude": 0,      *   "zoom": 0,      *   "password": "string",      *   "coordinateFormat": "string",      *   "disabled": true,      *   "expirationTime": "2019-08-24T14:15:22Z",      *   "deviceLimit": 0,      *   "userLimit": 0,      *   "deviceReadonly": true,      *   "limitCommands": true,      *   "fixedEmail": true,      *   "poiLayer": "string",      *   "attributes": { }       }`

## [](#tag/Session/operation/postSession)Create a new Session

##### Request Body schema: application/x-www-form-urlencoded

required

|     |     |
| --- | --- |
| email<br><br>required | string |
| password<br><br>required | string <password> |

### Responses

**200**

OK

**401**

Unauthorized

post/session

Demo Server 1

https://demo.traccar.org/api/session

Demo Server 2

https://demo2.traccar.org/api/session

Demo Server 3

https://demo3.traccar.org/api/session

Demo Server 4

https://demo4.traccar.org/api/session

Subscription Server

https://server.traccar.org/api/session

Other Server

http://{host}:{port}/api/session

### Response samples

*   200

Content type

application/json

Copy

Expand all Collapse all

`{  *   "id": 0,      *   "name": "string",      *   "email": "string",      *   "phone": "string",      *   "readonly": true,      *   "administrator": true,      *   "map": "string",      *   "latitude": 0,      *   "longitude": 0,      *   "zoom": 0,      *   "password": "string",      *   "coordinateFormat": "string",      *   "disabled": true,      *   "expirationTime": "2019-08-24T14:15:22Z",      *   "deviceLimit": 0,      *   "userLimit": 0,      *   "deviceReadonly": true,      *   "limitCommands": true,      *   "fixedEmail": true,      *   "poiLayer": "string",      *   "attributes": { }       }`

## [](#tag/Session/operation/deleteSession)Close the Session

##### Authorizations:

_BasicAuth__ApiKey_

### Responses

**204**

No Content

**401**

Unauthorized

delete/session

Demo Server 1

https://demo.traccar.org/api/session

Demo Server 2

https://demo2.traccar.org/api/session

Demo Server 3

https://demo3.traccar.org/api/session

Demo Server 4

https://demo4.traccar.org/api/session

Subscription Server

https://server.traccar.org/api/session

Other Server

http://{host}:{port}/api/session

## [](#tag/Session/operation/getSessionId)Open a Session as another User

Admin or manager only. Establishes a session impersonating the specified user.

##### Authorizations:

_BasicAuth__ApiKey_

##### path Parameters

|     |     |
| --- | --- |
| id<br><br>required | integer |

### Responses

**200**

OK

**401**

Unauthorized

**404**

Not found

get/session/{id}

Demo Server 1

https://demo.traccar.org/api/session/{id}

Demo Server 2

https://demo2.traccar.org/api/session/{id}

Demo Server 3

https://demo3.traccar.org/api/session/{id}

Demo Server 4

https://demo4.traccar.org/api/session/{id}

Subscription Server

https://server.traccar.org/api/session/{id}

Other Server

http://{host}:{port}/api/session/{id}

### Response samples

*   200

Content type

application/json

Copy

Expand all Collapse all

`{  *   "id": 0,      *   "name": "string",      *   "email": "string",      *   "phone": "string",      *   "readonly": true,      *   "administrator": true,      *   "map": "string",      *   "latitude": 0,      *   "longitude": 0,      *   "zoom": 0,      *   "password": "string",      *   "coordinateFormat": "string",      *   "disabled": true,      *   "expirationTime": "2019-08-24T14:15:22Z",      *   "deviceLimit": 0,      *   "userLimit": 0,      *   "deviceReadonly": true,      *   "limitCommands": true,      *   "fixedEmail": true,      *   "poiLayer": "string",      *   "attributes": { }       }`

## [](#tag/Session/operation/postSessionToken)Generate Session Token

##### Authorizations:

_BasicAuth__ApiKey_

##### Request Body schema: application/x-www-form-urlencoded

optional

|     |     |
| --- | --- |
| expiration | string <date-time> |

### Responses

**200**

Token string

**400**

Bad request

**401**

Unauthorized

post/session/token

Demo Server 1

https://demo.traccar.org/api/session/token

Demo Server 2

https://demo2.traccar.org/api/session/token

Demo Server 3

https://demo3.traccar.org/api/session/token

Demo Server 4

https://demo4.traccar.org/api/session/token

Subscription Server

https://server.traccar.org/api/session/token

Other Server

http://{host}:{port}/api/session/token

## [](#tag/Session/operation/postSessionTokenRevoke)Revoke Session Token

##### Authorizations:

_BasicAuth__ApiKey_

##### Request Body schema: application/x-www-form-urlencoded

required

|     |     |
| --- | --- |
| token<br><br>required | string |

### Responses

**204**

No Content

**400**

Bad request

post/session/token/revoke

Demo Server 1

https://demo.traccar.org/api/session/token/revoke

Demo Server 2

https://demo2.traccar.org/api/session/token/revoke

Demo Server 3

https://demo3.traccar.org/api/session/token/revoke

Demo Server 4

https://demo4.traccar.org/api/session/token/revoke

Subscription Server

https://server.traccar.org/api/session/token/revoke

Other Server

http://{host}:{port}/api/session/token/revoke

## [](#tag/Session/operation/getSessionOpenidAuth)Begin OpenID Connect authentication

##### Authorizations:

_BasicAuth__ApiKey_

### Responses

**303**

Redirect to OpenID Connect identity provider

**400**

OpenID Connect is not configured

**default**

Unexpected error

get/session/openid/auth

Demo Server 1

https://demo.traccar.org/api/session/openid/auth

Demo Server 2

https://demo2.traccar.org/api/session/openid/auth

Demo Server 3

https://demo3.traccar.org/api/session/openid/auth

Demo Server 4

https://demo4.traccar.org/api/session/openid/auth

Subscription Server

https://server.traccar.org/api/session/openid/auth

Other Server

http://{host}:{port}/api/session/openid/auth

## [](#tag/Session/operation/getSessionOpenidCallback)OpenID Callback

##### Authorizations:

_BasicAuth__ApiKey_

### Responses

**303**

Successful authentication, redirect to homepage

**400**

Invalid or expired callback parameters

**default**

Unexpected error

get/session/openid/callback

Demo Server 1

https://demo.traccar.org/api/session/openid/callback

Demo Server 2

https://demo2.traccar.org/api/session/openid/callback

Demo Server 3

https://demo3.traccar.org/api/session/openid/callback

Demo Server 4

https://demo4.traccar.org/api/session/openid/callback

Subscription Server

https://server.traccar.org/api/session/openid/callback

Other Server

http://{host}:{port}/api/session/openid/callback

## [](#tag/Devices)Devices

Device management

## [](#tag/Devices/operation/getDevices)Fetch a list of Devices

Without any params, returns a list of the user's devices

##### Authorizations:

_BasicAuth__ApiKey_

##### query Parameters

|     |     |
| --- | --- |
| all | boolean<br><br>Can only be used by admins or managers to fetch all entities |
| userId | integer<br><br>Standard users can use this only with their own _userId_ |
| id  | integer<br><br>To fetch one or more devices. Multiple params can be passed like `id=31&id=42` |
| uniqueId | string<br><br>To fetch one or more devices. Multiple params can be passed like `uniqueId=333331&uniqieId=44442` |
| excludeAttributes | boolean<br><br>Exclude attributes field from device payload |
| limit | integer<br><br>Limit the number of returned results |
| offset | integer<br><br>Offset for pagination |
| keyword | string<br><br>Search keyword filter (searches name, uniqueId, phone, model, contact) |

### Responses

**200**

OK

**400**

No permission

get/devices

Demo Server 1

https://demo.traccar.org/api/devices

Demo Server 2

https://demo2.traccar.org/api/devices

Demo Server 3

https://demo3.traccar.org/api/devices

Demo Server 4

https://demo4.traccar.org/api/devices

Subscription Server

https://server.traccar.org/api/devices

Other Server

http://{host}:{port}/api/devices

### Response samples

*   200

Content type

application/json

Copy

Expand all Collapse all

`[  *   {          *   "id": 0,              *   "name": "string",              *   "uniqueId": "string",              *   "status": "string",              *   "disabled": true,              *   "lastUpdate": "2019-08-24T14:15:22Z",              *   "positionId": 0,              *   "groupId": 0,              *   "phone": "string",              *   "model": "string",              *   "contact": "string",              *   "category": "string",              *   "attributes": { }                   }       ]`

## [](#tag/Devices/operation/postDevices)Create a Device

##### Authorizations:

_BasicAuth__ApiKey_

##### Request Body schema: application/json

required

|     |     |
| --- | --- |
| id  | integer <int64><br><br>Unique identifier assigned by Traccar |
| name | string<br><br>Human friendly device label |
| uniqueId | string<br><br>Hardware or protocol specific unique identifier |
| status | string<br><br>Current connection status such as `online`, `offline`, or `unknown` |
| disabled | boolean<br><br>Whether the device is disabled by an administrator |
| lastUpdate | string or null <date-time><br><br>in ISO 8601 format. eg. `1963-11-22T18:30:00Z` |
| positionId | integer or null <int64><br><br>Identifier of the last known position |
| groupId | integer or null <int64><br><br>Parent group identifier when the device is assigned to a group |
| phone | string or null<br><br>Contact phone number used for SMS commands |
| model | string or null<br><br>Device model or hardware revision |
| contact | string or null<br><br>Responsible person's contact information |
| category | string or null<br><br>Free form category used for grouping devices in the UI |
| attributes | object<br><br>Custom attributes for protocol or business specific data |

### Responses

**200**

OK

**400**

Bad request

**401**

Unauthorized

post/devices

Demo Server 1

https://demo.traccar.org/api/devices

Demo Server 2

https://demo2.traccar.org/api/devices

Demo Server 3

https://demo3.traccar.org/api/devices

Demo Server 4

https://demo4.traccar.org/api/devices

Subscription Server

https://server.traccar.org/api/devices

Other Server

http://{host}:{port}/api/devices

### Request samples

*   Payload

Content type

application/json

Copy

Expand all Collapse all

`{  *   "id": 0,      *   "name": "string",      *   "uniqueId": "string",      *   "status": "string",      *   "disabled": true,      *   "lastUpdate": "2019-08-24T14:15:22Z",      *   "positionId": 0,      *   "groupId": 0,      *   "phone": "string",      *   "model": "string",      *   "contact": "string",      *   "category": "string",      *   "attributes": { }       }`

### Response samples

*   200

Content type

application/json

Copy

Expand all Collapse all

`{  *   "id": 0,      *   "name": "string",      *   "uniqueId": "string",      *   "status": "string",      *   "disabled": true,      *   "lastUpdate": "2019-08-24T14:15:22Z",      *   "positionId": 0,      *   "groupId": 0,      *   "phone": "string",      *   "model": "string",      *   "contact": "string",      *   "category": "string",      *   "attributes": { }       }`

## [](#tag/Devices/operation/getDevicesId)Fetch a Device

##### Authorizations:

_BasicAuth__ApiKey_

##### path Parameters

|     |     |
| --- | --- |
| id<br><br>required | integer |

### Responses

**200**

OK

**401**

Unauthorized

**404**

Not found

get/devices/{id}

Demo Server 1

https://demo.traccar.org/api/devices/{id}

Demo Server 2

https://demo2.traccar.org/api/devices/{id}

Demo Server 3

https://demo3.traccar.org/api/devices/{id}

Demo Server 4

https://demo4.traccar.org/api/devices/{id}

Subscription Server

https://server.traccar.org/api/devices/{id}

Other Server

http://{host}:{port}/api/devices/{id}

### Response samples

*   200

Content type

application/json

Copy

Expand all Collapse all

`{  *   "id": 0,      *   "name": "string",      *   "uniqueId": "string",      *   "status": "string",      *   "disabled": true,      *   "lastUpdate": "2019-08-24T14:15:22Z",      *   "positionId": 0,      *   "groupId": 0,      *   "phone": "string",      *   "model": "string",      *   "contact": "string",      *   "category": "string",      *   "attributes": { }       }`

## [](#tag/Devices/operation/putDevicesId)Update a Device

##### Authorizations:

_BasicAuth__ApiKey_

##### path Parameters

|     |     |
| --- | --- |
| id<br><br>required | integer |

##### Request Body schema: application/json

required

|     |     |
| --- | --- |
| id  | integer <int64><br><br>Unique identifier assigned by Traccar |
| name | string<br><br>Human friendly device label |
| uniqueId | string<br><br>Hardware or protocol specific unique identifier |
| status | string<br><br>Current connection status such as `online`, `offline`, or `unknown` |
| disabled | boolean<br><br>Whether the device is disabled by an administrator |
| lastUpdate | string or null <date-time><br><br>in ISO 8601 format. eg. `1963-11-22T18:30:00Z` |
| positionId | integer or null <int64><br><br>Identifier of the last known position |
| groupId | integer or null <int64><br><br>Parent group identifier when the device is assigned to a group |
| phone | string or null<br><br>Contact phone number used for SMS commands |
| model | string or null<br><br>Device model or hardware revision |
| contact | string or null<br><br>Responsible person's contact information |
| category | string or null<br><br>Free form category used for grouping devices in the UI |
| attributes | object<br><br>Custom attributes for protocol or business specific data |

### Responses

**200**

OK

**400**

Bad request

**401**

Unauthorized

put/devices/{id}

Demo Server 1

https://demo.traccar.org/api/devices/{id}

Demo Server 2

https://demo2.traccar.org/api/devices/{id}

Demo Server 3

https://demo3.traccar.org/api/devices/{id}

Demo Server 4

https://demo4.traccar.org/api/devices/{id}

Subscription Server

https://server.traccar.org/api/devices/{id}

Other Server

http://{host}:{port}/api/devices/{id}

### Request samples

*   Payload

Content type

application/json

Copy

Expand all Collapse all

`{  *   "id": 0,      *   "name": "string",      *   "uniqueId": "string",      *   "status": "string",      *   "disabled": true,      *   "lastUpdate": "2019-08-24T14:15:22Z",      *   "positionId": 0,      *   "groupId": 0,      *   "phone": "string",      *   "model": "string",      *   "contact": "string",      *   "category": "string",      *   "attributes": { }       }`

### Response samples

*   200

Content type

application/json

Copy

Expand all Collapse all

`{  *   "id": 0,      *   "name": "string",      *   "uniqueId": "string",      *   "status": "string",      *   "disabled": true,      *   "lastUpdate": "2019-08-24T14:15:22Z",      *   "positionId": 0,      *   "groupId": 0,      *   "phone": "string",      *   "model": "string",      *   "contact": "string",      *   "category": "string",      *   "attributes": { }       }`

## [](#tag/Devices/operation/deleteDevicesId)Delete a Device

##### Authorizations:

_BasicAuth__ApiKey_

##### path Parameters

|     |     |
| --- | --- |
| id<br><br>required | integer |

### Responses

**204**

No Content

**401**

Unauthorized

delete/devices/{id}

Demo Server 1

https://demo.traccar.org/api/devices/{id}

Demo Server 2

https://demo2.traccar.org/api/devices/{id}

Demo Server 3

https://demo3.traccar.org/api/devices/{id}

Demo Server 4

https://demo4.traccar.org/api/devices/{id}

Subscription Server

https://server.traccar.org/api/devices/{id}

Other Server

http://{host}:{port}/api/devices/{id}

## [](#tag/Devices/operation/putDevicesIdAccumulators)Update total distance and hours of the Device

##### Authorizations:

_BasicAuth__ApiKey_

##### path Parameters

|     |     |
| --- | --- |
| id<br><br>required | integer |

##### Request Body schema: application/json

required

|     |     |
| --- | --- |
| deviceId | integer <int64><br><br>Device identifier for the accumulator entry |
| totalDistance | number<br><br>in meters |
| hours | number<br><br>Total engine hours recorded by the device |

### Responses

**204**

No Content

**400**

Bad request

**401**

Unauthorized

put/devices/{id}/accumulators

Demo Server 1

https://demo.traccar.org/api/devices/{id}/accumulators

Demo Server 2

https://demo2.traccar.org/api/devices/{id}/accumulators

Demo Server 3

https://demo3.traccar.org/api/devices/{id}/accumulators

Demo Server 4

https://demo4.traccar.org/api/devices/{id}/accumulators

Subscription Server

https://server.traccar.org/api/devices/{id}/accumulators

Other Server

http://{host}:{port}/api/devices/{id}/accumulators

### Request samples

*   Payload

Content type

application/json

Copy

`{  *   "deviceId": 0,      *   "totalDistance": 0,      *   "hours": 0       }`

## [](#tag/Devices/operation/postDevicesIdImage)Upload/Update Device image

##### Authorizations:

_BasicAuth__ApiKey_

##### path Parameters

|     |     |
| --- | --- |
| id<br><br>required | integer |

##### Request Body schema: image/\*

required

string <binary>

### Responses

**200**

OK

**400**

Invalid image type or size

**404**

Device not found

post/devices/{id}/image

Demo Server 1

https://demo.traccar.org/api/devices/{id}/image

Demo Server 2

https://demo2.traccar.org/api/devices/{id}/image

Demo Server 3

https://demo3.traccar.org/api/devices/{id}/image

Demo Server 4

https://demo4.traccar.org/api/devices/{id}/image

Subscription Server

https://server.traccar.org/api/devices/{id}/image

Other Server

http://{host}:{port}/api/devices/{id}/image

### Response samples

*   200

Content type

text/plain

Copy

device.png

## [](#tag/Groups)Groups

Group management

## [](#tag/Groups/operation/getGroups)Fetch a list of Groups

Without any params, returns a list of the Groups the user belongs to

##### Authorizations:

_BasicAuth__ApiKey_

##### query Parameters

|     |     |
| --- | --- |
| all | boolean<br><br>Can only be used by admins or managers to fetch all entities |
| userId | integer<br><br>Standard users can use this only with their own _userId_ |
| limit | integer<br><br>Limit the number of returned results |
| offset | integer<br><br>Offset for pagination |
| keyword | string<br><br>Search keyword filter |

### Responses

**200**

OK

**401**

Unauthorized

get/groups

Demo Server 1

https://demo.traccar.org/api/groups

Demo Server 2

https://demo2.traccar.org/api/groups

Demo Server 3

https://demo3.traccar.org/api/groups

Demo Server 4

https://demo4.traccar.org/api/groups

Subscription Server

https://server.traccar.org/api/groups

Other Server

http://{host}:{port}/api/groups

### Response samples

*   200

Content type

application/json

Copy

Expand all Collapse all

`[  *   {          *   "id": 0,              *   "name": "string",              *   "groupId": 0,              *   "attributes": { }                   }       ]`

## [](#tag/Groups/operation/postGroups)Create a Group

##### Authorizations:

_BasicAuth__ApiKey_

##### Request Body schema: application/json

required

|     |     |
| --- | --- |
| id  | integer <int64><br><br>Unique group identifier |
| name | string<br><br>Group display name |
| groupId | integer <int64><br><br>Parent group identifier for nested grouping |
| attributes | object<br><br>Arbitrary metadata attached to the group |

### Responses

**200**

OK

**400**

No permission

post/groups

Demo Server 1

https://demo.traccar.org/api/groups

Demo Server 2

https://demo2.traccar.org/api/groups

Demo Server 3

https://demo3.traccar.org/api/groups

Demo Server 4

https://demo4.traccar.org/api/groups

Subscription Server

https://server.traccar.org/api/groups

Other Server

http://{host}:{port}/api/groups

### Request samples

*   Payload

Content type

application/json

Copy

Expand all Collapse all

`{  *   "id": 0,      *   "name": "string",      *   "groupId": 0,      *   "attributes": { }       }`

### Response samples

*   200

Content type

application/json

Copy

Expand all Collapse all

`{  *   "id": 0,      *   "name": "string",      *   "groupId": 0,      *   "attributes": { }       }`

## [](#tag/Groups/operation/getGroupsId)Fetch a Group

##### Authorizations:

_BasicAuth__ApiKey_

##### path Parameters

|     |     |
| --- | --- |
| id<br><br>required | integer |

### Responses

**200**

OK

**401**

Unauthorized

**404**

Not found

get/groups/{id}

Demo Server 1

https://demo.traccar.org/api/groups/{id}

Demo Server 2

https://demo2.traccar.org/api/groups/{id}

Demo Server 3

https://demo3.traccar.org/api/groups/{id}

Demo Server 4

https://demo4.traccar.org/api/groups/{id}

Subscription Server

https://server.traccar.org/api/groups/{id}

Other Server

http://{host}:{port}/api/groups/{id}

### Response samples

*   200

Content type

application/json

Copy

Expand all Collapse all

`{  *   "id": 0,      *   "name": "string",      *   "groupId": 0,      *   "attributes": { }       }`

## [](#tag/Groups/operation/putGroupsId)Update a Group

##### Authorizations:

_BasicAuth__ApiKey_

##### path Parameters

|     |     |
| --- | --- |
| id<br><br>required | integer |

##### Request Body schema: application/json

required

|     |     |
| --- | --- |
| id  | integer <int64><br><br>Unique group identifier |
| name | string<br><br>Group display name |
| groupId | integer <int64><br><br>Parent group identifier for nested grouping |
| attributes | object<br><br>Arbitrary metadata attached to the group |

### Responses

**200**

OK

**400**

Bad request

**401**

Unauthorized

put/groups/{id}

Demo Server 1

https://demo.traccar.org/api/groups/{id}

Demo Server 2

https://demo2.traccar.org/api/groups/{id}

Demo Server 3

https://demo3.traccar.org/api/groups/{id}

Demo Server 4

https://demo4.traccar.org/api/groups/{id}

Subscription Server

https://server.traccar.org/api/groups/{id}

Other Server

http://{host}:{port}/api/groups/{id}

### Request samples

*   Payload

Content type

application/json

Copy

Expand all Collapse all

`{  *   "id": 0,      *   "name": "string",      *   "groupId": 0,      *   "attributes": { }       }`

### Response samples

*   200

Content type

application/json

Copy

Expand all Collapse all

`{  *   "id": 0,      *   "name": "string",      *   "groupId": 0,      *   "attributes": { }       }`

## [](#tag/Groups/operation/deleteGroupsId)Delete a Group

##### Authorizations:

_BasicAuth__ApiKey_

##### path Parameters

|     |     |
| --- | --- |
| id<br><br>required | integer |

### Responses

**204**

No Content

**401**

Unauthorized

delete/groups/{id}

Demo Server 1

https://demo.traccar.org/api/groups/{id}

Demo Server 2

https://demo2.traccar.org/api/groups/{id}

Demo Server 3

https://demo3.traccar.org/api/groups/{id}

Demo Server 4

https://demo4.traccar.org/api/groups/{id}

Subscription Server

https://server.traccar.org/api/groups/{id}

Other Server

http://{host}:{port}/api/groups/{id}

## [](#tag/Share)Share

Share devices and groups

## [](#tag/Share/operation/postShareDevice)Share device location

##### Authorizations:

_BasicAuth__ApiKey_

##### Request Body schema: application/x-www-form-urlencoded

required

|     |     |
| --- | --- |
| deviceId<br><br>required | integer |
| expiration<br><br>required | string <date-time> |

### Responses

**200**

OK

**403**

Sharing is disabled or temporary user

post/share/device

Demo Server 1

https://demo.traccar.org/api/share/device

Demo Server 2

https://demo2.traccar.org/api/share/device

Demo Server 3

https://demo3.traccar.org/api/share/device

Demo Server 4

https://demo4.traccar.org/api/share/device

Subscription Server

https://server.traccar.org/api/share/device

Other Server

http://{host}:{port}/api/share/device

### Response samples

*   200

Content type

text/plain

Copy

eyJhbGciOi...

## [](#tag/Share/operation/postShareGroup)Share group devices

##### Authorizations:

_BasicAuth__ApiKey_

##### Request Body schema: application/x-www-form-urlencoded

required

|     |     |
| --- | --- |
| groupId<br><br>required | integer |
| expiration<br><br>required | string <date-time> |

### Responses

**200**

OK

**403**

Sharing is disabled or temporary user

post/share/group

Demo Server 1

https://demo.traccar.org/api/share/group

Demo Server 2

https://demo2.traccar.org/api/share/group

Demo Server 3

https://demo3.traccar.org/api/share/group

Demo Server 4

https://demo4.traccar.org/api/share/group

Subscription Server

https://server.traccar.org/api/share/group

Other Server

http://{host}:{port}/api/share/group

### Response samples

*   200

Content type

text/plain

Copy

eyJhbGciOi...

## [](#tag/Users)Users

User management

## [](#tag/Users/operation/getUsers)Fetch a list of Users

##### Authorizations:

_BasicAuth__ApiKey_

##### query Parameters

|     |     |
| --- | --- |
| userId | string<br><br>Can only be used by admin or manager users |
| limit | integer<br><br>Limit the number of returned results |
| offset | integer<br><br>Offset for pagination |
| keyword | string<br><br>Search keyword filter (searches name, email) |

### Responses

**200**

OK

**400**

No Permission

get/users

Demo Server 1

https://demo.traccar.org/api/users

Demo Server 2

https://demo2.traccar.org/api/users

Demo Server 3

https://demo3.traccar.org/api/users

Demo Server 4

https://demo4.traccar.org/api/users

Subscription Server

https://server.traccar.org/api/users

Other Server

http://{host}:{port}/api/users

### Response samples

*   200

Content type

application/json

Copy

Expand all Collapse all

`[  *   {          *   "id": 0,              *   "name": "string",              *   "email": "string",              *   "phone": "string",              *   "readonly": true,              *   "administrator": true,              *   "map": "string",              *   "latitude": 0,              *   "longitude": 0,              *   "zoom": 0,              *   "password": "string",              *   "coordinateFormat": "string",              *   "disabled": true,              *   "expirationTime": "2019-08-24T14:15:22Z",              *   "deviceLimit": 0,              *   "userLimit": 0,              *   "deviceReadonly": true,              *   "limitCommands": true,              *   "fixedEmail": true,              *   "poiLayer": "string",              *   "attributes": { }                   }       ]`

## [](#tag/Users/operation/postUsers)Create a User

##### Authorizations:

_BasicAuth__ApiKey_

##### Request Body schema: application/json

required

|     |     |
| --- | --- |
| id  | integer <int64><br><br>Unique user identifier |
| name | string<br><br>User display name |
| email | string<br><br>Email address used for login and notifications |
| phone | string or null<br><br>Contact phone number for alerts |
| readonly | boolean<br><br>When true, the user cannot change settings |
| administrator | boolean<br><br>Grants full administrative privileges when enabled |
| map | string or null<br><br>Preferred default map layer for the user |
| latitude | number<br><br>Default map center latitude for this user |
| longitude | number<br><br>Default map center longitude for this user |
| zoom | integer<br><br>Default map zoom level on login |
| password | string<br><br>Password for user authentication |
| coordinateFormat | string or null<br><br>Preferred coordinate display format |
| disabled | boolean<br><br>Indicates whether the user account is disabled |
| expirationTime | string or null <date-time><br><br>in ISO 8601 format. eg. `1963-11-22T18:30:00Z` |
| deviceLimit | integer<br><br>Maximum number of devices the user can manage |
| userLimit | integer<br><br>Maximum number of subordinate users |
| deviceReadonly | boolean<br><br>Restricts user from modifying device attributes |
| limitCommands | boolean<br><br>Prevents user from sending unsupported commands |
| fixedEmail | boolean<br><br>Locks the email field to avoid changes |
| poiLayer | string or null<br><br>External POI layer configured for the user |
| attributes | object<br><br>Additional custom user attributes |

### Responses

**200**

OK

**400**

Bad request

**401**

Unauthorized

post/users

Demo Server 1

https://demo.traccar.org/api/users

Demo Server 2

https://demo2.traccar.org/api/users

Demo Server 3

https://demo3.traccar.org/api/users

Demo Server 4

https://demo4.traccar.org/api/users

Subscription Server

https://server.traccar.org/api/users

Other Server

http://{host}:{port}/api/users

### Request samples

*   Payload

Content type

application/json

Copy

Expand all Collapse all

`{  *   "id": 0,      *   "name": "string",      *   "email": "string",      *   "phone": "string",      *   "readonly": true,      *   "administrator": true,      *   "map": "string",      *   "latitude": 0,      *   "longitude": 0,      *   "zoom": 0,      *   "password": "string",      *   "coordinateFormat": "string",      *   "disabled": true,      *   "expirationTime": "2019-08-24T14:15:22Z",      *   "deviceLimit": 0,      *   "userLimit": 0,      *   "deviceReadonly": true,      *   "limitCommands": true,      *   "fixedEmail": true,      *   "poiLayer": "string",      *   "attributes": { }       }`

### Response samples

*   200

Content type

application/json

Copy

Expand all Collapse all

`{  *   "id": 0,      *   "name": "string",      *   "email": "string",      *   "phone": "string",      *   "readonly": true,      *   "administrator": true,      *   "map": "string",      *   "latitude": 0,      *   "longitude": 0,      *   "zoom": 0,      *   "password": "string",      *   "coordinateFormat": "string",      *   "disabled": true,      *   "expirationTime": "2019-08-24T14:15:22Z",      *   "deviceLimit": 0,      *   "userLimit": 0,      *   "deviceReadonly": true,      *   "limitCommands": true,      *   "fixedEmail": true,      *   "poiLayer": "string",      *   "attributes": { }       }`

## [](#tag/Users/operation/postUsersTotp)Generate TOTP secret

### Responses

**200**

OK

**400**

Bad request

post/users/totp

Demo Server 1

https://demo.traccar.org/api/users/totp

Demo Server 2

https://demo2.traccar.org/api/users/totp

Demo Server 3

https://demo3.traccar.org/api/users/totp

Demo Server 4

https://demo4.traccar.org/api/users/totp

Subscription Server

https://server.traccar.org/api/users/totp

Other Server

http://{host}:{port}/api/users/totp

## [](#tag/Users/operation/getUsersId)Fetch a User

##### Authorizations:

_BasicAuth__ApiKey_

##### path Parameters

|     |     |
| --- | --- |
| id<br><br>required | integer |

### Responses

**200**

OK

**401**

Unauthorized

**404**

Not found

get/users/{id}

Demo Server 1

https://demo.traccar.org/api/users/{id}

Demo Server 2

https://demo2.traccar.org/api/users/{id}

Demo Server 3

https://demo3.traccar.org/api/users/{id}

Demo Server 4

https://demo4.traccar.org/api/users/{id}

Subscription Server

https://server.traccar.org/api/users/{id}

Other Server

http://{host}:{port}/api/users/{id}

### Response samples

*   200

Content type

application/json

Copy

Expand all Collapse all

`{  *   "id": 0,      *   "name": "string",      *   "email": "string",      *   "phone": "string",      *   "readonly": true,      *   "administrator": true,      *   "map": "string",      *   "latitude": 0,      *   "longitude": 0,      *   "zoom": 0,      *   "password": "string",      *   "coordinateFormat": "string",      *   "disabled": true,      *   "expirationTime": "2019-08-24T14:15:22Z",      *   "deviceLimit": 0,      *   "userLimit": 0,      *   "deviceReadonly": true,      *   "limitCommands": true,      *   "fixedEmail": true,      *   "poiLayer": "string",      *   "attributes": { }       }`

## [](#tag/Users/operation/putUsersId)Update a User

##### Authorizations:

_BasicAuth__ApiKey_

##### path Parameters

|     |     |
| --- | --- |
| id<br><br>required | integer |

##### Request Body schema: application/json

required

|     |     |
| --- | --- |
| id  | integer <int64><br><br>Unique user identifier |
| name | string<br><br>User display name |
| email | string<br><br>Email address used for login and notifications |
| phone | string or null<br><br>Contact phone number for alerts |
| readonly | boolean<br><br>When true, the user cannot change settings |
| administrator | boolean<br><br>Grants full administrative privileges when enabled |
| map | string or null<br><br>Preferred default map layer for the user |
| latitude | number<br><br>Default map center latitude for this user |
| longitude | number<br><br>Default map center longitude for this user |
| zoom | integer<br><br>Default map zoom level on login |
| password | string<br><br>Password for user authentication |
| coordinateFormat | string or null<br><br>Preferred coordinate display format |
| disabled | boolean<br><br>Indicates whether the user account is disabled |
| expirationTime | string or null <date-time><br><br>in ISO 8601 format. eg. `1963-11-22T18:30:00Z` |
| deviceLimit | integer<br><br>Maximum number of devices the user can manage |
| userLimit | integer<br><br>Maximum number of subordinate users |
| deviceReadonly | boolean<br><br>Restricts user from modifying device attributes |
| limitCommands | boolean<br><br>Prevents user from sending unsupported commands |
| fixedEmail | boolean<br><br>Locks the email field to avoid changes |
| poiLayer | string or null<br><br>External POI layer configured for the user |
| attributes | object<br><br>Additional custom user attributes |

### Responses

**200**

OK

**400**

Bad request

**401**

Unauthorized

put/users/{id}

Demo Server 1

https://demo.traccar.org/api/users/{id}

Demo Server 2

https://demo2.traccar.org/api/users/{id}

Demo Server 3

https://demo3.traccar.org/api/users/{id}

Demo Server 4

https://demo4.traccar.org/api/users/{id}

Subscription Server

https://server.traccar.org/api/users/{id}

Other Server

http://{host}:{port}/api/users/{id}

### Request samples

*   Payload

Content type

application/json

Copy

Expand all Collapse all

`{  *   "id": 0,      *   "name": "string",      *   "email": "string",      *   "phone": "string",      *   "readonly": true,      *   "administrator": true,      *   "map": "string",      *   "latitude": 0,      *   "longitude": 0,      *   "zoom": 0,      *   "password": "string",      *   "coordinateFormat": "string",      *   "disabled": true,      *   "expirationTime": "2019-08-24T14:15:22Z",      *   "deviceLimit": 0,      *   "userLimit": 0,      *   "deviceReadonly": true,      *   "limitCommands": true,      *   "fixedEmail": true,      *   "poiLayer": "string",      *   "attributes": { }       }`

### Response samples

*   200

Content type

application/json

Copy

Expand all Collapse all

`{  *   "id": 0,      *   "name": "string",      *   "email": "string",      *   "phone": "string",      *   "readonly": true,      *   "administrator": true,      *   "map": "string",      *   "latitude": 0,      *   "longitude": 0,      *   "zoom": 0,      *   "password": "string",      *   "coordinateFormat": "string",      *   "disabled": true,      *   "expirationTime": "2019-08-24T14:15:22Z",      *   "deviceLimit": 0,      *   "userLimit": 0,      *   "deviceReadonly": true,      *   "limitCommands": true,      *   "fixedEmail": true,      *   "poiLayer": "string",      *   "attributes": { }       }`

## [](#tag/Users/operation/deleteUsersId)Delete a User

##### Authorizations:

_BasicAuth__ApiKey_

##### path Parameters

|     |     |
| --- | --- |
| id<br><br>required | integer |

### Responses

**204**

No Content

**401**

Unauthorized

delete/users/{id}

Demo Server 1

https://demo.traccar.org/api/users/{id}

Demo Server 2

https://demo2.traccar.org/api/users/{id}

Demo Server 3

https://demo3.traccar.org/api/users/{id}

Demo Server 4

https://demo4.traccar.org/api/users/{id}

Subscription Server

https://server.traccar.org/api/users/{id}

Other Server

http://{host}:{port}/api/users/{id}

## [](#tag/Permissions)Permissions

User permissions and other object linking

## [](#tag/Permissions/operation/getPermissions)Fetch permission links between Objects

Provide exactly two `*Id` query parameters matching the Permission body shape (e.g. `reportId` and `deviceId`). Use `0` on a side to mean "any", e.g. `?reportId=5&deviceId=0` lists all devices linked to report 5. At least one side must be non-zero.

##### Authorizations:

_BasicAuth__ApiKey_

### Responses

**200**

OK

**400**

Bad request

get/permissions

Demo Server 1

https://demo.traccar.org/api/permissions

Demo Server 2

https://demo2.traccar.org/api/permissions

Demo Server 3

https://demo3.traccar.org/api/permissions

Demo Server 4

https://demo4.traccar.org/api/permissions

Subscription Server

https://server.traccar.org/api/permissions

Other Server

http://{host}:{port}/api/permissions

### Response samples

*   200

Content type

application/json

Copy

Expand all Collapse all

`[  *   {          *   "userId": 0,              *   "deviceId": 0,              *   "groupId": 0,              *   "geofenceId": 0,              *   "notificationId": 0,              *   "calendarId": 0,              *   "attributeId": 0,              *   "driverId": 0,              *   "managedUserId": 0,              *   "commandId": 0                   }       ]`

## [](#tag/Permissions/operation/postPermissions)Link an Object to another Object

##### Authorizations:

_BasicAuth__ApiKey_

##### Request Body schema: application/json

required

|     |     |
| --- | --- |
| userId | integer <int64><br><br>User id, can be only first parameter |
| deviceId | integer <int64><br><br>Device id, can be first parameter or second only in combination with userId |
| groupId | integer <int64><br><br>Group id, can be first parameter or second only in combination with userId |
| geofenceId | integer <int64><br><br>Geofence id, can be second parameter only |
| notificationId | integer <int64><br><br>Notification id, can be second parameter only |
| calendarId | integer <int64><br><br>Calendar id, can be second parameter only and only in combination with userId |
| attributeId | integer <int64><br><br>Computed attribute id, can be second parameter only |
| driverId | integer <int64><br><br>Driver id, can be second parameter only |
| managedUserId | integer <int64><br><br>User id, can be second parameter only and only in combination with userId |
| commandId | integer <int64><br><br>Saved command id, can be second parameter only |

### Responses

**204**

No Content

**400**

No permission

post/permissions

Demo Server 1

https://demo.traccar.org/api/permissions

Demo Server 2

https://demo2.traccar.org/api/permissions

Demo Server 3

https://demo3.traccar.org/api/permissions

Demo Server 4

https://demo4.traccar.org/api/permissions

Subscription Server

https://server.traccar.org/api/permissions

Other Server

http://{host}:{port}/api/permissions

### Request samples

*   Payload

Content type

application/json

Copy

`{  *   "userId": 0,      *   "deviceId": 0,      *   "groupId": 0,      *   "geofenceId": 0,      *   "notificationId": 0,      *   "calendarId": 0,      *   "attributeId": 0,      *   "driverId": 0,      *   "managedUserId": 0,      *   "commandId": 0       }`

## [](#tag/Permissions/operation/deletePermissions)Unlink an Object from another Object

##### Authorizations:

_BasicAuth__ApiKey_

##### Request Body schema: application/json

required

|     |     |
| --- | --- |
| userId | integer <int64><br><br>User id, can be only first parameter |
| deviceId | integer <int64><br><br>Device id, can be first parameter or second only in combination with userId |
| groupId | integer <int64><br><br>Group id, can be first parameter or second only in combination with userId |
| geofenceId | integer <int64><br><br>Geofence id, can be second parameter only |
| notificationId | integer <int64><br><br>Notification id, can be second parameter only |
| calendarId | integer <int64><br><br>Calendar id, can be second parameter only and only in combination with userId |
| attributeId | integer <int64><br><br>Computed attribute id, can be second parameter only |
| driverId | integer <int64><br><br>Driver id, can be second parameter only |
| managedUserId | integer <int64><br><br>User id, can be second parameter only and only in combination with userId |
| commandId | integer <int64><br><br>Saved command id, can be second parameter only |

### Responses

**204**

No Content

**401**

Unauthorized

delete/permissions

Demo Server 1

https://demo.traccar.org/api/permissions

Demo Server 2

https://demo2.traccar.org/api/permissions

Demo Server 3

https://demo3.traccar.org/api/permissions

Demo Server 4

https://demo4.traccar.org/api/permissions

Subscription Server

https://server.traccar.org/api/permissions

Other Server

http://{host}:{port}/api/permissions

### Request samples

*   Payload

Content type

application/json

Copy

`{  *   "userId": 0,      *   "deviceId": 0,      *   "groupId": 0,      *   "geofenceId": 0,      *   "notificationId": 0,      *   "calendarId": 0,      *   "attributeId": 0,      *   "driverId": 0,      *   "managedUserId": 0,      *   "commandId": 0       }`

## [](#tag/Permissions/operation/postPermissionsBulk)Link multiple Objects in a single request

##### Authorizations:

_BasicAuth__ApiKey_

##### Request Body schema: application/json

required

Array

|     |     |
| --- | --- |
| userId | integer <int64><br><br>User id, can be only first parameter |
| deviceId | integer <int64><br><br>Device id, can be first parameter or second only in combination with userId |
| groupId | integer <int64><br><br>Group id, can be first parameter or second only in combination with userId |
| geofenceId | integer <int64><br><br>Geofence id, can be second parameter only |
| notificationId | integer <int64><br><br>Notification id, can be second parameter only |
| calendarId | integer <int64><br><br>Calendar id, can be second parameter only and only in combination with userId |
| attributeId | integer <int64><br><br>Computed attribute id, can be second parameter only |
| driverId | integer <int64><br><br>Driver id, can be second parameter only |
| managedUserId | integer <int64><br><br>User id, can be second parameter only and only in combination with userId |
| commandId | integer <int64><br><br>Saved command id, can be second parameter only |

### Responses

**204**

No Content

**400**

Bad request

post/permissions/bulk

Demo Server 1

https://demo.traccar.org/api/permissions/bulk

Demo Server 2

https://demo2.traccar.org/api/permissions/bulk

Demo Server 3

https://demo3.traccar.org/api/permissions/bulk

Demo Server 4

https://demo4.traccar.org/api/permissions/bulk

Subscription Server

https://server.traccar.org/api/permissions/bulk

Other Server

http://{host}:{port}/api/permissions/bulk

### Request samples

*   Payload

Content type

application/json

Copy

Expand all Collapse all

`[  *   {          *   "userId": 0,              *   "deviceId": 0,              *   "groupId": 0,              *   "geofenceId": 0,              *   "notificationId": 0,              *   "calendarId": 0,              *   "attributeId": 0,              *   "driverId": 0,              *   "managedUserId": 0,              *   "commandId": 0                   }       ]`

## [](#tag/Permissions/operation/deletePermissionsBulk)Unlink multiple Objects in a single request

##### Authorizations:

_BasicAuth__ApiKey_

##### Request Body schema: application/json

required

Array

|     |     |
| --- | --- |
| userId | integer <int64><br><br>User id, can be only first parameter |
| deviceId | integer <int64><br><br>Device id, can be first parameter or second only in combination with userId |
| groupId | integer <int64><br><br>Group id, can be first parameter or second only in combination with userId |
| geofenceId | integer <int64><br><br>Geofence id, can be second parameter only |
| notificationId | integer <int64><br><br>Notification id, can be second parameter only |
| calendarId | integer <int64><br><br>Calendar id, can be second parameter only and only in combination with userId |
| attributeId | integer <int64><br><br>Computed attribute id, can be second parameter only |
| driverId | integer <int64><br><br>Driver id, can be second parameter only |
| managedUserId | integer <int64><br><br>User id, can be second parameter only and only in combination with userId |
| commandId | integer <int64><br><br>Saved command id, can be second parameter only |

### Responses

**204**

No Content

**400**

Bad request

delete/permissions/bulk

Demo Server 1

https://demo.traccar.org/api/permissions/bulk

Demo Server 2

https://demo2.traccar.org/api/permissions/bulk

Demo Server 3

https://demo3.traccar.org/api/permissions/bulk

Demo Server 4

https://demo4.traccar.org/api/permissions/bulk

Subscription Server

https://server.traccar.org/api/permissions/bulk

Other Server

http://{host}:{port}/api/permissions/bulk

### Request samples

*   Payload

Content type

application/json

Copy

Expand all Collapse all

`[  *   {          *   "userId": 0,              *   "deviceId": 0,              *   "groupId": 0,              *   "geofenceId": 0,              *   "notificationId": 0,              *   "calendarId": 0,              *   "attributeId": 0,              *   "driverId": 0,              *   "managedUserId": 0,              *   "commandId": 0                   }       ]`

## [](#tag/Positions)Positions

Retrieving raw location information

## [](#tag/Positions/operation/getPositions)Fetch a list of Positions

We strongly recommend using [Traccar WebSocket API](https://www.traccar.org/traccar-api/) instead of periodically polling positions endpoint. Without any params, it returns a list of last known positions for all the user's Devices. _from_ and _to_ fields are not required with _id_.

##### Authorizations:

_BasicAuth__ApiKey_

##### query Parameters

|     |     |
| --- | --- |
| deviceId | integer<br><br>_deviceId_ is optional, but requires the _from_ and _to_ parameters when used |
| from | string <date-time><br><br>in ISO 8601 format. eg. `1963-11-22T18:30:00Z` |
| to  | string <date-time><br><br>in ISO 8601 format. eg. `1963-11-22T18:30:00Z` |
| id  | integer<br><br>To fetch one or more positions. Multiple params can be passed like `id=31&id=42` |

### Responses

**200**

OK

**401**

Unauthorized

get/positions

Demo Server 1

https://demo.traccar.org/api/positions

Demo Server 2

https://demo2.traccar.org/api/positions

Demo Server 3

https://demo3.traccar.org/api/positions

Demo Server 4

https://demo4.traccar.org/api/positions

Subscription Server

https://server.traccar.org/api/positions

Other Server

http://{host}:{port}/api/positions

### Response samples

*   200

Content type

application/jsontext/csvapplication/gpx+xmlapplication/json

Copy

Expand all Collapse all

`[  *   {          *   "id": 0,              *   "deviceId": 0,              *   "protocol": "string",              *   "deviceTime": "2019-08-24T14:15:22Z",              *   "fixTime": "2019-08-24T14:15:22Z",              *   "serverTime": "2019-08-24T14:15:22Z",              *   "valid": true,              *   "latitude": 0,              *   "longitude": 0,              *   "altitude": 0,              *   "speed": 0,              *   "course": 0,              *   "address": "string",              *   "accuracy": 0,              *   "network": { },              *   "geofenceIds": [                  *   0                               ],              *   "attributes": { }                   }       ]`

## [](#tag/Positions/operation/deletePositions)Deletes all the Positions of a device in the time span specified

##### Authorizations:

_BasicAuth__ApiKey_

##### query Parameters

|     |     |
| --- | --- |
| deviceId<br><br>required | integer |
| from<br><br>required | string <date-time><br><br>in ISO 8601 format. eg. `1963-11-22T18:30:00Z` |
| to<br><br>required | string <date-time><br><br>in ISO 8601 format. eg. `1963-11-22T18:30:00Z` |

### Responses

**204**

No Content

**400**

Bad request

delete/positions

Demo Server 1

https://demo.traccar.org/api/positions

Demo Server 2

https://demo2.traccar.org/api/positions

Demo Server 3

https://demo3.traccar.org/api/positions

Demo Server 4

https://demo4.traccar.org/api/positions

Subscription Server

https://server.traccar.org/api/positions

Other Server

http://{host}:{port}/api/positions

## [](#tag/Positions/operation/deletePositionsId)Delete a Position

##### Authorizations:

_BasicAuth__ApiKey_

##### path Parameters

|     |     |
| --- | --- |
| id<br><br>required | integer |

### Responses

**204**

No Content

**404**

Not found

delete/positions/{id}

Demo Server 1

https://demo.traccar.org/api/positions/{id}

Demo Server 2

https://demo2.traccar.org/api/positions/{id}

Demo Server 3

https://demo3.traccar.org/api/positions/{id}

Demo Server 4

https://demo4.traccar.org/api/positions/{id}

Subscription Server

https://server.traccar.org/api/positions/{id}

Other Server

http://{host}:{port}/api/positions/{id}

## [](#tag/Positions/operation/getPositionsKml)Export Positions as KML

##### Authorizations:

_BasicAuth__ApiKey_

##### query Parameters

|     |     |
| --- | --- |
| deviceId<br><br>required | integer |
| from<br><br>required | string <date-time> |
| to<br><br>required | string <date-time> |

### Responses

**200**

OK

**401**

Unauthorized

get/positions/kml

Demo Server 1

https://demo.traccar.org/api/positions/kml

Demo Server 2

https://demo2.traccar.org/api/positions/kml

Demo Server 3

https://demo3.traccar.org/api/positions/kml

Demo Server 4

https://demo4.traccar.org/api/positions/kml

Subscription Server

https://server.traccar.org/api/positions/kml

Other Server

http://{host}:{port}/api/positions/kml

## [](#tag/Positions/operation/getPositionsCsv)Export Positions as CSV

##### Authorizations:

_BasicAuth__ApiKey_

##### query Parameters

|     |     |
| --- | --- |
| deviceId<br><br>required | integer |
| geofenceId | integer |
| from<br><br>required | string <date-time> |
| to<br><br>required | string <date-time> |

### Responses

**200**

OK

**401**

Unauthorized

get/positions/csv

Demo Server 1

https://demo.traccar.org/api/positions/csv

Demo Server 2

https://demo2.traccar.org/api/positions/csv

Demo Server 3

https://demo3.traccar.org/api/positions/csv

Demo Server 4

https://demo4.traccar.org/api/positions/csv

Subscription Server

https://server.traccar.org/api/positions/csv

Other Server

http://{host}:{port}/api/positions/csv

## [](#tag/Positions/operation/getPositionsGpx)Export Positions as GPX

##### Authorizations:

_BasicAuth__ApiKey_

##### query Parameters

|     |     |
| --- | --- |
| deviceId<br><br>required | integer |
| from<br><br>required | string <date-time> |
| to<br><br>required | string <date-time> |

### Responses

**200**

OK

**401**

Unauthorized

get/positions/gpx

Demo Server 1

https://demo.traccar.org/api/positions/gpx

Demo Server 2

https://demo2.traccar.org/api/positions/gpx

Demo Server 3

https://demo3.traccar.org/api/positions/gpx

Demo Server 4

https://demo4.traccar.org/api/positions/gpx

Subscription Server

https://server.traccar.org/api/positions/gpx

Other Server

http://{host}:{port}/api/positions/gpx

## [](#tag/Events)Events

Retrieving event information

## [](#tag/Events/operation/getEventsId)Fetch an Event

Returns a single Event record with full context for the specified identifier

##### Authorizations:

_BasicAuth__ApiKey_

##### path Parameters

|     |     |
| --- | --- |
| id<br><br>required | integer |

### Responses

**200**

OK

**401**

Unauthorized

**404**

Not found

get/events/{id}

Demo Server 1

https://demo.traccar.org/api/events/{id}

Demo Server 2

https://demo2.traccar.org/api/events/{id}

Demo Server 3

https://demo3.traccar.org/api/events/{id}

Demo Server 4

https://demo4.traccar.org/api/events/{id}

Subscription Server

https://server.traccar.org/api/events/{id}

Other Server

http://{host}:{port}/api/events/{id}

### Response samples

*   200

Content type

application/json

Copy

Expand all Collapse all

`{  *   "id": 0,      *   "type": "string",      *   "eventTime": "2019-08-24T14:15:22Z",      *   "deviceId": 0,      *   "positionId": 0,      *   "geofenceId": 0,      *   "maintenanceId": 0,      *   "attributes": { }       }`

## [](#tag/Reports)Reports

Reports generation

## [](#tag/Reports/operation/getReportsCombined)Fetch a combined route, Events and Positions report for the Devices or Groups

At least one _deviceId_ or one _groupId_ must be passed

##### Authorizations:

_BasicAuth__ApiKey_

##### query Parameters

|     |     |
| --- | --- |
| deviceId | Array of integers |
| groupId | Array of integers |
| from<br><br>required | string <date-time><br><br>in ISO 8601 format. eg. `1963-11-22T18:30:00Z` |
| to<br><br>required | string <date-time><br><br>in ISO 8601 format. eg. `1963-11-22T18:30:00Z` |

### Responses

**200**

OK

**401**

Unauthorized

get/reports/combined

Demo Server 1

https://demo.traccar.org/api/reports/combined

Demo Server 2

https://demo2.traccar.org/api/reports/combined

Demo Server 3

https://demo3.traccar.org/api/reports/combined

Demo Server 4

https://demo4.traccar.org/api/reports/combined

Subscription Server

https://server.traccar.org/api/reports/combined

Other Server

http://{host}:{port}/api/reports/combined

### Response samples

*   200

Content type

application/json

Copy

Expand all Collapse all

`[  *   {          *   "deviceId": 0,              *   "route": [                  *   [                          *   0                                           ]                               ],              *   "events": [                  *   {                          *   "id": 0,                              *   "type": "string",                              *   "eventTime": "2019-08-24T14:15:22Z",                              *   "deviceId": 0,                              *   "positionId": 0,                              *   "geofenceId": 0,                              *   "maintenanceId": 0,                              *   "attributes": { }                                           }                               ],              *   "positions": [                  *   {                          *   "id": 0,                              *   "deviceId": 0,                              *   "protocol": "string",                              *   "deviceTime": "2019-08-24T14:15:22Z",                              *   "fixTime": "2019-08-24T14:15:22Z",                              *   "serverTime": "2019-08-24T14:15:22Z",                              *   "valid": true,                              *   "latitude": 0,                              *   "longitude": 0,                              *   "altitude": 0,                              *   "speed": 0,                              *   "course": 0,                              *   "address": "string",                              *   "accuracy": 0,                              *   "network": { },                              *   "geofenceIds": [                                  *   0                                                       ],                              *   "attributes": { }                                           }                               ]                   }       ]`

## [](#tag/Reports/operation/getReportsRoute)Fetch a list of Positions within the time period for the Devices or Groups

At least one _deviceId_ or one _groupId_ must be passed

##### Authorizations:

_BasicAuth__ApiKey_

##### query Parameters

|     |     |
| --- | --- |
| deviceId | Array of integers |
| groupId | Array of integers |
| from<br><br>required | string <date-time><br><br>in ISO 8601 format. eg. `1963-11-22T18:30:00Z` |
| to<br><br>required | string <date-time><br><br>in ISO 8601 format. eg. `1963-11-22T18:30:00Z` |

### Responses

**200**

OK

**401**

Unauthorized

get/reports/route

Demo Server 1

https://demo.traccar.org/api/reports/route

Demo Server 2

https://demo2.traccar.org/api/reports/route

Demo Server 3

https://demo3.traccar.org/api/reports/route

Demo Server 4

https://demo4.traccar.org/api/reports/route

Subscription Server

https://server.traccar.org/api/reports/route

Other Server

http://{host}:{port}/api/reports/route

### Response samples

*   200

Content type

application/jsonapplication/vnd.openxmlformats-officedocument.spreadsheetml.sheetapplication/json

Copy

Expand all Collapse all

`[  *   {          *   "id": 0,              *   "deviceId": 0,              *   "protocol": "string",              *   "deviceTime": "2019-08-24T14:15:22Z",              *   "fixTime": "2019-08-24T14:15:22Z",              *   "serverTime": "2019-08-24T14:15:22Z",              *   "valid": true,              *   "latitude": 0,              *   "longitude": 0,              *   "altitude": 0,              *   "speed": 0,              *   "course": 0,              *   "address": "string",              *   "accuracy": 0,              *   "network": { },              *   "geofenceIds": [                  *   0                               ],              *   "attributes": { }                   }       ]`

## [](#tag/Reports/operation/getReportsRouteType)Download the route report as a spreadsheet or send it by email

Use `type=xlsx` to download the report, `type=mail` to deliver it by email asynchronously.

##### Authorizations:

_BasicAuth__ApiKey_

##### path Parameters

|     |     |
| --- | --- |
| type<br><br>required | string<br><br>Enum: "xlsx" "mail" |

##### query Parameters

|     |     |
| --- | --- |
| deviceId | Array of integers |
| groupId | Array of integers |
| from<br><br>required | string <date-time><br><br>in ISO 8601 format. eg. `1963-11-22T18:30:00Z` |
| to<br><br>required | string <date-time><br><br>in ISO 8601 format. eg. `1963-11-22T18:30:00Z` |

### Responses

**200**

Spreadsheet attachment

**204**

Report queued for email delivery

**401**

Unauthorized

**404**

Not found

get/reports/route/{type}

Demo Server 1

https://demo.traccar.org/api/reports/route/{type}

Demo Server 2

https://demo2.traccar.org/api/reports/route/{type}

Demo Server 3

https://demo3.traccar.org/api/reports/route/{type}

Demo Server 4

https://demo4.traccar.org/api/reports/route/{type}

Subscription Server

https://server.traccar.org/api/reports/route/{type}

Other Server

http://{host}:{port}/api/reports/route/{type}

## [](#tag/Reports/operation/getReportsEvents)Fetch a list of Events within the time period for the Devices or Groups

At least one _deviceId_ or one _groupId_ must be passed

##### Authorizations:

_BasicAuth__ApiKey_

##### query Parameters

|     |     |
| --- | --- |
| deviceId | Array of integers |
| groupId | Array of integers |
| type | Array of strings<br><br>% can be used to return events of all types |
| from<br><br>required | string <date-time><br><br>in ISO 8601 format. eg. `1963-11-22T18:30:00Z` |
| to<br><br>required | string <date-time><br><br>in ISO 8601 format. eg. `1963-11-22T18:30:00Z` |

### Responses

**200**

OK

**401**

Unauthorized

get/reports/events

Demo Server 1

https://demo.traccar.org/api/reports/events

Demo Server 2

https://demo2.traccar.org/api/reports/events

Demo Server 3

https://demo3.traccar.org/api/reports/events

Demo Server 4

https://demo4.traccar.org/api/reports/events

Subscription Server

https://server.traccar.org/api/reports/events

Other Server

http://{host}:{port}/api/reports/events

### Response samples

*   200

Content type

application/jsonapplication/vnd.openxmlformats-officedocument.spreadsheetml.sheetapplication/json

Copy

Expand all Collapse all

`[  *   {          *   "id": 0,              *   "type": "string",              *   "eventTime": "2019-08-24T14:15:22Z",              *   "deviceId": 0,              *   "positionId": 0,              *   "geofenceId": 0,              *   "maintenanceId": 0,              *   "attributes": { }                   }       ]`

## [](#tag/Reports/operation/getReportsEventsType)Download the events report as a spreadsheet or send it by email

Use `type=xlsx` to download the report, `type=mail` to deliver it by email asynchronously.

##### Authorizations:

_BasicAuth__ApiKey_

##### path Parameters

|     |     |
| --- | --- |
| type<br><br>required | string<br><br>Enum: "xlsx" "mail" |

##### query Parameters

|     |     |
| --- | --- |
| deviceId | Array of integers |
| groupId | Array of integers |
| type | Array of strings<br><br>Event types to include; `%` matches all |
| alarm | Array of strings<br><br>Alarm types to include |
| from<br><br>required | string <date-time><br><br>in ISO 8601 format. eg. `1963-11-22T18:30:00Z` |
| to<br><br>required | string <date-time><br><br>in ISO 8601 format. eg. `1963-11-22T18:30:00Z` |

### Responses

**200**

Spreadsheet attachment

**204**

Report queued for email delivery

**401**

Unauthorized

**404**

Not found

get/reports/events/{type}

Demo Server 1

https://demo.traccar.org/api/reports/events/{type}

Demo Server 2

https://demo2.traccar.org/api/reports/events/{type}

Demo Server 3

https://demo3.traccar.org/api/reports/events/{type}

Demo Server 4

https://demo4.traccar.org/api/reports/events/{type}

Subscription Server

https://server.traccar.org/api/reports/events/{type}

Other Server

http://{host}:{port}/api/reports/events/{type}

## [](#tag/Reports/operation/getReportsGeofences)Fetch geofence enter/exit intervals within the time period for Devices or Groups

At least one _deviceId_ or one _groupId_ must be passed

##### Authorizations:

_BasicAuth__ApiKey_

##### query Parameters

|     |     |
| --- | --- |
| deviceId | Array of integers |
| groupId | Array of integers |
| geofenceId | Array of integers |
| from<br><br>required | string <date-time><br><br>in ISO 8601 format. eg. `1963-11-22T18:30:00Z` |
| to<br><br>required | string <date-time><br><br>in ISO 8601 format. eg. `1963-11-22T18:30:00Z` |

### Responses

**200**

OK

**401**

Unauthorized

get/reports/geofences

Demo Server 1

https://demo.traccar.org/api/reports/geofences

Demo Server 2

https://demo2.traccar.org/api/reports/geofences

Demo Server 3

https://demo3.traccar.org/api/reports/geofences

Demo Server 4

https://demo4.traccar.org/api/reports/geofences

Subscription Server

https://server.traccar.org/api/reports/geofences

Other Server

http://{host}:{port}/api/reports/geofences

### Response samples

*   200

Content type

application/json

Copy

Expand all Collapse all

`[  *   {          *   "deviceId": 0,              *   "deviceName": "string",              *   "geofenceId": 0,              *   "startTime": "2019-08-24T14:15:22Z",              *   "endTime": "2019-08-24T14:15:22Z"                   }       ]`

## [](#tag/Reports/operation/getReportsSummary)Fetch a list of ReportSummary within the time period for the Devices or Groups

At least one _deviceId_ or one _groupId_ must be passed

##### Authorizations:

_BasicAuth__ApiKey_

##### query Parameters

|     |     |
| --- | --- |
| deviceId | Array of integers |
| groupId | Array of integers |
| from<br><br>required | string <date-time><br><br>in ISO 8601 format. eg. `1963-11-22T18:30:00Z` |
| to<br><br>required | string <date-time><br><br>in ISO 8601 format. eg. `1963-11-22T18:30:00Z` |

### Responses

**200**

OK

**401**

Unauthorized

get/reports/summary

Demo Server 1

https://demo.traccar.org/api/reports/summary

Demo Server 2

https://demo2.traccar.org/api/reports/summary

Demo Server 3

https://demo3.traccar.org/api/reports/summary

Demo Server 4

https://demo4.traccar.org/api/reports/summary

Subscription Server

https://server.traccar.org/api/reports/summary

Other Server

http://{host}:{port}/api/reports/summary

### Response samples

*   200

Content type

application/jsonapplication/vnd.openxmlformats-officedocument.spreadsheetml.sheetapplication/json

Copy

Expand all Collapse all

`[  *   {          *   "deviceId": 0,              *   "deviceName": "string",              *   "maxSpeed": 0,              *   "averageSpeed": 0,              *   "distance": 0,              *   "spentFuel": 0,              *   "engineHours": 0                   }       ]`

## [](#tag/Reports/operation/getReportsSummaryType)Download the summary report as a spreadsheet or send it by email

Use `type=xlsx` to download the report, `type=mail` to deliver it by email asynchronously.

##### Authorizations:

_BasicAuth__ApiKey_

##### path Parameters

|     |     |
| --- | --- |
| type<br><br>required | string<br><br>Enum: "xlsx" "mail" |

##### query Parameters

|     |     |
| --- | --- |
| deviceId | Array of integers |
| groupId | Array of integers |
| from<br><br>required | string <date-time><br><br>in ISO 8601 format. eg. `1963-11-22T18:30:00Z` |
| to<br><br>required | string <date-time><br><br>in ISO 8601 format. eg. `1963-11-22T18:30:00Z` |
| daily | boolean<br><br>Aggregate values by day instead of the full period |

### Responses

**200**

Spreadsheet attachment

**204**

Report queued for email delivery

**401**

Unauthorized

**404**

Not found

get/reports/summary/{type}

Demo Server 1

https://demo.traccar.org/api/reports/summary/{type}

Demo Server 2

https://demo2.traccar.org/api/reports/summary/{type}

Demo Server 3

https://demo3.traccar.org/api/reports/summary/{type}

Demo Server 4

https://demo4.traccar.org/api/reports/summary/{type}

Subscription Server

https://server.traccar.org/api/reports/summary/{type}

Other Server

http://{host}:{port}/api/reports/summary/{type}

## [](#tag/Reports/operation/getReportsTrips)Fetch a list of ReportTrips within the time period for the Devices or Groups

At least one _deviceId_ or one _groupId_ must be passed

##### Authorizations:

_BasicAuth__ApiKey_

##### query Parameters

|     |     |
| --- | --- |
| deviceId | Array of integers |
| groupId | Array of integers |
| from<br><br>required | string <date-time><br><br>in ISO 8601 format. eg. `1963-11-22T18:30:00Z` |
| to<br><br>required | string <date-time><br><br>in ISO 8601 format. eg. `1963-11-22T18:30:00Z` |

### Responses

**200**

OK

**401**

Unauthorized

get/reports/trips

Demo Server 1

https://demo.traccar.org/api/reports/trips

Demo Server 2

https://demo2.traccar.org/api/reports/trips

Demo Server 3

https://demo3.traccar.org/api/reports/trips

Demo Server 4

https://demo4.traccar.org/api/reports/trips

Subscription Server

https://server.traccar.org/api/reports/trips

Other Server

http://{host}:{port}/api/reports/trips

### Response samples

*   200

Content type

application/jsonapplication/vnd.openxmlformats-officedocument.spreadsheetml.sheetapplication/json

Copy

Expand all Collapse all

`[  *   {          *   "deviceId": 0,              *   "deviceName": "string",              *   "maxSpeed": 0,              *   "averageSpeed": 0,              *   "distance": 0,              *   "spentFuel": 0,              *   "duration": 0,              *   "startTime": "2019-08-24T14:15:22Z",              *   "startAddress": "string",              *   "startLat": 0,              *   "startLon": 0,              *   "endTime": "2019-08-24T14:15:22Z",              *   "endAddress": "string",              *   "endLat": 0,              *   "endLon": 0,              *   "driverUniqueId": "string",              *   "driverName": "string"                   }       ]`

## [](#tag/Reports/operation/getReportsTripsType)Download the trips report as a spreadsheet or send it by email

Use `type=xlsx` to download the report, `type=mail` to deliver it by email asynchronously.

##### Authorizations:

_BasicAuth__ApiKey_

##### path Parameters

|     |     |
| --- | --- |
| type<br><br>required | string<br><br>Enum: "xlsx" "mail" |

##### query Parameters

|     |     |
| --- | --- |
| deviceId | Array of integers |
| groupId | Array of integers |
| from<br><br>required | string <date-time><br><br>in ISO 8601 format. eg. `1963-11-22T18:30:00Z` |
| to<br><br>required | string <date-time><br><br>in ISO 8601 format. eg. `1963-11-22T18:30:00Z` |

### Responses

**200**

Spreadsheet attachment

**204**

Report queued for email delivery

**401**

Unauthorized

**404**

Not found

get/reports/trips/{type}

Demo Server 1

https://demo.traccar.org/api/reports/trips/{type}

Demo Server 2

https://demo2.traccar.org/api/reports/trips/{type}

Demo Server 3

https://demo3.traccar.org/api/reports/trips/{type}

Demo Server 4

https://demo4.traccar.org/api/reports/trips/{type}

Subscription Server

https://server.traccar.org/api/reports/trips/{type}

Other Server

http://{host}:{port}/api/reports/trips/{type}

## [](#tag/Reports/operation/getReportsStops)Fetch a list of ReportStops within the time period for the Devices or Groups

At least one _deviceId_ or one _groupId_ must be passed

##### Authorizations:

_BasicAuth__ApiKey_

##### query Parameters

|     |     |
| --- | --- |
| deviceId | Array of integers |
| groupId | Array of integers |
| from<br><br>required | string <date-time><br><br>in ISO 8601 format. eg. `1963-11-22T18:30:00Z` |
| to<br><br>required | string <date-time><br><br>in ISO 8601 format. eg. `1963-11-22T18:30:00Z` |

### Responses

**200**

OK

**401**

Unauthorized

get/reports/stops

Demo Server 1

https://demo.traccar.org/api/reports/stops

Demo Server 2

https://demo2.traccar.org/api/reports/stops

Demo Server 3

https://demo3.traccar.org/api/reports/stops

Demo Server 4

https://demo4.traccar.org/api/reports/stops

Subscription Server

https://server.traccar.org/api/reports/stops

Other Server

http://{host}:{port}/api/reports/stops

### Response samples

*   200

Content type

application/jsonapplication/vnd.openxmlformats-officedocument.spreadsheetml.sheetapplication/json

Copy

Expand all Collapse all

`[  *   {          *   "deviceId": 0,              *   "deviceName": "string",              *   "duration": 0,              *   "startTime": "2019-08-24T14:15:22Z",              *   "address": "string",              *   "lat": 0,              *   "lon": 0,              *   "endTime": "2019-08-24T14:15:22Z",              *   "spentFuel": 0,              *   "engineHours": 0                   }       ]`

## [](#tag/Reports/operation/getReportsStopsType)Download the stops report as a spreadsheet or send it by email

Use `type=xlsx` to download the report, `type=mail` to deliver it by email asynchronously.

##### Authorizations:

_BasicAuth__ApiKey_

##### path Parameters

|     |     |
| --- | --- |
| type<br><br>required | string<br><br>Enum: "xlsx" "mail" |

##### query Parameters

|     |     |
| --- | --- |
| deviceId | Array of integers |
| groupId | Array of integers |
| from<br><br>required | string <date-time><br><br>in ISO 8601 format. eg. `1963-11-22T18:30:00Z` |
| to<br><br>required | string <date-time><br><br>in ISO 8601 format. eg. `1963-11-22T18:30:00Z` |

### Responses

**200**

Spreadsheet attachment

**204**

Report queued for email delivery

**401**

Unauthorized

**404**

Not found

get/reports/stops/{type}

Demo Server 1

https://demo.traccar.org/api/reports/stops/{type}

Demo Server 2

https://demo2.traccar.org/api/reports/stops/{type}

Demo Server 3

https://demo3.traccar.org/api/reports/stops/{type}

Demo Server 4

https://demo4.traccar.org/api/reports/stops/{type}

Subscription Server

https://server.traccar.org/api/reports/stops/{type}

Other Server

http://{host}:{port}/api/reports/stops/{type}

## [](#tag/Reports/operation/getReportsDevicesType)Download the devices report as a spreadsheet or send it by email

Use `type=xlsx` to download the report, `type=mail` to deliver it by email asynchronously.

##### Authorizations:

_BasicAuth__ApiKey_

##### path Parameters

|     |     |
| --- | --- |
| type<br><br>required | string<br><br>Enum: "xlsx" "mail" |

### Responses

**200**

Spreadsheet attachment

**204**

Report queued for email delivery

**401**

Unauthorized

**404**

Not found

get/reports/devices/{type}

Demo Server 1

https://demo.traccar.org/api/reports/devices/{type}

Demo Server 2

https://demo2.traccar.org/api/reports/devices/{type}

Demo Server 3

https://demo3.traccar.org/api/reports/devices/{type}

Demo Server 4

https://demo4.traccar.org/api/reports/devices/{type}

Subscription Server

https://server.traccar.org/api/reports/devices/{type}

Other Server

http://{host}:{port}/api/reports/devices/{type}

## [](#tag/Notifications)Notifications

User notifications management

## [](#tag/Notifications/operation/getNotifications)Fetch a list of Notifications

Without params, it returns a list of Notifications the user has access to

##### Authorizations:

_BasicAuth__ApiKey_

##### query Parameters

|     |     |
| --- | --- |
| all | boolean<br><br>Can only be used by admins or managers to fetch all entities |
| userId | integer<br><br>Standard users can use this only with their own _userId_ |
| deviceId | integer<br><br>Standard users can use this only with \_deviceId\_s, they have access to |
| groupId | integer<br><br>Standard users can use this only with \_groupId\_s, they have access to |
| refresh | boolean |
| limit | integer<br><br>Limit the number of returned results |
| offset | integer<br><br>Offset for pagination |
| keyword | string<br><br>Search keyword filter |

### Responses

**200**

OK

**401**

Unauthorized

get/notifications

Demo Server 1

https://demo.traccar.org/api/notifications

Demo Server 2

https://demo2.traccar.org/api/notifications

Demo Server 3

https://demo3.traccar.org/api/notifications

Demo Server 4

https://demo4.traccar.org/api/notifications

Subscription Server

https://server.traccar.org/api/notifications

Other Server

http://{host}:{port}/api/notifications

### Response samples

*   200

Content type

application/json

Copy

Expand all Collapse all

`[  *   {          *   "id": 0,              *   "type": "string",              *   "description": "string",              *   "always": true,              *   "commandId": 0,              *   "notificators": "string",              *   "calendarId": 0,              *   "attributes": { }                   }       ]`

## [](#tag/Notifications/operation/postNotifications)Create a Notification

##### Authorizations:

_BasicAuth__ApiKey_

##### Request Body schema: application/json

required

|     |     |
| --- | --- |
| id  | integer <int64><br><br>Unique identifier for the notification |
| type | string<br><br>Notification category such as geofenceEnter or ignitionOn |
| description | string or null<br><br>User-defined text describing the notification |
| always | boolean<br><br>Whether the notification triggers regardless of schedule |
| commandId | integer <int64><br><br>Identifier of the command to send when the notification triggers |
| notificators | string<br><br>Comma-separated delivery channels (for example, web, mail) |
| calendarId | integer <int64><br><br>Calendar identifier restricting when the notification is active |
| attributes | object<br><br>Additional custom attributes used by notificators or templates |

### Responses

**200**

OK

**400**

Bad request

**401**

Unauthorized

post/notifications

Demo Server 1

https://demo.traccar.org/api/notifications

Demo Server 2

https://demo2.traccar.org/api/notifications

Demo Server 3

https://demo3.traccar.org/api/notifications

Demo Server 4

https://demo4.traccar.org/api/notifications

Subscription Server

https://server.traccar.org/api/notifications

Other Server

http://{host}:{port}/api/notifications

### Request samples

*   Payload

Content type

application/json

Copy

Expand all Collapse all

`{  *   "id": 0,      *   "type": "string",      *   "description": "string",      *   "always": true,      *   "commandId": 0,      *   "notificators": "string",      *   "calendarId": 0,      *   "attributes": { }       }`

### Response samples

*   200

Content type

application/json

Copy

Expand all Collapse all

`{  *   "id": 0,      *   "type": "string",      *   "description": "string",      *   "always": true,      *   "commandId": 0,      *   "notificators": "string",      *   "calendarId": 0,      *   "attributes": { }       }`

## [](#tag/Notifications/operation/getNotificationsId)Fetch a Notification

##### Authorizations:

_BasicAuth__ApiKey_

##### path Parameters

|     |     |
| --- | --- |
| id<br><br>required | integer |

### Responses

**200**

OK

**401**

Unauthorized

**404**

Not found

get/notifications/{id}

Demo Server 1

https://demo.traccar.org/api/notifications/{id}

Demo Server 2

https://demo2.traccar.org/api/notifications/{id}

Demo Server 3

https://demo3.traccar.org/api/notifications/{id}

Demo Server 4

https://demo4.traccar.org/api/notifications/{id}

Subscription Server

https://server.traccar.org/api/notifications/{id}

Other Server

http://{host}:{port}/api/notifications/{id}

### Response samples

*   200

Content type

application/json

Copy

Expand all Collapse all

`{  *   "id": 0,      *   "type": "string",      *   "description": "string",      *   "always": true,      *   "commandId": 0,      *   "notificators": "string",      *   "calendarId": 0,      *   "attributes": { }       }`

## [](#tag/Notifications/operation/putNotificationsId)Update a Notification

##### Authorizations:

_BasicAuth__ApiKey_

##### path Parameters

|     |     |
| --- | --- |
| id<br><br>required | integer |

##### Request Body schema: application/json

required

|     |     |
| --- | --- |
| id  | integer <int64><br><br>Unique identifier for the notification |
| type | string<br><br>Notification category such as geofenceEnter or ignitionOn |
| description | string or null<br><br>User-defined text describing the notification |
| always | boolean<br><br>Whether the notification triggers regardless of schedule |
| commandId | integer <int64><br><br>Identifier of the command to send when the notification triggers |
| notificators | string<br><br>Comma-separated delivery channels (for example, web, mail) |
| calendarId | integer <int64><br><br>Calendar identifier restricting when the notification is active |
| attributes | object<br><br>Additional custom attributes used by notificators or templates |

### Responses

**200**

OK

**400**

Bad request

**401**

Unauthorized

put/notifications/{id}

Demo Server 1

https://demo.traccar.org/api/notifications/{id}

Demo Server 2

https://demo2.traccar.org/api/notifications/{id}

Demo Server 3

https://demo3.traccar.org/api/notifications/{id}

Demo Server 4

https://demo4.traccar.org/api/notifications/{id}

Subscription Server

https://server.traccar.org/api/notifications/{id}

Other Server

http://{host}:{port}/api/notifications/{id}

### Request samples

*   Payload

Content type

application/json

Copy

Expand all Collapse all

`{  *   "id": 0,      *   "type": "string",      *   "description": "string",      *   "always": true,      *   "commandId": 0,      *   "notificators": "string",      *   "calendarId": 0,      *   "attributes": { }       }`

### Response samples

*   200

Content type

application/json

Copy

Expand all Collapse all

`{  *   "id": 0,      *   "type": "string",      *   "description": "string",      *   "always": true,      *   "commandId": 0,      *   "notificators": "string",      *   "calendarId": 0,      *   "attributes": { }       }`

## [](#tag/Notifications/operation/deleteNotificationsId)Delete a Notification

##### Authorizations:

_BasicAuth__ApiKey_

##### path Parameters

|     |     |
| --- | --- |
| id<br><br>required | integer |

### Responses

**204**

No Content

**401**

Unauthorized

delete/notifications/{id}

Demo Server 1

https://demo.traccar.org/api/notifications/{id}

Demo Server 2

https://demo2.traccar.org/api/notifications/{id}

Demo Server 3

https://demo3.traccar.org/api/notifications/{id}

Demo Server 4

https://demo4.traccar.org/api/notifications/{id}

Subscription Server

https://server.traccar.org/api/notifications/{id}

Other Server

http://{host}:{port}/api/notifications/{id}

## [](#tag/Notifications/operation/getNotificationsTypes)Fetch a list of available Notification types

##### Authorizations:

_BasicAuth__ApiKey_

### Responses

**200**

OK

**401**

Unauthorized

get/notifications/types

Demo Server 1

https://demo.traccar.org/api/notifications/types

Demo Server 2

https://demo2.traccar.org/api/notifications/types

Demo Server 3

https://demo3.traccar.org/api/notifications/types

Demo Server 4

https://demo4.traccar.org/api/notifications/types

Subscription Server

https://server.traccar.org/api/notifications/types

Other Server

http://{host}:{port}/api/notifications/types

### Response samples

*   200

Content type

application/json

Copy

Expand all Collapse all

`[  *   {          *   "type": "string"                   }       ]`

## [](#tag/Notifications/operation/getNotificationsNotificators)Fetch a list of available Notificators

##### Authorizations:

_BasicAuth__ApiKey_

##### query Parameters

|     |     |
| --- | --- |
| announcement | boolean<br><br>When `true`, exclude notificators that cannot deliver announcements |

### Responses

**200**

OK

**401**

Unauthorized

get/notifications/notificators

Demo Server 1

https://demo.traccar.org/api/notifications/notificators

Demo Server 2

https://demo2.traccar.org/api/notifications/notificators

Demo Server 3

https://demo3.traccar.org/api/notifications/notificators

Demo Server 4

https://demo4.traccar.org/api/notifications/notificators

Subscription Server

https://server.traccar.org/api/notifications/notificators

Other Server

http://{host}:{port}/api/notifications/notificators

### Response samples

*   200

Content type

application/json

Copy

Expand all Collapse all

`[  *   {          *   "type": "string"                   }       ]`

## [](#tag/Notifications/operation/postNotificationsTest)Send test notification to current user via Email and SMS

##### Authorizations:

_BasicAuth__ApiKey_

### Responses

**204**

Successful sending

**400**

Could happen if sending has failed

post/notifications/test

Demo Server 1

https://demo.traccar.org/api/notifications/test

Demo Server 2

https://demo2.traccar.org/api/notifications/test

Demo Server 3

https://demo3.traccar.org/api/notifications/test

Demo Server 4

https://demo4.traccar.org/api/notifications/test

Subscription Server

https://server.traccar.org/api/notifications/test

Other Server

http://{host}:{port}/api/notifications/test

## [](#tag/Notifications/operation/postNotificationsTestNotificator)Send a test notification to the current User using the specified notificator

##### Authorizations:

_BasicAuth__ApiKey_

##### path Parameters

|     |     |
| --- | --- |
| notificator<br><br>required | string |

### Responses

**204**

Successful sending

**400**

Could happen if sending has failed

post/notifications/test/{notificator}

Demo Server 1

https://demo.traccar.org/api/notifications/test/{notificator}

Demo Server 2

https://demo2.traccar.org/api/notifications/test/{notificator}

Demo Server 3

https://demo3.traccar.org/api/notifications/test/{notificator}

Demo Server 4

https://demo4.traccar.org/api/notifications/test/{notificator}

Subscription Server

https://server.traccar.org/api/notifications/test/{notificator}

Other Server

http://{host}:{port}/api/notifications/test/{notificator}

## [](#tag/Notifications/operation/postNotificationsSendNotificator)Send a custom notification to selected users using the specified notificator

##### Authorizations:

_BasicAuth__ApiKey_

##### path Parameters

|     |     |
| --- | --- |
| notificator<br><br>required | string |

##### query Parameters

|     |     |
| --- | --- |
| userId | Array of integers <int64> \[ items <int64 > \]<br><br>Optional list of user ids to send the notification to; if omitted, sends to all permitted users |

##### Request Body schema: application/json

required

|     |     |
| --- | --- |
| subject | string<br><br>Subject or title of the notification |
| digest | string<br><br>Short summary shown in compact contexts; defaults to the body when omitted |
| body<br><br>required | string<br><br>Full notification text |
| priority | boolean<br><br>Whether the message should be treated as high priority |

### Responses

**204**

Successful sending

**400**

Could happen if sending has failed

post/notifications/send/{notificator}

Demo Server 1

https://demo.traccar.org/api/notifications/send/{notificator}

Demo Server 2

https://demo2.traccar.org/api/notifications/send/{notificator}

Demo Server 3

https://demo3.traccar.org/api/notifications/send/{notificator}

Demo Server 4

https://demo4.traccar.org/api/notifications/send/{notificator}

Subscription Server

https://server.traccar.org/api/notifications/send/{notificator}

Other Server

http://{host}:{port}/api/notifications/send/{notificator}

### Request samples

*   Payload

Content type

application/json

Copy

`{  *   "subject": "string",      *   "digest": "string",      *   "body": "string",      *   "priority": true       }`

## [](#tag/Geofences)Geofences

Geofence management

## [](#tag/Geofences/operation/getGeofences)Fetch a list of Geofences

Without params, it returns a list of Geofences the user has access to

##### Authorizations:

_BasicAuth__ApiKey_

##### query Parameters

|     |     |
| --- | --- |
| all | boolean<br><br>Can only be used by admins or managers to fetch all entities |
| userId | integer<br><br>Standard users can use this only with their own _userId_ |
| deviceId | integer<br><br>Standard users can use this only with \_deviceId\_s, they have access to |
| groupId | integer<br><br>Standard users can use this only with \_groupId\_s, they have access to |
| refresh | boolean |
| limit | integer<br><br>Limit the number of returned results |
| offset | integer<br><br>Offset for pagination |
| keyword | string<br><br>Search keyword filter |

### Responses

**200**

OK

**401**

Unauthorized

get/geofences

Demo Server 1

https://demo.traccar.org/api/geofences

Demo Server 2

https://demo2.traccar.org/api/geofences

Demo Server 3

https://demo3.traccar.org/api/geofences

Demo Server 4

https://demo4.traccar.org/api/geofences

Subscription Server

https://server.traccar.org/api/geofences

Other Server

http://{host}:{port}/api/geofences

### Response samples

*   200

Content type

application/json

Copy

Expand all Collapse all

`[  *   {          *   "id": 0,              *   "name": "string",              *   "description": "string",              *   "area": "string",              *   "calendarId": 0,              *   "attributes": { }                   }       ]`

## [](#tag/Geofences/operation/postGeofences)Create a Geofence

##### Authorizations:

_BasicAuth__ApiKey_

##### Request Body schema: application/json

required

|     |     |
| --- | --- |
| id  | integer <int64><br><br>Unique identifier for the geofence |
| name | string<br><br>Human-readable name shown in lists and maps |
| description | string<br><br>Details about the geofence for display in the UI |
| area | string<br><br>Geofence area definition encoded as a WKT string |
| calendarId | integer <int64><br><br>Calendar identifier limiting when the geofence is active |
| attributes | object<br><br>Custom key-value pairs for integrations or UI overrides |

### Responses

**200**

OK

**400**

Bad request

**401**

Unauthorized

post/geofences

Demo Server 1

https://demo.traccar.org/api/geofences

Demo Server 2

https://demo2.traccar.org/api/geofences

Demo Server 3

https://demo3.traccar.org/api/geofences

Demo Server 4

https://demo4.traccar.org/api/geofences

Subscription Server

https://server.traccar.org/api/geofences

Other Server

http://{host}:{port}/api/geofences

### Request samples

*   Payload

Content type

application/json

Copy

Expand all Collapse all

`{  *   "id": 0,      *   "name": "string",      *   "description": "string",      *   "area": "string",      *   "calendarId": 0,      *   "attributes": { }       }`

### Response samples

*   200

Content type

application/json

Copy

Expand all Collapse all

`{  *   "id": 0,      *   "name": "string",      *   "description": "string",      *   "area": "string",      *   "calendarId": 0,      *   "attributes": { }       }`

## [](#tag/Geofences/operation/getGeofencesId)Fetch a Geofence

##### Authorizations:

_BasicAuth__ApiKey_

##### path Parameters

|     |     |
| --- | --- |
| id<br><br>required | integer |

### Responses

**200**

OK

**401**

Unauthorized

**404**

Not found

get/geofences/{id}

Demo Server 1

https://demo.traccar.org/api/geofences/{id}

Demo Server 2

https://demo2.traccar.org/api/geofences/{id}

Demo Server 3

https://demo3.traccar.org/api/geofences/{id}

Demo Server 4

https://demo4.traccar.org/api/geofences/{id}

Subscription Server

https://server.traccar.org/api/geofences/{id}

Other Server

http://{host}:{port}/api/geofences/{id}

### Response samples

*   200

Content type

application/json

Copy

Expand all Collapse all

`{  *   "id": 0,      *   "name": "string",      *   "description": "string",      *   "area": "string",      *   "calendarId": 0,      *   "attributes": { }       }`

## [](#tag/Geofences/operation/putGeofencesId)Update a Geofence

##### Authorizations:

_BasicAuth__ApiKey_

##### path Parameters

|     |     |
| --- | --- |
| id<br><br>required | integer |

##### Request Body schema: application/json

required

|     |     |
| --- | --- |
| id  | integer <int64><br><br>Unique identifier for the geofence |
| name | string<br><br>Human-readable name shown in lists and maps |
| description | string<br><br>Details about the geofence for display in the UI |
| area | string<br><br>Geofence area definition encoded as a WKT string |
| calendarId | integer <int64><br><br>Calendar identifier limiting when the geofence is active |
| attributes | object<br><br>Custom key-value pairs for integrations or UI overrides |

### Responses

**200**

OK

**400**

Bad request

**401**

Unauthorized

put/geofences/{id}

Demo Server 1

https://demo.traccar.org/api/geofences/{id}

Demo Server 2

https://demo2.traccar.org/api/geofences/{id}

Demo Server 3

https://demo3.traccar.org/api/geofences/{id}

Demo Server 4

https://demo4.traccar.org/api/geofences/{id}

Subscription Server

https://server.traccar.org/api/geofences/{id}

Other Server

http://{host}:{port}/api/geofences/{id}

### Request samples

*   Payload

Content type

application/json

Copy

Expand all Collapse all

`{  *   "id": 0,      *   "name": "string",      *   "description": "string",      *   "area": "string",      *   "calendarId": 0,      *   "attributes": { }       }`

### Response samples

*   200

Content type

application/json

Copy

Expand all Collapse all

`{  *   "id": 0,      *   "name": "string",      *   "description": "string",      *   "area": "string",      *   "calendarId": 0,      *   "attributes": { }       }`

## [](#tag/Geofences/operation/deleteGeofencesId)Delete a Geofence

##### Authorizations:

_BasicAuth__ApiKey_

##### path Parameters

|     |     |
| --- | --- |
| id<br><br>required | integer |

### Responses

**204**

No Content

**401**

Unauthorized

delete/geofences/{id}

Demo Server 1

https://demo.traccar.org/api/geofences/{id}

Demo Server 2

https://demo2.traccar.org/api/geofences/{id}

Demo Server 3

https://demo3.traccar.org/api/geofences/{id}

Demo Server 4

https://demo4.traccar.org/api/geofences/{id}

Subscription Server

https://server.traccar.org/api/geofences/{id}

Other Server

http://{host}:{port}/api/geofences/{id}

## [](#tag/Commands)Commands

Sending commands to devices and stored command management

## [](#tag/Commands/operation/getCommands)Fetch a list of Saved Commands

Without params, it returns a list of Saved Commands the user has access to

##### Authorizations:

_BasicAuth__ApiKey_

##### query Parameters

|     |     |
| --- | --- |
| all | boolean<br><br>Can only be used by admins or managers to fetch all entities |
| userId | integer<br><br>Standard users can use this only with their own _userId_ |
| deviceId | integer<br><br>Standard users can use this only with \_deviceId\_s, they have access to |
| groupId | integer<br><br>Standard users can use this only with \_groupId\_s, they have access to |
| refresh | boolean |
| limit | integer<br><br>Limit the number of returned results |
| offset | integer<br><br>Offset for pagination |
| keyword | string<br><br>Search keyword filter |

### Responses

**200**

OK

**401**

Unauthorized

get/commands

Demo Server 1

https://demo.traccar.org/api/commands

Demo Server 2

https://demo2.traccar.org/api/commands

Demo Server 3

https://demo3.traccar.org/api/commands

Demo Server 4

https://demo4.traccar.org/api/commands

Subscription Server

https://server.traccar.org/api/commands

Other Server

http://{host}:{port}/api/commands

### Response samples

*   200

Content type

application/json

Copy

Expand all Collapse all

`[  *   {          *   "id": 0,              *   "deviceId": 0,              *   "description": "string",              *   "type": "string",              *   "textChannel": true,              *   "attributes": { }                   }       ]`

## [](#tag/Commands/operation/postCommands)Create a Saved Command

##### Authorizations:

_BasicAuth__ApiKey_

##### Request Body schema: application/json

required

|     |     |
| --- | --- |
| id  | integer <int64><br><br>Unique saved command identifier |
| deviceId | integer <int64><br><br>Target device identifier when the command is bound to one device |
| description | string<br><br>User friendly label displayed in the UI |
| type | string<br><br>Command type as defined by the device protocol |
| textChannel | boolean<br><br>Whether to send the command using the SMS channel |
| attributes | object<br><br>Additional parameters required by the command type |

### Responses

**200**

OK

**400**

Bad request

**401**

Unauthorized

post/commands

Demo Server 1

https://demo.traccar.org/api/commands

Demo Server 2

https://demo2.traccar.org/api/commands

Demo Server 3

https://demo3.traccar.org/api/commands

Demo Server 4

https://demo4.traccar.org/api/commands

Subscription Server

https://server.traccar.org/api/commands

Other Server

http://{host}:{port}/api/commands

### Request samples

*   Payload

Content type

application/json

Copy

Expand all Collapse all

`{  *   "id": 0,      *   "deviceId": 0,      *   "description": "string",      *   "type": "string",      *   "textChannel": true,      *   "attributes": { }       }`

### Response samples

*   200

Content type

application/json

Copy

Expand all Collapse all

`{  *   "id": 0,      *   "deviceId": 0,      *   "description": "string",      *   "type": "string",      *   "textChannel": true,      *   "attributes": { }       }`

## [](#tag/Commands/operation/getCommandsId)Fetch a Saved Command

##### Authorizations:

_BasicAuth__ApiKey_

##### path Parameters

|     |     |
| --- | --- |
| id<br><br>required | integer |

### Responses

**200**

OK

**401**

Unauthorized

**404**

Not found

get/commands/{id}

Demo Server 1

https://demo.traccar.org/api/commands/{id}

Demo Server 2

https://demo2.traccar.org/api/commands/{id}

Demo Server 3

https://demo3.traccar.org/api/commands/{id}

Demo Server 4

https://demo4.traccar.org/api/commands/{id}

Subscription Server

https://server.traccar.org/api/commands/{id}

Other Server

http://{host}:{port}/api/commands/{id}

### Response samples

*   200

Content type

application/json

Copy

Expand all Collapse all

`{  *   "id": 0,      *   "deviceId": 0,      *   "description": "string",      *   "type": "string",      *   "textChannel": true,      *   "attributes": { }       }`

## [](#tag/Commands/operation/putCommandsId)Update a Saved Command

##### Authorizations:

_BasicAuth__ApiKey_

##### path Parameters

|     |     |
| --- | --- |
| id<br><br>required | integer |

##### Request Body schema: application/json

required

|     |     |
| --- | --- |
| id  | integer <int64><br><br>Unique saved command identifier |
| deviceId | integer <int64><br><br>Target device identifier when the command is bound to one device |
| description | string<br><br>User friendly label displayed in the UI |
| type | string<br><br>Command type as defined by the device protocol |
| textChannel | boolean<br><br>Whether to send the command using the SMS channel |
| attributes | object<br><br>Additional parameters required by the command type |

### Responses

**200**

OK

**400**

Bad request

**401**

Unauthorized

put/commands/{id}

Demo Server 1

https://demo.traccar.org/api/commands/{id}

Demo Server 2

https://demo2.traccar.org/api/commands/{id}

Demo Server 3

https://demo3.traccar.org/api/commands/{id}

Demo Server 4

https://demo4.traccar.org/api/commands/{id}

Subscription Server

https://server.traccar.org/api/commands/{id}

Other Server

http://{host}:{port}/api/commands/{id}

### Request samples

*   Payload

Content type

application/json

Copy

Expand all Collapse all

`{  *   "id": 0,      *   "deviceId": 0,      *   "description": "string",      *   "type": "string",      *   "textChannel": true,      *   "attributes": { }       }`

### Response samples

*   200

Content type

application/json

Copy

Expand all Collapse all

`{  *   "id": 0,      *   "deviceId": 0,      *   "description": "string",      *   "type": "string",      *   "textChannel": true,      *   "attributes": { }       }`

## [](#tag/Commands/operation/deleteCommandsId)Delete a Saved Command

##### Authorizations:

_BasicAuth__ApiKey_

##### path Parameters

|     |     |
| --- | --- |
| id<br><br>required | integer |

### Responses

**204**

No Content

**401**

Unauthorized

delete/commands/{id}

Demo Server 1

https://demo.traccar.org/api/commands/{id}

Demo Server 2

https://demo2.traccar.org/api/commands/{id}

Demo Server 3

https://demo3.traccar.org/api/commands/{id}

Demo Server 4

https://demo4.traccar.org/api/commands/{id}

Subscription Server

https://server.traccar.org/api/commands/{id}

Other Server

http://{host}:{port}/api/commands/{id}

## [](#tag/Commands/operation/getCommandsSend)Fetch a list of Saved Commands supported by Device at the moment

Return a list of saved commands linked to Device and its groups, filtered by current Device protocol support

##### Authorizations:

_BasicAuth__ApiKey_

##### query Parameters

|     |     |
| --- | --- |
| deviceId<br><br>required | integer<br><br>Standard users can use this only with \_deviceId\_s, they have access to |

### Responses

**200**

OK

**400**

Could happen when the user doesn't have permission for the device

get/commands/send

Demo Server 1

https://demo.traccar.org/api/commands/send

Demo Server 2

https://demo2.traccar.org/api/commands/send

Demo Server 3

https://demo3.traccar.org/api/commands/send

Demo Server 4

https://demo4.traccar.org/api/commands/send

Subscription Server

https://server.traccar.org/api/commands/send

Other Server

http://{host}:{port}/api/commands/send

### Response samples

*   200

Content type

application/json

Copy

Expand all Collapse all

`[  *   {          *   "id": 0,              *   "deviceId": 0,              *   "description": "string",              *   "type": "string",              *   "textChannel": true,              *   "attributes": { }                   }       ]`

## [](#tag/Commands/operation/postCommandsSend)Dispatch commands to device

Dispatch a new command or Saved Command if _body.id_ set

##### Authorizations:

_BasicAuth__ApiKey_

##### query Parameters

|     |     |
| --- | --- |
| groupId | integer<br><br>Send the command to all devices in the group |

##### Request Body schema: application/json

required

|     |     |
| --- | --- |
| id  | integer <int64><br><br>Unique saved command identifier |
| deviceId | integer <int64><br><br>Target device identifier when the command is bound to one device |
| description | string<br><br>User friendly label displayed in the UI |
| type | string<br><br>Command type as defined by the device protocol |
| textChannel | boolean<br><br>Whether to send the command using the SMS channel |
| attributes | object<br><br>Additional parameters required by the command type |

### Responses

**200**

Command sent

**202**

Command queued

**400**

Could happen when the user doesn't have permission or an incorrect command _type_ for the device

post/commands/send

Demo Server 1

https://demo.traccar.org/api/commands/send

Demo Server 2

https://demo2.traccar.org/api/commands/send

Demo Server 3

https://demo3.traccar.org/api/commands/send

Demo Server 4

https://demo4.traccar.org/api/commands/send

Subscription Server

https://server.traccar.org/api/commands/send

Other Server

http://{host}:{port}/api/commands/send

### Request samples

*   Payload

Content type

application/json

Copy

Expand all Collapse all

`{  *   "id": 0,      *   "deviceId": 0,      *   "description": "string",      *   "type": "string",      *   "textChannel": true,      *   "attributes": { }       }`

### Response samples

*   200
*   202

Content type

application/json

Copy

Expand all Collapse all

`{  *   "id": 0,      *   "deviceId": 0,      *   "description": "string",      *   "type": "string",      *   "textChannel": true,      *   "attributes": { }       }`

## [](#tag/Commands/operation/getCommandsTypes)Fetch a list of available Commands for the Device or all possible Commands if Device ommited

##### Authorizations:

_BasicAuth__ApiKey_

##### query Parameters

|     |     |
| --- | --- |
| deviceId | integer<br><br>Internal device identifier. Only works if device has already reported some locations |
| textChannel | boolean<br><br>When `true` return SMS commands. If not specified or `false` return data commands |

### Responses

**200**

OK

**400**

Could happen when trying to fetch from a device the user does not have permission

get/commands/types

Demo Server 1

https://demo.traccar.org/api/commands/types

Demo Server 2

https://demo2.traccar.org/api/commands/types

Demo Server 3

https://demo3.traccar.org/api/commands/types

Demo Server 4

https://demo4.traccar.org/api/commands/types

Subscription Server

https://server.traccar.org/api/commands/types

Other Server

http://{host}:{port}/api/commands/types

### Response samples

*   200

Content type

application/json

Copy

Expand all Collapse all

`[  *   {          *   "type": "string"                   }       ]`

## [](#tag/Attributes)Attributes

Computed attributes management

## [](#tag/Attributes/operation/getAttributesComputed)Fetch a list of Attributes

Without params, it returns a list of Attributes the user has access to

##### Authorizations:

_BasicAuth__ApiKey_

##### query Parameters

|     |     |
| --- | --- |
| all | boolean<br><br>Can only be used by admins or managers to fetch all entities |
| userId | integer<br><br>Standard users can use this only with their own _userId_ |
| deviceId | integer<br><br>Standard users can use this only with \_deviceId\_s, they have access to |
| groupId | integer<br><br>Standard users can use this only with \_groupId\_s, they have access to |
| refresh | boolean |
| limit | integer<br><br>Limit the number of returned results |
| offset | integer<br><br>Offset for pagination |
| keyword | string<br><br>Search keyword filter |

### Responses

**200**

OK

**401**

Unauthorized

get/attributes/computed

Demo Server 1

https://demo.traccar.org/api/attributes/computed

Demo Server 2

https://demo2.traccar.org/api/attributes/computed

Demo Server 3

https://demo3.traccar.org/api/attributes/computed

Demo Server 4

https://demo4.traccar.org/api/attributes/computed

Subscription Server

https://server.traccar.org/api/attributes/computed

Other Server

http://{host}:{port}/api/attributes/computed

### Response samples

*   200

Content type

application/json

Copy

Expand all Collapse all

`[  *   {          *   "id": 0,              *   "description": "string",              *   "attribute": "string",              *   "expression": "string",              *   "type": "string"                   }       ]`

## [](#tag/Attributes/operation/postAttributesComputed)Create an Attribute

##### Authorizations:

_BasicAuth__ApiKey_

##### Request Body schema: application/json

required

|     |     |
| --- | --- |
| id  | integer <int64><br><br>Unique computed attribute identifier |
| description | string<br><br>Human readable name of the attribute |
| attribute | string<br><br>Attribute name used in expressions |
| expression | string<br><br>Expression that defines how the attribute is calculated |
| type | string<br><br>String\|Number\|Boolean |

### Responses

**200**

OK

**400**

Bad request

**401**

Unauthorized

post/attributes/computed

Demo Server 1

https://demo.traccar.org/api/attributes/computed

Demo Server 2

https://demo2.traccar.org/api/attributes/computed

Demo Server 3

https://demo3.traccar.org/api/attributes/computed

Demo Server 4

https://demo4.traccar.org/api/attributes/computed

Subscription Server

https://server.traccar.org/api/attributes/computed

Other Server

http://{host}:{port}/api/attributes/computed

### Request samples

*   Payload

Content type

application/json

Copy

`{  *   "id": 0,      *   "description": "string",      *   "attribute": "string",      *   "expression": "string",      *   "type": "string"       }`

### Response samples

*   200

Content type

application/json

Copy

`{  *   "id": 0,      *   "description": "string",      *   "attribute": "string",      *   "expression": "string",      *   "type": "string"       }`

## [](#tag/Attributes/operation/postAttributesComputedTest)Evaluate a Computed Attribute against the latest Device Position

Admin only. Returns the computed value without persisting the attribute.

##### Authorizations:

_BasicAuth__ApiKey_

##### query Parameters

|     |     |
| --- | --- |
| deviceId<br><br>required | integer |

##### Request Body schema: application/json

required

|     |     |
| --- | --- |
| id  | integer <int64><br><br>Unique computed attribute identifier |
| description | string<br><br>Human readable name of the attribute |
| attribute | string<br><br>Attribute name used in expressions |
| expression | string<br><br>Expression that defines how the attribute is calculated |
| type | string<br><br>String\|Number\|Boolean |

### Responses

**200**

OK

**204**

Computation produced no value

**400**

Bad request

**401**

Unauthorized

post/attributes/computed/test

Demo Server 1

https://demo.traccar.org/api/attributes/computed/test

Demo Server 2

https://demo2.traccar.org/api/attributes/computed/test

Demo Server 3

https://demo3.traccar.org/api/attributes/computed/test

Demo Server 4

https://demo4.traccar.org/api/attributes/computed/test

Subscription Server

https://server.traccar.org/api/attributes/computed/test

Other Server

http://{host}:{port}/api/attributes/computed/test

### Request samples

*   Payload

Content type

application/json

Copy

`{  *   "id": 0,      *   "description": "string",      *   "attribute": "string",      *   "expression": "string",      *   "type": "string"       }`

### Response samples

*   200

Content type

application/json

Copy

`"string"`

## [](#tag/Attributes/operation/getAttributesComputedId)Fetch an Attribute

##### Authorizations:

_BasicAuth__ApiKey_

##### path Parameters

|     |     |
| --- | --- |
| id<br><br>required | integer |

### Responses

**200**

OK

**401**

Unauthorized

**404**

Not found

get/attributes/computed/{id}

Demo Server 1

https://demo.traccar.org/api/attributes/computed/{id}

Demo Server 2

https://demo2.traccar.org/api/attributes/computed/{id}

Demo Server 3

https://demo3.traccar.org/api/attributes/computed/{id}

Demo Server 4

https://demo4.traccar.org/api/attributes/computed/{id}

Subscription Server

https://server.traccar.org/api/attributes/computed/{id}

Other Server

http://{host}:{port}/api/attributes/computed/{id}

### Response samples

*   200

Content type

application/json

Copy

`{  *   "id": 0,      *   "description": "string",      *   "attribute": "string",      *   "expression": "string",      *   "type": "string"       }`

## [](#tag/Attributes/operation/putAttributesComputedId)Update an Attribute

##### Authorizations:

_BasicAuth__ApiKey_

##### path Parameters

|     |     |
| --- | --- |
| id<br><br>required | integer |

##### Request Body schema: application/json

required

|     |     |
| --- | --- |
| id  | integer <int64><br><br>Unique computed attribute identifier |
| description | string<br><br>Human readable name of the attribute |
| attribute | string<br><br>Attribute name used in expressions |
| expression | string<br><br>Expression that defines how the attribute is calculated |
| type | string<br><br>String\|Number\|Boolean |

### Responses

**200**

OK

**400**

Bad request

**401**

Unauthorized

put/attributes/computed/{id}

Demo Server 1

https://demo.traccar.org/api/attributes/computed/{id}

Demo Server 2

https://demo2.traccar.org/api/attributes/computed/{id}

Demo Server 3

https://demo3.traccar.org/api/attributes/computed/{id}

Demo Server 4

https://demo4.traccar.org/api/attributes/computed/{id}

Subscription Server

https://server.traccar.org/api/attributes/computed/{id}

Other Server

http://{host}:{port}/api/attributes/computed/{id}

### Request samples

*   Payload

Content type

application/json

Copy

`{  *   "id": 0,      *   "description": "string",      *   "attribute": "string",      *   "expression": "string",      *   "type": "string"       }`

### Response samples

*   200

Content type

application/json

Copy

`{  *   "id": 0,      *   "description": "string",      *   "attribute": "string",      *   "expression": "string",      *   "type": "string"       }`

## [](#tag/Attributes/operation/deleteAttributesComputedId)Delete an Attribute

##### Authorizations:

_BasicAuth__ApiKey_

##### path Parameters

|     |     |
| --- | --- |
| id<br><br>required | integer |

### Responses

**204**

No Content

**401**

Unauthorized

delete/attributes/computed/{id}

Demo Server 1

https://demo.traccar.org/api/attributes/computed/{id}

Demo Server 2

https://demo2.traccar.org/api/attributes/computed/{id}

Demo Server 3

https://demo3.traccar.org/api/attributes/computed/{id}

Demo Server 4

https://demo4.traccar.org/api/attributes/computed/{id}

Subscription Server

https://server.traccar.org/api/attributes/computed/{id}

Other Server

http://{host}:{port}/api/attributes/computed/{id}

## [](#tag/Drivers)Drivers

Drivers management

## [](#tag/Drivers/operation/getDrivers)Fetch a list of Drivers

Without params, it returns a list of Drivers the user has access to

##### Authorizations:

_BasicAuth__ApiKey_

##### query Parameters

|     |     |
| --- | --- |
| all | boolean<br><br>Can only be used by admins or managers to fetch all entities |
| userId | integer<br><br>Standard users can use this only with their own _userId_ |
| deviceId | integer<br><br>Standard users can use this only with \_deviceId\_s, they have access to |
| groupId | integer<br><br>Standard users can use this only with \_groupId\_s, they have access to |
| refresh | boolean |
| limit | integer<br><br>Limit the number of returned results |
| offset | integer<br><br>Offset for pagination |
| keyword | string<br><br>Search keyword filter |

### Responses

**200**

OK

**401**

Unauthorized

get/drivers

Demo Server 1

https://demo.traccar.org/api/drivers

Demo Server 2

https://demo2.traccar.org/api/drivers

Demo Server 3

https://demo3.traccar.org/api/drivers

Demo Server 4

https://demo4.traccar.org/api/drivers

Subscription Server

https://server.traccar.org/api/drivers

Other Server

http://{host}:{port}/api/drivers

### Response samples

*   200

Content type

application/json

Copy

Expand all Collapse all

`[  *   {          *   "id": 0,              *   "name": "string",              *   "uniqueId": "string",              *   "attributes": { }                   }       ]`

## [](#tag/Drivers/operation/postDrivers)Create a Driver

##### Authorizations:

_BasicAuth__ApiKey_

##### Request Body schema: application/json

required

|     |     |
| --- | --- |
| id  | integer <int64><br><br>Unique driver identifier |
| name | string<br><br>Driver full name |
| uniqueId | string<br><br>Unique external identifier for the driver |
| attributes | object<br><br>Custom driver attributes |

### Responses

**200**

OK

**400**

Bad request

**401**

Unauthorized

post/drivers

Demo Server 1

https://demo.traccar.org/api/drivers

Demo Server 2

https://demo2.traccar.org/api/drivers

Demo Server 3

https://demo3.traccar.org/api/drivers

Demo Server 4

https://demo4.traccar.org/api/drivers

Subscription Server

https://server.traccar.org/api/drivers

Other Server

http://{host}:{port}/api/drivers

### Request samples

*   Payload

Content type

application/json

Copy

Expand all Collapse all

`{  *   "id": 0,      *   "name": "string",      *   "uniqueId": "string",      *   "attributes": { }       }`

### Response samples

*   200

Content type

application/json

Copy

Expand all Collapse all

`{  *   "id": 0,      *   "name": "string",      *   "uniqueId": "string",      *   "attributes": { }       }`

## [](#tag/Drivers/operation/getDriversId)Fetch a Driver

##### Authorizations:

_BasicAuth__ApiKey_

##### path Parameters

|     |     |
| --- | --- |
| id<br><br>required | integer |

### Responses

**200**

OK

**401**

Unauthorized

**404**

Not found

get/drivers/{id}

Demo Server 1

https://demo.traccar.org/api/drivers/{id}

Demo Server 2

https://demo2.traccar.org/api/drivers/{id}

Demo Server 3

https://demo3.traccar.org/api/drivers/{id}

Demo Server 4

https://demo4.traccar.org/api/drivers/{id}

Subscription Server

https://server.traccar.org/api/drivers/{id}

Other Server

http://{host}:{port}/api/drivers/{id}

### Response samples

*   200

Content type

application/json

Copy

Expand all Collapse all

`{  *   "id": 0,      *   "name": "string",      *   "uniqueId": "string",      *   "attributes": { }       }`

## [](#tag/Drivers/operation/putDriversId)Update a Driver

##### Authorizations:

_BasicAuth__ApiKey_

##### path Parameters

|     |     |
| --- | --- |
| id<br><br>required | integer |

##### Request Body schema: application/json

required

|     |     |
| --- | --- |
| id  | integer <int64><br><br>Unique driver identifier |
| name | string<br><br>Driver full name |
| uniqueId | string<br><br>Unique external identifier for the driver |
| attributes | object<br><br>Custom driver attributes |

### Responses

**200**

OK

**400**

Bad request

**401**

Unauthorized

put/drivers/{id}

Demo Server 1

https://demo.traccar.org/api/drivers/{id}

Demo Server 2

https://demo2.traccar.org/api/drivers/{id}

Demo Server 3

https://demo3.traccar.org/api/drivers/{id}

Demo Server 4

https://demo4.traccar.org/api/drivers/{id}

Subscription Server

https://server.traccar.org/api/drivers/{id}

Other Server

http://{host}:{port}/api/drivers/{id}

### Request samples

*   Payload

Content type

application/json

Copy

Expand all Collapse all

`{  *   "id": 0,      *   "name": "string",      *   "uniqueId": "string",      *   "attributes": { }       }`

### Response samples

*   200

Content type

application/json

Copy

Expand all Collapse all

`{  *   "id": 0,      *   "name": "string",      *   "uniqueId": "string",      *   "attributes": { }       }`

## [](#tag/Drivers/operation/deleteDriversId)Delete a Driver

##### Authorizations:

_BasicAuth__ApiKey_

##### path Parameters

|     |     |
| --- | --- |
| id<br><br>required | integer |

### Responses

**204**

No Content

**401**

Unauthorized

delete/drivers/{id}

Demo Server 1

https://demo.traccar.org/api/drivers/{id}

Demo Server 2

https://demo2.traccar.org/api/drivers/{id}

Demo Server 3

https://demo3.traccar.org/api/drivers/{id}

Demo Server 4

https://demo4.traccar.org/api/drivers/{id}

Subscription Server

https://server.traccar.org/api/drivers/{id}

Other Server

http://{host}:{port}/api/drivers/{id}

## [](#tag/Maintenance)Maintenance

Maintenance management

## [](#tag/Maintenance/operation/getMaintenance)Fetch a list of Maintenance tasks

Without params, it returns a list of Maintenance tasks the user has access to

##### Authorizations:

_BasicAuth__ApiKey_

##### query Parameters

|     |     |
| --- | --- |
| all | boolean<br><br>Can only be used by admins or managers to fetch all entities |
| userId | integer<br><br>Standard users can use this only with their own _userId_ |
| deviceId | integer<br><br>Standard users can use this only with \_deviceId\_s, they have access to |
| groupId | integer<br><br>Standard users can use this only with \_groupId\_s, they have access to |
| refresh | boolean |
| limit | integer<br><br>Limit the number of returned results |
| offset | integer<br><br>Offset for pagination |
| keyword | string<br><br>Search keyword filter |

### Responses

**200**

OK

**401**

Unauthorized

get/maintenance

Demo Server 1

https://demo.traccar.org/api/maintenance

Demo Server 2

https://demo2.traccar.org/api/maintenance

Demo Server 3

https://demo3.traccar.org/api/maintenance

Demo Server 4

https://demo4.traccar.org/api/maintenance

Subscription Server

https://server.traccar.org/api/maintenance

Other Server

http://{host}:{port}/api/maintenance

### Response samples

*   200

Content type

application/json

Copy

Expand all Collapse all

`[  *   {          *   "id": 0,              *   "name": "string",              *   "type": "string",              *   "start": 0,              *   "period": 0,              *   "attributes": { }                   }       ]`

## [](#tag/Maintenance/operation/postMaintenance)Create a Maintenance task

##### Authorizations:

_BasicAuth__ApiKey_

##### Request Body schema: application/json

required

|     |     |
| --- | --- |
| id  | integer <int64><br><br>Unique maintenance item identifier |
| name | string<br><br>Maintenance task name |
| type | string<br><br>Metric the maintenance is based on |
| start | number<br><br>Current accumulated value when maintenance tracking starts |
| period | number<br><br>Threshold value after which maintenance is due |
| attributes | object<br><br>Custom maintenance attributes |

### Responses

**200**

OK

**400**

Bad request

**401**

Unauthorized

post/maintenance

Demo Server 1

https://demo.traccar.org/api/maintenance

Demo Server 2

https://demo2.traccar.org/api/maintenance

Demo Server 3

https://demo3.traccar.org/api/maintenance

Demo Server 4

https://demo4.traccar.org/api/maintenance

Subscription Server

https://server.traccar.org/api/maintenance

Other Server

http://{host}:{port}/api/maintenance

### Request samples

*   Payload

Content type

application/json

Copy

Expand all Collapse all

`{  *   "id": 0,      *   "name": "string",      *   "type": "string",      *   "start": 0,      *   "period": 0,      *   "attributes": { }       }`

### Response samples

*   200

Content type

application/json

Copy

Expand all Collapse all

`{  *   "id": 0,      *   "name": "string",      *   "type": "string",      *   "start": 0,      *   "period": 0,      *   "attributes": { }       }`

## [](#tag/Maintenance/operation/getMaintenanceId)Fetch a Maintenance task

##### Authorizations:

_BasicAuth__ApiKey_

##### path Parameters

|     |     |
| --- | --- |
| id<br><br>required | integer |

### Responses

**200**

OK

**401**

Unauthorized

**404**

Not found

get/maintenance/{id}

Demo Server 1

https://demo.traccar.org/api/maintenance/{id}

Demo Server 2

https://demo2.traccar.org/api/maintenance/{id}

Demo Server 3

https://demo3.traccar.org/api/maintenance/{id}

Demo Server 4

https://demo4.traccar.org/api/maintenance/{id}

Subscription Server

https://server.traccar.org/api/maintenance/{id}

Other Server

http://{host}:{port}/api/maintenance/{id}

### Response samples

*   200

Content type

application/json

Copy

Expand all Collapse all

`{  *   "id": 0,      *   "name": "string",      *   "type": "string",      *   "start": 0,      *   "period": 0,      *   "attributes": { }       }`

## [](#tag/Maintenance/operation/putMaintenanceId)Update a Maintenance task

##### Authorizations:

_BasicAuth__ApiKey_

##### path Parameters

|     |     |
| --- | --- |
| id<br><br>required | integer |

##### Request Body schema: application/json

required

|     |     |
| --- | --- |
| id  | integer <int64><br><br>Unique maintenance item identifier |
| name | string<br><br>Maintenance task name |
| type | string<br><br>Metric the maintenance is based on |
| start | number<br><br>Current accumulated value when maintenance tracking starts |
| period | number<br><br>Threshold value after which maintenance is due |
| attributes | object<br><br>Custom maintenance attributes |

### Responses

**200**

OK

**400**

Bad request

**401**

Unauthorized

put/maintenance/{id}

Demo Server 1

https://demo.traccar.org/api/maintenance/{id}

Demo Server 2

https://demo2.traccar.org/api/maintenance/{id}

Demo Server 3

https://demo3.traccar.org/api/maintenance/{id}

Demo Server 4

https://demo4.traccar.org/api/maintenance/{id}

Subscription Server

https://server.traccar.org/api/maintenance/{id}

Other Server

http://{host}:{port}/api/maintenance/{id}

### Request samples

*   Payload

Content type

application/json

Copy

Expand all Collapse all

`{  *   "id": 0,      *   "name": "string",      *   "type": "string",      *   "start": 0,      *   "period": 0,      *   "attributes": { }       }`

### Response samples

*   200

Content type

application/json

Copy

Expand all Collapse all

`{  *   "id": 0,      *   "name": "string",      *   "type": "string",      *   "start": 0,      *   "period": 0,      *   "attributes": { }       }`

## [](#tag/Maintenance/operation/deleteMaintenanceId)Delete a Maintenance task

##### Authorizations:

_BasicAuth__ApiKey_

##### path Parameters

|     |     |
| --- | --- |
| id<br><br>required | integer |

### Responses

**204**

No Content

**401**

Unauthorized

delete/maintenance/{id}

Demo Server 1

https://demo.traccar.org/api/maintenance/{id}

Demo Server 2

https://demo2.traccar.org/api/maintenance/{id}

Demo Server 3

https://demo3.traccar.org/api/maintenance/{id}

Demo Server 4

https://demo4.traccar.org/api/maintenance/{id}

Subscription Server

https://server.traccar.org/api/maintenance/{id}

Other Server

http://{host}:{port}/api/maintenance/{id}

## [](#tag/Calendars)Calendars

Calendar management

## [](#tag/Calendars/operation/getCalendars)Fetch a list of Calendars

Without params, it returns a list of Calendars the user has access to

##### Authorizations:

_BasicAuth__ApiKey_

##### query Parameters

|     |     |
| --- | --- |
| all | boolean<br><br>Can only be used by admins or managers to fetch all entities |
| userId | integer<br><br>Standard users can use this only with their own _userId_ |
| limit | integer<br><br>Limit the number of returned results |
| offset | integer<br><br>Offset for pagination |
| keyword | string<br><br>Search keyword filter |

### Responses

**200**

OK

**401**

Unauthorized

get/calendars

Demo Server 1

https://demo.traccar.org/api/calendars

Demo Server 2

https://demo2.traccar.org/api/calendars

Demo Server 3

https://demo3.traccar.org/api/calendars

Demo Server 4

https://demo4.traccar.org/api/calendars

Subscription Server

https://server.traccar.org/api/calendars

Other Server

http://{host}:{port}/api/calendars

### Response samples

*   200

Content type

application/json

Copy

Expand all Collapse all

`[  *   {          *   "id": 0,              *   "name": "string",              *   "data": "string",              *   "attributes": { }                   }       ]`

## [](#tag/Calendars/operation/postCalendars)Create a Calendar

##### Authorizations:

_BasicAuth__ApiKey_

##### Request Body schema: application/json

required

|     |     |
| --- | --- |
| id  | integer <int64><br><br>Unique calendar identifier |
| name | string<br><br>Calendar display name |
| data | string<br><br>base64 encoded in iCalendar format |
| attributes | object<br><br>Custom calendar attributes |

### Responses

**200**

OK

**400**

Bad request

**401**

Unauthorized

post/calendars

Demo Server 1

https://demo.traccar.org/api/calendars

Demo Server 2

https://demo2.traccar.org/api/calendars

Demo Server 3

https://demo3.traccar.org/api/calendars

Demo Server 4

https://demo4.traccar.org/api/calendars

Subscription Server

https://server.traccar.org/api/calendars

Other Server

http://{host}:{port}/api/calendars

### Request samples

*   Payload

Content type

application/json

Copy

Expand all Collapse all

`{  *   "id": 0,      *   "name": "string",      *   "data": "string",      *   "attributes": { }       }`

### Response samples

*   200

Content type

application/json

Copy

Expand all Collapse all

`{  *   "id": 0,      *   "name": "string",      *   "data": "string",      *   "attributes": { }       }`

## [](#tag/Calendars/operation/getCalendarsId)Fetch a Calendar

##### Authorizations:

_BasicAuth__ApiKey_

##### path Parameters

|     |     |
| --- | --- |
| id<br><br>required | integer |

### Responses

**200**

OK

**401**

Unauthorized

**404**

Not found

get/calendars/{id}

Demo Server 1

https://demo.traccar.org/api/calendars/{id}

Demo Server 2

https://demo2.traccar.org/api/calendars/{id}

Demo Server 3

https://demo3.traccar.org/api/calendars/{id}

Demo Server 4

https://demo4.traccar.org/api/calendars/{id}

Subscription Server

https://server.traccar.org/api/calendars/{id}

Other Server

http://{host}:{port}/api/calendars/{id}

### Response samples

*   200

Content type

application/json

Copy

Expand all Collapse all

`{  *   "id": 0,      *   "name": "string",      *   "data": "string",      *   "attributes": { }       }`

## [](#tag/Calendars/operation/putCalendarsId)Update a Calendar

##### Authorizations:

_BasicAuth__ApiKey_

##### path Parameters

|     |     |
| --- | --- |
| id<br><br>required | integer |

##### Request Body schema: application/json

required

|     |     |
| --- | --- |
| id  | integer <int64><br><br>Unique calendar identifier |
| name | string<br><br>Calendar display name |
| data | string<br><br>base64 encoded in iCalendar format |
| attributes | object<br><br>Custom calendar attributes |

### Responses

**200**

OK

**400**

Bad request

**401**

Unauthorized

put/calendars/{id}

Demo Server 1

https://demo.traccar.org/api/calendars/{id}

Demo Server 2

https://demo2.traccar.org/api/calendars/{id}

Demo Server 3

https://demo3.traccar.org/api/calendars/{id}

Demo Server 4

https://demo4.traccar.org/api/calendars/{id}

Subscription Server

https://server.traccar.org/api/calendars/{id}

Other Server

http://{host}:{port}/api/calendars/{id}

### Request samples

*   Payload

Content type

application/json

Copy

Expand all Collapse all

`{  *   "id": 0,      *   "name": "string",      *   "data": "string",      *   "attributes": { }       }`

### Response samples

*   200

Content type

application/json

Copy

Expand all Collapse all

`{  *   "id": 0,      *   "name": "string",      *   "data": "string",      *   "attributes": { }       }`

## [](#tag/Calendars/operation/deleteCalendarsId)Delete a Calendar

##### Authorizations:

_BasicAuth__ApiKey_

##### path Parameters

|     |     |
| --- | --- |
| id<br><br>required | integer |

### Responses

**204**

No Content

**401**

Unauthorized

delete/calendars/{id}

Demo Server 1

https://demo.traccar.org/api/calendars/{id}

Demo Server 2

https://demo2.traccar.org/api/calendars/{id}

Demo Server 3

https://demo3.traccar.org/api/calendars/{id}

Demo Server 4

https://demo4.traccar.org/api/calendars/{id}

Subscription Server

https://server.traccar.org/api/calendars/{id}

Other Server

http://{host}:{port}/api/calendars/{id}

## [](#tag/Statistics)Statistics

Retrieving server statistics

## [](#tag/Statistics/operation/getStatistics)Fetch Server Statistics

##### Authorizations:

_BasicAuth__ApiKey_

##### query Parameters

|     |     |
| --- | --- |
| from<br><br>required | string <date-time><br><br>in ISO 8601 format. eg. `1963-11-22T18:30:00Z` |
| to<br><br>required | string <date-time><br><br>in ISO 8601 format. eg. `1963-11-22T18:30:00Z` |

### Responses

**200**

OK

**401**

Unauthorized

get/statistics

Demo Server 1

https://demo.traccar.org/api/statistics

Demo Server 2

https://demo2.traccar.org/api/statistics

Demo Server 3

https://demo3.traccar.org/api/statistics

Demo Server 4

https://demo4.traccar.org/api/statistics

Subscription Server

https://server.traccar.org/api/statistics

Other Server

http://{host}:{port}/api/statistics

### Response samples

*   200

Content type

application/json

Copy

Expand all Collapse all

`[  *   {          *   "captureTime": "2019-08-24T14:15:22Z",              *   "activeUsers": 0,              *   "activeDevices": 0,              *   "requests": 0,              *   "messagesReceived": 0,              *   "messagesStored": 0                   }       ]`

## [](#tag/Health)Health

Checking server health status

## [](#tag/Health/operation/getHealth)Check server health

Return plain text status for basic uptime monitoring

### Responses

**200**

Service is healthy

**400**

Bad request

**500**

Service is unavailable

get/health

Demo Server 1

https://demo.traccar.org/api/health

Demo Server 2

https://demo2.traccar.org/api/health

Demo Server 3

https://demo3.traccar.org/api/health

Demo Server 4

https://demo4.traccar.org/api/health

Subscription Server

https://server.traccar.org/api/health

Other Server

http://{host}:{port}/api/health

### Response samples

*   200

Content type

text/plain

Copy

OK

## [](#tag/Orders)Orders

Order management

## [](#tag/Orders/operation/getOrders)Fetch a list of Orders

Without params, it returns a list of Orders the user has access to

##### Authorizations:

_BasicAuth__ApiKey_

##### query Parameters

|     |     |
| --- | --- |
| all | boolean<br><br>Can only be used by admins or managers to fetch all entities |
| userId | integer<br><br>Standard users can use this only with their own _userId_ |
| excludeAttributes | boolean<br><br>Skip returning the attributes map |
| limit | integer<br><br>Limit the number of returned results |
| offset | integer<br><br>Offset for pagination |
| keyword | string<br><br>Search keyword filter |

### Responses

**200**

OK

**401**

Unauthorized

get/orders

Demo Server 1

https://demo.traccar.org/api/orders

Demo Server 2

https://demo2.traccar.org/api/orders

Demo Server 3

https://demo3.traccar.org/api/orders

Demo Server 4

https://demo4.traccar.org/api/orders

Subscription Server

https://server.traccar.org/api/orders

Other Server

http://{host}:{port}/api/orders

### Response samples

*   200

Content type

application/json

Copy

Expand all Collapse all

`[  *   {          *   "id": 0,              *   "uniqueId": "string",              *   "description": "string",              *   "fromAddress": "string",              *   "toAddress": "string",              *   "attributes": { }                   }       ]`

## [](#tag/Orders/operation/postOrders)Create an Order

##### Authorizations:

_BasicAuth__ApiKey_

##### Request Body schema: application/json

required

|     |     |
| --- | --- |
| id  | integer <int64><br><br>Unique order identifier |
| uniqueId | string<br><br>External order identifier used by clients |
| description | string<br><br>Additional details about the order assignment |
| fromAddress | string<br><br>Pickup location address |
| toAddress | string<br><br>Destination address |
| attributes | object<br><br>Custom order attributes |

### Responses

**200**

OK

**400**

Bad request

**401**

Unauthorized

post/orders

Demo Server 1

https://demo.traccar.org/api/orders

Demo Server 2

https://demo2.traccar.org/api/orders

Demo Server 3

https://demo3.traccar.org/api/orders

Demo Server 4

https://demo4.traccar.org/api/orders

Subscription Server

https://server.traccar.org/api/orders

Other Server

http://{host}:{port}/api/orders

### Request samples

*   Payload

Content type

application/json

Copy

Expand all Collapse all

`{  *   "id": 0,      *   "uniqueId": "string",      *   "description": "string",      *   "fromAddress": "string",      *   "toAddress": "string",      *   "attributes": { }       }`

### Response samples

*   200

Content type

application/json

Copy

Expand all Collapse all

`{  *   "id": 0,      *   "uniqueId": "string",      *   "description": "string",      *   "fromAddress": "string",      *   "toAddress": "string",      *   "attributes": { }       }`

## [](#tag/Orders/operation/getOrdersId)Fetch an Order

##### Authorizations:

_BasicAuth__ApiKey_

##### path Parameters

|     |     |
| --- | --- |
| id<br><br>required | integer |

### Responses

**200**

OK

**401**

Unauthorized

**404**

Not found

get/orders/{id}

Demo Server 1

https://demo.traccar.org/api/orders/{id}

Demo Server 2

https://demo2.traccar.org/api/orders/{id}

Demo Server 3

https://demo3.traccar.org/api/orders/{id}

Demo Server 4

https://demo4.traccar.org/api/orders/{id}

Subscription Server

https://server.traccar.org/api/orders/{id}

Other Server

http://{host}:{port}/api/orders/{id}

### Response samples

*   200

Content type

application/json

Copy

Expand all Collapse all

`{  *   "id": 0,      *   "uniqueId": "string",      *   "description": "string",      *   "fromAddress": "string",      *   "toAddress": "string",      *   "attributes": { }       }`

## [](#tag/Orders/operation/putOrdersId)Update an Order

##### Authorizations:

_BasicAuth__ApiKey_

##### path Parameters

|     |     |
| --- | --- |
| id<br><br>required | integer |

##### Request Body schema: application/json

required

|     |     |
| --- | --- |
| id  | integer <int64><br><br>Unique order identifier |
| uniqueId | string<br><br>External order identifier used by clients |
| description | string<br><br>Additional details about the order assignment |
| fromAddress | string<br><br>Pickup location address |
| toAddress | string<br><br>Destination address |
| attributes | object<br><br>Custom order attributes |

### Responses

**200**

OK

**400**

Bad request

**401**

Unauthorized

put/orders/{id}

Demo Server 1

https://demo.traccar.org/api/orders/{id}

Demo Server 2

https://demo2.traccar.org/api/orders/{id}

Demo Server 3

https://demo3.traccar.org/api/orders/{id}

Demo Server 4

https://demo4.traccar.org/api/orders/{id}

Subscription Server

https://server.traccar.org/api/orders/{id}

Other Server

http://{host}:{port}/api/orders/{id}

### Request samples

*   Payload

Content type

application/json

Copy

Expand all Collapse all

`{  *   "id": 0,      *   "uniqueId": "string",      *   "description": "string",      *   "fromAddress": "string",      *   "toAddress": "string",      *   "attributes": { }       }`

### Response samples

*   200

Content type

application/json

Copy

Expand all Collapse all

`{  *   "id": 0,      *   "uniqueId": "string",      *   "description": "string",      *   "fromAddress": "string",      *   "toAddress": "string",      *   "attributes": { }       }`

## [](#tag/Orders/operation/deleteOrdersId)Delete an Order

##### Authorizations:

_BasicAuth__ApiKey_

##### path Parameters

|     |     |
| --- | --- |
| id<br><br>required | integer |

### Responses

**204**

No Content

**401**

Unauthorized

delete/orders/{id}

Demo Server 1

https://demo.traccar.org/api/orders/{id}

Demo Server 2

https://demo2.traccar.org/api/orders/{id}

Demo Server 3

https://demo3.traccar.org/api/orders/{id}

Demo Server 4

https://demo4.traccar.org/api/orders/{id}

Subscription Server

https://server.traccar.org/api/orders/{id}

Other Server

http://{host}:{port}/api/orders/{id}

## [](#tag/Audit)Audit

Audit log access

## [](#tag/Audit/operation/getAudit)Fetch audit log Actions

Admin only. Returns Actions performed in the given time window.

##### Authorizations:

_BasicAuth__ApiKey_

##### query Parameters

|     |     |
| --- | --- |
| from<br><br>required | string <date-time><br><br>in ISO 8601 format. eg. `1963-11-22T18:30:00Z` |
| to<br><br>required | string <date-time><br><br>in ISO 8601 format. eg. `1963-11-22T18:30:00Z` |

### Responses

**200**

OK

**401**

Unauthorized

get/audit

Demo Server 1

https://demo.traccar.org/api/audit

Demo Server 2

https://demo2.traccar.org/api/audit

Demo Server 3

https://demo3.traccar.org/api/audit

Demo Server 4

https://demo4.traccar.org/api/audit

Subscription Server

https://server.traccar.org/api/audit

Other Server

http://{host}:{port}/api/audit

### Response samples

*   200

Content type

application/json

Copy

Expand all Collapse all

`[  *   {          *   "id": 0,              *   "actionTime": "2019-08-24T14:15:22Z",              *   "address": "string",              *   "userId": 0,              *   "userEmail": "string",              *   "actionType": "string",              *   "objectType": "string",              *   "objectId": 0,              *   "attributes": { }                   }       ]`

## [](#tag/Password)Password

Password reset flow

## [](#tag/Password/operation/postPasswordReset)Send password reset email

Always responds with `200` regardless of whether the email matches a user.

##### Request Body schema: application/x-www-form-urlencoded

required

|     |     |
| --- | --- |
| email<br><br>required | string |

### Responses

**200**

OK

**400**

Bad request

post/password/reset

Demo Server 1

https://demo.traccar.org/api/password/reset

Demo Server 2

https://demo2.traccar.org/api/password/reset

Demo Server 3

https://demo3.traccar.org/api/password/reset

Demo Server 4

https://demo4.traccar.org/api/password/reset

Subscription Server

https://server.traccar.org/api/password/reset

Other Server

http://{host}:{port}/api/password/reset

## [](#tag/Password/operation/postPasswordUpdate)Set a new password using a reset token

##### Request Body schema: application/x-www-form-urlencoded

required

|     |     |
| --- | --- |
| token<br><br>required | string |
| password<br><br>required | string <password> |

### Responses

**200**

OK

**404**

User not found

post/password/update

Demo Server 1

https://demo.traccar.org/api/password/update

Demo Server 2

https://demo2.traccar.org/api/password/update

Demo Server 3

https://demo3.traccar.org/api/password/update

Demo Server 4

https://demo4.traccar.org/api/password/update

Subscription Server

https://server.traccar.org/api/password/update

Other Server

http://{host}:{port}/api/password/update

## [](#tag/Stream)Stream

Live video streaming

## [](#tag/Stream/operation/getStreamDeviceIdChannelLiveM3u8)Fetch the HLS playlist for a Device camera channel

##### Authorizations:

_BasicAuth__ApiKey_

##### path Parameters

|     |     |
| --- | --- |
| deviceId<br><br>required | integer |
| channel<br><br>required | integer |

### Responses

**200**

OK

**401**

Unauthorized

get/stream/{deviceId}/{channel}/live.m3u8

Demo Server 1

https://demo.traccar.org/api/stream/{deviceId}/{channel}/live.m3u8

Demo Server 2

https://demo2.traccar.org/api/stream/{deviceId}/{channel}/live.m3u8

Demo Server 3

https://demo3.traccar.org/api/stream/{deviceId}/{channel}/live.m3u8

Demo Server 4

https://demo4.traccar.org/api/stream/{deviceId}/{channel}/live.m3u8

Subscription Server

https://server.traccar.org/api/stream/{deviceId}/{channel}/live.m3u8

Other Server

http://{host}:{port}/api/stream/{deviceId}/{channel}/live.m3u8

## [](#tag/Stream/operation/getStreamDeviceIdChannelIndexTs)Fetch an HLS video segment for a Device camera channel

##### Authorizations:

_BasicAuth__ApiKey_

##### path Parameters

|     |     |
| --- | --- |
| deviceId<br><br>required | integer |
| channel<br><br>required | integer |
| index<br><br>required | integer |

### Responses

**200**

OK

**401**

Unauthorized

get/stream/{deviceId}/{channel}/{index}.ts

Demo Server 1

https://demo.traccar.org/api/stream/{deviceId}/{channel}/{index}.ts

Demo Server 2

https://demo2.traccar.org/api/stream/{deviceId}/{channel}/{index}.ts

Demo Server 3

https://demo3.traccar.org/api/stream/{deviceId}/{channel}/{index}.ts

Demo Server 4

https://demo4.traccar.org/api/stream/{deviceId}/{channel}/{index}.ts

Subscription Server

https://server.traccar.org/api/stream/{deviceId}/{channel}/{index}.ts

Other Server

http://{host}:{port}/api/stream/{deviceId}/{channel}/{index}.ts