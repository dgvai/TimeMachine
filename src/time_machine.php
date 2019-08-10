<?php
/*****************************************************************************
 *                                                                           *
 *      TimeMachine (extention of PHP DateTime)                              *
 *      Version 1.0                                                          *
 *      Released August 10, 2019                                             *
 *      Author: Jalal Uddin     (Digital Footprint: DG)                      *
 *      License: MIT License                                                 *
 *                                                                           *
 *****************************************************************************/
  
    class TimeMachine 
    {
        private $DateTime;
        private $TimeZone;
        private $DateInterval;

        public function __construct($timezone = null,$timestamp = null)
        {
            $this->DateTime = new DateTime();
            if(isset($timezone))
            {
                $this->SetTimeZone($timezone);
                if(isset($timestamp))
                {
                    $this->SetTimeStamp($timestamp);
                }
            }
            return $this;
        }

        public static function GetTimeZones() 
        {
            return DateTimeZone::listIdentifiers(DateTimeZone::ALL);
        }

        public function SetTimeZone($__ZONE)
        {
            $this->TimeZone = new DateTimeZone($__ZONE);
            $this->DateTime->setTimezone($this->TimeZone);
            return $this;
        }

        public function SetTimeStamp($__TIMESTAMP)
        {
            $this->DateTime->setTimestamp($__TIMESTAMP);
            return $this;
        }

        public function DateTimeFromString($__DATESTRING)
        {
            $this->DateTime = new DateTime($__DATESTRING);
            return $this;
        }

        public function Show($format = 'r')
        {
            return $this->DateTime->format($format);
        }

        public function Get($__TIMEVAR)
        {
            switch($__TIMEVAR)
            {
                case 1 : 
                    $this->DateTime =  new DateTime('now');
                    $this->DateTime->setTimezone($this->TimeZone);
                    return $this;
                    break;
                case 2 :
                    $this->DateTime->modify('next week');
                    return $this;
                    break;
                case 3 :
                    $this->DateTime->modify('next month');
                    return $this;
                    break;
                case 4 :
                    $this->DateTime->modify('next year');
                    return $this;
                    break;
                case 5 :
                    $this->DateInterval = new DateInterval('PT5M');
                    $this->DateTime->add($this->DateInterval);
                    return $this;
                    break;
                case 6 :
                    $this->DateInterval = new DateInterval('PT10M');
                    $this->DateTime->add($this->DateInterval);
                    return $this;
                    break;
                case 7 :
                    $this->DateInterval = new DateInterval('PT30M');
                    $this->DateTime->add($this->DateInterval);
                    return $this;
                    break;
                case 8 :
                    $this->DateInterval = new DateInterval('PT1H');
                    $this->DateTime->add($this->DateInterval);
                    return $this;
                    break;
                case 9 :
                    $this->DateTime->modify('previous week');
                    return $this;
                    break;
                case 10 :
                    $this->DateTime->modify('previous month');
                    return $this;
                    break;
                case 11 :
                    $this->DateTime->modify('previous year');
                    return $this;
                    break;

            }
        }

        public function Interval($__INTERVALSTRING,$__DateTimeString = 'now')
        {
            $this->DateTime = new DateTime($__DateTimeString,$this->TimeZone);        
            $this->DateInterval = new DateInterval($__INTERVALSTRING);           
            $this->DateTime->add($this->DateInterval);
            
            return $this;
        }

        public static function GetDifference(TimeMachine $DateTime1, TimeMachine $DateTime2, $__DiffString, $__absolute = false)
        {
            $difference = $DateTime1->DateTime->diff($DateTime2->DateTime,$__absolute);
            $invert = ($difference->invert == 1) ? -1 : 1;
            $data = array_intersect_key((array)$difference, array_flip(['y','m','d','h','i','s']));
            $signed_data = array_map(function($val) use ($invert) {
                return $invert*$val;
            }, $data);
            switch($__DiffString)
            {
                case 1 :
                    return $signed_data;
                    break;
                case 2 : 
                    return (object)$signed_data;
                    break;
            }
        }

        public static function GetPeriod(TimeMachine $StartTime, TimeMachine $EndTime, $__PERIOD,$__FORMAT = 'r')
        {
            $DateTimes = new DatePeriod($StartTime->DateTime,new DateInterval($__PERIOD),$EndTime->DateTime);
            $PeriodArray = array();
            foreach($DateTimes as $date)
            {
                array_push($PeriodArray,$date->format($__FORMAT));
            }
            return $PeriodArray;
        }       
    }

    class Zone extends TimeMachine
    {
        const ABIDJAN = 'Africa/Abidjan';
        const ACCRA = 'Africa/Accra';
        const ADDIS_ABABA = 'Africa/Addis_Ababa';
        const ALGIERS = 'Africa/Algiers';
        const ASMARA = 'Africa/Asmara';
        const BAMAKO = 'Africa/Bamako';
        const BANGUI = 'Africa/Bangui';
        const BANJUL = 'Africa/Banjul';
        const BISSAU = 'Africa/Bissau';
        const BLANTYRE = 'Africa/Blantyre';
        const BRAZZAVILLE = 'Africa/Brazzaville';
        const BUJUMBURA = 'Africa/Bujumbura';
        const CAIRO = 'Africa/Cairo';
        const CASABLANCA = 'Africa/Casablanca';
        const CEUTA = 'Africa/Ceuta';
        const CONAKRY = 'Africa/Conakry';
        const DAKAR = 'Africa/Dakar';
        const DAR_ES_SALAAM = 'Africa/Dar_es_Salaam';
        const DJIBOUTI = 'Africa/Djibouti';
        const DOUALA = 'Africa/Douala';
        const EL_AAIUN = 'Africa/El_Aaiun';
        const FREETOWN = 'Africa/Freetown';
        const GABORONE = 'Africa/Gaborone';
        const HARARE = 'Africa/Harare';
        const JOHANNESBURG = 'Africa/Johannesburg';
        const JUBA = 'Africa/Juba';
        const KAMPALA = 'Africa/Kampala';
        const KHARTOUM = 'Africa/Khartoum';
        const KIGALI = 'Africa/Kigali';
        const KINSHASA = 'Africa/Kinshasa';
        const LAGOS = 'Africa/Lagos';
        const LIBREVILLE = 'Africa/Libreville';
        const LOME = 'Africa/Lome';
        const LUANDA = 'Africa/Luanda';
        const LUBUMBASHI = 'Africa/Lubumbashi';
        const LUSAKA = 'Africa/Lusaka';
        const MALABO = 'Africa/Malabo';
        const MAPUTO = 'Africa/Maputo';
        const MASERU = 'Africa/Maseru';
        const MBABANE = 'Africa/Mbabane';
        const MOGADISHU = 'Africa/Mogadishu';
        const MONROVIA = 'Africa/Monrovia';
        const NAIROBI = 'Africa/Nairobi';
        const NDJAMENA = 'Africa/Ndjamena';
        const NIAMEY = 'Africa/Niamey';
        const NOUAKCHOTT = 'Africa/Nouakchott';
        const OUAGADOUGOU = 'Africa/Ouagadougou';
        const PORTO_NOVO = 'Africa/Porto-Novo';
        const SAO_TOME = 'Africa/Sao_Tome';
        const TRIPOLI = 'Africa/Tripoli';
        const TUNIS = 'Africa/Tunis';
        const WINDHOEK = 'Africa/Windhoek';
        const ADAK = 'America/Adak';
        const ANCHORAGE = 'America/Anchorage';
        const ANGUILLA = 'America/Anguilla';
        const ANTIGUA = 'America/Antigua';
        const ARAGUAINA = 'America/Araguaina';
        const BUENOS_AIRES = 'America/Argentina/Buenos_Aires';
        const CATAMARCA = 'America/Argentina/Catamarca';
        const CORDOBA = 'America/Argentina/Cordoba';
        const JUJUY = 'America/Argentina/Jujuy';
        const LA_RIOJA = 'America/Argentina/La_Rioja';
        const MENDOZA = 'America/Argentina/Mendoza';
        const RIO_GALLEGOS = 'America/Argentina/Rio_Gallegos';
        const SALTA = 'America/Argentina/Salta';
        const SAN_JUAN = 'America/Argentina/San_Juan';
        const SAN_LUIS = 'America/Argentina/San_Luis';
        const TUCUMAN = 'America/Argentina/Tucuman';
        const USHUAIA = 'America/Argentina/Ushuaia';
        const ARUBA = 'America/Aruba';
        const ASUNCION = 'America/Asuncion';
        const ATIKOKAN = 'America/Atikokan';
        const BAHIA = 'America/Bahia';
        const BAHIA_BANDERAS = 'America/Bahia_Banderas';
        const BARBADOS = 'America/Barbados';
        const BELEM = 'America/Belem';
        const BELIZE = 'America/Belize';
        const BLANC_SABLON = 'America/Blanc-Sablon';
        const BOA_VISTA = 'America/Boa_Vista';
        const BOGOTA = 'America/Bogota';
        const BOISE = 'America/Boise';
        const CAMBRIDGE_BAY = 'America/Cambridge_Bay';
        const CAMPO_GRANDE = 'America/Campo_Grande';
        const CANCUN = 'America/Cancun';
        const CARACAS = 'America/Caracas';
        const CAYENNE = 'America/Cayenne';
        const CAYMAN = 'America/Cayman';
        const CHICAGO = 'America/Chicago';
        const CHIHUAHUA = 'America/Chihuahua';
        const COSTA_RICA = 'America/Costa_Rica';
        const CRESTON = 'America/Creston';
        const CUIABA = 'America/Cuiaba';
        const CURACAO = 'America/Curacao';
        const DANMARKSHAVN = 'America/Danmarkshavn';
        const DAWSON = 'America/Dawson';
        const DAWSON_CREEK = 'America/Dawson_Creek';
        const DENVER = 'America/Denver';
        const DETROIT = 'America/Detroit';
        const DOMINICA = 'America/Dominica';
        const EDMONTON = 'America/Edmonton';
        const EIRUNEPE = 'America/Eirunepe';
        const EL_SALVADOR = 'America/El_Salvador';
        const FORT_NELSON = 'America/Fort_Nelson';
        const FORTALEZA = 'America/Fortaleza';
        const GLACE_BAY = 'America/Glace_Bay';
        const GODTHAB = 'America/Godthab';
        const GOOSE_BAY = 'America/Goose_Bay';
        const GRAND_TURK = 'America/Grand_Turk';
        const GRENADA = 'America/Grenada';
        const GUADELOUPE = 'America/Guadeloupe';
        const GUATEMALA = 'America/Guatemala';
        const GUAYAQUIL = 'America/Guayaquil';
        const GUYANA = 'America/Guyana';
        const HALIFAX = 'America/Halifax';
        const HAVANA = 'America/Havana';
        const HERMOSILLO = 'America/Hermosillo';
        const INDIANAPOLIS = 'America/Indiana/Indianapolis';
        const KNOX = 'America/Indiana/Knox';
        const MARENGO = 'America/Indiana/Marengo';
        const PETERSBURG = 'America/Indiana/Petersburg';
        const TELL_CITY = 'America/Indiana/Tell_City';
        const VEVAY = 'America/Indiana/Vevay';
        const VINCENNES = 'America/Indiana/Vincennes';
        const WINAMAC = 'America/Indiana/Winamac';
        const INUVIK = 'America/Inuvik';
        const IQALUIT = 'America/Iqaluit';
        const JAMAICA = 'America/Jamaica';
        const JUNEAU = 'America/Juneau';
        const LOUISVILLE = 'America/Kentucky/Louisville';
        const MONTICELLO = 'America/Kentucky/Monticello';
        const KRALENDIJK = 'America/Kralendijk';
        const LA_PAZ = 'America/La_Paz';
        const LIMA = 'America/Lima';
        const LOS_ANGELES = 'America/Los_Angeles';
        const LOWER_PRINCES = 'America/Lower_Princes';
        const MACEIO = 'America/Maceio';
        const MANAGUA = 'America/Managua';
        const MANAUS = 'America/Manaus';
        const MARIGOT = 'America/Marigot';
        const MARTINIQUE = 'America/Martinique';
        const MATAMOROS = 'America/Matamoros';
        const MAZATLAN = 'America/Mazatlan';
        const MENOMINEE = 'America/Menominee';
        const MERIDA = 'America/Merida';
        const METLAKATLA = 'America/Metlakatla';
        const MEXICO_CITY = 'America/Mexico_City';
        const MIQUELON = 'America/Miquelon';
        const MONCTON = 'America/Moncton';
        const MONTERREY = 'America/Monterrey';
        const MONTEVIDEO = 'America/Montevideo';
        const MONTSERRAT = 'America/Montserrat';
        const NASSAU = 'America/Nassau';
        const NEW_YORK = 'America/New_York';
        const NIPIGON = 'America/Nipigon';
        const NOME = 'America/Nome';
        const NORONHA = 'America/Noronha';
        const BEULAH = 'America/North_Dakota/Beulah';
        const CENTER = 'America/North_Dakota/Center';
        const NEW_SALEM = 'America/North_Dakota/New_Salem';
        const OJINAGA = 'America/Ojinaga';
        const PANAMA = 'America/Panama';
        const PANGNIRTUNG = 'America/Pangnirtung';
        const PARAMARIBO = 'America/Paramaribo';
        const PHOENIX = 'America/Phoenix';
        const PORT_AU_PRINCE = 'America/Port-au-Prince';
        const PORT_OF_SPAIN = 'America/Port_of_Spain';
        const PORTO_VELHO = 'America/Porto_Velho';
        const PUERTO_RICO = 'America/Puerto_Rico';
        const RAINY_RIVER = 'America/Rainy_River';
        const RANKIN_INLET = 'America/Rankin_Inlet';
        const RECIFE = 'America/Recife';
        const REGINA = 'America/Regina';
        const RESOLUTE = 'America/Resolute';
        const RIO_BRANCO = 'America/Rio_Branco';
        const SANTAREM = 'America/Santarem';
        const SANTIAGO = 'America/Santiago';
        const SANTO_DOMINGO = 'America/Santo_Domingo';
        const SAO_PAULO = 'America/Sao_Paulo';
        const SCORESBYSUND = 'America/Scoresbysund';
        const SITKA = 'America/Sitka';
        const ST_BARTHELEMY = 'America/St_Barthelemy';
        const ST_JOHNS = 'America/St_Johns';
        const ST_KITTS = 'America/St_Kitts';
        const ST_LUCIA = 'America/St_Lucia';
        const ST_THOMAS = 'America/St_Thomas';
        const ST_VINCENT = 'America/St_Vincent';
        const SWIFT_CURRENT = 'America/Swift_Current';
        const TEGUCIGALPA = 'America/Tegucigalpa';
        const THULE = 'America/Thule';
        const THUNDER_BAY = 'America/Thunder_Bay';
        const TIJUANA = 'America/Tijuana';
        const TORONTO = 'America/Toronto';
        const TORTOLA = 'America/Tortola';
        const VANCOUVER = 'America/Vancouver';
        const WHITEHORSE = 'America/Whitehorse';
        const WINNIPEG = 'America/Winnipeg';
        const YAKUTAT = 'America/Yakutat';
        const YELLOWKNIFE = 'America/Yellowknife';
        const CASEY = 'Antarctica/Casey';
        const DAVIS = 'Antarctica/Davis';
        const DUMONTDURVILLE = 'Antarctica/DumontDUrville';
        const MACQUARIE = 'Antarctica/Macquarie';
        const MAWSON = 'Antarctica/Mawson';
        const MCMURDO = 'Antarctica/McMurdo';
        const PALMER = 'Antarctica/Palmer';
        const ROTHERA = 'Antarctica/Rothera';
        const SYOWA = 'Antarctica/Syowa';
        const TROLL = 'Antarctica/Troll';
        const VOSTOK = 'Antarctica/Vostok';
        const LONGYEARBYEN = 'Arctic/Longyearbyen';
        const ADEN = 'Asia/Aden';
        const ALMATY = 'Asia/Almaty';
        const AMMAN = 'Asia/Amman';
        const ANADYR = 'Asia/Anadyr';
        const AQTAU = 'Asia/Aqtau';
        const AQTOBE = 'Asia/Aqtobe';
        const ASHGABAT = 'Asia/Ashgabat';
        const ATYRAU = 'Asia/Atyrau';
        const BAGHDAD = 'Asia/Baghdad';
        const BAHRAIN = 'Asia/Bahrain';
        const BAKU = 'Asia/Baku';
        const BANGKOK = 'Asia/Bangkok';
        const BARNAUL = 'Asia/Barnaul';
        const BEIRUT = 'Asia/Beirut';
        const BISHKEK = 'Asia/Bishkek';
        const BRUNEI = 'Asia/Brunei';
        const CHITA = 'Asia/Chita';
        const CHOIBALSAN = 'Asia/Choibalsan';
        const COLOMBO = 'Asia/Colombo';
        const DAMASCUS = 'Asia/Damascus';
        const DHAKA = 'Asia/Dhaka';
        const DILI = 'Asia/Dili';
        const DUBAI = 'Asia/Dubai';
        const DUSHANBE = 'Asia/Dushanbe';
        const FAMAGUSTA = 'Asia/Famagusta';
        const GAZA = 'Asia/Gaza';
        const HEBRON = 'Asia/Hebron';
        const HO_CHI_MINH = 'Asia/Ho_Chi_Minh';
        const HONG_KONG = 'Asia/Hong_Kong';
        const HOVD = 'Asia/Hovd';
        const IRKUTSK = 'Asia/Irkutsk';
        const JAKARTA = 'Asia/Jakarta';
        const JAYAPURA = 'Asia/Jayapura';
        const JERUSALEM = 'Asia/Jerusalem';
        const KABUL = 'Asia/Kabul';
        const KAMCHATKA = 'Asia/Kamchatka';
        const KARACHI = 'Asia/Karachi';
        const KATHMANDU = 'Asia/Kathmandu';
        const KHANDYGA = 'Asia/Khandyga';
        const KOLKATA = 'Asia/Kolkata';
        const KRASNOYARSK = 'Asia/Krasnoyarsk';
        const KUALA_LUMPUR = 'Asia/Kuala_Lumpur';
        const KUCHING = 'Asia/Kuching';
        const KUWAIT = 'Asia/Kuwait';
        const MACAU = 'Asia/Macau';
        const MAGADAN = 'Asia/Magadan';
        const MAKASSAR = 'Asia/Makassar';
        const MANILA = 'Asia/Manila';
        const MUSCAT = 'Asia/Muscat';
        const NICOSIA = 'Asia/Nicosia';
        const NOVOKUZNETSK = 'Asia/Novokuznetsk';
        const NOVOSIBIRSK = 'Asia/Novosibirsk';
        const OMSK = 'Asia/Omsk';
        const ORAL = 'Asia/Oral';
        const PHNOM_PENH = 'Asia/Phnom_Penh';
        const PONTIANAK = 'Asia/Pontianak';
        const PYONGYANG = 'Asia/Pyongyang';
        const QATAR = 'Asia/Qatar';
        const QYZYLORDA = 'Asia/Qyzylorda';
        const RIYADH = 'Asia/Riyadh';
        const SAKHALIN = 'Asia/Sakhalin';
        const SAMARKAND = 'Asia/Samarkand';
        const SEOUL = 'Asia/Seoul';
        const SHANGHAI = 'Asia/Shanghai';
        const SINGAPORE = 'Asia/Singapore';
        const SREDNEKOLYMSK = 'Asia/Srednekolymsk';
        const TAIPEI = 'Asia/Taipei';
        const TASHKENT = 'Asia/Tashkent';
        const TBILISI = 'Asia/Tbilisi';
        const TEHRAN = 'Asia/Tehran';
        const THIMPHU = 'Asia/Thimphu';
        const TOKYO = 'Asia/Tokyo';
        const TOMSK = 'Asia/Tomsk';
        const ULAANBAATAR = 'Asia/Ulaanbaatar';
        const URUMQI = 'Asia/Urumqi';
        const UST_NERA = 'Asia/Ust-Nera';
        const VIENTIANE = 'Asia/Vientiane';
        const VLADIVOSTOK = 'Asia/Vladivostok';
        const YAKUTSK = 'Asia/Yakutsk';
        const YANGON = 'Asia/Yangon';
        const YEKATERINBURG = 'Asia/Yekaterinburg';
        const YEREVAN = 'Asia/Yerevan';
        const AZORES = 'Atlantic/Azores';
        const BERMUDA = 'Atlantic/Bermuda';
        const CANARY = 'Atlantic/Canary';
        const CAPE_VERDE = 'Atlantic/Cape_Verde';
        const FAROE = 'Atlantic/Faroe';
        const MADEIRA = 'Atlantic/Madeira';
        const REYKJAVIK = 'Atlantic/Reykjavik';
        const SOUTH_GEORGIA = 'Atlantic/South_Georgia';
        const ST_HELENA = 'Atlantic/St_Helena';
        const STANLEY = 'Atlantic/Stanley';
        const ADELAIDE = 'Australia/Adelaide';
        const BRISBANE = 'Australia/Brisbane';
        const BROKEN_HILL = 'Australia/Broken_Hill';
        const CURRIE = 'Australia/Currie';
        const DARWIN = 'Australia/Darwin';
        const EUCLA = 'Australia/Eucla';
        const HOBART = 'Australia/Hobart';
        const LINDEMAN = 'Australia/Lindeman';
        const LORD_HOWE = 'Australia/Lord_Howe';
        const MELBOURNE = 'Australia/Melbourne';
        const PERTH = 'Australia/Perth';
        const SYDNEY = 'Australia/Sydney';
        const AMSTERDAM = 'Europe/Amsterdam';
        const ANDORRA = 'Europe/Andorra';
        const ASTRAKHAN = 'Europe/Astrakhan';
        const ATHENS = 'Europe/Athens';
        const BELGRADE = 'Europe/Belgrade';
        const BERLIN = 'Europe/Berlin';
        const BRATISLAVA = 'Europe/Bratislava';
        const BRUSSELS = 'Europe/Brussels';
        const BUCHAREST = 'Europe/Bucharest';
        const BUDAPEST = 'Europe/Budapest';
        const BUSINGEN = 'Europe/Busingen';
        const CHISINAU = 'Europe/Chisinau';
        const COPENHAGEN = 'Europe/Copenhagen';
        const DUBLIN = 'Europe/Dublin';
        const GIBRALTAR = 'Europe/Gibraltar';
        const GUERNSEY = 'Europe/Guernsey';
        const HELSINKI = 'Europe/Helsinki';
        const ISLE_OF_MAN = 'Europe/Isle_of_Man';
        const ISTANBUL = 'Europe/Istanbul';
        const JERSEY = 'Europe/Jersey';
        const KALININGRAD = 'Europe/Kaliningrad';
        const KIEV = 'Europe/Kiev';
        const KIROV = 'Europe/Kirov';
        const LISBON = 'Europe/Lisbon';
        const LJUBLJANA = 'Europe/Ljubljana';
        const LONDON = 'Europe/London';
        const LUXEMBOURG = 'Europe/Luxembourg';
        const MADRID = 'Europe/Madrid';
        const MALTA = 'Europe/Malta';
        const MARIEHAMN = 'Europe/Mariehamn';
        const MINSK = 'Europe/Minsk';
        const MONACO = 'Europe/Monaco';
        const MOSCOW = 'Europe/Moscow';
        const OSLO = 'Europe/Oslo';
        const PARIS = 'Europe/Paris';
        const PODGORICA = 'Europe/Podgorica';
        const PRAGUE = 'Europe/Prague';
        const RIGA = 'Europe/Riga';
        const ROME = 'Europe/Rome';
        const SAMARA = 'Europe/Samara';
        const SAN_MARINO = 'Europe/San_Marino';
        const SARAJEVO = 'Europe/Sarajevo';
        const SARATOV = 'Europe/Saratov';
        const SIMFEROPOL = 'Europe/Simferopol';
        const SKOPJE = 'Europe/Skopje';
        const SOFIA = 'Europe/Sofia';
        const STOCKHOLM = 'Europe/Stockholm';
        const TALLINN = 'Europe/Tallinn';
        const TIRANE = 'Europe/Tirane';
        const ULYANOVSK = 'Europe/Ulyanovsk';
        const UZHGOROD = 'Europe/Uzhgorod';
        const VADUZ = 'Europe/Vaduz';
        const VATICAN = 'Europe/Vatican';
        const VIENNA = 'Europe/Vienna';
        const VILNIUS = 'Europe/Vilnius';
        const VOLGOGRAD = 'Europe/Volgograd';
        const WARSAW = 'Europe/Warsaw';
        const ZAGREB = 'Europe/Zagreb';
        const ZAPOROZHYE = 'Europe/Zaporozhye';
        const ZURICH = 'Europe/Zurich';
        const ANTANANARIVO = 'Indian/Antananarivo';
        const CHAGOS = 'Indian/Chagos';
        const CHRISTMAS = 'Indian/Christmas';
        const COCOS = 'Indian/Cocos';
        const COMORO = 'Indian/Comoro';
        const KERGUELEN = 'Indian/Kerguelen';
        const MAHE = 'Indian/Mahe';
        const MALDIVES = 'Indian/Maldives';
        const MAURITIUS = 'Indian/Mauritius';
        const MAYOTTE = 'Indian/Mayotte';
        const REUNION = 'Indian/Reunion';
        const APIA = 'Pacific/Apia';
        const AUCKLAND = 'Pacific/Auckland';
        const BOUGAINVILLE = 'Pacific/Bougainville';
        const CHATHAM = 'Pacific/Chatham';
        const CHUUK = 'Pacific/Chuuk';
        const EASTER = 'Pacific/Easter';
        const EFATE = 'Pacific/Efate';
        const ENDERBURY = 'Pacific/Enderbury';
        const FAKAOFO = 'Pacific/Fakaofo';
        const FIJI = 'Pacific/Fiji';
        const FUNAFUTI = 'Pacific/Funafuti';
        const GALAPAGOS = 'Pacific/Galapagos';
        const GAMBIER = 'Pacific/Gambier';
        const GUADALCANAL = 'Pacific/Guadalcanal';
        const GUAM = 'Pacific/Guam';
        const HONOLULU = 'Pacific/Honolulu';
        const JOHNSTON = 'Pacific/Johnston';
        const KIRITIMATI = 'Pacific/Kiritimati';
        const KOSRAE = 'Pacific/Kosrae';
        const KWAJALEIN = 'Pacific/Kwajalein';
        const MAJURO = 'Pacific/Majuro';
        const MARQUESAS = 'Pacific/Marquesas';
        const MIDWAY = 'Pacific/Midway';
        const NAURU = 'Pacific/Nauru';
        const NIUE = 'Pacific/Niue';
        const NORFOLK = 'Pacific/Norfolk';
        const NOUMEA = 'Pacific/Noumea';
        const PAGO_PAGO = 'Pacific/Pago_Pago';
        const PALAU = 'Pacific/Palau';
        const PITCAIRN = 'Pacific/Pitcairn';
        const POHNPEI = 'Pacific/Pohnpei';
        const PORT_MORESBY = 'Pacific/Port_Moresby';
        const RAROTONGA = 'Pacific/Rarotonga';
        const SAIPAN = 'Pacific/Saipan';
        const TAHITI = 'Pacific/Tahiti';
        const TARAWA = 'Pacific/Tarawa';
        const TONGATAPU = 'Pacific/Tongatapu';
        const WAKE = 'Pacific/Wake';
        const WALLIS = 'Pacific/Wallis';
        const UTC = 'UTC';
    }

    class Format extends TimeMachine
    {
        const DATE_MYSQL    =   'Y-m-d';                const TIME_CLOCK    =   'h:i A';
        const TIME_MYSQL    =   'H:i:s';                const TIME_CLOCK12  =   'H:i';
        const DATETIME_MYSQL=   'Y-m-d H:i:s';          
        const DATE_INT      =   'Ymd';
        const DATE_SLASH    =   'Y/m/d';
        const DATE_ASIA     =   'd-m-Y';
        const ISO           =   'c'; 
        const BLOG          =   'l, F j, Y, g:i A';
    }

    class Time extends TimeMachine
    {
        const TODAY     =   1;      const NOW       =   1;
        const NEXTWEEK  =   2;      const PREVWEEK  =   9;
        const NEXTMONTH =   3;      const PREVMONTH =   10;
        const NEXTYEAR  =   4;      const PREVYEAR  =   11;
        const T_5MIN    =   5;
        const T_10MIN   =   6;
        const T_30MIN   =   7;
        const T_1H      =   8;
    }

    class Difference extends TimeMachine
    {
        const ASSOC =   1;
        const OBJ   =   2;
    }

    class Interval extends TimeMachine
    {
        const MIN_1     =   'PT1M';     const MIN_5     =   'PT5M';     const MIN_10    =   'PT10M';    const MIN_30    =   'PT30M';
        const HOUR_1    =   'PT1H';     const HOUR_6    =   'PT6H';     const HOUR_12   =   'PT12H';
        const DAY_1     =   'P1D';      const DAY_7     =   'P7D';      const DAY_15    =   'P15D';     const DAY_30    =   'P30D';
        const MON_1     =   'P1M';      const MON_3     =   'P3M';      const MON_6     =   'P6M';
        const YEAR_1    =   'P1Y';      const YEAR_4    =   'P4Y';
    }

    class Period extends TimeMachine
    {
        const A_DAY     =   'P1D';      const AN_HOUR   =   'PT1H';
        const A_MONTH   =   'P1M';      const A_MIN     =   'PT1M';
        const A_YEAR    =   'P1Y';      const A_SEC     =   'PT1S';
    }