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
  $TMObj->DateTimeFromString("2 months later");     // all available datetime strings
  
  // returns
  TimeMachine object
```

### Interval()
```php
  // structure
  public Interval(string $INTERVAL [,string $DATETIME = "now"])
  
  // example
  $TMObj = new TimeMachine(Zone::DHAKA);            // instantiating "now" time in DHAKA Time Zone
  $TMObj->Interval(Interval::MIN_5);                //  current $TMObj is +5 min of "now" time
  $TMObj->Interval(Interval::HOUR_6, "09:56 PM");   //  current $TMObj is +6 hours of 9:56PM in DHAKA TimeZone

  // returns 
  TimeMachine object
```

### GetDifference()
```php
  // structure
  public static GetDifference(TimeMachine $DT1, TimeMachine $DT2, Difference::RESULT_TYPE [,bool $absolute = false])
  
  // example
  $now = new TimeMachine(Zone::DHAKA);                //  Generatig DateTime 1
  $then = new TimeMachine(Zone::DHAKA);
  $then->Interval(Interval::MIN_5,"10:06 AM");        //  Generating DateTime 2
  $difference = TimeMachine::GetDifference($now,$then,Difference::ASSOC);
                                                      //  Getting their differences as ASSOCIATIVE array
  // returns 
  Difference::ASSOC =>  array()
  Difference::OBJ   =>  TimeMachine object
```

### GetPeriod()
```php
  // structure
  public static GetPeriod(TimeMachine $Start, TimeMachine $End, string $PERIOD [,string $format = 'r'])
  
  // example
  $start = new TimeMachine(Zone::DHAKA);              //  Generatig DateTime 1
  $end = new TimeMachine(Zone::DHAKA);
  $end->DateTimeFromString("2019-12-07 13:56");       //  Generating DateTime 2
  $period = TimeMachine::GetPeriod($start,$end,Period::A_MON,Format::DATE_MYSQL);
                                                      //  Getting array of periodic time
  // returns 
  array()
```

### Show()
```php
  // structure
  public Show([string $format = 'r'])
  
  // example
  $TMObj = new TimeMachine(Zone::DHAKA);                //  Generatig DateTime
  echo $TMObj->Show();                                  //  Prints DATETIME 
  echo $TMObj->Show(Format::DATE_MYSQL);                //  Prints DATETIME in Mysql DATE format
  echo $TMObj->Show(Format::BLOG);                      //  Prints like Sunday, July 21st, 2019 12:16 PM
  echo $TMObj->Interval(Interval::HOUR_1)->Show()       //  Chaining 
  // returns 
  string
```

### Get()
```php
  // structure
  public Get(Time::TIME_VARIABLE)
  
  // example
  $TMObj = new TimeMachine(Zone::DHAKA);                //  Generatig DateTime
  $TMObj->Get(Time::NOW);                               //  Get NOW
  $TMObj->Get(Time::NEXTWEEK);                          //  Get ... ...
  $TMObj->Get(Time::PREVMONTH);                         //  Get ... ... 
  echo $TMObj->Get(Time::T_30MIN)->Show();                
  // returns 
  TimeMachine Object
```