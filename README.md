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

### CheckLimit()
```php
  // structure
  public static CheckLimit(TimeMachine $DateTime, string $Limit)
  
  // example
  $now = new TimeMachine(Zone::DHAKA);
  $limit = '9:50 AM';
  $bool = TimeMachine::CheckLimit($now,$limit);       //  Returns true if limit does not cross, false in other case
  // returns 
  bool
```

### CheckBetween()
```php
  // structure
  public static CheckBetween(string $Start, string $End, TimeMachine $DateTime)
  
  // example
  $now = new TimeMachine(Zone::DHAKA);
  $start  = '9:00 AM';
  $end    = '10:00 AM';
  $result = TimeMachine::CheckBetween($start,$end,$now);
  // returns 
  Object
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

## Enumerators
>Since PHP does not have enumurators, constants in classes are used as static enumerators

Enumerators comes in several classes they are used for. Some string enumerators can be passed as string as parameter directly
to work. You can also define your own enumerators in these classes to ease your work and to enhance this library.
> **Note** If you use a code editor or IDE like VS Code (... etc), these enums will suggest to ease your coding!

### Zone
*Zone* class contains string constants of PHP *DateTimeZone::ALL*

`Zone::DHAKA` is actually `'Asia/Dhaka'` string.

There are **424** ENUMS in these class. 

### Format
*Format* class contains `const string`s of PHP *DateTime->format()* as enums

`Format::DATE_MYSQL` is actually `'Y-m-d'`

Available ENUMS in *Versin 1.0*:

`DATE_MYSQL`, `TIME_MYSQL`, `DATETIME_MYSQL`, `DATE_INT`, `DATE_SLASH`, `DATE_ASIA`, `ISO`, `BLOG`, `TIME_CLOCK`, `TIME_CLOCK12`

### Time
*Time* class contains `const int`s of *TimeMachine->Get()* constants as enums

Available ENUMS in *Versin 1.0*:

`TODAY`, `NOW`, `NEXTWEEK`, `NEXTMONTH`, `NEXTYEAR`, `PREVWEEK`, `PREVMONTH`, `PREVYEAR`, `T_5MIN`, `T_10MIN`, `T_30MIN`, `T_1H`

### Difference
*Difference* class contains `const int`s of *TimeMachine::GetDifference()* constants as enums. These are fetch type of result.

Available ENUMS in *Versin 1.0*:

`ASSOC`, `OBJ`

### Interval 
*Interval* class contains `const string`s of PHP *DateTimeInterval()* as enums

`Interval::MIN1` is actually `'PT1M'`

There are 16 available INTERVAL ENUMS in *Versin 1.0*. Try a code editor suggestion to get them.
> In advance cases where you might need personalized intervals, follow PHP *DateTimeInterval()* Formats. [Click here](https://www.php.net/manual/en/dateinterval.format.php) to read PHP documentation.

### Period 
*Period* class contains `const string`s of PHP *DateTimeInterval()* as enums

`Period::A_DAY` is actually `'P1D'`

There are 6 available INTERVAL ENUMS in *Versin 1.0*. Try a code editor suggestion to get them.
> In advance cases where you might need personalized intervals, follow PHP *DateTimeInterval()* Formats. [Click here](https://www.php.net/manual/en/dateinterval.format.php) to read PHP documentation.
