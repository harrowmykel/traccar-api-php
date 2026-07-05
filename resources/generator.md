Perfect! Now that I have the actual API documentation HTML, I can create a comprehensive documentation structure for the PHP Composer plugin based on the actual Traccar API endpoints. Here's the complete documentation blueprint:

---

# Traccar API PHP Client - Complete Documentation

## Overview
A PHP Composer package providing a fluent, object-oriented interface to interact with the Traccar GPS tracking platform API (version 6.14.5). Supports multiple authentication methods and provides a chainable query builder for flexible API calls.

## Architecture

### Core Components
1. **TraccarAPI** - Main entry point, handles authentication and provides access to resource managers
2. **Resource Managers** - Each responsible for a specific API resource (Devices, Positions, Events, Reports, etc.)
3. **QueryBuilder** - Chainable query parameter builder for list/filter operations
4. **Models** - Data transfer objects representing API resources

### Authentication Methods
- **Email/Password**: Standard authentication using credentials (POST `/api/session`)
- **Token**: Using a pre-authenticated token from an existing session
- **None**: For public endpoints like health checks

## Class Details

### TraccarAPI
#### Properties
- `string $email` - Email for authentication
- `string $password` - Password for authentication
- `string $authToken` - Authentication token (Bearer token)
- `string $auth_method` - One of: 'email', 'token', 'none'
- `string $baseUrl` - Traccar server URL (default: 'https://demo.traccar.org/api')
- `array $headers` - HTTP headers for API requests
- `ClientInterface $httpClient` - PSR-18 HTTP client instance

#### Static Constructors
- **`public static function withAuthorizationToken(string $token): self`** - Creates instance using token authentication
- **`public static function withEmailPassword(string $email, string $password): self`** - Creates instance using email/password
- **`public static function noAuth(): self`** - Creates instance without authentication

#### Constructor
- **`public function __construct(array $config = [])`** - Private constructor, uses static methods

#### Resource Accessors
- **`public function server(): Server`** - Server information and operations
- **`public function session(): Session`** - Session management
- **`public function devices(): Devices`** - Device management
- **`public function groups(): Groups`** - Group management
- **`public function share(): Share`** - Device/Group sharing
- **`public function users(): Users`** - User management
- **`public function permissions(): Permissions`** - Permission links
- **`public function positions(): Positions`** - Position data
- **`public function events(): Events`** - Event data
- **`public function reports(): Reports`** - Report generation
- **`public function notifications(): Notifications`** - Notification management
- **`public function geofences(): Geofences`** - Geofence management
- **`public function commands(): Commands`** - Command management
- **`public function attributes(): Attributes`** - Computed attributes
- **`public function drivers(): Drivers`** - Driver management
- **`public function maintenance(): Maintenance`** - Maintenance tasks
- **`public function calendars(): Calendars`** - Calendar management
- **`public function statistics(): Statistics`** - Server statistics
- **`public function health(): Health`** - Health checks
- **`public function orders(): Orders`** - Order management
- **`public function audit(): Audit`** - Audit log
- **`public function password(): Password`** - Password operations

#### Public Methods
- **`public function setBaseUrl(string $url): self`** - Configure Traccar server URL
- **`public function setHttpClient(ClientInterface $client): self`** - Inject custom HTTP client
- **`public function getAuthToken(): ?string`** - Returns current auth token
- **`public function authenticate(): bool`** - Perform authentication and obtain token

### Resource Manager Base Pattern
Each resource manager class follows this pattern:

#### Properties
- `TraccarAPI $api` - Reference to the main API instance
- `string $resourcePath` - API endpoint path

#### Constructor
- **`public function __construct(TraccarAPI $api)`**

#### Common Methods
- **`public function create(array $data): ModelInterface`** - Create a new resource (POST)
- **`public function get(int $id): ?ModelInterface`** - Get single resource by ID
- **`public function getList(QueryBuilder $query = null): array`** - Get multiple resources (GET)
- **`public function update(int $id, array $data): ModelInterface`** - Update a resource (PUT)
- **`public function delete(int $id): bool`** - Delete a resource (DELETE)
- **`public function query(): QueryBuilder`** - Create a new query builder

### QueryBuilder
A fluent, chainable query parameter builder for filtering and pagination.

