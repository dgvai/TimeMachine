# TimeMachine
TimeMachine, extenstion of PHP DateTime
>Version 1.0

## Documentation
Here is a short documentation on this class, here you will find the `public methods` and `enumerators` of *TimeMachine*. 
More detailed examples are given in the *examples* directory.

## Getting Started
You just have to **include or clone** this class file to you workspace! That's all!

## Public Methods
### *__construct()*
```php
  // structure
  public __construct([string $timezone = null, string $timestamp = null])
  
  // example
  $TMObj = new TimeMachine();                       // instantiating "now" time in default Time Zone
  $TMObj = new TimeMachine(Zone::DHAKA);            // instantiating "now" time in ASIA/DHAKA Time Zone
  $TMObj = new TimeMachine(Zone::DHAKA,1957333457); // instantiating time from UNIX TIMESTAMP in DHAKA Time Zone
  
  // returns
  TimeMachine object
```

### GetTimeZones()
```php
  // structure
  public static  GetTimeZones()
  
  // example
  $TimeZoneArray = TimeMachine::GetTimeZones();
  
  // returns
  array()
```

### SetTimeZone()
```php
  // structure
  public SetTimeZone(string $ZONE)
  
  // example
  $TMObj = new TimeMachine();                       // instantiating "now" time in default Time Zone
  $TMObj->SetTimeZone(Zone::DHAKA);                 // setting Time Zone to DHAKA
  
  // returns
  TimeMachine object
```

### SetTimeStamp()
```php
  // structure
  public SetTimeStamp(int $TIMESTAMP)
  
  // example
  $TMObj = new TimeMachine();                       // instantiating "now" time in default Time Zone
  $TMObj->SetTimeStamp(1984735338);                 // changing time to the UNIX TimeStamp
  
  // returns
  TimeMachine object
```

### DateTimeFromString()
```php
  // structure
  public DateTimeFromString(string $DATETIME_STRING)
  
  // example
  $TMObj = new TimeMachine(Zone::DHAKA);            // instantiating "now" time in DHAKA Time Zone
  $TMObj->DateTimeFromString("18-09-2019");
  $TMObj->DateTimeFromString("2019/09/18");
  $TMObj->DateTimeFromString("1st sunday of March 2019");
  $TMObj->DateTimeFromString("Last friday of last week of April 2019");
  $TMObj->DateTimeFromString("next week");
  $TMObj->DateTimeFromString("2 months later");
  
  // returns
  TimeMachine object
```
