<?php

session_start(); // Start session

include "./include/connect.php";

if (isset($_POST['add'])) {

    $_SESSION['fname'] = $_POST['fname'];
    $_SESSION['lname'] = $_POST['lname'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['birthdate'] = $_POST['birthdate'];
    $_SESSION['city'] = $_POST['city'];
    $_SESSION['phone'] = $_POST['phone'];
    $_SESSION['room'] = $_POST['room'];
    $_SESSION['nroom'] = $_POST['nroom'];
    $_SESSION['totalprice'] = $_POST['totalprice'];
    $_SESSION['checkin'] = $_POST['checkin'];
    $_SESSION['checkout'] = $_POST['checkout'];

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $birthdate = $_POST['birthdate'];
    $city = $_POST['city'];
    $phone = $_POST['phone'];
    $room = $_POST['room'];
    $nroom = $_POST['nroom'];
    $totalprice = $_POST['totalprice'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];


    $insert = "INSERT INTO `room`(`fname`,`lname`,`email`,`birthdate`,`city`,`phone`,`room`,`nroom`,`totalprice`,`checkin`,`checkout`) VALUES ('$fname','$lname','$email','$birthdate','$city','$phone','$room','$nroom','$totalprice','$checkin','$checkout')";

    $result = $conn->query($insert);

    if ($result) {
        // Redirect to payment page
        header("location: card.php");
        exit(); // Make sure to exit after redirection
    } else {
        echo "<div class='alert alert-danger'>Error processing form submission.</div>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>Restar-Amusement Park</title>

    <!-- Fav Icon -->
    <link rel="icon" href="assets/images/amusement-park.png" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link href="assets/css/font-awesome-all.css" rel="stylesheet">
    <link href="assets/css/flaticon.css" rel="stylesheet">
    <link href="assets/css/owl.css" rel="stylesheet">
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/jquery.fancybox.min.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets/css/color.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">


    <script>
        function updateRoomPrice() {
            var roomDropdown = document.getElementById('roomDropdown');
            var priceDisplay = document.getElementById('roomPrice');

            var selectedRoom = roomDropdown.options[roomDropdown.selectedIndex].value;

            // Set room prices based on the selected room type
            var roomPrices = {
                'Suite Room': 4500,
                'Family Room': 10000,
                'Deluxe Room': 18000,
                'Classic Room': 13000,
                'Superior Room': 22000,
                'Luxury Room': 30000
            };

            // Display the price for the selected room type
            priceDisplay.innerHTML = '₹' + roomPrices[selectedRoom] + ' per night';

            // Call the function to update the total price when the number of rooms changes
            updateTotalPrice();
        }

        // Function to update the total price based on the number of rooms
        function updateTotalPrice() {
            var roomPrice = document.getElementById('roomPrice').innerText;
            var numberOfRooms = document.getElementById('number-of-rooms').value;

            // Extract the numerical value from the room price
            var roomPriceValue = parseInt(roomPrice.replace(/[^\d]/g, ''), 10);

            // Calculate the total price
            var totalPrice = roomPriceValue * parseInt(numberOfRooms, 10);

            // Display the total price
            document.getElementById('totalPrice').innerText = '₹' + totalPrice;
        }
    </script>
    <style>
        .was-validated #roomDropdown:valid {
            background-position: right calc(0.375em + 1.1875rem) center;
        }

        .error-container {
            color: red;
            margin-bottom: 10px;
        }

        .error-block {
            background-color: #ffeeee;
            padding: 10px;
            border: 1px solid #ff0000;
            margin-bottom: 10px;
        }

        .error-message {
            margin: 5px 0;
        }
    </style>
</head>


<!-- page wrapper -->

<body>

    <div class="boxed_wrapper">


        <!-- preloader -->
        <div class="loader-wrap">
            <div class="preloader">
                <div id="handle-preloader" class="handle-preloader about-page-2">
                    <div class="animation-preloader">
                        <div class="spinner"></div>
                        <div class="txt-loading">
                            <span data-text-preloader="r" class="letters-loading">
                                r
                            </span>
                            <span data-text-preloader="e" class="letters-loading">
                                e
                            </span>
                            <span data-text-preloader="s" class="letters-loading">
                                s
                            </span>
                            <span data-text-preloader="t" class="letters-loading">
                                t
                            </span>
                            <span data-text-preloader="a" class="letters-loading">
                                a
                            </span>
                            <span data-text-preloader="r" class="letters-loading">
                                r
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- preloader end -->



        <!-- Page Title -->


        <!--daining end-->
        <!--Ticket booking start-->
        <section class="contact-section centred" id="pricing-section">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-xl-8 col-lg-12 offset-xl-2 big-column">
                        <div class="sec-title centred">
                            <h2>BOOK YOUR ROOM</h2>
                        </div>
                        <div class="form-inner text-left">
                            <form method="post" action="" id="booking-form" class="default-form" novalidate="novalidate" onsubmit="return validateForm()">
                                <!-- Your form fields go here -->
                                <div class="row clearfix">

                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <label for="child" class="h6">First Name:</label>
                                        <input type="text" class="form-control text-font" name="fname" id="fname" placeholder="First Name" required>

                                        <div class="invalid-feedback">Please enter your name.</div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <label for="child" class="h6">Last Name:</label>
                                        <input type="text" class="form-control text-font" name="lname" id="lname" placeholder="Last Name" required>

                                        <div class="invalid-feedback">Please enter your name.</div>

                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <label for="child" class="h6">Email:</label>
                                        <input type="text" class="form-control text-font" id="email" name="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}" placeholder="Email" required>
                                        <div class="invalid-feedback invalid-feedback-email">Please enter a valid email
                                            address.</div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <label for="child" class="h6">Date of Birth:</label>
                                        <input type="date" class="form-control text-font" id="birthdate" name="birthdate" required>
                                        <div class="invalid-feedback invalid-feedback-date-birthdate">Please select a date.</div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <label for="child" class="h6">City:</label>
                                        <input type="text" class="form-control text-font" name="city" id="city" placeholder="Please enter your city name" required>
                                        <div class="invalid-feedback">Please enter your city name.</div>
                                    </div>
                                    <div class="col-lg-6  col-md-6 col-sm-12 form-group">
                                        <label for="child" class="h6">Phone:</label>
                                        <input type="text" class="form-control text-font" required="" name="phone" placeholder="Enter your phone number" id="phone">
                                        <div class="invalid-feedback invalid-feedback-text">Please enter your phone
                                            number.</div>
                                    </div>
                                    <div class="col-lg-6  col-md-6 col-sm-12 form-group">
                                        <label for="room" class="h6">Choose Your Room:</label><br>
                                        <select id="roomDropdown" class="form-control text-font" name="room" required="" onchange="updateRoomPrice()">
                                            <option value="Suite Room" name="room">Suite Room</option>
                                            <option value="Family Room" name="room">Family Room</option>
                                            <option value="Deluxe Room" name="room">Deluxe Room</option>
                                            <option value="Classic Room" name="room">Classic Room</option>
                                            <option value="Superior Room" name="room">Superior Room</option>
                                            <option value="Luxury Room" name="room">Luxury Room</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <label for="room" class="h6">Room Price:</label>
                                        <p id="roomPrice">₹4500 per two night</p>
                                    </div>

                                    <!-- Modify the PHP code to calculate the total price -->
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <label for="child" class="h6">Number of rooms:</label>
                                        <div class="input-group">
                                            <button type="button" class="btn btn-warning d-flex align-items-center text-font" onclick="decrementRooms()">-</button>
                                            <input type="text" class="form-control text-font" required="" name="nroom" id="number-of-rooms" placeholder="Enter number of rooms" onchange="updateTotalPrice()" value="1">
                                            <button type="button" class="btn btn-warning d-flex align-items-center text-font" onclick="incrementRooms()">+</button>
                                        </div>
                                        <div class="invalid-feedback">Please enter the number of rooms.</div>
                                    </div>

                                    <!-- Add this to display the total price -->
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <label for="room" class="h6">Total Price:</label>
                                        <input type="text" class="form-control text-font" name="totalprice" id="totalPrice" value="₹4500" readonly>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <label for="child" class="h6">Check in date:</label>
                                        <input type="date" class="form-control text-font" id="checkin" name="checkin" required>
                                        <div class="invalid-feedback invalid-feedback-date-checkin">Please select check in date.
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <label for="child" class="h6">Check out date:</label>
                                        <input type="date" class="form-control text-font" id="checkout" name="checkout" required>
                                        <div class="invalid-feedback invalid-feedback-date-checkout">Please select check out
                                            date.</div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn mr-0 text-center">
                                        <button class="theme-btn btn-one" name="add" id="add" onclick="updateTotalPrice();">Book your Room</button>
                                    </div>

                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
    </section>
    <!--Ticket booking end-->

    <script>
        // date valiation
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1;
        var yyyy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd;
        }
        if (mm < 10) {
            mm = '0' + mm;
        }
        today = yyyy + '-' + mm + '-' + dd;

        // Set the minimum date for the check-in input to today
        document.getElementById("checkin").setAttribute("min", today);
        document.getElementById("checkout").setAttribute("min", today);

        // birth
        var today = new Date();
        var minDate = new Date(today.getFullYear() - 100, today.getMonth(), today.getDate());

        // Format the date as YYYY-MM-DD
        var yyyy = minDate.getFullYear();
        var mm = minDate.getMonth() + 1;
        var dd = minDate.getDate();
        if (mm < 10) {
            mm = '0' + mm;
        }
        if (dd < 10) {
            dd = '0' + dd;
        }
        var formattedMinDate = yyyy + '-' + mm + '-' + dd;

        // Set the minimum date for the birthdate input to 100 years ago
        document.getElementById("birthdate").setAttribute("max", formattedMinDate);

        // date rev validation
        // $(function(updatedate) {
        //     var dtToday = new Date();

        //     var month = dtToday.getMonth() + 1;
        //     var day = dtToday.getDate();
        //     var year = dtToday.getFullYear();
        //     if (month < 10)
        //         month = '0' + month.toString();
        //     if (day < 10)
        //         day = '0' + day.toString();

        //     var maxDate = year + '-' + month + '-' + day;

        //     $('#birthdate').attr('max', maxDate);
        // });

        // Function to increment the number of rooms
        function incrementRooms() {
            var numberOfRooms = document.getElementById('number-of-rooms');
            numberOfRooms.value = parseInt(numberOfRooms.value, 10) + 1;
            updateTotalPrice();
        }

        // Function to decrement the number of rooms (minimum value is 1)
        function decrementRooms() {
            var numberOfRooms = document.getElementById('number-of-rooms');
            if (parseInt(numberOfRooms.value, 10) > 1) {
                numberOfRooms.value = parseInt(numberOfRooms.value, 10) - 1;
                updateTotalPrice();
            }
        }

        // Function to update the total price based on the number of rooms
        function updateTotalPrice() {
            var roomPrice = document.getElementById('roomPrice').innerText;
            var numberOfRooms = document.getElementById('number-of-rooms').value;

            // Extract the numerical value from the room price
            var roomPriceValue = parseInt(roomPrice.replace(/[^\d]/g, ''), 10);

            // Calculate the total price
            var totalPrice = roomPriceValue * parseInt(numberOfRooms, 10);

            // Display the total price
            document.getElementById('totalPrice').value = '₹' + totalPrice;
        }
    </script>
    <script>
        function validateForm() {
            var form = document.getElementById('booking-form');
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
                form.classList.add('was-validated');
                return false;
            }
            // Custom validation for date of birth
            var birthdate = document.getElementById('birthdate').value;
            var birthdateInput = new Date(birthdate);
            var today = new Date();
            if (birthdateInput >= today) {
                document.getElementById('birthdate').classList.add('is-invalid');
                document.querySelector('.invalid-feedback-date-birthdate').style.display = 'block';
                return false;
            }

            // Custom validation for check-in and check-out dates
            var checkin = document.getElementById('checkin').value;
            var checkout = document.getElementById('checkout').value;
            if (new Date(checkout) <= new Date(checkin)) {
                document.getElementById('checkout').classList.add('is-invalid');
                document.getElementById('checkin').classList.add('is-invalid');
                document.querySelector('.invalid-feedback-date-checkout').style.display = 'block';
                document.querySelector('.invalid-feedback-date-checkin').style.display = 'block';
                return false;
            }
            return true;
        }

        // Event listener to update total price when the number of rooms changes
        document.getElementById('number-of-rooms').addEventListener('change', updateTotalPrice);
    </script>


    <!-- scroll to top -->
    <button class="scroll-top scroll-to-target" data-target="html">
        <i class="fal fa-long-arrow-up"></i>
    </button>
    </div>


    <!-- jequery plugins -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/parallax.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/wow.js"></script>
    <script src="assets/js/validation.js"></script>
    <script src="assets/js/jquery.fancybox.js"></script>
    <script src="assets/js/appear.js"></script>
    <script src="assets/js/scrollbar.js"></script>

    <!-- main-js -->
    <script src="assets/js/script.js"></script>
    <script>
        function scrollToSection() {
            var pricingSection = document.getElementById('pricing-section');

            if (pricingSection) {
                pricingSection.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        }
    </script>

</body><!-- End of .page_wrapper -->


</html>