#### Methods (Chainable)
- **`public function id(int $id): self`** - Filter by ID
- **`public function ids(array $ids): self`** - Filter by multiple IDs
- **`public function all(bool $all = true): self`** - Fetch all entities (admin/manager only)
- **`public function userId(int $userId): self`** - Filter by user ID
- **`public function deviceId(int $deviceId): self`** - Filter by device ID
- **`public function groupId(int $groupId): self`** - Filter by group ID
- **`public function uniqueId(string $uniqueId): self`** - Filter by unique ID
- **`public function excludeAttributes(bool $exclude = true): self`** - Exclude attributes field
- **`public function keyword(string $keyword): self`** - Search keyword filter
- **`public function from(DateTime $dateTime): self`** - Filter from date
- **`public function to(DateTime $dateTime): self`** - Filter to date
- **`public function refresh(bool $refresh = true): self`** - Refresh cache
- **`public function limit(int $limit): self`** - Set result limit
- **`public function offset(int $offset): self`** - Set result offset
- **`public function textChannel(bool $textChannel = true): self`** - Use SMS channel for commands
- **`public function daily(bool $daily = true): self`** - Daily aggregation for reports
- **`public function toArray(): array`** - Get final query array

### Models (Data Transfer Objects)

#### ServerItem
- `int $id` - Unique server configuration identifier
- `bool $registration` - Whether new user registrations are allowed
- `bool $readonly` - Whether only administrators can modify server settings
- `bool $deviceReadonly` - Disallow device attribute changes for non-admins
- `bool $limitCommands` - Restrict command execution
- `string $map` - Default map layer identifier
- `string $bingKey` - Bing Maps API key
- `string $mapUrl` - Custom tile server URL
- `string $poiLayer` - Point-of-interest layer
- `string $announcement` - Announcement message
- `float $latitude` - Default map center latitude
- `float $longitude` - Default map center longitude
- `int $zoom` - Default map zoom level
- `string $version` - Server version
- `bool $forceSettings` - Force server-wide settings
- `string $coordinateFormat` - Default coordinate format
- `bool $openIdEnabled` - OpenID authentication available
- `bool $openIdForce` - Require OpenID authentication
- `array $attributes` - Additional server configuration

#### SessionItem (User)
- `int $id` - Unique user identifier
- `string $name` - User display name
- `string $email` - Email address
- `string $phone` - Phone number
- `bool $readonly` - Read-only mode
- `bool $administrator` - Administrator privileges
- `string $map` - Preferred map layer
- `float $latitude` - Map center latitude
- `float $longitude` - Map center longitude
- `int $zoom` - Map zoom level
- `string $password` - Password
- `string $coordinateFormat` - Coordinate display format
- `bool $disabled` - Account disabled
- `DateTime $expirationTime` - Account expiration
- `int $deviceLimit` - Maximum devices
- `int $userLimit` - Maximum subordinate users
- `bool $deviceReadonly` - Device attribute restriction
- `bool $limitCommands` - Command restriction
- `bool $fixedEmail` - Email locked
- `string $poiLayer` - POI layer
- `array $attributes` - Custom user attributes

#### DeviceItem
- `int $id` - Unique device identifier
- `string $name` - Device label
- `string $uniqueId` - Hardware/protocol unique identifier
- `string $status` - Connection status (online/offline/unknown)
- `bool $disabled` - Device disabled
- `DateTime $lastUpdate` - Last update time
- `int $positionId` - Last known position ID
- `int $groupId` - Parent group ID
- `string $phone` - Contact phone number
- `string $model` - Device model
- `string $contact` - Contact information
- `string $category` - Device category
- `array $attributes` - Custom device attributes

#### PositionItem
- `int $id` - Position identifier
- `int $deviceId` - Device identifier
- `string $protocol` - Protocol used
- `DateTime $deviceTime` - Device reported time
- `DateTime $fixTime` - GPS fix time
- `DateTime $serverTime` - Server received time
- `bool $valid` - Position validity
- `float $latitude` - Latitude
- `float $longitude` - Longitude
- `float $altitude` - Altitude
- `float $speed` - Speed
- `float $course` - Course/direction
- `string $address` - Reverse geocoded address
- `float $accuracy` - GPS accuracy
- `array $network` - Network information
- `array $geofenceIds` - Active geofence IDs
- `array $attributes` - Custom position attributes

