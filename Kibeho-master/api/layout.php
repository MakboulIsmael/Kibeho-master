<?php include "config.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- getting title from the users -->
    <title><?php echo $title; ?></title>
    <!-- the link to css's -->
    <link rel="stylesheet" href="/kibeho/assets/css/tables.css">
    <link rel="stylesheet" href="/kibeho/assets/css/jquery-ui.css">
    <link rel="stylesheet" href="/kibeho/assets/font-awesome/css/all.css">
    <link rel="stylesheet" href="/kibeho/assets/css/app.css">
    <!--Regular Datatables CSS-->
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
    <!--Responsive Extension Datatables CSS-->
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
    <!-- scripts to use -->
    <script src="/kibeho/assets/js/alpine.js"></script>
    <script src="/kibeho/assets/js/app.js"></script>
    <script src="/kibeho/assets/js/components-v2.js"></script>
    <script src="/kibeho/assets/js/jquery-3.2.1.min.js"></script>
    <script src="/kibeho/assets/js/jquery-1.12.4.js"></script>
    <script src="/kibeho/assets/js/jquery-ui.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js
"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
</head>

<body>
    <!-- the start of the page -->