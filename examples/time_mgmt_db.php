<?php
    
    include('../src/time_machine.php');

    /*
        LET THERE IS A POST REQUEST AND YOU HAVE TO SAVE DATA IN DB
    */

    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $data = $_POST['data'];
        $dt = new TimeMachine(Zone::DHAKA);     // 'NOW' TIME IS BEING HOLD
        $date = $dt->Show(Format::DATE_MYSQL);
        $time = $dt->Show(Format::TIME_MYSQL);
        $query = "INSERT INTO `table` .... UPDATE `table` ...."; // DO FURTHUR QUERY
    }

    /*
        LET THERE IS A BLOG TO SHOW TAKING THE DATE FROM DB
    */

    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    $datetime = $data['datetime'];          // let this is 2019-09-12 11:00:00 
    $dt = new TimeMachine(Zone::DHAKA);
    $dt->DateTimeFromString($datetime);
    echo 'Posted at '.$dt->Show(Format::DAY_FULL).', at '.$dt->Show(Format::TIME_CLOCK12);
    // OUTPUT: Posted at Saturday, at 11:00 AM

    /*
        LET YO HAVE TO SEE THE TIME IS LEFT
    */
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    $limit  =   $data['last_date'];         //  let this is 2019-09-12 12:00 PM
    $now = new TimeMachine(Zone::DHAKA);
    $limitTime = new TimeMachine(Zone::DHAKA);
    $limitTime->DateTimeFromString($limit);
    $d = TimeMachine::GetDifference($now,$limitTime,Difference::ASSOC);
    echo 'You have '.$d['d'].' days '.$d['h'].' hours '.$d['m'].' minutes left to complete registration!';

    /*
        LET YO HAVE TO SEE IF THE TIME IS BETWEEN
    */

    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    $now = new TimeMachine(Zone::DHAKA);
    $start  = $data['start_time'];
    $end    = $data['end_time'];
    $result = TimeMachine::CheckBetween($start,$end,$now);
    if($result->between == true)
    {
        echo "You are between the time!";
    }
    else
    {
        if($result->start == false)
        {
            "You have come early";
        }
        else if($result->end == false)
        {
            "You have come late";
        }
    }