#### EventItem
- `int $id` - Event identifier
- `string $type` - Event type
- `DateTime $eventTime` - Event time
- `int $deviceId` - Device identifier
- `int $positionId` - Position identifier
- `int $geofenceId` - Geofence identifier
- `int $maintenanceId` - Maintenance identifier
- `array $attributes` - Event attributes

#### GroupItem
- `int $id` - Group identifier
- `string $name` - Group name
- `int $groupId` - Parent group ID
- `array $attributes` - Group attributes

#### GeofenceItem
- `int $id` - Geofence identifier
- `string $name` - Geofence name
- `string $description` - Geofence description
- `string $area` - WKT area definition
- `int $calendarId` - Calendar identifier
- `array $attributes` - Geofence attributes

#### CommandItem
- `int $id` - Command identifier
- `int $deviceId` - Device identifier
- `string $description` - Command description
- `string $type` - Command type
- `bool $textChannel` - Use SMS channel
- `array $attributes` - Command parameters

#### NotificationItem
- `int $id` - Notification identifier
- `string $type` - Notification type
- `string $description` - Notification description
- `bool $always` - Always trigger
- `int $commandId` - Associated command ID
- `string $notificators` - Delivery channels
- `int $calendarId` - Calendar identifier
- `array $attributes` - Notification attributes

#### Report Models
- **ReportCombined**: Contains `deviceId`, `route` (array), `events` (array), `positions` (array)
- **ReportSummary**: Contains `deviceId`, `deviceName`, `maxSpeed`, `averageSpeed`, `distance`, `spentFuel`, `engineHours`
- **ReportTrip**: Contains `deviceId`, `deviceName`, `maxSpeed`, `averageSpeed`, `distance`, `spentFuel`, `duration`, `startTime`, `startAddress`, `startLat`, `startLon`, `endTime`, `endAddress`, `endLat`, `endLon`, `driverUniqueId`, `driverName`
- **ReportStop**: Contains `deviceId`, `deviceName`, `duration`, `startTime`, `address`, `lat`, `lon`, `endTime`, `spentFuel`, `engineHours`
- **ReportGeofence**: Contains `deviceId`, `deviceName`, `geofenceId`, `startTime`, `endTime`

### Exceptions
- **`TraccarAuthException`** - Authentication failures (401)
- **`TraccarApiException`** - API request failures (4xx, 5xx)
- **`TraccarValidationException`** - Invalid input data (400)
- **`TraccarNotFoundException`** - Resource not found (404)
- **`TraccarPermissionException`** - Permission denied (403)

## Complete API Endpoints Mapping

### Server Resource
| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/server` | Fetch server information |
| PUT | `/server` | Update server information |
| GET | `/server/geocode` | Reverse geocode coordinates |
| GET | `/server/timezones` | Fetch available timezones |
| POST | `/server/file/{path}` | Upload a server file |
| GET | `/server/gc` | Trigger garbage collection |
| GET | `/server/cache` | Fetch cache diagnostics |
| POST | `/server/reboot` | Reboot the server process |

### Session Resource
| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/session` | Fetch session information |
| POST | `/session` | Create a new session |
| DELETE | `/session` | Close the session |
| GET | `/session/{id}` | Open session as another user |
| POST | `/session/token` | Generate session token |
| POST | `/session/token/revoke` | Revoke session token |
| GET | `/session/openid/auth` | Begin OpenID authentication |
| GET | `/session/openid/callback` | OpenID callback |

### Devices Resource
| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/devices` | Fetch devices list |
| POST | `/devices` | Create a device |
| GET | `/devices/{id}` | Fetch a device |
| PUT | `/devices/{id}` | Update a device |
| DELETE | `/devices/{id}` | Delete a device |
| PUT | `/devices/{id}/accumulators` | Update device accumulators |
| POST | `/devices/{id}/image` | Upload/update device image |

### Groups Resource
| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/groups` | Fetch groups list |
| POST | `/groups` | Create a group |
| GET | `/groups/{id}` | Fetch a group |
| PUT | `/groups/{id}` | Update a group |
| DELETE | `/groups/{id}` | Delete a group |

