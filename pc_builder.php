<?php
$components = [
    'CORE COMPONENTS' => ['Processor', 'Motherboard', 'Graphics Card', 'CPU Cooler', 'RAM', 'SSD', 'HDD', 'Power Supply', 'Casing'],
    'PERIPHERALS & OTHERS' => ['Monitor', 'Case Fan', 'UPS', 'Anti Virus'],
    'ACCESSORIES' => ['Mouse', 'Keyboard', 'Headphone']
];
?>

<?php
$totalItems = 0;
foreach ($components as $category => $items) {
    $totalItems += count($items);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PC Builder - Build Your Own Computer - Quantum Technology Bangladesh</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    


    <style>
    @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css");

        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #ebecff;
        }

        h1 {
            text-align: center;
            margin-bottom: 5px;
            color: #2E3192;
            font-weight: bold;
        }

        h2 {
            border-bottom: 1px solid #ccc;
            padding-bottom: 5px;
            margin-bottom: 15px;
            color: #2E3192;
            font-size: 18px;
        }

        h3 {
            text-align: center;
            font-size: 1.0rem;
            color: #2E3192;
            margin-bottom: 10px;
            font-weight: normal;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
        }

        label {
            margin-bottom: 10px;
            color: #2E3192; 
            width: 100%;
            margin-left: 50px;
        }

        .glow-on-hover {
            width: 220px;
            height: 40px;
            border: none;
            outline: none;
            color: #fff;
            background: #2E3192;
            cursor: pointer;
            position: relative;
            z-index: 0;
            border-radius: 10px;
        }

        .glow-on-hover:before {
            content: '';
            background: linear-gradient(45deg, #ff0000, #ff7300, #fffb00, #48ff00, #00ffd5, #002bff, #7a00ff, #ff00c8, #ff0000);
            position: absolute;
            top: -2px;
            left: -2px;
            background-size: 400%;
            z-index: -1;
            filter: blur(5px);
            width: calc(100% + 4px);
            height: calc(100% + 4px);
            animation: glowing 20s linear infinite;
            opacity: 0;
            transition: opacity .3s ease-in-out;
            border-radius: 10px;
        }

        .glow-on-hover:active {
            color: #000
        }

        .glow-on-hover:active:after {
            background: transparent;
        }

        .glow-on-hover:hover:before {
            opacity: 1;
        }

        .glow-on-hover:after {
            z-index: -1;
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background: #2E3192;
            left: 0;
            top: 0;
            border-radius: 5px;
        }

        @keyframes glowing {
            0% {
                background-position: 0 0;
            }

            50% {
                background-position: 400% 0;
            }

            100% {
                background-position: 0 0;
            }
        }

        .custom-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-image: linear-gradient(to right, #000000 , #3533CD);
            color: white;
            border-radius: 8px 8px 0 0;
        }

        .card-body {
            padding-top: 20px;
            padding-bottom: 0px;
        }

        .pcb-head {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: white;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .quantumtechbd-logo img {
            max-width: 100%;
            height: auto;
            margin-left: 5PX;
        }

        .actions {
            display: flex;
            position: relative;
        }

        .all-actions {
            display: flex;
            justify-content: space-between;
        }

        .action {
            text-decoration: none;
            color: #2E3192;
            font-size: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .action i {
            margin-bottom: 5px;
            font-size: 2.5rem;
        }

        .m-hide {
            display: none;
        }

        .action .bi {
            font-size: 2rem;
        }


        .total-section {
            display: inline-flex;
            margin-right: 20px;
            margin-top: 15px;
            color: #2E3192;
            font-weight: bold;
            position: relative;
        }

        #total-amount {
            margin-right: 15px;
            color: white;
            }

        #total-items {
            margin-right: 15px;
            color: white;
        }

        #add-to-cart,
        #screenshot {
            display: inline-flex;
            margin-right: 5px;
        }

        .item-icon {
            margin-left: 10px;
            margin-bottom: 10px;
            font-size: 28px;
            color: #2E3192;
        }

        .t-rectangle {
            width: 140px;
            height: 45px;
            background: #2E3192;
            border-radius: 5px;
            position: absolute;
            right: 0;
            bottom: 0;
            top: 5px;
            left: -20px;
            overflow: hidden;
        }

    </style>
</head>

<body>

    <div class="container">
        <h1 class="mt-5">PC Builder</h1>
        <h3>Select Your Components</h3>


        <div class="pcb-head">
            <div class="quantumtechbd-logo">
                <img class="logo" src="https://i.ibb.co/drYjMrs/logo.png" width="160" height="160" alt="Logo">
            </div>


            <div class="actions">
                <div class="all-actions">
                    <form>

                        <div class="t-rectangle">
                            <div class="shine"></div>
                        </div>
                        
                        <div class="total-section">
                            <p id="total-amount">0.0৳</p>
                            <p id="total-items">0 Items</p>        
                        </div>
                    

                        <div id="add-to-cart" class="action">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-basket2-fill" viewBox="0 0 16 16"><path d="M5.929 1.757a.5.5 0 1 0-.858-.514L2.217 6H.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h.623l1.844 6.456A.75.75 0 0 0 3.69 15h8.622a.75.75 0 0 0 .722-.544L14.877 8h.623a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1.717L10.93 1.243a.5.5 0 1 0-.858.514L12.617 6H3.383L5.93 1.757zM4 10a1 1 0 0 1 2 0v2a1 1 0 1 1-2 0zm3 0a1 1 0 0 1 2 0v2a1 1 0 1 1-2 0zm4-1a1 1 0 0 1 1 1v2a1 1 0 1 1-2 0v-2a1 1 0 0 1 1-1" />
                            </svg>
                            <span>Add to Cart</span>
                        </div>

                        <div id="screenshot" class="action">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-camera-fill" viewBox="0 0 16 16"><path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/><path d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4zm.5 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1m9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0"/>
                            </svg>
                            <span>Screenshot</span>
                        </div>

                    </form>
                </div>
            </div>
        </div>

<div class="container">
    <form action="#" method="post">
        <?php
        $categoryIcons = [
            'Processor' => 'cpu-fill',
            'Motherboard' => 'motherboard-fill',
            'Graphics Card' => 'gpu-card',
            'CPU Cooler' => 'fan',
            'RAM' => 'memory',
            'SSD' => 'device-ssd-fill',
            'HDD' => 'device-hdd-fill',
            'Power Supply' => 'battery-charging',
            'Casing' => 'pc',
            'Monitor' => 'display',
            'Case Fan' => 'fan',
            'UPS' => 'speaker-fill',
            'Anti Virus' => 'virus2',
            'Mouse' => 'mouse3-fill',
            'Keyboard' => 'keyboard-fill',
            'Headphone' => 'headphones',

        ];

        foreach ($components as $category => $items) : ?>
            <div class="card custom-card">
                <h2 class="card-header"><?= $category ?></h2>
                <div class="card-body">
                    <ul>
                        <?php foreach ($items as $item) : ?>
                            <li>
                                <span class="item-icon"><i class="bi bi-<?= $categoryIcons[$item] ?>"></i></span>
                                <label for="<?= $item ?>"><?= $item ?></label>
                                <button type="button" name="Choose" class="btn btn-success glow-on-hover">Choose</button>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        <?php endforeach; ?>
    </form>
</div>

    <!-- Bootstrap JS and Popper.js (Optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    </body>

</html>
