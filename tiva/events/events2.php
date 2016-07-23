<?php
// Example of events list. This is array of objects. You can feed events from your database.
$db_event_1 = new stdClass();
$db_event_1->name = "Corrido Fest 2016";
$db_event_1->image = "events/images/corrido_fest_2016.jpg";
$db_event_1->time = "2016-06-24 10:00:00";
$db_event_1->end_time = "2016-06-25 20:00:00";
$db_event_1->color = "1";
$db_event_1->location = "Celebrity Theatre, Phoenix, United States, 85008";
$db_event_1->description = "Rigo Entertainment presents Corrido Fest 2016 Hijos de Barron Los Cachorros de Juan Villarreal Legado 7 Saturday, May 14, 2016 Sábado, 14 de Mayo de 2016 Showtime – 8:00 PM Theatre Doors Open – 7:00 PM Club Doors Open – 6:00 PM El Show Comenzara a las 8:00 Las Puertas del teatro se abrirán a las 7:00 y las puertas del club abrirán a las 6:00 Ticket Prices: Rows 1-8 = $80 Rows 9-13 = $45 GA/B-Ring = $25 All ticket prices increase $10 on 5/7/16 Los precios de los boletos son de $80 de la fila 1-8 $45 de la fila 9-13 $25 La entrada general/B-Ring Todos los boletos aumentaran $10 5/7/16 All tickets subject to service charge. Se agrega un cobro adicional por servicios a cada boleto. Seating is in the round. Los asientos estarán en la ronda. Tickets purchased within 10 days of show will be held in Will Call. Los boletos adquiridos 10 días antes del show serán puestos en Will Call. Early arrival is suggested to allow for parking and security check. Lleque Temprano para chequeo de seguridad y estacionamiento.";

$db_event_2 = new stdClass();
$db_event_2->name = "RuPaul's Drag Race: Battle of the Seasons";
$db_event_2->image = "events/images/rupauls_drag_race.jpg";
$db_event_2->time = "2016-06-21 08:30:00";
$db_event_2->end_time = "2016-06-21 21:30:00";
$db_event_2->color = "2";
$db_event_2->location = "Celebrity Theatre, Phoenix, United States, 85008";
$db_event_2->description = "AEG Live and Danny Zelisko Presents RuPaul's Drag Race: Battle of the Seasons 2016 Extravaganza Tour Wednesday, April 27, 2016 Showtime – 9:00 PM Theatre Doors Open – 8:00 PM Club Doors Open – 7:00 PM Ticket Prices: Rows 1-25 = $37.50 ALL tickets subject to service charge. 3/4 House - stage will NOT rotate. Tickets purchased within 10 days of show will be held in Will Call. Print @ Home option only available until 2 hours prior to show time. Early arrival is suggested to allow for parking and security check.";

$db_event_3 = new stdClass();
$db_event_3->name = "Lucha Libre";
$db_event_3->image = "events/images/lucha_libre.jpg";
$db_event_3->time = "2016-06-06 20:00:00";
$db_event_3->end_time = "2016-06-07 00:00:00";
$db_event_3->color = "3";
$db_event_3->location = "Celebrity Theatre, Phoenix, United States, 85008";
$db_event_3->description = "Midway Nissan and Rigo Entertainment Lucha Libre Sunday April 24 2016 Domingo, 24 de Abril de 2015 Showtime – 6:00 PM Theatre Doors Open – 5:00 PM Club Doors Open – 4:00 PM El Show Comenzara a las 6:00 Las Puertas del teatro se abrirán a las 5:00 y las puertas del club abrirán a las 4:00 Ticket Prices General Admission Ticket Prices: $15 Children 12 and under - $5 All ticket prices increase $5 on 4/18/16 Los precios de los boletos son de General Admisión = $15 Niños menores de 12 años = $5 Todos los boletos aumentaran $5 4/18/16 All tickets subject to service charge. Se agrega un cobro adicional por servicios a cada boleto. Tickets purchased within 10 days of show will be held in Will Call. Los boletos adquiridos 10 días antes del show serán puestos en Will Call. Seating is in the round. Los asientos estarán en la ronda. Early arrival is suggested to allow for parking and security check. Lleque Temprano para chequeo de seguridad y estacionamiento.";

$db_event_4 = new stdClass();
$db_event_4->name = "Roberto Tapia";
$db_event_4->image = "events/images/roberto_tapia.jpg";
$db_event_4->time = "2016-06-16 16:00:55";
$db_event_4->end_time = "";
$db_event_4->color = "4";
$db_event_4->location = "Celebrity Theatre, Phoenix, United States, 85008";
$db_event_4->description = "Rigo Entertainment presents Roberto Tapia Saturday, April 23, 2016 Sábado, 23 de Abril 2016 Showtime – 8:30 PM Theatre Doors Open – 7:30 PM Club Doors Open – 6:30 PM El Show Comenzara a las 8:30 Las Puertas del teatro se abrirán a las 7:30 y las puertas del club abrirán a las 6:30 Ticket Prices: Rows 1-8 = $95 Rows 9-13 = $65 Rows 14-25 = $35 All ticket prices increase $10 on 4/18/16 Los precios de los boletos son de $95 de la fila 1-8 $65 de la fila 9-13 $35 de la fila 14-25 Todos los boletos aumentaran $10 4/18/16 All tickets subject to service charge. Se agrega un cobro adicional por servicios a cada boleto. Tickets purchased within 10 days of show will be held in Will Call. Los boletos adquiridos 10 días antes del show serán puestos en Will Call. Seating is in the round. Los asientos estarán en la ronda. Early arrival is suggested to allow for parking and security check. Lleque Temprano para chequeo de seguridad y estacionamiento.";

$db_events = array($db_event_1, $db_event_2, $db_event_3, $db_event_4); // You can feed events from your database to this variable ($db_events)

// Convert data for json to use in ajax
$events = array();
foreach ($db_events as $db_event) {
    $event = new stdClass();
    $event->name = $db_event->name; // Adapt with your suitable db field. If your db has not this field, please let it be : $event->name = "";
    $event->image = $db_event->image; // Adapt with your suitable db field. If your db has not this field, please let it be : $event->image = "";
    $event->day = date('j', strtotime($db_event->time));
    $event->month = date('n', strtotime($db_event->time));
    $event->year = date('Y', strtotime($db_event->time));
    $event->time = date('g:i a', strtotime($db_event->time)); // You can change the format of time
    if (!$db_event->end_time) {
        $event->duration = 1; // If end_time is blank -> event's duration = 1 (day).
    } else {
        if (date('Ymd', strtotime($db_event->time)) == date('Ymd', strtotime($db_event->end_time))) { // If start date and end date are same day -> event's duration = 1 (day).
            $event->duration = 1;
        } else {
            $start_day = date('Y-m-d', strtotime($db_event->time));
            $end_day = date('Y-m-d', strtotime($db_event->end_time));
            $event->duration = ceil(abs(strtotime($end_day) - strtotime($start_day)) / 86400) + 1; // Get event's duration = days between start date and end date.
        }
    }
    $event->color = $db_event->color;
    $event->location = $db_event->location; // Adapt with your suitable db field. If your db has not this field, please let it be : $event->location = "";
    $event->description = $db_event->description; // Adapt with your suitable db field. If your db has not this field, please let it be : $event->description = "";
    array_push($events, $event);
}

echo json_encode($events);
?>