### Share Resource
| Method | Endpoint | Description |
|--------|----------|-------------|
| POST | `/share/device` | Share device location |
| POST | `/share/group` | Share group devices |

### Users Resource
| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/users` | Fetch users list |
| POST | `/users` | Create a user |
| POST | `/users/totp` | Generate TOTP secret |
| GET | `/users/{id}` | Fetch a user |
| PUT | `/users/{id}` | Update a user |
| DELETE | `/users/{id}` | Delete a user |

### Permissions Resource
| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/permissions` | Fetch permission links |
| POST | `/permissions` | Link objects |
| DELETE | `/permissions` | Unlink objects |
| POST | `/permissions/bulk` | Link multiple objects |
| DELETE | `/permissions/bulk` | Unlink multiple objects |

### Positions Resource
| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/positions` | Fetch positions list |
| DELETE | `/positions` | Delete positions by device/time |
| DELETE | `/positions/{id}` | Delete a position |
| GET | `/positions/kml` | Export positions as KML |
| GET | `/positions/csv` | Export positions as CSV |
| GET | `/positions/gpx` | Export positions as GPX |

### Events Resource
| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/events/{id}` | Fetch an event |

### Reports Resource
| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/reports/combined` | Combined route/events/positions report |
| GET | `/reports/route` | Route (positions) report |
| GET | `/reports/route/{type}` | Download route report |
| GET | `/reports/events` | Events report |
| GET | `/reports/events/{type}` | Download events report |
| GET | `/reports/geofences` | Geofence enter/exit report |
| GET | `/reports/summary` | Summary report |
| GET | `/reports/summary/{type}` | Download summary report |
| GET | `/reports/trips` | Trips report |
| GET | `/reports/trips/{type}` | Download trips report |
| GET | `/reports/stops` | Stops report |
| GET | `/reports/stops/{type}` | Download stops report |
| GET | `/reports/devices/{type}` | Download devices report |

### Notifications Resource
| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/notifications` | Fetch notifications list |
| POST | `/notifications` | Create a notification |
| GET | `/notifications/{id}` | Fetch a notification |
| PUT | `/notifications/{id}` | Update a notification |
| DELETE | `/notifications/{id}` | Delete a notification |
| GET | `/notifications/types` | Fetch notification types |
| GET | `/notifications/notificators` | Fetch notificators |
| POST | `/notifications/test` | Send test notification |
| POST | `/notifications/test/{notificator}` | Send test by notificator |
| POST | `/notifications/send/{notificator}` | Send custom notification |

### Geofences Resource
| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/geofences` | Fetch geofences list |
| POST | `/geofences` | Create a geofence |
| GET | `/geofences/{id}` | Fetch a geofence |
| PUT | `/geofences/{id}` | Update a geofence |
| DELETE | `/geofences/{id}` | Delete a geofence |

### Commands Resource
| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/commands` | Fetch saved commands list |
| POST | `/commands` | Create a saved command |
| GET | `/commands/{id}` | Fetch a saved command |
| PUT | `/commands/{id}` | Update a saved command |
| DELETE | `/commands/{id}` | Delete a saved command |
| GET | `/commands/send` | Fetch supported commands for device |
| POST | `/commands/send` | Dispatch command to device |
| GET | `/commands/types` | Fetch available command types |

### Attributes Resource (Computed)
| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/attributes/computed` | Fetch computed attributes |
| POST | `/attributes/computed` | Create a computed attribute |
| POST | `/attributes/computed/test` | Test a computed attribute |
| GET | `/attributes/computed/{id}` | Fetch a computed attribute |
| PUT | `/attributes/computed/{id}` | Update a computed attribute |
| DELETE | `/attributes/computed/{id}` | Delete a computed attribute |

### Drivers Resource
| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/drivers` | Fetch drivers list |
| POST | `/drivers` | Create a driver |
| GET | `/drivers/{id}` | Fetch a driver |
| PUT | `/drivers/{id}` | Update a driver |
| DELETE | `/drivers/{id}` | Delete a driver |

