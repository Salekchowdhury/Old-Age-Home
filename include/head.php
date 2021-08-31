<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>
        Old Age Home
    </title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="../../contents/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../../contents/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
    <link href="../../contents/demo/demo.css" rel="stylesheet" />
    <link href="../../contents/plugins/custom-scrollbar/jquery.mCustomScrollbar.min.css" rel="stylesheet" />
    <link href="../../contents/css/fontawesome-free-5.11.1-web/css/all.min.css" rel="stylesheet" />
    <link href="../../contents/plugins/jquery-ui/jquery-ui.css" rel="stylesheet" />
    <link href="../../contents/plugins/jquery.fancybox.min.css" rel="stylesheet" />
    <link href="../../contents/plugins/jquery.fancybox.min.css" rel="stylesheet" />
    <link href="../../plugins/jquery.fancybox.min.css" rel="stylesheet" />
    <link href="../../contents/css/libs/animate.css" rel="stylesheet">
    <link href="../../contents/css/sidebar_bg_user.css" rel="stylesheet">
    <link href="../../contents/css/toastr.min.css" rel="stylesheet">


    <style>
        ul.timeline {
            list-style-type: none;
            position: relative;
            padding-left: 1.5rem;
        }

        /* Timeline vertical line */
        ul.timeline:before {
            content: ' ';
            background: #fff;
            display: inline-block;
            position: absolute;
            left: 16px;
            width: 4px;
            height: 100%;
            z-index: 400;
            border-radius: 1rem;
        }

        li.timeline-item {
            margin: 20px 0;
        }

        /* Timeline item arrow */
        .timeline-arrow {
            border-top: 0.5rem solid transparent;
            border-right: 0.5rem solid #fff;
            border-bottom: 0.5rem solid transparent;
            display: block;
            position: absolute;
            left: 2rem;
        }

        /* Timeline item circle marker */
        li.timeline-item::before {
            content: ' ';
            background: #ddd;
            display: inline-block;
            position: absolute;
            border-radius: 50%;
            border: 3px solid #fff;
            left: 11px;
            width: 14px;
            height: 14px;
            z-index: 400;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }


        /*
        *
        * ==========================================
        * FOR DEMO PURPOSES
        * ==========================================
        *
        */
        body {
            background: #E8CBC0;
            background: -webkit-linear-gradient(to right, #E8CBC0, #636FA4);
            background: linear-gradient(to right, #E8CBC0, #636FA4);
            min-height: 100vh;
        }

        .text-gray {
            color: #999;
        }
    </style>
</head>
<body class="">