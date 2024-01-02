<?php

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Title</title>
    <link rel="stylesheet" href="styles.css" />
</head>
<body>
<div id="reservationSystem"></div>

<div class="counter_container">
    <div class="add partybutton">+</div>
    <span id="partyNum"></span>
    <div class="subtract partybutton">-</div>
    <button id="confirmPartySize" class="partybutton">Done!</button>
</div>

<form class="confirmForm" action="index.php" method="POST">
<input type="text" name="guestName" placeholder="Name"/>
<input type="hidden" name="partyNum" value="" id="form-partyNum" />
<input type="text" name="guestContact" placeholder="Phone"/>
<input type="text" name="guestEmail" placeholder="Email"/>
<input type="hidden" name="resvCode" value="" id="resvCode"/>
<input type="hidden" name="reservationTime" value="" id="reservationTime" />
<input type="hidden" name="route" value="makeReservation" />
<!-- <input type="submit"> -->
<button id="submitButton">Make Reservation</button>
</form>

<script src="reservesystem.js"></script>
</body>
</html>