### Maintenance Resource
| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/maintenance` | Fetch maintenance tasks |
| POST | `/maintenance` | Create a maintenance task |
| GET | `/maintenance/{id}` | Fetch a maintenance task |
| PUT | `/maintenance/{id}` | Update a maintenance task |
| DELETE | `/maintenance/{id}` | Delete a maintenance task |

### Calendars Resource
| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/calendars` | Fetch calendars list |
| POST | `/calendars` | Create a calendar |
| GET | `/calendars/{id}` | Fetch a calendar |
| PUT | `/calendars/{id}` | Update a calendar |
| DELETE | `/calendars/{id}` | Delete a calendar |

### Statistics Resource
| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/statistics` | Fetch server statistics |

### Health Resource
| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/health` | Check server health |

### Orders Resource
| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/orders` | Fetch orders list |
| POST | `/orders` | Create an order |
| GET | `/orders/{id}` | Fetch an order |
| PUT | `/orders/{id}` | Update an order |
| DELETE | `/orders/{id}` | Delete an order |

### Audit Resource
| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/audit` | Fetch audit log |

### Password Resource
| Method | Endpoint | Description |
|--------|----------|-------------|
| POST | `/password/reset` | Send password reset email |
| POST | `/password/update` | Set new password using token |

### Stream Resource
| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/stream/{deviceId}/{channel}/live.m3u8` | Fetch HLS playlist |
| GET | `/stream/{deviceId}/{channel}/{index}.ts` | Fetch HLS segment |

## Usage Examples

### Basic Usage with Token
```php
$api = TraccarAPI::withAuthorizationToken('your-auth-token');
$api->setBaseUrl('https://your-traccar-server.com/api');
```

### Email/Password Authentication
```php
$api = TraccarAPI::withEmailPassword('user@example.com', 'password');
$api->setBaseUrl('https://your-traccar-server.com/api');
```

### No Authentication (Health Check)
```php
$api = TraccarAPI::noAuth();
$health = $api->health()->check(); // GET /health
```

### Server Operations
```php
// Get server information
$server = $api->server()->get();

// Update server settings
$updated = $api->server()->update([
    'registration' => true,
    'announcement' => 'New announcement'
]);

// Reverse geocode
$address = $api->server()->geocode(48.8584, 2.2945);

// Get timezones
$timezones = $api->server()->timezones();
```

### Session Management
```php
// Login via email/password
$api = TraccarAPI::withEmailPassword('user@example.com', 'password');
$session = $api->session()->get();

// Generate token
$token = $api->session()->generateToken(['expiration' => '2024-12-31T23:59:59Z']);

// Logout
$api->session()->delete();
```

### Device Management
```php
// Get all devices
$devices = $api->devices()->getList();

// Get devices with pagination and search
$devices = $api->devices()->getList(
    $api->devices()->query()
        ->limit(10)
        ->offset(20)
        ->keyword('truck')
);

// Get specific device
$device = $api->devices()->get(123);

// Create device
$device = $api->devices()->create([
    'name' => 'My New Device',
    'uniqueId' => 'ABC123XYZ',
    'phone' => '+1234567890',
    'model' => 'GT06',
    'category' => 'vehicle'
]);

// Update device
$updated = $api->devices()->update(123, [
    'name' => 'Updated Device Name',
    'disabled' => false
]);

// Delete device
$api->devices()->delete(123);

// Upload device image
$api->devices()->uploadImage(123, '/path/to/image.png');

// Update accumulators
$api->devices()->updateAccumulators(123, [
    'totalDistance' => 1500.5,
    'hours' => 245.3
]);
```

### Group Management
```php
// Get groups
$groups = $api->groups()->getList(
    $api->groups()->query()->keyword('fleet')
);

// Create group
$group = $api->groups()->create([
    'name' => 'Fleet A',
    'groupId' => 1 // parent group
]);

// Update group
$api->groups()->update(5, ['name' => 'Fleet B']);
```

### User Management
```php
// Get users
$users = $api->users()->getList(
    $api->users()->query()->keyword('john')
);

// Create user
$user = $api->users()->create([
    'name' => 'John Doe',
    'email' => 'john@example.com',
    'password' => 'securepassword',
    'administrator' => false
]);

// Update user
$api->users()->update(10, [
    'name' => 'John Smith',
    'deviceLimit' => 50
]);
```

### Permissions Management
```php
// Link user to device
$api->permissions()->link([
    'userId' => 1,
    'deviceId' => 123
]);

// Unlink user from device
$api->permissions()->unlink([
    'userId' => 1,
    'deviceId' => 123
]);

// Bulk link
$api->permissions()->bulkLink([
    ['userId' => 1, 'deviceId' => 123],
    ['userId' => 1, 'deviceId' => 124]
]);

// Get permission links
$links = $api->permissions()->getList(
    $api->permissions()->query()
        ->userId(1)
        ->deviceId(123)
);
```

### Position Data
```php
// Get last known positions for all devices
$positions = $api->positions()->getList();

// Get positions for a device within date range
$positions = $api->positions()->getList(
    $api->positions()->query()
        ->deviceId(123)
        ->from(new DateTime('-1 week'))
        ->to(new DateTime('now'))
);

// Get specific position
$position = $api->positions()->get(456);

// Delete positions for a device in a time span
$api->positions()->deleteByDeviceAndTime(123, 
    new DateTime('-1 week'),
    new DateTime('now')
);

// Export positions as KML
$kml = $api->positions()->exportKml(123, 
    new DateTime('-1 week'),
    new DateTime('now')
);

// Export positions as CSV
$csv = $api->positions()->exportCsv(123, 
    new DateTime('-1 week'),
    new DateTime('now')
);
```

### Events
```php
// Get an event
$event = $api->events()->get(789);
```

### Reports
```php
// Combined report
$report = $api->reports()->combined(
    deviceIds: [123, 124],
    from: new DateTime('-1 week'),
    to: new DateTime('now')
);

// Summary report
$summary = $api->reports()->summary(
    deviceIds: [123],
    from: new DateTime('-1 month'),
    to: new DateTime('now')
);

// Download report as XLSX
$api->reports()->downloadSummary(
    deviceIds: [123],
    from: new DateTime('-1 month'),
    to: new DateTime('now'),
    format: 'xlsx'
);

// Send report by email
$api->reports()->emailSummary(
    deviceIds: [123],
    from: new DateTime('-1 month'),
    to: new DateTime('now')
);

// Trips report
$trips = $api->reports()->trips(
    deviceIds: [123],
    from: new DateTime('-1 week'),
    to: new DateTime('now')
);

// Stops report
$stops = $api->reports()->stops(
    deviceIds: [123],
    from: new DateTime('-1 week'),
    to: new DateTime('now')
);

// Geofence report
$geofenceIntervals = $api->reports()->geofences(
    deviceIds: [123],
    geofenceIds: [5, 6],
    from: new DateTime('-1 week'),
    to: new DateTime('now')
);
```

### Notification Management
```php
// Get notifications
$notifications = $api->notifications()->getList();

// Create notification
$notification = $api->notifications()->create([
    'type' => 'geofenceEnter',
    'description' => 'Vehicle entering geofence',
    'notificators' => 'web,mail',
    'always' => true
]);

// Link notification to device
$api->permissions()->link([
    'notificationId' => 5,
    'deviceId' => 123
]);

// Send test notification
$api->notifications()->sendTest();

// Send custom notification
$api->notifications()->sendCustom(
    notificator: 'mail',
    users: [1, 2, 3],
    data: [
        'subject' => 'Alert',
        'body' => 'Custom notification message',
        'priority' => true
    ]
);
```

### Geofence Management
```php
// Create geofence
$geofence = $api->geofences()->create([
    'name' => 'Warehouse',
    'area' => 'POLYGON((...))',
    'calendarId' => 10
]);

// Get geofences
$geofences = $api->geofences()->getList(
    $api->geofences()->query()->deviceId(123)
);

// Update geofence
$api->geofences()->update(5, ['name' => 'Main Warehouse']);
```

### Command Management
```php
// Create saved command
$command = $api->commands()->create([
    'type' => 'custom',
    'description' => 'Send message',
    'deviceId' => 123,
    'attributes' => ['text' => 'Hello device']
]);

// Send command to device
$api->commands()->send([
    'deviceId' => 123,
    'type' => 'positionSingle'
]);

// Send saved command
$api->commands()->send([
    'id' => 5, // saved command ID
    'deviceId' => 123
]);

// Get supported commands for device
$commands = $api->commands()->supported(123);

// Get available command types
$types = $api->commands()->types();
```

### Computed Attributes
```php
// Create computed attribute
$attribute = $api->attributes()->create([
    'description' => 'Fuel level',
    'attribute' => 'fuel',
    'expression' => 'fuelLevel * 100',
    'type' => 'Number'
]);

// Test computed attribute
$result = $api->attributes()->test(123, [
    'attribute' => 'fuel',
    'expression' => 'fuelLevel * 100',
    'type' => 'Number'
]);

// Get computed attributes
$attributes = $api->attributes()->getList(
    $api->attributes()->query()->deviceId(123)
);
```

### Driver Management
```php
// Create driver
$driver = $api->drivers()->create([
    'name' => 'Jane Smith',
    'uniqueId' => 'DRV001'
]);

// Link driver to device
$api->permissions()->link([
    'driverId' => 5,
    'deviceId' => 123
]);

// Get drivers
$drivers = $api->drivers()->getList();
```

### Maintenance Management
```php
// Create maintenance task
$maintenance = $api->maintenance()->create([
    'name' => 'Oil Change',
    'type' => 'totalDistance',
    'start' => 15000,
    'period' => 5000
]);

// Get maintenance tasks
$tasks = $api->maintenance()->getList(
    $api->maintenance()->query()->deviceId(123)
);
```

### Calendar Management
```php
// Create calendar
$calendar = $api->calendars()->create([
    'name' => 'Business Hours',
    'data' => base64_encode($icalData)
]);

// Get calendars
$calendars = $api->calendars()->getList();
```

### Statistics
```php
// Get server statistics
$stats = $api->statistics()->get(
    from: new DateTime('-1 day'),
    to: new DateTime('now')
);
```

### Health Check
```php
// Check server health
$status = $api->health()->check(); // Returns 'OK' or throws exception
```

### Order Management
```php
// Create order
$order = $api->orders()->create([
    'uniqueId' => 'ORD-001',
    'description' => 'Delivery to customer',
    'fromAddress' => '123 Main St',
    'toAddress' => '456 Oak Ave'
]);

// Get orders
$orders = $api->orders()->getList(
    $api->orders()->query()->keyword('delivery')
);
```

### Audit Log
```php
// Get audit log (admin only)
$audit = $api->audit()->get(
    from: new DateTime('-1 week'),
    to: new DateTime('now')
);
```

### Password Operations
```php
// Request password reset
$api->password()->reset('user@example.com');

// Update password with token
$api->password()->update('reset-token-here', 'new-password');
```

### Query Builder Advanced Usage
```php
// Complex query with multiple filters
$query = $api->devices()->query()
    ->userId(1)
    ->groupId(5)
    ->keyword('truck')
    ->limit(20)
    ->offset(10);

$devices = $api->devices()->getList($query);

// Device-specific query for positions
$positionQuery = $api->positions()->query()
    ->deviceId(123)
    ->from(new DateTime('2024-01-01'))
    ->to(new DateTime('2024-01-31'))
    ->limit(1000);

$positions = $api->positions()->getList($positionQuery);

// Report query with multiple groups
$reportQuery = $api->reports()->query()
    ->deviceId(123)
    ->deviceId(124) // multiple devices
    ->groupId(5)
    ->groupId(6); // multiple groups
```

## Query Parameters Reference

### Common Parameters (Available on most GET endpoints)
| Parameter | Type | Description |
|-----------|------|-------------|
| `all` | boolean | Fetch all entities (admin/manager only) |
| `userId` | integer | Filter by user ID |
| `deviceId` | integer | Filter by device ID |
| `groupId` | integer | Filter by group ID |
| `id` | integer | Filter by entity ID |
| `limit` | integer | Limit results |
| `offset` | integer | Pagination offset |
| `keyword` | string | Search keyword filter |
| `refresh` | boolean | Refresh cache |

### Position-specific Parameters
| Parameter | Type | Description |
|-----------|------|-------------|
| `deviceId` | integer | Device ID (requires from/to) |
| `from` | datetime | Start time (ISO 8601) |
| `to` | datetime | End time (ISO 8601) |

### Report-specific Parameters
| Parameter | Type | Description |
|-----------|------|-------------|
| `deviceId` | integer[] |